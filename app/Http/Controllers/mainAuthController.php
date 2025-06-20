<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mainContact;
use App\Models\mainSubscriber;
use App\Models\ShareHolder;
use App\Models\PermissionData;
use App\Models\PermissionGroupBy;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\SendCodeResetPassword;
use App\Models\ResetCodePassword;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\period_price;
use App\Models\SchoolStudent;
use App\Models\price_range;
use App\Models\Customer;
use App\Models\UserRole;
use App\Models\ShareHolderFile;
use App\Models\SchoolSocialMedia;
use App\Models\SchoolEmployee;
use App\Models\AllowCustomerToRegiter;
use App\Models\CustomerPartialRegister;
use Illuminate\Validation\Rule;
use App\Mail\CustomerToRegiterMail;
use App\Mail\NewCustomerPartialRegister;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\customer_read_terms_condition;

class mainAuthController extends Controller
{
    public function login(){
        if (!empty(Auth::check())) {
            return redirect()->route('main.customer.dashboard');
        }
        return view('mainHome.auth.login')->with('hideFooter',true);
    }

    public function forgot_password(){
        return view('mainHome.auth.forgot-password')->with('hideFooter',true);
    }

    public function home(){
        $shareHolder_count = (ShareHolder::all())->count();
        $customer_count = (Customer::all())->count();
        $schoolStudent_count = (SchoolStudent::all())->count();
        $school_Employees_count = (SchoolEmployee::all())->count();
        
        $count_sustem_users = $shareHolder_count + $customer_count+$school_Employees_count;

        //experiance period
        $date = "2024-07-12 12:00:00";
        $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        return view('mainHome.pages.welcome',[
            'school_count' => $customer_count,
            'sys_users_count' => $count_sustem_users,
            'students_count' => $schoolStudent_count,
            'time_ago_exp' => $carbonDate
        ]);
    }

    public function about_us(){
        return view('mainHome.pages.about');
    }

    public function services(){
        return view('mainHome.pages.service');
    }

    public function pricing(){

        $period_price = period_price::all()->where('period','Monthly')->get('price');
        $price_range = price_range::all();
        // dd($price_range);
        return view('mainHome.pages.pricing',compact('period_price','price_range'));

    }

    public function contact(){
        return view('mainHome.pages.contact');
    }

    public function send_mail_to_register(){
        return view('mainHome.auth.mail_toRegister')->with('hideFooter',true);
    }

    public function SubmitContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        mainContact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success','message sent , We\'ll reply to you soon');
    }

    public function submit_subscription_email(Request $request){
        
        try {
            $request->validate([
                'email' => 'required|email|unique:main_subscribers',
            ], [], [], 'subscription');
            
            mainSubscriber::create([
                'email' => $request->email,
            ]);
            
            return redirect()->back()->with(['success' => 'Subscription successful !']);

        } catch (ValidationException $e) {
            
            return redirect()->back()->with(['error' => $e->errors()['subscription']]);
        
        }

    }

    // public function submit_login(Request $request){
        
    //     $request->validate([
    //         'username'=>'required|string',
    //         'password'=>'required|string',
    //     ],[
    //         'username.required' =>'',
    //         'password.required' =>''
    //     ]);

    //     if (Auth::guard('shareHolder')->attempt(['username' => $request->username, 'password' => $request->password])) {

    //         return redirect()->route('main.shareHolder.dashboard');

    //     }elseif(Auth::guard('customer')->attempt(['username' => $request->username, 'password' => $request->password])) {

    //         return redirect()->route('main.customer.dashboard');

    //     }else{

    //         return redirect()->back()->with('error','Invalid Username or Password ,try again !');

    //     }

    // }

    public function submit_login(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => '',
            'password.required' => '',
        ]);

        // Check if the input is an email or username
        $loginField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Try to authenticate with Shareholder guard
        if (Auth::guard('shareHolder')->attempt([$loginField => $request->username, 'password' => $request->password])) {
            return redirect()->route('main.shareHolder.dashboard');
        } 
        // Try to authenticate with Customer guard
        elseif (Auth::guard('customer')->attempt([$loginField => $request->username, 'password' => $request->password])) {
            return redirect()->route('main.customer.dashboard');
            
        } else {
            return redirect()->back()->with('error', 'Invalid Username or Password, try again!');
        }
    }


    public function logout(){

        // Check which guard is currently authenticated
        if (Auth::guard('shareHolder')->check()) {
            Auth::guard('shareHolder')->logout(); // Logout admin
        } 

        // Redirect to login form
        return redirect()->route('main.login.page');

    }

    public function submit_forgot_password(Request $request){

        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => 'Please enter an email !'
        ]);

        $email = $request->email;

        $existsInAdmins = ShareHolder::where('email', $email)->exists();
        $existsInUsers = Customer::where('email', $email)->exists();

        if (!$existsInAdmins && !$existsInUsers) {
        
            return back()->withErrors(['email' => 'The email doesn\'t found in our database !']);
        
        }else{

            // Delete all old code that user send before.
            ResetCodePassword::where('email', $email)->delete();

            // Generate random code
            $data=[
                'email' => $email,
                'code' => mt_rand(100000, 999999),
            ];

            // Create a new code
            $reset_data = ResetCodePassword::create($data);

            // Send email to user
            Mail::to($email)->send(new SendCodeResetPassword($reset_data->email,$reset_data->code));

            $code=Crypt::encrypt($request->code);
            $email=Crypt::encrypt($request->email);
            
            return redirect(url('/reset/password/code/'.$email.'/'.$code))
                ->with('success','We sent you a code on your email !');
        }
    }

    public function code_toreset_passsword($email,$code){
        return view('mainHome.shareHolder.code_toreset_password',[
            'email' => $email,
            'code' => $code,
        ]);
    }

    public function verify_code(Request $request , $email,$code){
        // Validate the code input
        $request->validate([
            'code.*' => 'required|numeric|digits:1' // Ensure each input is a single digit
        ]);

        // Flatten the code array and convert to a string
        $code = implode('', $request->code);

        // Decrypt the email
        $email = Crypt::decrypt($email);

        // Check for the code in the database
        $resetCode = ResetCodePassword::where('email', $email)->where('code', $code)->first();

        if ($resetCode) {

            // Check if the code is older than one hour
            if ($resetCode->created_at < now()->subHour()) {
                $resetCode->delete();
                return redirect()->route('main.forgot_password.page')->with('error' , 'your code is expired !');
            } else {
                return redirect()->route('reset.password.form', ['email' => Crypt::encrypt($email)])->with('info','Now reset your password !');
            }

        } else {
            // Code does not match or has expired
            return back()->with('error', 'The code is not valid. Please try again.');
        }

    }

    public function reset_password_form($email){
        return view('mainHome.shareHolder.ResetPasswordForm',['email' => Crypt::decrypt($email)]);   
    }

    public function submit_reset_password(Request $request, $email)
    {
        // Validate the incoming request
        $request->validate([
            'new_password' => 'required|min:8|confirmed', // 'confirmed' checks for matching passwords
        ]);

        // Find the user by email in both ShareHolder and Customer models
        $user = ShareHolder::where('email', $email)->first() ?? Customer::where('email', $email)->first();

        if ($user) {
            // Update the password
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Delete the reset code associated with the email
            ResetCodePassword::where('email', $email)->delete();

            // Redirect to login with success message
            return redirect()->route('main.login.page')->with('success', 'Your password has been reset successfully. Please log in.');
        }

        // If the user is not found, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'The provided email does not match any account.']);
    }



    public function panel_home(){
        $shareHolder_count = (ShareHolder::all())->count();
        $customer_count = (Customer::all())->count();
        $school_Employees_count = (SchoolEmployee::all())->count();
        $schoolStudent_count = (SchoolStudent::all())->count();
        
        $count_system_users = $shareHolder_count + $customer_count + $school_Employees_count;
        
        return view('mainHome.shareHolder.home',['count_sustem_users' => $count_system_users , 'school_count' => $customer_count , 'schoolStudent_count' => $schoolStudent_count]);

    }

    public function shareHolder_profile(){
        return view('mainHome.shareHolder.profile');
    }

    public function shareHolder_username(){
        return view('mainHome.shareHolder.username');
    }

    public function shareHolder_information(){
        return view('mainHome.shareHolder.myInformation');
    }

    public function shareHolder_password(){
        return view('mainHome.shareHolder.password');
    }

    public function editInfo(Request $request){
        

        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|in:Male,Female',
        //     'phone' => 'required|numeric|unique:users,phone',
        //     'email' => 'required|email|unique:users,email',
        //     'username' => 'required|string|between:8,32|unique:users,username',
        //     'dob' => 'required|string',
        // ]);

        $auth_user_id=Auth::guard('shareHolder')->user()->id;
        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $dob=$request->dob;

        $user=ShareHolder::find($auth_user_id);
        $user->firstname=$fname;
        $user->lastname=$lname;
        $user->gender=$gender;
        $user->phone=$phone;
        $user->email=$email;
        $user->dob=$dob;
        $user->save();

        // toastr()->info("Data updated successfully !", ['timeOut' =>5000]);

        return redirect()->back()->with('info','Data updated successfully !');

    }

    public function shareHolder_submit_username(Request $request){

        $request->validate([
            'username' => [
                'required','string','between:8,32',
                Rule::unique('share_holders')->ignore(Auth::guard('shareHolder')->user()->username,'username'),
                'unique:customers,username',
                'unique:school_employees,username',
            ]
        ]);

        $username=$request->username;
        $auth_user_id=Auth::guard('shareHolder')->user()->id;

        ShareHolder::where('id', $auth_user_id)->update(['username' => $username]);

        return redirect()->back()->with('info','Username is updated well !');

    }


    public function shareHolder_submit_password(Request $request){

        // Trim whitespace from the password fields
        $request->merge([
            'old_password' => trim($request->old_password),
            'new_password' => trim($request->new_password),
            'new_password_confirmation' => trim($request->new_password_confirmation),
        ]);

        // Validate the input
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|between:8,32|confirmed',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Get the currently authenticated user
        $user = auth()->guard('shareHolder')->user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password doesn\'t match');
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('info', 'Password changed successfully');
    }


    public function customer_partial_register(Request $request){
        $request->validate([
            'school_name' => 'required|string',
            'email' => 'required|string|email|unique:customer_partial_registers,email',
            'phone' => [
                    'required',
                    'string',
                    'min:10',
                    'unique:customer_partial_registers,phone',
                    'regex:/^(078|072|079|073)\d{6,}$/',
                    'unique:customer_partial_registers,phone',
            ],
        
        ]);

        $school_name=$request->school_name;
        $email=$request->email;
        $phone=$request->phone;
        $country="Rwanda";

        $partial_register = CustomerPartialRegister::create([
            'school_name' => $school_name,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
        ]);

        AllowCustomerToRegiter::create([
            'customer_partial_reg_fk_id' => $partial_register->id,
            'status' => 'Not Allowed',
        ]);

        DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', $partial_register->id)
            ->update(['registration_done' => 'Not yet']);

        $registrar_id = $partial_register->id;

        $data = [
            'id' => $registrar_id,
            'school_name' => $school_name,
            'email' => $email,
            'phone' => $phone,
        ];

        Mail::to($email)->send(new CustomerToRegiterMail($data));

        //ShareHolder
        $shareHolderEmails = ShareHolder::pluck('email');

        foreach ($shareHolderEmails as $email) {
            try {
                
                Mail::to($email)->send(new NewCustomerPartialRegister($data));
                sleep(1); // Delay of 1 second between emails

            } catch (\Exception $e) {
                
                // Log the error or handle it as needed
                \Log::error('Failed to send email to ' . $email . ': ' . $e->getMessage());
            
            }
        }

        return redirect()->back()->with('info','You’re registered! Please check your email for next steps');

    }

    public function customer_self_registrion($id,$name,$email,$phone){
        $customer_id = Crypt::decrypt($id);
        $school_name = Crypt::decrypt($name);
        $email = Crypt::decrypt($email);
        $phone = Crypt::decrypt($phone);

        $status = DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', $customer_id)
            ->first(['status', 'registration_done']);

        $statusValue = $status->status;
        $registrationDone = $status->registration_done;

        return view('mainHome.auth.customer_self_registration',compact('id','school_name','email','phone','statusValue','registrationDone'))->with('hideFooter',true);

    }
    
    public function submit_customer_registration(Request $request, $id) {
        // Validation
        $request->validate([
            'school_name' => 'required|string',
            'email' => 'required|string|email|unique:customers,email|unique:share_holders,email',
            'phone' => 'required|string|unique:customers,phone|unique:share_holders,phone',
            'username' => 'required|string|min:8|unique:customers,username|unique:share_holders,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the latest school code and increment
        $latestSchoolCode = DB::table('customers')->orderBy('school_code', 'desc')->value('school_code');

        if ($latestSchoolCode) {
            $sequenceNumber = (int) substr($latestSchoolCode, 2);
        } else {
            $sequenceNumber = 0;
        }

        $newSequenceNumber = $sequenceNumber + 1;
        $newSchoolCode = $this->generateStudentNumber($newSequenceNumber);

        // Create the customer
        $school = Customer::create([
            'school_code' => $newSchoolCode,
            'school_name' => $request->school_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => 'Rwanda',
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => 'no_logo.png',
        ]);

        //User role creation
        $user_roles = UserRole::create([
            'role_name' => 'Admin',
            'school_fk_id' => $school->id,
        ]);

        $role_data = UserRole::findOrFail($user_roles->id);

        if ($role_data) {
            SchoolEmployee::create([
                'school_fk_id' => $school->id,
                'role_fk_id' => $role_data->id,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'image' => 'user.jpg',
            ]);
        }

        // Update registration status
        DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', Crypt::decrypt($id))
            ->update(['registration_done' => 'Done']);

        // Fill terms and conditions using the correct model
        DB::table('customer_read_terms_conditions')->insert([
            [
                'school_fk_id' => $school->id,
                'terms' => 'Introduction',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'System overview',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'Payment terms',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'Service update',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'Security and privacy',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'User responsibility',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'Termination',
                'status' => '',
            ],
            [
                'school_fk_id' => $school->id,
                'terms' => 'Customer support',
                'status' => '',
            ],
        ]);

        SchoolSocialMedia::create([
            'school_fk_id' => $school->id,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        // Redirect with success message
        return redirect()->route('main.login.page')->with('info', 'Account created successfully. You can now login!');
    }


    private function generateStudentNumber($sequenceNumber) {
        // Prefix for the student number
        $prefix = 'SE';
    
        // Format the sequence number to be zero-padded to 5 digits
        $formattedNumber = str_pad($sequenceNumber, 5, '0', STR_PAD_LEFT);

        return $prefix . $formattedNumber;
    }

    public function view_school() {
        $school_data = Customer::all();
        $count = 1;

        $number = $school_data->count();
        $school_count = $this->formatNumber($number);

        $school_not_allowed_yet=AllowCustomerToRegiter::all()->where('status','Not Allowed')->where('registration_done','Not yet');
        $school_not_allowed_yet_count = $this->formatNumber($school_not_allowed_yet->count());

        return view('mainHome.shareHolder.view_schools', compact('school_data', 'count', 'school_count','school_not_allowed_yet_count'));
    }

    public function formatNumber($number) {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B'; // Billion
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M'; // Million
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . 'K'; // Thousand
        }
        return $number; // Less than 1000, no abbreviation
    }


     // View single school's info
    public function view_single_school_info($id)
    {
        // Decrypt the ID
        $school_id = Crypt::decrypt($id);

        // Retrieve the single school data based on the decrypted ID
        $school_data = Customer::findOrFail($school_id); // Fetch a single school

        // Add the 'time ago' for the single school
        $school_data->time_ago = Carbon::parse($school_data->created_at)->diffForHumans();

        // Pass the school data to the view
        return view('mainHome.shareHolder.view_single_school_info', compact('school_data'));
    }

    public function school_not_allowed_yet(){
        // =AllowCustomerToRegiter::all();
        $status = "Not Allowed";
        $status_two = "Allowed";

        $school_data = DB::table('customer_partial_registers')
            ->join('allow_customer_to_regiters', 'customer_partial_registers.id', '=', 'allow_customer_to_regiters.customer_partial_reg_fk_id')
            ->select('customer_partial_registers.*','status')
            ->where('allow_customer_to_regiters.registration_done','=','Not yet')
            ->get();

        $number = $school_data->count();
        $school_count = $this->formatNumber($number);

        // Loop through each record and add 'time_ago' for each
        foreach ($school_data as $data) {
            $data->time_ago = Carbon::parse($data->created_at)->diffForHumans();
        }

        $count=1;

        return view('mainHome.shareHolder.school_not_allowed_yet', compact('school_data','school_count','count'));
    }


    public function allowed_school_to_register($id){
        $id = Crypt::decrypt($id);
        $status = "Allowed";

        AllowCustomerToRegiter::where('customer_partial_reg_fk_id', $id)->update(['status' => $status]);

        return redirect()->back()->with('info','Allowed to register !');
    }

    //edit customers info
    public function Customer_edit_info($id){
        // Decrypt the ID
        $school_id = Crypt::decrypt($id);

        // Retrieve the single school data based on the decrypted ID
        $school_data = Customer::findOrFail($school_id); // Fetch a single school

        return view('mainHome.shareHolder.editCustomerInfo', compact('school_data'));
    }

    //edit customers info
    public function Customer_employee_student($id){
        $school_id = Crypt::decrypt($id);

        $school_employees = SchoolEmployee::where('school_fk_id',$school_id)->get();
        
        $school_students = SchoolStudent::where('school_fk_id',$school_id)->get();

        $school_employees_count=$school_employees->count();
        $school_students_count=$school_students->count();

        foreach ($school_employees as $data_count) {
            if ($data_count->firstname == '' && $data_count->lastname == '') {
                $school_employees_count = 0;
            }else{
                $school_employees_count;
            }
        }

        $school_data = Customer::findOrFail($school_id);

        return view('mainHome.shareHolder.Customer_Employee_Student', ['school_data' => $school_data,
            'employees' => $school_employees,
            'students' => $school_students,
            'employees_count' => $school_employees_count,
            'students_count' => $school_students_count,
            'count_employees' => 1,
            'count_students' => 1,
        ]);
    }

    //edit customers info
    public function Customer_payment_status($id){
        // Decrypt the ID
        $school_id = Crypt::decrypt($id);

        // Retrieve the single school data based on the decrypted ID
        $school_data = Customer::findOrFail($school_id); // Fetch a single school

        return view('mainHome.shareHolder.Customer_payment_status', compact('school_data'));
    }

    public function edit_customer_info(Request $request,$id){
        // Decrypt the ID
        $school_id = Crypt::decrypt($id);

        $request->validate([
            'school_name' => 'required|string',
            'email' => [
                'required',
                'email',
                'unique:share_holders,email',
                Rule::unique('customers', 'email')->ignore($school_id)
            ],

            'phone' => [
                'required',
                'numeric',
                Rule::unique('customers', 'phone')->ignore($school_id),
                'unique:share_holders,phone'
            ],
            'country' => 'required|string',

        ]);

        // Retrieve the single school data based on the decrypted ID
        $school_data = Customer::findOrFail($school_id); // Fetch a single school
        
        $school_name=$request->school_name;
        $school_email=$request->email;
        $school_phone=$request->phone;
        $school_country=$request->country;

        DB::table('customers')
            ->where('id', $school_id)
            ->update(['school_name' => $school_name , 'email' => $school_email,'phone' => $school_phone,'country' => $school_country]);

        return redirect()->back()->with('info','Data updated successfully');
    }

    public function shareHolder_update_logo(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $shareHolder_id = auth()->guard('shareHolder')->user()->id;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').rand(0,999).$file->getClientOriginalName();
            $file->move(public_path('/adminPanel/assets/img/profile_picture'),$filename);

            DB::table('share_holders')->where('id',$shareHolder_id)
                ->update(['image' => $filename]);
            return redirect()->back()->with([
                'success' => "Logo uploaded well !",
            ]);
        }else{
            return redirect()->back()->with('success', 'Logo upload failed');
        }
    }


    //Create price
    public function shareHolder_create_price(){
        $all_payment_plan = period_price::all();
        $count = 1;

        $count_payment_plan = $all_payment_plan->count();
        
        return view('mainHome.shareHolder.createPricing',[
            'payment_plan' => $all_payment_plan,
            'count' => $count,
            'count_payment_plan' => $count_payment_plan,
        ]);

    }

    //main.add_new_payment_plan
    public function shareHolder_add_new_payment_plan(Request $request){
        $request->validate([
            'plan_name' => 'required|string|unique:period_prices,period'
        ]);

        period_price::create([
            'period' => $request->plan_name,            
        ]);

        return redirect()->back()->with('info','new payment plan added !');
    }

    public function shareHolder_edit_payment_plan(Request $request){
        $request->validate([
            'id' => 'required|exists:period_prices,id',
            'period' => 'required|string|max:255',
        ]);

        // Update the record in the database
        $periodPrice = period_price::findOrFail($request->id);
        $periodPrice->period = $request->period;
        $periodPrice->save();

        return redirect()->back()->with('info','Payment plan edited well !');
    }

    public function shareHolder_school_user_permission(){
        $permission_data = PermissionData::all();
        $permission_groupBy = PermissionGroupBy::all();
        return view('mainHome.shareHolder.school_user_permission',[
            'permission_data' => $permission_data,
            'count' => 1,
            'permission_groupBy' => $permission_groupBy
        ]);
    }

    public function shareHolder_school_user_permission_groupBy(){
        $permission_data = PermissionGroupBy::all();
        return view('mainHome.shareHolder.school_user_permissionGroupBy',[
            'permission_data' => $permission_data,
            'count' => 1
        ]);
    }

    public function shareHolder_post_new_permission(Request $request){

        PermissionData::create([
            'name' => $request->name,
            'slang' => $request->name,
            'permissiongroupBy_fk_id' => $request->groupBy,
        ]);

        return redirect()->back()->with('info','New permission added !');
    }

    public function shareHolder_post_new_permission_groupBy(Request $request){

        $request->validate([
            'name' => 'required|string|unique:permission_group_bies,name',
        ]);

        PermissionGroupBy::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('info','New permission added !');
    }

    public function shareHolder_employees(){
       $permission_data = PermissionGroupBy::all();
        return view('mainHome.shareHolder.employees',[
            'permission_data' => $permission_data,
            'count' => 1
        ]); 
    }

    public function shareHolder_wallets(){
        $permission_data = PermissionGroupBy::all();
        return view('mainHome.shareHolder.wallets',[
            'permission_data' => $permission_data,
            'count' => 1
        ]);
    }

    // public function ShareHolder_documents(){
    //     $permission_data = PermissionGroupBy::all();

    //     $files = ShareHolderFile::where('shareHolder_fk_id', Auth::guard('shareHolder')->user()->id)->get();

    //     return view('mainHome.shareHolder.documents',[
    //         'permission_data' => $permission_data,
    //         'count' => 1,
    //         compact('files')
    //     ]);
    // }

    public function ShareHolder_documents()
    {
        $permission_data = PermissionGroupBy::all();
        $files = ShareHolderFile::where('shareHolder_fk_id', Auth::guard('shareHolder')->user()->id)->get();

        return view('mainHome.shareHolder.documents', [
            'permission_data' => $permission_data,
            'count' => 1,
            'files' => $files
        ]);
    }


    public function ShareHolderStore_File(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'UploadFile' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        // Ensure authenticated user exists
        $shareholder = Auth::guard('shareHolder')->user();
        if (!$shareholder) {
            return redirect()->back()->with('error', 'You must be logged in as a shareholder.');
        }

        // Check and store file
        if ($request->hasFile('UploadFile')) {
            $file = $request->file('UploadFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('shareholder_files', $fileName, 'public');

            // Save to database
            ShareHolderFile::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'shareHolder_fk_id' => $shareholder->id,
            ]);
        }

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function ShareHolderDestroy_File($id){
        $file = ShareHolderFile::findOrFail($id);
        Storage::delete("public/{$file->file_path}");
        $file->delete();

        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }


}
