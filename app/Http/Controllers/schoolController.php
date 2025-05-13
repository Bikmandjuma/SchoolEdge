<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Customer;
use App\Models\UserRole;
use App\Models\SchoolEmployee;
use App\Models\SchoolStudent;
use App\Models\PermissionGroupBy;
use App\Models\PermissionData;
use App\Models\Course;
use App\Models\Level;
use Carbon\Carbon;
use App\Models\LevelClass;
use App\Models\UserPermission;
use App\Models\AcademicYear;
use App\Models\AcademicTerm;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCodeResetPassword;
use App\Models\ResetCodePassword;
use App\Models\Student;

class schoolController extends Controller
{
    public function open($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));

        $school_employee_data = SchoolEmployee::where('school_fk_id',Crypt::decrypt($school_id))->get();
        
        return view("Single_School.Landing_pages.Home",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'school_employee_data' => $school_employee_data
        ]);

    }

    //About in homepage
    public function about_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.About",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //New in homepage
    public function news_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.News",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Student studying in homepage
    public function student_studying_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Student_studying",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Student living in homepage
    public function student_living_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Student_living",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function administration_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Leaders_Administration",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function contact_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Contact",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function login_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Auth.Login",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'hideFooter' => true,
        ]);

        $project_name = $request->project_name;
        $description = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $project_category = $request->project_category;
        $status = $request->status;

        $updateData=DB::table('projects')->where('project_id',$project_id);
        $updateData->update([
            'project_name' => $project_name,
            'description' => $description,
            'start_date' => $start_date,
            'project_category' => $project_category,
            'end_date' => $end_date,
            'status' => $status,
        ]);
    }

    public function forgot_password_home_page($school_id){
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Auth.Forgot_password",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'hideFooter' =>true
        ]);
    }

    public function submit_forgot_password(Request $request, $encrypted_school_id){
        // Decrypt the school_id
        $school_id = Crypt::decrypt($encrypted_school_id);

        $request->validate([
            'email' => 'required|email',
        ],[
            'email.required' => 'Please enter an email!',
        ]);

        $email = $request->email;

        // Check if the email exists for this school
        $existsInUsers = SchoolEmployee::where('email', $email)
                        ->where('school_fk_id', $school_id)
                        ->exists();

        if (!$existsInUsers) {
            // Redirect back with error message if email is not found
            return redirect()->route('school.forgot_password_home_page', ['school_id' => $encrypted_school_id])->with('error', 'The email doesn\'t found in our database!');
        } else {
            // Delete old reset codes if they exist
            ResetCodePassword::where('email', $email)->delete();

            // Generate a new reset code
            $data = [
                'email' => $email,
                'code' => mt_rand(100000, 999999),
            ];

            // Store the reset code
            $reset_data = ResetCodePassword::create($data);

            // Send the reset code email
            Mail::to($email)->send(new SendCodeResetPassword($reset_data->email, $reset_data->code));

            // Encrypt the email and code for the URL
            $encrypted_email = Crypt::encrypt($email);
            $encrypted_code = Crypt::encrypt($reset_data->code);

            // Redirect to the reset password page
            // return redirect()->route('school.reset_password', ['email' => $encrypted_email, 'code' => $encrypted_code])->with('success', 'We sent you a code on your email !');

            return redirect()->route('school.forgot_password_home_page', ['school_id' => $encrypted_school_id])->with('success', 'We sent you a code on your email !');
        }

    }

    public function school_employee_submit_login(Request $request,$school_id){
        
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ],[
            'username.required' =>'',
            'password.required' =>''
        ]);

        $school_id = Crypt::decrypt($school_id);
        
        if (Auth::guard('school_employee')->attempt(['username' => $request->username, 'password' => $request->password,'school_fk_id' => $school_id])) {
            
            $auth_user = Auth::guard('school_employee')->user()->id;

            //check if school's admin has full info
            $school_Admin=SchoolEmployee::where('school_fk_id',$school_id)->where('id',$auth_user)->get();

            foreach ($school_Admin as $user_data) {
                if ($user_data->firstname == null and $user_data->lastname == null ) {
                    return redirect()->route('school_employee.admin_self_registration',Crypt::encrypt($school_id))->with('info',"fill missed info first !");
                }else{
                    return redirect()->route('school_employee.dashboard',Crypt::encrypt($school_id));
                }
            }

        }else{

            return redirect()->back()->with('error','Invalid Username or Password ,try again !');

        }

    }

    //admin self registration before login
    public function school_employee_admin_Self_registration($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_ids);

        return view("Single_School.Users_acccount.Employee.admin_self_registration",[
            'school_id' => $school_data->id,
            'school_username' => $school_data->username,
        ]);

    }

    //admin self registration before login
    public function school_employee_admin_submit_registration(Request $request, $school_id){
        // Retrieve the terms and conditions for the specific user
        $school_id = $school_id;
        $auth_id = Auth::guard('school_employee')->user()->id;
        $school_data = Customer::findOrFail($school_id);

        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'username'=>'required|min:8|string|unique:school_employees,username|unique:customers,username|unique:share_holders,username',
            'email'=>'required|string|email|unique:school_employees,email|unique:customers,email|unique:share_holders,email',
            'phone' => [
                    'required',
                    'string',
                    'min:10',
                    'unique:school_employees,phone',
                    'regex:/^(078|072|079|073)\d{6,}$/',
                    'unique:customers,phone',
                    'unique:share_holders,phone',
            ],
            'dob'=>'required|string',
            'gender'=>'required|string',
            'password'=>'required|string|min:8|confirmed',
            'password_confirmation'=>'required|string|min:8',
        ]);

        SchoolEmployee::where('id',$auth_id)->where('school_fk_id',$school_id)
        ->update([
            'firstname' => $request->firstname,
            'middle_name' => $request->middle_name,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        
        return redirect()->route('school_employee.dashboard',Crypt::encrypt($school_id))->with([
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_logo' => $school_data->image,
            'info' => "Welcome ".$request->firstname." ".$request->lastname." !"
        ]);

    }


    public function school_employee_account_home($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);
        $school_employees_count = SchoolEmployee::where('school_fk_id',$school_id)->count();

        $school_employees_count = SchoolEmployee::where('school_fk_id', $school_id)->count();

        $all_classes_count = LevelClass::where('school_fk_id', $school_id)->count();

        $all_students_count = Student::where('school_fk_id', $school_id)->count();

        $online_employees_count = SchoolEmployee::where('school_fk_id', $school_id)->where('last_active_at', '>=', now()->subMinutes(5))->count();

        return view("Single_School.Users_acccount.Employee.home",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'school_employees_count' => $school_employees_count,
            // 'school_employees_count' => $school_employees_count,
            'all_classes_count' => $all_classes_count,
            'all_students_count' => $all_students_count,
            'online_employees_count' => $online_employees_count,
        ]);

    }

    //manage role
    public function school_employee_manage_role($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_ids);

        $role_data = UserRole::where('school_fk_id',$school_ids)->where('role_name','!=','Admin')->get();

        $count_role_data = collect($role_data)->count();

        return view("Single_School.Users_acccount.Employee.role",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'role_data' => $role_data,
            'count_role_data' => $count_role_data
        ]);

    }

    public function school_employee_add_new_role(Request $request,$school_id){

        $school_ids = $school_id;
        $school_data = Customer::findOrFail($school_ids);
        
        $validator = Validator::make($request->all(), [
            'role_name' => [
                'required',
                'string',
                'regex:/^[a-zA-Z]+$/',
                Rule::unique('user_roles')
                    ->where(fn($query) => $query->where('school_fk_id', $school_id))
                    ->ignore($request->role_id),
            ]
        ], [
            'role_name.required' => 'The role name is required.',
            'role_name.string' => 'The role name must be a string. Only text is allowed.',
            'role_name.unique' => 'The role name "' . $request->role_name . '" has already been added.',
            'role_name.regex' => 'The role name must contain only letters (a-z, A-Z).',
        ]);

        if ($validator->fails()) { 
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

        UserRole::create([
            'role_name' => $request->role_name,
            'school_fk_id' => $school_id,
        ]);

        return redirect()->route('school_employee_manage_role',Crypt::encrypt($school_data->id))->with([
            'school_id' => Crypt::encrypt($school_data->id),
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'success' => "New role added successfully !",
        ]);

    }

    public function school_employee_update_role(Request $request){
        $school_id = auth()->guard('school_employee')->user()->school_fk_id;

        $validator = Validator::make($request->all(), [
            'role_id' => 'required|integer',
            'role_name' => [
                'required',
                'string',
                Rule::unique('user_roles')->where(function ($query) use ($request, $school_id) {
                    return $query->where('school_fk_id', $school_id);
                })->ignore($request->role_id),
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('role_name')) {
                return redirect()->back()->with('error', ''.$request->role_name.' has already been added.')->withErrors($validator);
            }

            // Redirect back with all validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the role if validation passes
        $role = UserRole::find($request->role_id);
        $role->role_name = $request->role_name;
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully.');
    }

    // school employee add_user
    public function school_employee_add_user($school_id){
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        $user_role_data = UserRole::all()->where('role_name','!=','Admin')->where('school_fk_id',Crypt::decrypt($school_id));

        return view("Single_School.Users_acccount.Employee.add_user",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'user_role_data' => $user_role_data,
        ]);
    }

    //school_employee_submit_user_data
    public function school_employee_submit_user_data(Request $request , $school_id){

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|min:8|string|unique:school_employees,username|unique:customers,username|unique:share_holders,username',
            'email' => 'required|string|email|unique:school_employees,email|unique:customers,email|unique:share_holders,email',
            'phone' => [
                'required',
                'string',
                'min:10',
                'unique:school_employees,phone',
                'regex:/^(078|072|079|073)\d{6,}$/',
                'unique:customers,phone',
                'unique:share_holders,phone',
            ],
            'dob' => 'required|string',
            'gender' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'user_role' => 'required|integer|exists:user_roles,id',
        ]);

        SchoolEmployee::create([
            'firstname' => $request->firstname,
            'middle_name' => $request->middle_name,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'role_fk_id' => $request->user_role,
            'school_fk_id' => $request->school_id,
            'image' => 'user.jpg',
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('info','New user added successfully !');
    }

    public function school_employee_view_user($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
         
        // Retrieve all employees for the specified school_fk_id
        $all_users_data = SchoolEmployee::with('school')
                    ->where('school_fk_id', Crypt::decrypt($school_id))
                    ->get();

        return view("Single_School.Users_acccount.Employee.view_users",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'all_users_data' => $all_users_data
        ]);
    }

   

    public function school_employee_account_logout(){

        $school_id = Auth::guard('school_employee')->user()->school_fk_id;

        // Check which guard is currently authenticated
        if (Auth::guard('school_employee')->check()) {
            Auth::guard('school_employee')->logout(); // Logout admin
        } 

        // Redirect to login form
        return redirect()->route('school.login_home_page',Crypt::encrypt($school_id));

    }

    //students info
    public function school_view_student($school_id){
        $school_id = decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);
        $school_students = Student::where('school_fk_id',$school_id)->get();
        $students_count = collect($school_students)->count();

        $acad_year_count = Student::where('school_fk_id', $school_id)->distinct('lastname')->count();
        $unclassified_count = Student::where('school_fk_id', $school_id)->whereNull('firstname')->count();

        $unfinished_count = Student::where('school_fk_id', $school_id)
            ->where(function ($query) {
                $query->whereNull('father_names')
                    ->orWhere('father_names', '')
                    ->orWhereNull('father_phone')
                    ->orWhere('father_phone', '')
                    ->orWhereNull('mother_names')
                    ->orWhere('mother_names', '')
                    ->orWhereNull('mother_phone')
                    ->orWhere('mother_phone', '')
                    ->orWhereNull('guardian_names')
                    ->orWhere('guardian_names', '')
                    ->orWhereNull('guardian_phone')
                    ->orWhere('guardian_phone', '');
            })
            ->count();



        return view('Single_School.Users_acccount.Employee.view_student_info', [
            'school_students' => $school_students,
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'students_count' => $students_count,
            'acad_year_count' => $acad_year_count,
            'unfinished_count' => $unfinished_count,
            'unclassified_count' => $unclassified_count
        ]);
         
    }

    //add student form
    public function school_add_student_form($school_id){
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        return view('Single_School.Users_acccount.Employee.add_student', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
        ]);
   
    }

    // Show the form to assign permissions to a user
    // public function showAssignPermissionsForm_User($school_id, $user_id)
    // {
    //     // Decrypt the IDs (if you're using encryption)
    //     $school_id = Crypt::decrypt($school_id);
    //     $user_id = Crypt::decrypt($user_id);

    //     // Fetch the user and permissions for this school
    //     $user = SchoolEmployee::findOrFail($user_id);
    //     $permissions = PermissionData::paginate(30);  // or any other permissions logic
    //     $school_data = Customer::findOrFail($school_id);

    //     // Return the view with data
    //     return view('Single_School.Users_acccount.Employee.User_Assign_Permission_Form',[
    //         'user' => $user,
    //         'permissions' => $permissions,
    //         'school_id' => $school_data->id,
    //         'school_name' => $school_data->school_name,
    //         'school_logo' => $school_data->image
    //     ]);
    // }

    // public function showAssignPermissionsForm_User($school_id, $user_id)
    // {
    //     $school_id = Crypt::decrypt($school_id);
    //     $user_id = Crypt::decrypt($user_id);

    //     // $school = School::findOrFail($school_id);
    //     $user = SchoolEmployee::findOrFail($user_id);
    //     $school = Customer::findOrFail($school_id);
    //     $permissions = PermissionData::paginate(20);
    //     $permissionGroups = PermissionGroupBy::paginate(2); // Or however you group permissions

    //     return view('Single_School.Users_acccount.Employee.User_Assign_Permission_Form', [
    //         'user' => $user,
    //         'permissions' => $permissions,
    //         'school_id' => $school->id,
    //         'school_name' => $school->name,
    //         'school_logo' => $school->logo,
    //         'permissionGroups' => $permissionGroups // 🟢 Make sure this is included
    //     ]);
    // }

    public function showAssignPermissionsForm_User(Request $request, $school_id, $user_id)
    {
        $school_id = Crypt::decrypt($school_id);
        $user_id = Crypt::decrypt($user_id);

        $user = SchoolEmployee::findOrFail($user_id);
        $school = Customer::findOrFail($school_id);

        // 👇 Filter by group name if search is used
        $search = $request->input('search');
        $query = PermissionGroupBy::with('permissions');

        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $permissionGroups = $query->paginate(2)->appends(['search' => $search]);
        $permissions = PermissionData::paginate(20);

        return view('Single_School.Users_acccount.Employee.User_Assign_Permission_Form', [
            'user' => $user,
            'permissions' => $permissions,
            'school_id' => $school->id,
            'school_name' => $school->name,
            'school_logo' => $school->logo,
            'permissionGroups' => $permissionGroups,
            'search' => $search
        ]);
    }

    public function postAssignPermissions_User(Request $request, $school_id, $userId){
        // Decrypt the school_id and user_id
        $school_id = Crypt::decrypt($school_id);
        $userId = Crypt::decrypt($userId);

        // Find the user
        $user = SchoolEmployee::findOrFail($userId);

        // Sync permissions based on the checkbox input
        $user->permissions()->sync($request->permissions);  // Sync the selected permissions

        return redirect()->back()->with('info', 'Permissions updated!');
    }

    public function view_specific_user_info($school_id,$user_id){
        $school_id = Crypt::decrypt($school_id);
        $user_id = Crypt::decrypt($user_id);

        $school_employees = SchoolEmployee::findOrFail($user_id);
        $school_data = Customer::findOrFail($school_id);

        $school_employees->time_ago = Carbon::parse($school_employees->created_at)->diffForHumans();

        $permissions = SchoolEmployee::find($school_employees->id)
                        ->permissions
                        ->pluck('name');
        $count_permission = collect($permissions)->count();

        return view('Single_School.Users_acccount.Employee.view_specific_user_info', [
            'school_employees' => $school_employees,
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'joined' => $school_employees->time_ago,
            'user_permission' => $permissions,
            'count_permission' => $count_permission
        ]);     

    }

    public function my_files($school_id){
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        return view('Single_School.Users_acccount.Employee.my_files', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,       
        ]);  
    }

    public function my_document($school_id){
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        return view('Single_School.Users_acccount.Employee.document', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,       
        ]); 
    }

    public function my_personal_file($school_id){
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        return view('Single_School.Users_acccount.Employee.personal_file', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,       
        ]); 
    }

    // public function school_manage_academic($school_id){
    //     $school_id = Crypt::decrypt($school_id);
    //     $school_data = Customer::findOrFail($school_id);

    //     $academic_year = AcademicYear::where("school_fk_id", $school_id)
    //                     ->latest('academic_year_name')
    //                     ->first();

    //     $fetch_academic_term = AcademicTerm::where('academic_year_fk_id',$academic_year->id)->where('school_fk_id',$school_id);

    //     return view('Single_School.Users_acccount.Employee.manage_academic', [
    //         'school_id' => $school_data->id,
    //         'school_name' => $school_data->school_name,
    //         'school_logo' => $school_data->image,
    //         'academic_year' => $academic_year,
    //         'fetch_academic_term' =>$fetch_academic_term      
    //     ]); 

    // }

    // public function school_manage_academic($school_id){
    //     $school_id = Crypt::decrypt($school_id);
    //     $school_data = Customer::findOrFail($school_id);

    //     $academic_year = AcademicYear::where("school_fk_id", $school_id)
    //                     ->latest('academic_year_name')
    //                     ->first();

    //     $fetch_academic_term = AcademicTerm::where('academic_year_fk_id', $academic_year->id)
    //                           ->where('school_fk_id', $school_id)
    //                           ->get();

    //     $fetch_academic_term_count = collect($fetch_academic_term)->count();

    //     return view('Single_School.Users_acccount.Employee.manage_academic', [
    //         'school_id' => $school_data->id,
    //         'school_name' => $school_data->school_name,
    //         'school_logo' => $school_data->image,
    //         'academic_year' => $academic_year,
    //         'fetch_academic_term' => $fetch_academic_term,
    //         'academic_term_count' => $fetch_academic_term_count    
    //     ]); 
    // }

    public function school_manage_academic($school_id){
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        // Fetch the latest academic year based on the starting year
        $academic_year = AcademicYear::where("school_fk_id", $school_id)
            ->get()
            ->sortByDesc(function ($year) {
                return (int) substr($year->academic_year_name, 0, 4);
            })
            ->first();

        $fetch_academic_term = [];
        $fetch_academic_term_count = 0;

        if ($academic_year) {
            $fetch_academic_term = AcademicTerm::where('academic_year_fk_id', $academic_year->id)
                ->where('school_fk_id', $school_id)
                ->get();

            $fetch_academic_term_count = $fetch_academic_term->count();
        }

        return view('Single_School.Users_acccount.Employee.manage_academic', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            // 'school_logo' => $school_data->image,
            'academic_year' => $academic_year,
            'fetch_academic_term' => $fetch_academic_term,
            'academic_term_count' => $fetch_academic_term_count    
        ]);
    }

    public function school_add_academic_year(Request $request, $school_id)
    {
        $school_id = Crypt::decrypt($school_id);

        $validator = Validator::make($request->all(), [
            'academic_year_name' => [
                'required',
                'string',
                Rule::unique('academic_years')->where(function ($query) use ($school_id) {
                    return $query->where('school_fk_id', $school_id);
                }),
            ],
        ],
        [
            'academic_year_name.required' => 'This ' . $request->academic_year_name . ' is required.',
            'academic_year_name.unique' => 'This "' . $request->academic_year_name . '" has already been added !',
        ]);
 
        if ($validator->fails()) { 
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

        AcademicYear::create([
            'academic_year_name' => $request->academic_year_name,
            'school_fk_id' => $school_id,
        ]);

        return redirect()->back()->with('info','New academic year added!');
    }


    public function school_add_term(Request $request, $acad_fk_id, $school_id)
    {
        $validator = Validator::make($request->all(), [
            'term_names' => [
                'required',
                'string',
                'starts_with:Term ',
                'regex:/^Term \d+/',
                'unique:academic_terms,term_name,NULL,id,academic_year_fk_id,' . crypt::decrypt($acad_fk_id) . ',school_fk_id,' . crypt::decrypt($school_id),
            ],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'term_names.required' => 'Term name field is required',
            'term_names.starts_with' => 'Invalid input, you have to start with "Term " (space after Term) then number ex:Term 1',
            'term_names.regex' => 'Term name must follow the format "Term <number>" (e.g., "Term 1")',
            'term_names.unique' => 'Term name is already taken for this academic year !',
            'end_date.after_or_equal' => 'End_date can not be before start date ',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('term_names')) {
                return redirect()->back()->with('error', $validator->errors()->first('term_names'))->withErrors($validator)->withInput();
            }

            if ($validator->errors()->has('end_date')) {
                return redirect()->back()->with('error', $validator->errors()->first('end_date'))->withErrors($validator)->withInput();
            }

            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $academic_fk_id = crypt::decrypt($acad_fk_id);
            $school_fk_id = crypt::decrypt($school_id);
            $term_name = $request->term_names;
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            DB::table('academic_terms')->insert([
                'term_name' => $term_name,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'academic_year_fk_id' => $academic_fk_id,
                'school_fk_id' => $school_fk_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('info', 'Term added successfully');
            
        } catch (\Illuminate\Database\QueryException $ex) {
            if ($ex->getCode() == 23000) {
                return redirect()->back()->with('error', 'Term name is already taken for this academic year and school')->withInput();
            }

            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

    public function school_view_term($acad_fk_id, $school_id){

    }

    public function add_student(Request $request,$school_id){ 

        try {
            $year = date('y');
            $schoolCode = "code" . $school_id;

            $count = Student::where('school_fk_id', $school_id)->count() + 1;
            $student_number = sprintf("%s_%s_%04d", $year, $schoolCode, $count);

            \Log::info('Request data:', $request->all());

            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'lastname' => 'required|string|max:255',
                'province' => 'required|string',
                'district' => 'required|string',
                'sector' => 'required|string',
                'cell' => 'required|string',
                'village' => 'required|string',
                'gender' => 'required|in:Male,Female',
                'dob' => 'required|date',
                'father_names' => 'required|string',
                'father_phone' => 'required|string',
                'mother_names' => 'required|string',
                'mother_phone' => 'required|string',
                'guardian_names' => 'nullable|string',
                'guardian_phone' => 'nullable|string',
            ]);

            $validated['image'] = 'user_img.jpg';
            $validated['school_fk_id'] = $school_id;
            $validated['student_number'] = $student_number;

            Student::create($validated);

            return redirect()->back()->with('info', 'Student added successfully!');

        } catch (\Throwable $e) {
            
            \Log::error('Student insert error: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        
        }

    }

    public function editTerm(Request $request, $term_id)
    {

        // Validate incoming data
        $request->validate([
            'term_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $term = AcademicTerm::findOrFail($term_id);

        $latestYear = AcademicTerm::where('school_fk_id', $term->school_fk_id)
                      ->get();

        // Update values
        $term->term_name = $request->term_name;
        $term->start_date = $request->start_date;
        $term->end_date = $request->end_date;
        $term->save();

        return redirect()->back()->with('info', 'Term updated successfully.');
    }

    // public function view_Add_level($term_id,$school_id){
    //     $term_id = crypt::decrypt($term_id);
    //     $school_id = crypt::decrypt($school_id);
    //     $school_data = Customer::findOrFail($school_id);
    //     $term_data = AcademicTerm::findOrFail($term_id);
    //     $academic_data = AcademicYear::findOrFail($term_data->academic_year_fk_id);

    //     return view('Single_School.Users_acccount.Employee.view_Add_level',[
    //         'school_id' => $school_data->id,
    //         'school_name' => $school_data->school_name,
    //         'academic_term' => $term_data->term_name,
    //         'academic_year' => $academic_data->academic_year_name,
    //         'term_id' => $term_id
    //     ]);

    // }

    public function view_Add_level($term_id, $school_id) {
        $term_id = Crypt::decrypt($term_id);
        $school_id = Crypt::decrypt($school_id);

        $school_data = Customer::findOrFail($school_id);
        $term_data = AcademicTerm::findOrFail($term_id);
        $academic_data = AcademicYear::findOrFail($term_data->academic_year_fk_id);

        $existing_levels = Level::where('term_fk_id', $term_id)
                                ->where('school_fk_id', $school_id)
                                ->get();

        $levels = Level::with('levelClasses')
                ->where('term_fk_id', $term_id)
                ->where('school_fk_id', $school_id)
                ->get();
        // $levels = Level::with('levelClasses')->get();

        return view('Single_School.Users_acccount.Employee.view_Add_level', [
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'academic_term' => $term_data->term_name,
            'academic_year' => $academic_data->academic_year_name,
            'term_id' => $term_id,
            'existing_levels' => $existing_levels,
            'levels' => $levels,
        ]);

    }

    public function submit_level(Request $request, $term_id, $school_id){
        $termId = $term_id;
        $schoolId = $school_id;

        $validator = Validator::make($request->all(), [
            'level_name' => [
                'required',
                'string',
                'starts_with:Level,Senior',
                'regex:/^(Level|Senior) \d+$/',
                'unique:levels,level_name,NULL,id,term_fk_id,' . $termId . ',school_fk_id,' . $schoolId,
            ],
        ],[
            'level_name.required' => 'The name field is required.',
            'level_name.starts_with' => 'Invalid input, you have to start with "Level" or "Senior", followed by a space and number (e.g., "Level 1").',
            'level_name.regex' => 'Name must follow the format "Level <number>" or "Senior <number>".',
            'level_name.unique' =>  $request->level_name. ' is already taken for this Term!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first('level_name'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::table('levels')->insert([
                'level_name' => $request->level_name,
                'term_fk_id' => $termId,
                'school_fk_id' => $schoolId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('info', 'Data added successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            if ($ex->getCode() == 23000) {
                return redirect()->back()->with('error', 'Name is already taken for this term')->withInput();
            }

            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

    public function editLevel(Request $request, $level_id, $term_id, $school_id)
    {
        $level = Level::findOrFail($level_id);

        $validator = Validator::make($request->all(), [
            'senior_name' => [
                'required',
                'string',
                'max:255',
                'starts_with:Level,Senior',
                'regex:/^(Level|Senior) \d+$/',
            ]
        ], [
            'senior_name.required' => 'Name is required.',
            'senior_name.starts_with' => 'Invalid input, you have to start with "Level" or "Senior", followed by a space and number (e.g., "Level 1").',
            'senior_name.regex' => 'Name must follow the format "Level <number>" or "Senior <number>".',
        ]);

        // Custom duplicate check
        $validator->after(function ($validator) use ($request, $level_id, $term_id, $school_id) {
            $exists = Level::where('level_name', $request->senior_name)
                ->where('term_fk_id', $term_id)
                ->where('school_fk_id', $school_id)
                ->where('id', '!=', $level_id)
                ->exists();

            if ($exists) {
                $validator->errors()->add('senior_name', $request->senior_name. ' already exists for the selected term ');
                return redirect()->back()->with('error', $request->senior_name . ' already exists for the selected term ');
            }

        });

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first('senior_name'))
                ->withErrors($validator)
                ->withInput();
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $level->level_name = $request->senior_name;
            $level->save();

            return redirect()->back()->with('success', 'Level updated successfully.');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }


    public function addLevelClass(Request $request, $term_id, $school_id)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        LevelClass::create([
            'name' => $request->input('class_name'),
            'level_fk_id' => $request->input('level_id'),
            'term_fk_id' => $term_id,
            'school_fk_id' => $school_id,
        ]);

        return redirect()->back()->with('success', 'Class added successfully!');
    }

    public function school_employee_manage_courses($school_id) {
        $school_id = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_id);

        $course_data = Course::where('school_fk_id',$school_id)->get();

        $count_course_data = collect($course_data)->count();

        return view("Single_School.Users_acccount.Employee.Manage_courses",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'course_data' => $course_data,
            'count_course_data' => $count_course_data
        ]);
    }
    public function school_employee_add_new_course(Request $request,$school_id) {

        $school_id = $school_id;
        $school_data = Customer::findOrFail($school_id);
        
        $validator = Validator::make($request->all(), [
            'course_name' => [
                'required',
                'string',
                'regex:/^[a-zA-Z]+$/',
                Rule::unique('courses')
                    ->where(fn($query) => $query->where('school_fk_id', $school_id))
                    ->ignore($request->course_id),
            ]
        ], [
            'course_name.required' => 'The course name is required.',
            'course_name.string' => 'The course name must be a string. Only text is allowed.',
            'course_name.unique' => 'The course name "' . $request->course_name . '" has already been added.',
            'course_name.regex' => 'The course name must contain only letters (a-z, A-Z).',
        ]);

        if ($validator->fails()) { 
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

        Course::create([
            'course_name' => $request->course_name,
            'school_fk_id' => $school_id,
        ]);

        return redirect()->route('school_employee_manage_courses',Crypt::encrypt($school_data->id))->with([
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'success' => "New curse added successfully !",
        ]);

    }

    public function school_employee_update_course(Request $request){
        $school_id = auth()->guard('school_employee')->user()->school_fk_id;

        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'course_name' => [
                'required',
                'string',
                Rule::unique('courses')->where(function ($query) use ($request, $school_id) {
                    return $query->where('school_fk_id', $school_id);
                })->ignore($request->course_id),
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('course_name')) {
                return redirect()->back()->with('error', ''.$request->course_name.' has already been added.')->withErrors($validator);
            }

            // Redirect back with all validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the role if validation passes
        $role = Course::find($request->course_id);
        $role->course_name = $request->course_name;
        $role->save();

        return redirect()->back()->with('success', 'Course updated successfully.');
    }


}