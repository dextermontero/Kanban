@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg mt-14">
        <div class="flex justify-between items-start xl:items-center mb-5">
            <div class="mb-2">
                <a href="{{ route('auth.organization') }}" class="mb-2 inline-flex items-center justify-center group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-100 mr-2 transition duration-75 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                    <h2 class="text-gray-100 text-3xl font-medium tracking-wider">{{ ucwords($data->project_name) }} Members</h2>
                </a>
            </div>
            <div class="inline-flex items-center justify-center">
                <button type="button" data-modal-target="invite-modal" data-modal-toggle="invite-modal" data-tooltip-target="invite_member" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
                    <i class="fa-solid fa-plus text-gray-100"></i>
                </button>
                <div id="invite_member" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                    Invite Member
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="flex-auto block py-8 pt-6 px-9 bg-gray-800 rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="w-full my-0 align-middle text-gray-200 border-neutral-200">
                    <thead class="align-bottom">
                        <tr class="font-semibold text-[0.95rem] tracking-wider uppercase">
                            <th class="pb-3 text-start min-w-[170px]">Name</th>
                            <th class="pb-3 text-center min-w-[120px]">Role</th>
                            <th class="pb-3 text-center min-w-[120px]">Status</th>
                            <th class="pb-3 text-end min-w-[50px]">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $list)
                            <tr class="border-b border-dashed last:border-b-0">
                                <td class="p-3 pl-0">
                                    <div class="flex items-center">
                                        <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                            <img src="{{ asset('assets/profiles/'. $list->profile_img) }}" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="{{ ucwords($list->firstname) }} {{ ucwords($list->lastname) }}">
                                        </div>
                                        <div id="td_name" class="flex flex-col justify-start">
                                            <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">{{ ucwords($list->firstname) }} {{ ucwords($list->lastname) }}</h2>
                                        </div>
                                    </div>
                                </td>
                                <td id="td_role" class="p-3 pr-0 text-center">
                                    @if ($list->position === "ceo")
                                        <span class="font-medium text-md/normal tracking-wider">C.E.O</span>
                                    @elseif($list->position === "pm")
                                        <span class="font-medium text-md/normal tracking-wider">Project Manager</span>
                                    @else
                                        <span class="font-medium text-md/normal tracking-wider">{{ ucwords($list->position) }}</span>
                                    @endif
                                </td>
                                <td id="td_status" class="p-3 pr-0 text-center">
                                    @if ($list->status === 'pending')
                                        <span class="font-medium text-md/normal tracking-wider text-orange-400">Pending</span>
                                    @else
                                        <span class="font-medium text-md/normal tracking-wider text-green-400">{{ ucwords($list->status) }}</span>
                                    @endif
                                </td>
                                <td id="td_action" class="p-3 pr-0 text-end">
                                    <button type="button" id="removeUser" data-id="{{ $list->uid }}" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="invite-modal" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-gray-700 rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-500">
                <h3 class="text-xl font-medium text-gray-200">
                    Invite Member
                </h3>
                <button type="button" id="close_modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="invite-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form id="search_member">
                    @csrf
                    <div>
                        <label for="search_name" class="block mb-2 text-md font-medium text-gray-200">Search Name</label>
                        <input type="text" id="search_name" name="search_name" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Search Member">
                    </div>
                </form>
                <div class="mb-2 hidden" id="search_info">
                    <div class="h-80 overflow-y-auto mb-4 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 scrollbar-rounded-full">
                        <span id="displaySearch"></span>
                    </div>
                    <button id="inviteNew" data-tooltip-target="view_more" class="flex justify-end ml-auto text-right">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-100 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                            <path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/>
                        </svg>
                        <div id="view_more" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            view more
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </button>
                </div>
                <form id="new_invite">
                    <div class="relative py-2 flex items-center">
                        <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">or</span>
                        <div class="flex-grow border-t border-gray-400"></div>
                    </div>
                    @csrf
                    <div class="mb-4">
                        <label for="invite_firstname" class="block mb-2 text-md font-medium text-gray-200">First Name</label>
                        <input type="text" id="invite_firstname" name="invite_firstname" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="First Name">
                    </div>
                    <div class="mb-4">
                        <label for="invite_lastname" class="block mb-2 text-md font-medium text-gray-200">Last Name</label>
                        <input type="text" id="invite_lastname" name="invite_lastname" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Last Name">
                    </div>
                    <div class="mb-4">
                        <label for="invite_email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="invite_email" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="email@kanban.com">
                    </div>
                   <button type="button" id="inviteMember"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Invite</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="module">  
    document.onreadystatechange  = () => {
        if(document.readyState === 'interactive'){
            $('tbody tr').addClass('animate-pulse');
            $('tbody tr #td_image').html('<div class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl bg-gray-700"></div>');
            $('tbody tr #td_name').html('<div class="bg-gray-700 h-4 w-44 rounded-2xl mb-2"></div><div class="bg-gray-700 h-4 w-80 rounded-2xl"></div>');
            $('tbody tr #td_role').html('<div class="bg-gray-700 h-4 rounded-2xl"></div>');
            $('tbody tr #td_status').html('<div class="bg-gray-700 h-4 rounded-2xl"></div>');
            $('tbody tr #td_action').html('<div class="bg-gray-700 h-4 rounded-2xl"></div>');
        }
    };
</script>
<script>
    $(document).ready(function(){
        $("#search_name" ).click(function(e) {
            e.preventDefault();
            $('#new_invite').attr('hidden', 'hidden');
            $('#search_info').removeClass('hidden');
            search();
        });

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
        }

        $('#search_name').keyup(function(e) {
            e.preventDefault();
            search()
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

        $('#inviteNew').click(function(e) {
            $('#new_invite').removeAttr('hidden', 'hidden');
            $('#search_info').addClass('hidden');
            $('#search_name').val('');
        });

        $('#inviteMember').click(function(e){
            e.preventDefault();
            var token = $('input[type="hidden"]').val();
            var firstname = $('#invite_firstname').val();
            var lastname = $('#invite_lastname').val();
            var email = $('#invite_email').val();
            if(email !== ""){
                $.ajax({
                    url: "{{ route('invite.member') }}",
                    type: "POST",
                    header: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        _token: token,
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                    },
                    beforeSend: function() {
                        $('input').addClass('disabled:opacity-25');
                        $('#search_name').attr('disabled', 'disabled');
                        $('#invite_firstname').attr('disabled', 'disabled');
                        $('#invite_lastname').attr('disabled', 'disabled');
                        $('#invite_email').attr('disabled', 'disabled');
                        $('#close_modal').addClass('disabled:opacity-25');
                        $('#close_modal').attr('disabled', 'disabled');
                        $('#inviteMember').attr('disabled', 'disabled');
                        $('#inviteMember').removeClass('hover:bg-blue-800');
                        $('#inviteMember').addClass('disabled:opacity-25');
                    },
                    success:function(data){
                        if(data.status === "success"){
                            toastr.success(data.message);
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }else if(data.status === "info"){
                            toastr.info(data.message);
                        }else{
                            toastr.warning(data.message);
                        }
                        setTimeout(() => {
                            $('input').removeClass('disabled:opacity-25');
                            $('#search_name').removeAttr('disabled', 'disabled');
                            $('#invite_firstname').removeAttr('disabled', 'disabled');
                            $('#invite_lastname').removeAttr('disabled', 'disabled');
                            $('#invite_email').removeAttr('disabled', 'disabled');
                            $('#close_modal').removeClass('disabled:opacity-25');
                            $('#close_modal').removeAttr('disabled', 'disabled');
                            $('#inviteMember').removeAttr('disabled', 'disabled');
                            $('#inviteMember').addClass('hover:bg-blue-800');
                            $('#inviteMember').removeClass('disabled:opacity-25');
                        }, 5000);
                    }
                });
            }else{
                toastr.error('The <b>email address</b> must not be empty!');
            }
        });

        $('button[id="removeUser"]').bind('click', function(e) {
            e.preventDefault();
            var id = "{{ $data->id }}";
            var uid = $(this).attr('data-id');
            Swal.fire({
                title: '',
                text: "Are you sure you want to remove this member?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('remove.member') }}",
                        type: "POST",
                        header: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            uid: uid,
                        },
                        success:function(data){
                            if(data.status === "success"){
                                Swal.fire({
                                    icon: "success",
                                    title: 'Removed!',
                                    text: "Member has been removed!",
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
        })
    });
</script>
@include("partials.footer")