@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')
<div class="container mx-auto py-4">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-white shadow-md rounded-lg">
                <div class="text-center bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2 rounded-t-lg">
                    <h6 class="text-xl font-semibold" id="form-title">Add new student Info</h6>
                </div>
                <div class="p-6">
                    <form id="student-form" action="" method="POST" class="space-y-4">
                        @csrf

                        <!-- Student Info Section -->
                        <div id="student-info">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @php
                                    $fields = [
                                        ['name' => 'firstname', 'label' => 'First Name'],
                                        ['name' => 'middle_name', 'label' => 'Middle Name'],
                                        ['name' => 'lastname', 'label' => 'Last Name'],
                                        ['name' => 'province', 'label' => 'Province'],
                                        ['name' => 'district', 'label' => 'District'],
                                        ['name' => 'sector', 'label' => 'Sector'],
                                        ['name' => 'cell', 'label' => 'Cell'],
                                        ['name' => 'village', 'label' => 'Village'],
                                    ];
                                @endphp

                                @foreach($fields as $field)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                                        <input type="text" name="{{ $field['name'] }}" class="form-input w-full bg-blue-100 p-1 rounded border" value="{{ old($field['name']) }}" required>
                                        <span class="text-red-500 text-sm hidden">This field is required</span>
                                    </div>
                                @endforeach

                                <!-- Gender -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <label><input type="radio" name="gender" value="Male" class="mr-1"> Male</label>
                                        <label><input type="radio" name="gender" value="Female" class="mr-1"> Female</label>
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="gender-error">Please select gender</span>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">DoB yyyy-mm-dd</label>
                                    <input type="text" name="dob" id="dob" class="form-input w-full bg-blue-100 p-1 rounded border" value="{{ old('dob') }}" required>
                                    <span class="text-red-500 text-sm" id="error_dob"></span>
                                </div>
                            </div>

                            <div class="text-center mt-6">
                                <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600" onclick="showNextSection()">Next</button>
                            </div>
                        </div>

                        <!-- Parent Info Section -->
                        <div id="parent-info" class="hidden">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @php
                                    $parentFields = [
                                        ['name' => 'father_name', 'label' => "Father's Name", 'required' => true],
                                        ['name' => 'father_phone', 'label' => "Father's Phone", 'required' => true],
                                        ['name' => 'mother_name', 'label' => "Mother's Name", 'required' => true],
                                        ['name' => 'mother_phone', 'label' => "Mother's Phone", 'required' => true],
                                        ['name' => 'guardian_name', 'label' => "Guardian's Name", 'required' => false],
                                        ['name' => 'guardian_phone', 'label' => "Guardian's Phone", 'required' => false],
                                    ];
                                @endphp

                                @foreach($parentFields as $field)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                                        <input type="text" name="{{ $field['name'] }}" class="form-input w-full bg-blue-100 p-1 rounded border" {{ $field['required'] ? 'required' : '' }}>
                                        @if($field['required'])
                                            <span class="text-red-500 text-sm hidden">This field is required</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center mt-6">
                                <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 mr-2" onclick="showPreviousSection()">Back</button>
                                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showNextSection() {
        let isValid = true;

        const inputs = document.querySelectorAll('#student-info input[required]');
        inputs.forEach(input => {
            const errorSpan = input.nextElementSibling;
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                errorSpan.classList.remove('hidden');
                isValid = false;
            } else {
                input.classList.remove('border-red-500');
                errorSpan.classList.add('hidden');
            }
        });

        const genderInputs = document.querySelectorAll('input[name="gender"]');
        const genderError = document.getElementById('gender-error');
        if (![...genderInputs].some(input => input.checked)) {
            genderError.classList.remove('hidden');
            isValid = false;
        } else {
            genderError.classList.add('hidden');
        }

        const dob = document.getElementById("dob");
        const dobError = document.getElementById("error_dob");
        const datePattern = /^\d{4}-\d{2}-\d{2}$/;
        if (!datePattern.test(dob.value)) {
            dobError.textContent = "Valid format is yyyy-mm-dd";
            dob.classList.add('border-red-500');
            isValid = false;
        } else {
            dobError.textContent = "";
            dob.classList.remove('border-red-500');
        }

        if (isValid) {
            document.getElementById('form-title').innerText = "Parent Info";
            document.getElementById('student-info').classList.add('hidden');
            document.getElementById('parent-info').classList.remove('hidden');
        }
    }

    function showPreviousSection() {
        document.getElementById('form-title').innerText = "Student Info";
        document.getElementById('parent-info').classList.add('hidden');
        document.getElementById('student-info').classList.remove('hidden');
    }

    document.addEventListener("DOMContentLoaded", function () {
        const dobInput = document.getElementById("dob");

        dobInput.addEventListener("input", function () {
            let value = dobInput.value.replace(/[^0-9-]/g, '');
            if (value.length >= 4 && value[4] !== '-') value = value.slice(0, 4) + '-' + value.slice(4);
            if (value.length >= 7 && value[7] !== '-') value = value.slice(0, 7) + '-' + value.slice(7);
            dobInput.value = value;
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const dobInput = document.getElementById("dob");
        const dobError = document.getElementById("error_dob");

        dobInput.addEventListener("input", function () {
            let value = dobInput.value.replace(/[^0-9-]/g, ''); // Allow only numbers and hyphens
            if (value.length >= 5 && value[4] !== '-') value = value.slice(0, 4) + '-' + value.slice(4); // Add hyphen after year
            if (value.length >= 8 && value[7] !== '-') value = value.slice(0, 7) + '-' + value.slice(7); // Add hyphen after month
            dobInput.value = value;

            // Check if date format is valid
            const datePattern = /^\d{4}-\d{2}-\d{2}$/;
            if (!datePattern.test(value)) {
                dobError.textContent = "Valid format is yyyy-mm-dd , ex:2000-30-01";
                dobInput.classList.add('border-red-500');
            } else {
                dobError.textContent = "";
                dobInput.classList.remove('border-red-500');
            }
        });
    });

</script>
@endsection
