@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Project Lists</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <button type="button" data-tooltip-target="add_project" data-modal-target="add_project_modal" data-modal-toggle="add_project_modal" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
                    <i class="fa-solid fa-plus text-gray-100"></i>
                </button>
                <div id="add_project" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Add Project
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
            @foreach ($show as $projects)
                <a href="{{ route('auth.projects.id', $projects->uuid) }}" class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-3xl font-medium text-gray-200 tracking-wider">{{ Str::ucfirst($projects->project_name) }}</h2>
                    </div>
                    <div class="mb-4 min-h-[3rem]">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit($projects->description, 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="hover_img_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">
                        </div>
                    </div>
                </a>
            @endforeach
            <a href="{{ route('auth.projects.id', now()->timestamp) }}" class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-3xl font-medium text-gray-200 tracking-wider">Project Name </h2>
                </div>
                <div class="mb-4">
                    <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="inline-flex items-center justify-center">
                        <img data-tooltip-target="hover_img_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">
                        <div id="hover_img_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                            Juan Dela Cruz
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
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
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_project_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="projectname" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Project Name</label>
                        <input type="text" id="projectname" name="projectname" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Project Name">
                        <span id="projectErr"></span>
                        @error('projectname')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Description</label>
                        <textarea rows="3" id="description" name="description" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200 resize-none" placeholder="Project Description"></textarea>
                        <span id="descriptionErr"></span>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="startDate" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">Start Date</label>
                            <input datepicker-autohide datepicker type="text" id="startDate" name="startDate" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Start Date">
                            <span id="startDateErr"></span>
                        </div>
                        <div class="mb-2">
                            <label for="endDate" class="block text-lg font-medium mb-2 text-gray-200 tracking-wider">End Date</label>
                            <input datepicker-autohide datepicker type="text" id="endDate" name="endDate" class="bg-gray-600 border border-gray-500 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="End Date">
                            <span id="endDateErr"></span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" name="createProject" class="mt-2 block w-full rounded-md bg-blue-600 font-md font-medium text-gray-200 hover:bg-blue-700 px-2 py-2.5 tracking-wider">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/datePicker')
<script type="module">
$(document).ready(function(){
    const datePicker = document.getElementsByClassName("datepicker");

    for( var i = 0; i < datePicker.length; i++){
        if(datePicker[i].classList.contains('z-20')){
            datePicker[i].classList.replace('z-20', '!z-[60]');
        }
    }

    /* document.getElementById("noRefreshForm").addEventListener("submit", function(e){
        e.preventDefault()
    }); */

/*     $(".createProject").click(function(e){

        var project = $('#projectname').val();
        var description = $('#description').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        $.ajax({
            type: 'GET',
            url: "/api/projects/create",
            data: {
                _token: $("#csrf").val(),
                project: project,
                description: description,
                startDate: startDate,
                endDate: endDate
            },
            success: function(response){
                alert(response.success);
            }
        });
	}); */
})
</script>
@include("partials.footer")