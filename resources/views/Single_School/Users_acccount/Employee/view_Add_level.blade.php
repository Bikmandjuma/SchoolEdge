@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

<div class="w-full px-4 py-6">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-4">
        <div class="xl:col-span-2"></div>

        <div class="xl:col-span-8">
            <div class="bg-white rounded-2xl shadow">
                <div class="bg-gradient-to-r from-gray-400 to-gray-500 text-center rounded-lg py-2">
                    <h6 class="text-white text-lg font-semibold">Add new level in <b>{{ $academic_term }}</b> , acad_year -><b>{{ $academic_year }}</b></h6>
                </div>
                <div class="mt-4">
                    <form action="{{ url('school/submit_level') }}/{{ $term_id }}/{{ $school_id }}" method="POST">
                        @csrf
                        <div class="max-w-md mx-auto">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Add level/Senior ex:Level 1 / Senior 1</label>
                                <input type="hidden" name="academic_id">
                                <input 
                                      type="text" 
                                      name="level_name" 
                                      id="level_input"
                                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                      value="{{ old('level_name') }}" 
                                      placeholder="e.g. level 1 or senior 1"
                                      required
                                >

                               <!--  @error('level_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror -->

                            </div>
                            <div class="text-center p-2">
                                <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="xl:col-span-2"></div>
    </div>
</div>

 @if($levels->count())
    <div class="w-full max-w-6xl mx-auto mt-8 px-4">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Senior Levels & Classes</h3>

        <!-- Tabs -->
        <div x-data="{ activeTab: '{{ $levels->first()->id ?? '' }}' }">
            <!-- Tab Buttons -->
            <div class="flex flex-wrap gap-2 border-b border-gray-300 mb-4">
                @foreach($levels as $level)
                    <div class="flex items-center gap-1">
                        <button
                            @click="activeTab = '{{ $level->id }}'"
                            class="px-4 py-2 rounded-t-lg text-sm font-semibold transition-all duration-300"
                            :class="activeTab === '{{ $level->id }}' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-100'"
                        >
                            {{ $level->level_name }}
                        </button>

                        <!-- Edit Icon Link -->
                        <i 
                          class="fa fa-edit text-blue-500 hover:cursor-pointer ml-2" 
                          title="Edit {{ $level->level_name }}" 
                          data-bs-toggle="modal" 
                          data-bs-target="#editLevelModal"
                          onclick="openEditModal('{{ $level->id }}', '{{ $level->level_name }}', '{{ $term_id }}', '{{ $school_id }}')"
                        ></i>

                    </div>
                @endforeach
            </div>

            <!-- Tab Content -->
            @foreach($levels as $level)
                <div x-show="activeTab === '{{ $level->id }}'" class="bg-white shadow rounded-lg p-6">
                    
                    <div class="flex items-center justify-between mb-4">
                      <h4 class="text-lg font-semibold text-gray-700">{{ $level->level_name }} Classes</h4>

                      <button
                          onclick="openAddClassModal('{{ $level->id }}', '{{ $level->level_name }}')"
                          class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md transition"
                          data-bs-toggle="modal"
                          data-bs-target="#addClassModal"
                      >
                          <i class="fa fa-plus"></i>&nbsp;Add Class
                      </button>

                    </div>

                    <!-- @if($level->classes && $level->classes->count())
                        <ul class="space-y-2">
                            @foreach($level->classes as $class)
                                <li class="bg-gray-100 px-4 py-2 rounded text-gray-800 shadow-sm">
                                    {{ $class->name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">No classes found for {{ $level->level_name }}.</p>
                    @endif -->

                    @if($level->levelClasses && $level->levelClasses->count())
                        @foreach($level->levelClasses as $class)
                            <li class="bg-gray-100 px-4 py-2 rounded text-gray-800 shadow-sm mb-2">
                                {{ $class->name }}
                            </li>
                        @endforeach
                    @else
                        <p class="text-gray-500 italic">No classes found for {{ $level->level_name }}.</p>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endif

<!-- Edit Term Modal -->
<div class="modal fade" id="editLevelModal" tabindex="-1" aria-labelledby="editTermLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTermLabel">Edit Level/Senior</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editLevelForm" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="level_id" id="edit_level_id">
          <div class="mb-3">
            <label class="form-label">Level/Senior Name</label>
            <!-- <input type="text" class="form-control" name="senior_name"   required> -->

            <input type="text" name="senior_name" value="{{ old('senior_name') }}" class="form-control"  id="edit_level_name">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ url('school/add_LevelClass') }}/{{ $term_id }}/{{ $school_id }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addClassModalLabel">Add Class to <span id="add-class-level-name"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" name="level_id" id="add-class-level-id">
            <label for="class-name" class="form-label">Class Name</label>
            <input type="text" class="form-control" placeholder="ex: L1A / S1A" name="class_name" id="class-name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Class</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">

    const term_id = "{{ $term_id }}";
    const school_id = "{{ $school_id }}";

    function openEditModal(id, name, term_id, school_id) {
        console.log('Level ID:', id, 'Name:', name, 'Term ID:', term_id, 'School ID:', school_id);
        const form = document.getElementById('editLevelForm');
        form.action = `/school/edit_level/${id}/${term_id}/${school_id}`;
        document.getElementById('edit_level_id').value = id;
        document.getElementById('edit_level_name').value = name;
    }

    function openAddClassModal(levelId, levelName) {
        document.getElementById('add-class-level-id').value = levelId;
        document.getElementById('addClassModalLabel').textContent = `Add Class to ${levelName}`;
        document.getElementById('add-class-level-name').textContent = levelName;

        const form = document.querySelector('#addClassModal form');
        form.action = `/school/add_LevelClass/${term_id}/${school_id}`;
    }

</script>

@endsection
