@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Project Lists</h2>
            </div>
            @if ($projCount > 0)
                <div class="inline-flex items-center justify-center">
                    <button type="button" data-tooltip-target="add_project" data-modal-target="add_project_modal" data-modal-toggle="add_project_modal" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
                        <i class="fa-solid fa-plus text-gray-100"></i>
                    </button>
                    <div id="add_project" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Add Project
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            @endif
        </div>
        @if ($projCount > 0)
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4" id="projectCard">
                @foreach ($list as $projects)
                    <div id="project-card" class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 shadow-md">
                        <div class="flex items-center justify-between px-8 pt-5">
                            <h2 class="text-2xl font-medium text-gray-200 tracking-wider">{{ Str::ucfirst($projects->project_name) }}</h2>
                            <button type="button" id="removeProject" class="texl-2xl" data-id="{{ $projects->id }}">
                                <svg class="flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                                </svg>
                            </button>
                        </div>
                        <a href="{{ route('auth.project.view', $projects->uuid) }}" class="px-8 pt-4 pb-6 block">
                            <div class="mb-4">
                                <p class="text-gray-100 tracking-wide">{{ Str::limit($projects->description, 125) }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="inline-flex items-center justify-center">
                                    @if ($projects->status === "active")
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">In Progress</span>
                                    @endif
                                </div>
                                <div class="inline-flex items-center">
                                    <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                        <i class="fa-solid fa-clock mr-1"></i> {{ number_format(Carbon\Carbon::now()->diffInDays($projects->end_date)) }} days left
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <button type="button" data-modal-target="add_project_modal" data-modal-toggle="add_project_modal" class="flex items-center w-full justify-center h-[42rem] xl:h-[45rem] mb-4 rounded border-2 border-gray-400 border-dashed dark:bg-gray-800">
                <div class="flex flex-col items-center justify-center">
                    <i class="fa-solid fa-plus text-gray-400" data-tooltip-target="add_project" data-tooltip-placement="bottom"></i>
                    <p class="text-gray-400 tracking-wider mt-2 text-lg">Click to add Project</p>
                </div>
            </button>
            <div id="add_project" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Add Project
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        @endif
    </div>
</div>

<div id="add_project_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    Add Project
                </h3>
                <button type="button" id="modal_close" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_project_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form>
                    @csrf
                    <div class="mb-2">
                        <label for="projectname" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Project Name <span class="text-red-700 font-medium">*</span></label>
                        <input type="text" id="projectname" name="projectname" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Project Name">
                        <span id="projectnameErr"></span>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Description</label>
                        <textarea rows="3" id="description" name="description" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200 resize-none" placeholder="Project Description"></textarea>
                        <span id="descriptionErr"></span>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="startDate" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Start Date <span class="text-red-700 font-medium">*</span></label>
                            <input datepicker-autohide datepicker type="text" id="startDate" name="startDate" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Start Date" readonly="readonly">
                            <span id="startDateErr"></span>
                        </div>
                        <div class="mb-2">
                            <label for="endDate" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">End Date <span class="text-red-700 font-medium">*</span></label>
                            <input datepicker-autohide datepicker type="text" id="endDate" name="endDate" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="End Date" readonly="readonly">
                            <span id="endDateErr"></span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" id="createProject" class="mt-2 block w-full rounded-md bg-blue-600 font-md font-medium text-gray-200 hover:bg-blue-700 px-2 py-2.5 tracking-wider">Create Project</button>
                        <span id="saveErr"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/datePicker')

<script>
$(document).ready(function(){
    const datePicker = document.getElementsByClassName("datepicker");
    for( var i = 0; i < datePicker.length; i++){
        if(datePicker[i].classList.contains('z-20')){
            datePicker[i].classList.replace('z-20', '!z-[60]');
        }
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    var pn=0, sd=0, ed=0;
    $('#createProject').click(function(e) {
        e.preventDefault();
        var token = $('input[type=hidden]').val();
        var project_name = $('#projectname').val();
        var description = $('#description').val();
        var start_date = $('#startDate').val();
        var end_date = $('#endDate').val(); 
        if(pn === 1 && start_date !== "" && end_date !== ""){
            $.ajax({
                url: "{{ route('create.project') }}",
                type: "POST",
                data: {
                    _token: token,
                    project_name: project_name,
                    description: description,
                    start_date: start_date,
                    end_date: end_date
                },
                beforeSend: function(){
                    $('#projectname').attr('disabled', 'disabled');
                    $('#description').attr('disabled', 'disabled');
                    $('#startDate').attr('disabled', 'disabled');
                    $('#endDate').attr('disabled', 'disabled');
                    $('input').addClass('disabled:opacity-25');
                    $('textarea').addClass('disabled:opacity-25');
                    $('#createProject').attr('disabled', 'disabled');
                    $('#createProject').removeClass('hover:bg-blue-800');
                    $('#createProject').addClass('disabled:opacity-25');
                },
                success: function(data){
                    if(data.status === "success"){
                        toastr.success(data.message);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }else{
                        toastr.info(data.message);
                    }
                    setTimeout(() => {
                        $('#projectname').removeAttr('disabled', 'disabled');
                        $('#description').removeAttr('disabled', 'disabled');
                        $('#startDate').removeAttr('disabled', 'disabled');
                        $('#endDate').removeAttr('disabled', 'disabled');
                        $('input').removeClass('disabled:opacity-25');
                        $('textarea').removeClass('disabled:opacity-25');
                        $('#createProject').removeAttr('disabled', 'disabled');
                        $('#createProject').addClass('hover:bg-blue-800');
                        $('#createProject').removeClass('disabled:opacity-25');
                    }, 3000);
                }
            })
            $('#saveErr').html('');
        }else{
            $('#saveErr').html('<p class="pt-1 text-red-600 text-center font-medium tracking-wider">Please fill out all required fields</p>');
        }
    });

    $('#projectname').keyup(function() {
        if(this.value.length >= 2){
            pn = 1;
            $('#projectnameErr').html('');
            $('#createProject').removeAttr('disabled', 'disabled');
            $('#createProject').removeClass('disabled:opacity-25')
            $('#createProjectcreateProject').addClass('hover:bg-blue-800');
        }else{
            pn = 0;
            $('#projectnameErr').html('<p class="pt-1 text-red-600 font-medium tracking-wider">The project name must have 2 or more characters</p>');
            $('#createProject').attr('disabled', 'disabled');
            $('#createProject').addClass('disabled:opacity-25')
            $('#createProjectcreateProject').removeClass('hover:bg-blue-800');
        }
    })

    // Reset modal fiedls
    $('#modal_close').click(function(e) {
        $('form').each(function() {
            this.reset();
        });
    });

    // Remove Project
    $('button[id="removeProject"]').bind('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = "{{ route('project.remove',':id') }}";
        url = url.replace(':id', id);
        Swal.fire({
            title: '',
            text: "Are you sure you want to archive this project?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: id,
                    success:function(data){
                        if(data.status === "success"){
                            Swal.fire({
                                icon: "success",
                                title: 'Archived!',
                                text: "Your project has been archived.",
                                showConfirmButton: false,
                                timer: 3000
                            })
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }else{
                            toastr.info(data.message);
                        }
                    }
                })
            }
        });
    });
})
</script>
@include("partials.footer")