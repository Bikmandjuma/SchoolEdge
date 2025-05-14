@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
    
    @php
        $user = auth()->guard('school_employee')->user();
    @endphp

    @if(auth()->guard('school_employee')->user()->hasPermission('Dashboard') || $user->role->role_name === 'Admin')

    <!-- State cards -->
<div class="overflow-x-hidden">
  <div class="flex gap-4 p-4 min-w-max">
    <!-- Card 1: Employees -->
    <div class="flex-shrink-0 w-60 p-4 bg-white rounded-md dark:bg-darker">
      <div class="flex items-center justify-between">
        <div>
          <h6 class="text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-primary-light">
            All employees
          </h6>
          <span class="text-xl font-semibold">{{ $school_employees_count }}</span>
        </div>
        <div>
          <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Card 2: Classes -->
    <div class="flex-shrink-0 w-60 p-4 bg-white rounded-md dark:bg-darker">
      <div class="flex items-center justify-between">
        <div>
          <h6 class="text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-primary-light">
            All classes
          </h6>
          <span class="text-xl font-semibold">{{ $all_classes_count }}</span>
        </div>
        <div>
          <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Card 3: Students -->
    <div class="flex-shrink-0 w-60 p-4 bg-white rounded-md dark:bg-darker">
      <div class="flex items-center justify-between">
        <div>
          <h6 class="text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-primary-light">
            All students
          </h6>
          <span class="text-xl font-semibold">{{ $all_students_count }}</span>
        </div>
        <div>
          <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Card 4: Online Employees -->
    <div class="flex-shrink-0 w-60 p-4 bg-white rounded-md dark:bg-darker">
      <div class="flex items-center justify-between">
        <div>
          <h6 class="text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-primary-light">
            Online's employees
          </h6>
          <span class="text-xl font-semibold">{{ $online_employees_count }}</span>
        </div>
        <div>
          <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>


              <!-- Charts -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                    <div class="flex items-center space-x-2">
                      <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                      <button
                        class="relative focus:outline-none"
                        x-cloak
                        @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                      >
                        <div
                          class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                        ></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>

                <!-- Doughnut chart card -->
                <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                    <div class="flex items-center">
                      <button
                        class="relative focus:outline-none"
                        x-cloak
                        @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)"
                      >
                        <div
                          class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                        ></div>
                        <div
                          class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                          :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                        ></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72">
                    <canvas id="doughnutChart"></canvas>
                  </div>
               </div>
             </div>
           </div>

         @else

          <div class="container-fluid py-4">

            <div class="row mt-4">
              <!-- <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4"></div> -->
              <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-3 pt-2">
                    <div class="card-body text-center">
                      <h2>Not authorized yet to view school's dashboard !</h2>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4"></div> -->
            </div>
          </div>

        @endif
        
@endsection
