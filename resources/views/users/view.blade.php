@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg mt-14">
        <div class="flex justify-between items-start xl:items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">{{ $data }} Members</h2>
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
                                            <img src="{{ asset('assets/profiles/'. $list->profile_img) }}" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="{{ Str::ucfirst($list->firstname) }} {{ Str::ucfirst($list->lastname) }}">
                                        </div>
                                        <div id="td_name" class="flex flex-col justify-start">
                                            <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">{{ Str::ucfirst($list->firstname) }} {{ Str::ucfirst($list->lastname) }}</h2>
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
                                    <span class="font-medium text-md/normal tracking-wider">{{ ucwords($list->status) }}</span>
                                </td>
                                <td id="td_action" class="p-3 pr-0 text-end">
                                    <a href="#remove" data-id="{{ $list->id }}" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Project Manager</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Immediate Supervisor</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Member</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Member</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Member</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-dashed last:border-b-0">
                            <td class="p-3 pl-0">
                                <div class="flex items-center">
                                    <div id="td_image" class="relative inline-block shrink-0 rounded-2xl me-4">
                                        <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                    </div>
                                    <div id="td_name" class="flex flex-col justify-start">
                                        <h2 class="mb-1 font-medium transition-colors duration-200 ease-in-out text-lg tracking-wider">Juan Dela Cruz</h2>
                                    </div>
                                </div>
                            </td>
                            <td id="td_role" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Member</span>
                            </td>
                            <td id="td_status" class="p-3 pr-0 text-center">
                                <span class="font-medium text-md/normal tracking-wider">Accepted</span>
                            </td>
                            <td id="td_action" class="p-3 pr-0 text-end">
                                <a href="#remove" class="text-red-600 hover:text-red-800 mr-2 justify-center text-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
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
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="invite-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form>
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
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Invite</button>
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
@include("partials.footer")