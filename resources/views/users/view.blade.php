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
        <div class="relative overflow-x-auto shadow-md  rounded-lg">
            <table class="w-full text-xl text-gray-100 text-left">
                <thead class="bg-gray-800 uppercase overflow-x-hidden text-gray-300">
                    <tr>
                        <th scope="col" class="py-3 px-4">Name</th>
                        <th scope="col" class="py-3 px-4">Role</th>
                        <th scope="col" class="py-3 px-4">Status</th>
                        <th scope="col" class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y-[0.1rem] divide-gray-500">
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">CEO</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Project Manager</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Supervisor</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-700 even:bg-gray-800">
                        <th scope="row" class="py-3 px-4 font-medium">
                            <div class="inline-flex items-center whitespace-nowrap">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="hidden xl:block mt-1 w-8 h-8 rounded-full mr-3">
                                Juan Dela Cruz
                            </div>
                        </th>
                        <td class="py-3 px-4">Member</td>
                        <td class="py-3 px-4">Accepted</td>
                        <td class="py-3 px-4">
                            <a href="#remove" class="text-red-700 mr-2 flex items-center justify-center text-md">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
                        <label for="invite_email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="invite_email" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="email@kanban.com">
                    </div>
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Invite</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include("partials.footer")