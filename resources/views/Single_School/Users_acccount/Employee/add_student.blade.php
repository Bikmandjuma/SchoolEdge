@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
        <div class="col-xl-8 col-sm-4 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-1 text-center">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg pb-1 pt-1">
                        <h6 class="text-white text-capitalize" id="form-title">Student Info</h6>
                    </div>
                </div>
                <div class="card-body p-3 pt-2">
                    <form id="student-form" role="form" class="text-start" action="" method="POST">
                        @csrf
                        
                        <!-- Student Info Section -->
                        <div id="student-info">
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" required>
                                    </div>
                                </div>
                                <!-- Middle Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="col-md-4">
                                    <div class="my-3">
                                        <label class="form-label">Gender</label>
                                        <div class="input-group">
                                            <input type="radio" name="gender" value="Male" required> Male
                                            <input type="radio" name="gender" value="Female"> Female
                                        </div>
                                    </div>
                                </div>
                                <!-- Date of Birth -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                    </div>
                                </div>
                                <!-- Province, District, Sector, Cell, Village -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Province</label>
                                        <input type="text" name="province" class="form-control" value="{{ old('province') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">District</label>
                                        <input type="text" name="district" class="form-control" value="{{ old('district') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Sector</label>
                                        <input type="text" name="sector" class="form-control" value="{{ old('sector') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Cell</label>
                                        <input type="text" name="cell" class="form-control" value="{{ old('cell') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Village</label>
                                        <input type="text" name="village" class="form-control" value="{{ old('village') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn bg-gradient-info w-40 my-4 mb-2" onclick="showNextSection()">Next</button>
                            </div>
                        </div>

                        <!-- Parent Info Section (Initially Hidden) -->
                        <div id="parent-info" style="display: none;">
                            <div class="row">
                                <!-- Father's Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Father's Name</label>
                                        <input type="text" name="father_name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Father's Phone -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Father's Phone</label>
                                        <input type="text" name="father_phone" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Mother's Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Mother's Name</label>
                                        <input type="text" name="mother_name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Mother's Phone -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Mother's Phone</label>
                                        <input type="text" name="mother_phone" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Guardian's Name -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Guardian's Name</label>
                                        <input type="text" name="guardian_name" class="form-control">
                                    </div>
                                </div>
                                <!-- Guardian's Phone -->
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Guardian's Phone</label>
                                        <input type="text" name="guardian_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn bg-gradient-secondary w-40 my-4 mb-2" onclick="showPreviousSection()">Back</button>
                                <button type="submit" class="btn bg-gradient-info w-40 my-4 mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
    </div>
</div>
@endsection

<script>
    function showNextSection() {
        // Validate all fields in the "Student Info" section
        const studentInfoSection = document.getElementById('student-info');
        const inputs = studentInfoSection.querySelectorAll('input[required]');
        let allFilled = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                allFilled = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (allFilled) {
            document.getElementById('form-title').innerText = "Parent Info";
            studentInfoSection.style.display = "none";
            document.getElementById('parent-info').style.display = "block";
        }
    }

    function showPreviousSection() {
        // Switch back to the "Student Info" section
        document.getElementById('form-title').innerText = "Student Info";
        document.getElementById('parent-info').style.display = "none";
        document.getElementById('student-info').style.display = "block";
    }
</script>
