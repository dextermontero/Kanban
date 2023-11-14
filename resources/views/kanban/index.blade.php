@include("partials.header", [$title])
<div class="p-4 sm:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-col xl:flex-row justify-start xl:justify-between items-start xl:items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Kanban Project (3 years)</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <div class="inline-flex items-center justify-center mr-3">
                    <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-30 border-[3px] border-gray-100">
                    <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-20 border-[3px] border-gray-100">
                    <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12 -mr-2 z-10 border-[3px] border-gray-100">
                    <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-12 w-12">    
                </div>
                <button type="button" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
                    <i class="fa-solid fa-plus text-gray-100"></i>
                </button>
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-30">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-20">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8 -mr-2 z-10">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                        <a href="#edit" class="text-gray-100 text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="inline-flex items-center justify-center">
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
                            <img src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">                            
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
@include("partials.footer")