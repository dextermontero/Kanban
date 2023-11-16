@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-col xl:flex-row justify-start xl:justify-between items-start xl:items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Kanban Project (3 years)</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <div class="inline-flex items-center justify-center mr-3">
                    <img data-tooltip-target="member_4" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-30 border-[3px] border-gray-100">
                    <img data-tooltip-target="member_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-20 border-[3px] border-gray-100">
                    <img data-tooltip-target="member_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-10 border-[3px] border-gray-100">
                    <img data-tooltip-target="member_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12">    
                    <div id="member_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                        Member 1
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="member_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                        Member 2
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="member_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                        Member 3
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="member_4" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                        Member 4
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
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
            <div class="">
                <h2 class="inline-flex items-center text-gray-100 mb-3 font-medium tracking-wider">
                    <i class="fa-solid fa-list text-2xl mr-3"></i>
                    <span>To Do</span>
                </h2>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_items" data-modal-toggle="view_items" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="todo_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img data-tooltip-target="todo_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img data-tooltip-target="todo_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img data-tooltip-target="todo_4" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="todo_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 1
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 2
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 3
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_4" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 4
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_items" data-modal-toggle="view_items" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="todo_5" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img data-tooltip-target="todo_6" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img data-tooltip-target="todo_7" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img data-tooltip-target="todo_8" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="todo_5" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 5
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_6" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 6
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_7" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 7
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_8" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 8
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_items" data-modal-toggle="view_items" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="todo_9" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img data-tooltip-target="todo_10" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img data-tooltip-target="todo_11" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img data-tooltip-target="todo_12" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="todo_9" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 9
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_10" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 10
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_11" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 11
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="todo_12" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 12
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <h2 class="inline-flex items-center text-gray-100 mb-3 font-medium tracking-wider">
                    <i class="fa-solid fa-bars-progress text-2xl mr-3"></i>
                    <span>In Progress</span>
                </h2>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_progress" data-modal-toggle="view_progress" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="progress_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="progress_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 1
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_progress" data-modal-toggle="view_progress" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="progress_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="progress_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 2
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                        <a href="#edit" data-modal-target="view_progress" data-modal-toggle="view_progress" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="progress_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="progress_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 3
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                <i class="fa-solid fa-clock mr-1"></i> 5 days left
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <h2 class="inline-flex items-center text-gray-100 mb-3 font-medium tracking-wider">
                    <i class="fa-solid fa-list-check text-2xl mr-3"></i>
                    <span>Done</span>
                </h2>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="done_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="done_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 1
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-green-700 dark:text-green-300">
                                <i class="fa-solid fa-check mr-1"></i> Done
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="done_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="done_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 2
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-green-700 dark:text-green-300">
                                <i class="fa-solid fa-check mr-1"></i> Done
                            </span>
                        </div>
                    </div>
                </div>
                <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-100 tracking-wide">Change Alert Javascript</h2>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img data-tooltip-target="done_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                            <div id="done_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                                Member 3
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-green-700 dark:text-green-300">
                                <i class="fa-solid fa-check mr-1"></i> Done
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="add_member_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-lg max-h-full">
    <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
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
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form>
                    @csrf
                    <label for="search_name" class="text-gray-100 text-xl block mb-2 font-medium">Search Name</label>
                    <input type="text" id="search_name" name="search_name" class="w-full rounded-lg text-gray-800 font-medium bg-gray-400 placeholder-gray-400 border focus:border-gray-500 focus:ring-gray-500">
                </form>
                <div class="text-base leading-relaxed text-gray-300 h-96 overflow-y-auto">
                    <div class="group mb-2">
                        <div class="flex items-center justify-between group-hover:bg-gray-500 px-2 py-2 rounded-lg">
                            <div class="flex items-center justify-start">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="h-14 mr-3 rounded-full">
                                <div class="flex flex-col items-start justify-start">
                                    <p class="text-xl font-medium text-gray-200 tracking-wider">Juan Dela Cruz</p>
                                    <label class="text-lg leading-relaxed text-gray-200 tracking-wider">Member</label>
                                </div>
                            </div>
                            <div class="group">
                                <button type="button" class="px-3 py-2 font-lg font-medium rounded-lg tracking-widest text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-300">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="group mb-2">
                        <div class="flex items-center justify-between group-hover:bg-gray-500 px-2 py-2 rounded-lg">
                            <div class="flex items-center justify-start">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="h-14 mr-3 rounded-full">
                                <div class="flex flex-col items-start justify-start">
                                    <p class="text-xl font-medium text-gray-200 tracking-wider">Juan Dela Cruz</p>
                                    <label class="text-lg leading-relaxed text-gray-200 tracking-wider">Member</label>
                                </div>
                            </div>
                            <div class="group">
                                <button type="button" class="px-3 py-2 font-lg font-medium rounded-lg tracking-widest text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-300">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="group mb-2">
                        <div class="flex items-center justify-between group-hover:bg-gray-500 px-2 py-2 rounded-lg">
                            <div class="flex items-center justify-start">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="h-14 mr-3 rounded-full">
                                <div class="flex flex-col items-start justify-start">
                                    <p class="text-xl font-medium text-gray-200 tracking-wider">Juan Dela Cruz</p>
                                    <label class="text-lg leading-relaxed text-gray-200 tracking-wider">Member</label>
                                </div>
                            </div>
                            <div class="group">
                                <button type="button" class="px-3 py-2 font-lg font-medium rounded-lg tracking-widest text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-300">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="group mb-2">
                        <div class="flex items-center justify-between group-hover:bg-gray-500 px-2 py-2 rounded-lg">
                            <div class="flex items-center justify-start">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="h-14 mr-3 rounded-full">
                                <div class="flex flex-col items-start justify-start">
                                    <p class="text-xl font-medium text-gray-200 tracking-wider">Juan Dela Cruz</p>
                                    <label class="text-lg leading-relaxed text-gray-200 tracking-wider">Member</label>
                                </div>
                            </div>
                            <div class="group">
                                <button type="button" class="px-3 py-2 font-lg font-medium rounded-lg tracking-widest text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-300">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="group mb-2">
                        <div class="flex items-center justify-between group-hover:bg-gray-500 px-2 py-2 rounded-lg">
                            <div class="flex items-center justify-start">
                                <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="h-14 mr-3 rounded-full">
                                <div class="flex flex-col items-start justify-start">
                                    <p class="text-xl font-medium text-gray-200 tracking-wider">Juan Dela Cruz</p>
                                    <label class="text-lg leading-relaxed text-gray-200 tracking-wider">Member</label>
                                </div>
                            </div>
                            <div class="group">
                                <button type="button" class="px-3 py-2 font-lg font-medium rounded-lg tracking-widest text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-300">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="view_items" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    To Do
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view_items">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="flex flex-col items-start justify-start">
                    <h2 class="text-gray-100 text-2xl font-bold tracking-wide mb-2">Change Alert Javascript</h2>
                    <p class="text-gray-300 font-medium">Added by <span class="hover:underline text-blue-600 cursor-pointer">Juan Dela Cruz</span>, 1 day ago</p>
                </div>

                <div class="flex flex-row justify-start text-gray-100 font-medium text-lg tracking-wider">
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 1</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 2</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 3</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 4</span>
                </div>

                <div class="inline-flex items-center justify-center text-gray-100 font-medium text-lg tracking-wider">
                    <i class="fa-solid fa-file-lines mr-3 text-gray-100"></i>
                    Description
                </div>

                <p class="text-base leading-relaxed text-gray-300">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-b">
                <div class="inline-flex items-center justify-center">
                    <img data-tooltip-target="view_modal_todo_4" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                    <img data-tooltip-target="view_modal_todo_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                    <img data-tooltip-target="view_modal_todo_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                    <img data-tooltip-target="view_modal_todo_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
                    <div id="view_modal_todo_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                        Member 1
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="view_modal_todo_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                        Member 2
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="view_modal_todo_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                        Member 3
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="view_modal_todo_4" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                        Member 4
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <button id="ddList" data-dropdown-toggle="dropdownMove" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                    Move 
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdownMove" class="z-10 hidden bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">In Progress</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="view_progress" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    In Progress
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view_progress">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="flex flex-col items-start justify-start">
                    <h2 class="text-gray-100 text-2xl font-bold tracking-wide mb-2">Change Alert Javascript</h2>
                    <p class="text-gray-300 font-medium">Added by <span class="hover:underline text-blue-600 cursor-pointer">Juan Dela Cruz</span>, 1 day ago</p>
                </div>

                <div class="flex flex-row justify-start text-gray-100 font-medium text-lg tracking-wider">
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 1</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 2</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 3</span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Image 4</span>
                </div>

                <div class="inline-flex items-center justify-center text-gray-100 font-medium text-lg tracking-wider">
                    <i class="fa-solid fa-file-lines mr-3 text-gray-100"></i>
                    Description
                </div>

                <p class="text-base leading-relaxed text-gray-300">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-b">
                <div class="inline-flex items-center justify-center">
                    <img data-tooltip-target="user_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 z-30">
                    <div id="user_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-700 rounded-lg shadow-sm opacity-0 tooltip">
                        Member 1
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <button id="ddProgress" data-dropdown-toggle="dropdownProgress" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                    Move 
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdownProgress" class="z-10 hidden bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Done</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include("partials.footer")