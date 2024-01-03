@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-col xl:flex-row justify-start xl:justify-between items-start xl:items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">{{ $data->project_name }} ({{ Carbon\Carbon::now()->diffInDays($data->end_date) }} days left)</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <div class="inline-flex items-center justify-center mr-3">
                    @foreach ($cowork as $worker)
                        <img data-tooltip-target="{{ $worker->id }}" data-tooltip-placement="bottom" src="{{ asset('assets/profiles/'. $worker->profile_img)}}" class="rounded-full h-12 w-12 -mr-2 z-30 border-[3px] border-gray-500" alt="{{ ucwords($worker->firstname) }} {{ ucwords($worker->lastname) }}">
                        <div id="{{ $worker->id }}" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                            {{ ucwords($worker->firstname) }} {{ ucwords($worker->lastname) }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @endforeach
                </div>
                <button type="button" data-modal-target="add_member_modal" data-modal-toggle="add_member_modal" data-tooltip-target="add_member" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12 hover:border-gray-600 group">
                    <i class="fa-solid fa-plus text-gray-100 group-hover:text-gray-600"></i>
                </button>
                <div id="add_member" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                    Add Member
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
            <div class="todoContainer">
                <h2 class="flex justify-between mb-3 text-gray-100 font-medium tracking-wider">
                    <div class="">
                        <i class="fa-solid fa-list text-2xl mr-3"></i>
                        <span>To Do</span>
                    </div>
                </h2>
                <div class="min-h-[20rem] xl:min-h-[45rem] rounded draggableDiv" id="todo-drop">
                    @if (count($todo) > 0)
                        <button type="button" data-modal-target="add_task_modal" data-modal-toggle="add_task_modal" class="flex items-center w-full h-16 justify-center mb-4 rounded border-2 border-gray-400 border-dashed dark:bg-gray-800">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa-solid fa-plus text-gray-400"></i>
                            </div>
                        </button>
                        @foreach ($todo as $item)
                            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 cursor-move mb-4" id="todo" item-id="{{ $item->id }}" item-status="{{ $item->item_status }}">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-medium text-gray-100 tracking-wide">{{ ucwords($item->task_name) }}</h2>
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-100 tracking-wide">{{ Str::limit($item->description, 125) }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="inline-flex items-center justify-center">
                                        @if ($item->status === "High Priority")
                                            <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-1 rounded border border-pink-400">
                                                High Priority
                                            </span>
                                        @elseif($item->status === "Medium Priority")
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-yellow-300">
                                                Medium Priority
                                            </span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-green-400">
                                                Low Priority
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>                           
                        @endforeach
                    @else
                        <button type="button" data-modal-target="add_task_modal" data-modal-toggle="add_task_modal" class="flex items-center w-full justify-center h-[20rem] xl:h-[45rem] mb-4 rounded border-2 border-gray-400 border-dashed dark:bg-gray-800">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa-solid fa-plus text-gray-400"></i>
                                <p class="text-gray-400 tracking-wider mt-2 text-lg">Click to add task</p>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
            <div class="progressContainer">
                <h2 class="inline-flex items-center text-gray-100 mb-3 font-medium tracking-wider">
                    <i class="fa-solid fa-bars-progress text-2xl mr-3"></i>
                    <span>In Progress</span>
                </h2>
                <div class="min-h-[20rem] xl:min-h-[45rem] rounded draggableDiv" id="progress-drop">
                    @if (count($progress) > 0)
                        @foreach ($progress as $item)
                            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 cursor-move mb-4" id="progress" item-id="{{ $item->id }}" item-status="{{ $item->item_status }}">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-medium text-gray-100 tracking-wide">{{ ucwords($item->task_name) }}</h2>
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-100 tracking-wide">{{ Str::limit($item->description, 125) }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="inline-flex items-center justify-center">
                                        @if ($item->status === "High Priority")
                                            <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-1 rounded border border-pink-400">
                                                High Priority
                                            </span>
                                        @elseif($item->status === "Medium Priority")
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-yellow-300">
                                                Medium Priority
                                            </span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-green-400">
                                                Low Priority
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>                           
                        @endforeach
                    @else
                        <button type="button" data-modal-target="add_task_modal" data-modal-toggle="add_task_modal" class="flex items-center w-full justify-center h-[20rem] xl:h-[45rem] mb-4 rounded border-2 border-gray-400 border-dashed dark:bg-gray-800">
                            <div class="flex flex-col items-center justify-center">
                                <p class="text-gray-400 tracking-wider mt-2 text-lg">Drop To Do here</p>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
            <div class="doneContainer">
                <h2 class="inline-flex items-center text-gray-100 mb-3 font-medium tracking-wider">
                    <i class="fa-solid fa-list-check text-2xl mr-3"></i>
                    <span>Done</span>
                </h2>
                <div class="min-h-[20rem] xl:min-h-[45rem] rounded draggableDiv" id="done-drop">
                    @if (count($done) > 0)
                        @foreach ($done as $item)
                            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 cursor-move mb-4" id="done" item-id="{{ $item->id }}" item-status="{{ $item->item_status }}">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-medium text-gray-100 tracking-wide">{{ ucwords($item->task_name) }}</h2>
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-100 tracking-wide">{{ Str::limit($item->description, 125) }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="inline-flex items-center justify-center">
                                        @if ($item->status === "High Priority")
                                            <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-1 rounded border border-pink-400">
                                                High Priority
                                            </span>
                                        @elseif($item->status === "Medium Priority")
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-yellow-300">
                                                Medium Priority
                                            </span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded border border-green-400">
                                                Low Priority
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>                           
                        @endforeach
                    @else
                        <button type="button" data-modal-target="add_task_modal" data-modal-toggle="add_task_modal" class="flex items-center w-full justify-center h-[20rem] xl:h-[45rem] mb-4 rounded border-2 border-gray-400 border-dashed dark:bg-gray-800">
                            <div class="flex flex-col items-center justify-center">
                                <p class="text-gray-400 tracking-wider mt-2 text-lg">Drop In Progress here</p>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div id="add_member_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    Add Member
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_member_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form>
                    @csrf
                    <div>
                        <label for="search_name" class="block mb-2 text-md font-medium text-gray-200">Search Name</label>
                        <input type="text" id="search_name" name="search_name" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Search Member">
                    </div>
                </form>
                <div class="text-base leading-relaxed text-gray-300 h-96 overflow-y-auto">
                    <span id="displaySearch"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="add_task_modal" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    Add Task
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_task_modal">
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
                    <div class="mb-3">
                        <label for="task_name" class="block mb-2 text-gray-200 tracking-wider text-lg font-medium">Task Name</label>
                        <input type="text" id="task_name" name="task_name" class="w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400" placeholder="Task Name">
                    </div>
                    <div class="inline-flex items-center justify-center text-gray-100 font-medium text-lg tracking-wider mb-3">
                        <i class="fa-solid fa-file-lines mr-3 text-gray-100"></i>
                        Description
                    </div>
                    <p class="text-base leading-relaxed text-gray-300 mb-3">
                        <textarea rows="10" id="task_description" name="task_description" class="block w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400 resize-none" placeholder="Description"></textarea>
                    </p>
                    <div class="mb-3">
                        <select id="priority" class="w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400">
                            <option value="Low Priority" selected>Low Priority</option>
                            <option value="Medium Priority">Medium Priority</option>
                            <option value="High Priority">High Priority</option>
                        </select>
                    </div>
                    <button type="button" id="addTask" class="w-full rounded-md bg-blue-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400 py-2.5 hover:bg-blue-700">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="module">
$(document).ready(function() {
    toastr.options ={
        "closeButton" : true,
        "progressBar" : true,
        "positionClass" : "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
    }
    $("#todo-drop").sortable({
        connectWith: ".draggableDiv",
        opacity: 0.5,
        start: function( event, ui ) { 
            $(ui.item).addClass("bg-yellow-600");
        },
        stop:function( event, ui ) { 
            $(ui.item).removeClass("bg-yellow-600");
        },
        receive: function(ev, ui) {
            var status = ui.item[0].attributes[3].value;
            if (this === ui.item.parent()[0]) {
                if(status === "progress"){
                    $(ui.sender).sortable('cancel');
                    toastr.error('Task is <b>In Progress</b> can\'t moved to <b>To Do</b>');
                }else{
                    $(ui.item).addClass('border-2 border-yellow-600');
                }
            }
        },
        update: function (event, ui) {
            var id = ui.item[0].attributes[2].value;
            var item_status = ui.item[0].attributes[3].value;
            var status = "todo";
            if (this === ui.item.parent()[0]) {
                if(item_status === "done"){
                    $.ajax({
                        url: "{{ route('update.task') }}",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            status: status,
                        },
                        success: function(data){
                            if(data.status === "success"){
                                toastr.success('Task Successfully moved in <b>To Do</b>', '', {"timeOut": 3000});
                            }else{
                                toastr.info(data.message);
                            }
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }
                    });
                }
            }
            setTimeout(() => {
                $(ui.item).removeClass('border-2 border-yellow-600 transition duration-300');
            }, 5000);
            $(this).sortable("refresh");
        }
    });

    $("#progress-drop").sortable({
        connectWith: ".draggableDiv",
        opacity: 0.5,
        start: function( event, ui ) { 
            $(ui.item).addClass("bg-green-600");
        },
        stop:function( event, ui ) { 
            $(ui.item).removeClass("bg-green-600");
        },
        receive: function(ev, ui) {
            var status = ui.item[0].attributes[3].value;
            if (this === ui.item.parent()[0]) {
                if(status === "done"){
                    $(ui.sender).sortable('cancel');
                    toastr.error('Task is <b>Done</b> can\'t moved to <b>In Progress</b>');
                }else{
                    $(ui.item).addClass('border-2 border-yellow-600');
                }
            }
        },
        update: function (event, ui) {
            var id = ui.item[0].attributes[2].value;
            var item_status = ui.item[0].attributes[3].value;
            var status = "progress";
            if (this === ui.item.parent()[0]) {
                if(item_status === "todo"){
                    $.ajax({
                        url: "{{ route('update.task') }}",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            status: status,
                        },
                        success: function(data){
                            if(data.status === "success"){
                                toastr.success('Task Successfully moved to In Progress from Todo', '', {"timeOut": 3000});
                            }else{
                                toastr.info(data.message);
                            }
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }
                    });
                }
            }
            setTimeout(() => {
                $(ui.item).removeClass('border-2 border-yellow-600 transition duration-300');
            }, 5000);
            $(this).sortable("refresh");
        }
    });

    $("#done-drop").sortable({
        connectWith: ".draggableDiv",
        opacity: 0.5,
        start: function( event, ui ) { 
            $(ui.item).addClass("bg-teal-600");
        },
        stop:function( event, ui ) { 
            $(ui.item).removeClass("bg-teal-600");
        },
        receive: function(ev, ui) {
            var status = ui.item[0].attributes[3].value;
            if (this === ui.item.parent()[0]) {
                if(status === "todo"){
                    $(ui.sender).sortable('cancel');
                    toastr.error('Task is <b>To Do</b> can\'t moved to <b>Done</b>');
                }else{
                    $(ui.item).addClass('border-2 border-teal-600');
                }
            }
        },
        update: function (event, ui) {
            var id = ui.item[0].attributes[2].value;
            var item_status = ui.item[0].attributes[3].value;
            var status = "done";
            if (this === ui.item.parent()[0]) {
                if(item_status === "progress"){
                    $.ajax({
                        url: "{{ route('update.task') }}",
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            status: status,
                        },
                        success: function(data){
                            if(data.status === "success"){
                                toastr.success('Task Successfully moved in <b>Done</b>', '', {"timeOut": 3000});
                            }else{
                                toastr.info(data.message);
                            }
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }
                    });
                }
            }
            setTimeout(() => {
                $(ui.item).removeClass('border-2 border-teal-600 transition duration-300');
            }, 5000);
            $(this).sortable("refresh");
        }
    });
});
</script>
<script>
    $(document).ready(function() {
        $('#addTask').click(function(e) {
            e.preventDefault();
            var token = $('input[type="hidden"]').val();
            var id = "{{ $data->id }}";
            var task_name = $('#task_name').val();
            var description = $('#task_description').val();
            var priority = $('#priority').val();
            if(task_name !== "" && description !== "" && priority !== null){
                $.ajax({
                    url: "{{ route('add.task') }}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _token: token,
                        id: id,
                        task_name: task_name,
                        description: description,
                        priority: priority
                    },
                    beforeSend: function() {
                        $('input').addClass('disabled:opacity-25');
                        $('textarea').addClass('disabled:opacity-25');
                        $('select').addClass('disabled:opacity-25');
                        $('#task_name').attr('disabled', 'disabled');
                        $('#task_description').attr('disabled', 'disabled');
                        $('#priority').attr('disabled', 'disabled');
                        $('#addTask').attr('disabled', 'disabled');
                        $('#addTask').removeClass('hover:bg-blue-800');
                        $('#addTask').addClass('disabled:opacity-25');
                    },
                    success: function(data) {
                        if(data.status === "success"){
                            toastr.success(data.message, '', {"timeOut": 3000});
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }else{
                            toastr.info(data.message, '', {"timeOut": 4000});
                        }
                        setTimeout(() => {
                            $('input').removeClass('disabled:opacity-25');
                            $('textarea').removeClass('disabled:opacity-25');
                            $('select').removeClass('disabled:opacity-25');
                            $('#task_name').removeAttr('disabled', 'disabled');
                            $('#task_description').removeAttr('disabled', 'disabled');
                            $('#priority').removeAttr('disabled', 'disabled');
                            $('#addTask').removeAttr('disabled', 'disabled');
                            $('#addTask').addClass('hover:bg-blue-800');
                            $('#addTask').removeClass('disabled:opacity-25');
                        }, 4000);
                    }
                })
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#search_name').keyup(function(e) {
            e.preventDefault();
            search()
        });
        
        search();

        function search(){
            var id = "{{ request()->route('id') }}"
            var keyword = $('#search_name').val();
            var token = $('input[type="hidden"]').val();
            $.post("{{ route('search.member') }}",
            {
                _token: token,
                id: id,
                search: keyword
            },
            function(list){
                displayUser(list);
            });

            function displayUser(list){
                let data = '';
                if(list.users.length <= 0){
                    data+= `
                    <div class="flex items-center justify-center h-56 mb-4 rounded  dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            User not found
                        </p>
                    </div>`;
                }

                list.users.forEach((u) => {
                    u.action = list.projectID.some(p => p.member_id === u.id);
                });

                for(let i = 0; i < list.users.length; i++){
                    if(list.users[i].action){
                        data += 
                        `<div class="group mb-1">
                            <div class="flex items-center w-full rounded-md group-hover:bg-gray-500 p-2">
                                <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                    <img src="{{ asset('assets/profiles')}}/`+list.users[i].profile_img+`" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="`+list.users[i].firstname+` `+list.users[i].lastname+`">
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <div class="">
                                        <h2 class="font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider text-gray-200 capitalize">`+list.users[i].firstname+` `+list.users[i].lastname+`</h2>
                                    </div>
                                    <div class="text-blue-500 mr-3 font-medium p-2 whitespace-nowrap tracking-wider group-hover:text-blue-400">
                                        Added
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    }else{
                        data += 
                        `<div id="hello" class="group mb-1">
                            <div class="flex items-center w-full rounded-md group-hover:bg-gray-500 p-2">
                                <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                    <img src="{{ asset('assets/profiles')}}/`+list.users[i].profile_img+`" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="`+list.users[i].firstname+` `+list.users[i].lastname+`">
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <div class="">
                                        <h2 class="font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider text-gray-200 capitalize">`+list.users[i].firstname+` `+list.users[i].lastname+`</h2>
                                    </div>
                                    <button type="button" id="addMember" data-id="`+list.users[i].id+`" class="bg-blue-700 text-center rounded-md w-16 text-blue-200 mr-3 font-medium p-2 whitespace-nowrap tracking-wider hover:text-blue-300 group-hover:bg-blue-800">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>`;
                    }
                }

                $('#displaySearch').html(data);
            }

            $(function() {
                $(document).on("click", "#addMember", function() {
                    var id = "{{ request()->route('id') }}";
                    var userId = $(this).attr("data-id");
                    $.ajax({
                        url: "{{ route('add.member') }}",
                        type: "POST",
                        header: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            userID: userId,
                        },
                        beforeSend: function() {
                            $('#addMember').attr('disabled', 'disabled');
                            $('#addMember').attr('disabled', 'disabled');
                            $('#addMember').removeClass('hover:bg-blue-800');
                            $('#addMember').addClass('disabled:opacity-25');
                        },
                        success: function(data){
                            if(data.status === "success"){
                                toastr.success(data.message);
                                setTimeout(() => {
                                    location.reload();
                                }, 3000);
                            }else{
                                toastr.warning(data.message);
                            }
                        }
                    });
                });
            });
        }
    });
</script>
@include("partials.footer")