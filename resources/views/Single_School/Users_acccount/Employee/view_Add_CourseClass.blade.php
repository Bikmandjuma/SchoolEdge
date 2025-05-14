@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')
<div class="p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6">Class: {{ $class_name }} in {{ $term_name->term_name }}</h2>

    <form method="POST" action="{{ route('class_courses.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="levelClass_fk_id" value="{{ $levelClass->id }}">

        <table class="w-full table-auto border border-gray-300 text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-2 border">Check</th>
                    <th class="p-2 border">Course Name</th>
                    <th class="p-2 border">Quiz Mark</th>
                    <th class="p-2 border">Exam Mark</th>
                    <th class="p-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td class="p-2 border text-center">
                        <input type="checkbox" name="courses[{{ $course->id }}][selected]" value="1"
                            onchange="toggleInputs(this, '{{ $course->id }}')">
                    </td>
                    <td class="p-2 border">{{ $course->course_name }}</td>
                    <td class="p-2 border">
                        <input type="number" name="courses[{{ $course->id }}][quiz_mark_total]"
                            class="quiz_{{ $course->id }} border px-2 py-1 w-full rounded" disabled
                            oninput="calculateTotal('{{ $course->id }}')">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="courses[{{ $course->id }}][exam_total]"
                            class="exam_{{ $course->id }} border px-2 py-1 w-full rounded" disabled
                            oninput="calculateTotal('{{ $course->id }}')">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="courses[{{ $course->id }}][total_mark]"
                            class="total_{{ $course->id }} border px-2 py-1 w-full rounded" readonly>
                    </td>
                    <input type="hidden" name="courses[{{ $course->id }}][course_name]" value="{{ $course->course_name }}">
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded transition">Submit</button>
    </form>

    <hr class="my-10">

    <h3 class="text-xl font-semibold mb-4">Assigned Courses in {{ $class_name }}</h3>

    <table class="w-full table-auto border border-gray-300 text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2 border">Course</th>
                <th class="p-2 border">Quiz</th>
                <th class="p-2 border">Exam</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($classCourses as $classCourse)
                <tr>
                    <td class="p-2 border">{{ $classCourse->course_name }}</td>
                    <td class="p-2 border">{{ $classCourse->quiz_mark_total }}</td>
                    <td class="p-2 border">{{ $classCourse->exam_total }}</td>
                    <td class="p-2 border">{{ $classCourse->total_mark }}</td>
                    <!-- <td class="p-2 border text-blue-600 hover:underline cursor-pointer"
                        onclick="openEditModal({{ $classCourse->id }}, '{{ $classCourse->course_name }}', {{ $classCourse->quiz_mark_total }}, {{ $classCourse->exam_total }})">
                        ✏️ Edit
                    </td> -->
                    <td class="p-2 border text-blue-600 hover:underline cursor-pointer"
                        onclick="openEditModal({{ $classCourse->id }}, '{{ $classCourse->course_name }}', {{ $classCourse->quiz_mark_total ?? 0 }}, {{ $classCourse->exam_total ?? 0 }})">
                        ✏️ Edit
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">No assigned courses yet for this class.</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[400px]">
        <h3 class="text-lg font-bold mb-4">Edit Course</h3>
        <form id="editForm" method="POST" action="{{ route('class_courses.update') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="edit_id">

            <div class="mb-4">
                <label class="block font-medium mb-1">Course</label>
                <input type="text" id="edit_course_name" disabled class="w-full border px-3 py-2 rounded bg-gray-100">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Quiz Mark</label>
                <input type="number" name="quiz_mark_total" id="edit_quiz"
                    class="w-full border px-3 py-2 rounded" oninput="updateTotal()">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Exam Mark</label>
                <input type="number" name="exam_total" id="edit_exam"
                    class="w-full border px-3 py-2 rounded" oninput="updateTotal()">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Total Mark</label>
                <input type="number" name="total_mark" id="edit_total"
                    class="w-full border px-3 py-2 rounded bg-gray-100" readonly>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- JS -->
<script>
    // function openEditModal(id, name, quiz, exam) {
    //     document.getElementById('edit_id').value = id;
    //     document.getElementById('edit_course_name').value = name;
    //     document.getElementById('edit_quiz').value = quiz;
    //     document.getElementById('edit_exam').value = exam;
    //     document.getElementById('edit_total').value = parseFloat(quiz) + parseFloat(exam);
    //     document.getElementById('editModal').classList.remove('hidden');
    //     document.getElementById('editModal').classList.add('flex');
    // }

    function openEditModal(id, name, quiz, exam) {
        // Coerce quiz and exam into valid numbers (default to 0 if empty/null/undefined)
        const safeQuiz = Number(quiz) || 0;
        const safeExam = Number(exam) || 0;

        document.getElementById('edit_id').value = id;
        document.getElementById('edit_course_name').value = name;
        document.getElementById('edit_quiz').value = quiz ?? '';
        document.getElementById('edit_exam').value = exam ?? '';
        document.getElementById('edit_total').value = safeQuiz + safeExam;

        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }


    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    function updateTotal() {
        const quiz = parseFloat(document.getElementById('edit_quiz').value) || 0;
        const exam = parseFloat(document.getElementById('edit_exam').value) || 0;
        document.getElementById('edit_total').value = quiz + exam;
    }

    function toggleInputs(checkbox, id) {
        document.querySelector(`.quiz_${id}`).disabled = !checkbox.checked;
        document.querySelector(`.exam_${id}`).disabled = !checkbox.checked;

        if (!checkbox.checked) {
            document.querySelector(`.quiz_${id}`).value = '';
            document.querySelector(`.exam_${id}`).value = '';
            document.querySelector(`.total_${id}`).value = '';
        }
    }

    function calculateTotal(id) {
        let quiz = parseFloat(document.querySelector(`.quiz_${id}`).value) || 0;
        let exam = parseFloat(document.querySelector(`.exam_${id}`).value) || 0;
        document.querySelector(`.total_${id}`).value = quiz + exam;
    }
</script>
@endsection
