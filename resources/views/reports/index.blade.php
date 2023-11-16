@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Reports</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <button type="button" data-tooltip-target="add_report" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
                    <i class="fa-solid fa-plus text-gray-100"></i>
                </button>
                <div id="add_report" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Add Report
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                <div class="flex items-center justify-between mb-4">
                    <a href="#view" class="text-lg font-medium text-gray-200 hover:underline tracking-wide">Change Alert Javascript</a>
                    <a href="#edit" data-modal-target="view_reports" data-modal-toggle="view_reports" class="text-gray-100 text-lg hover:bg-gray-600 hover:text-gray-400 px-2 py-1 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
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
                    <div class="">
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-clock mr-1"></i> 5 days ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                <div class="flex items-center justify-between mb-4">
                    <a href="#view" class="text-lg font-medium text-gray-200 hover:underline tracking-wide">Change Alert Javascript</a>
                    <a href="#edit" data-modal-target="view_reports" data-modal-toggle="view_reports" class="text-gray-100 text-lg hover:bg-gray-600 hover:text-gray-400 px-2 py-1 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="mb-4">
                    <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="inline-flex items-center justify-center">
                        <img data-tooltip-target="hover_img_2" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">
                        <div id="hover_img_2" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                            Juan Dela Cruz
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="">
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-clock mr-1"></i> 5 days ago
                        </span>
                    </div>
                </div>
            </div>
            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                <div class="flex items-center justify-between mb-4">
                    <a href="#view" class="text-lg font-medium text-gray-200 hover:underline tracking-wide">Change Alert Javascript</a>
                    <a href="#edit" data-modal-target="view_reports" data-modal-toggle="view_reports" class="text-gray-100 text-lg hover:bg-gray-600 hover:text-gray-400 px-2 py-1 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="mb-4">
                    <p class="text-gray-100 tracking-wide">{{ Str::limit('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 125) }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="inline-flex items-center justify-center">
                        <img data-tooltip-target="hover_img_3" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">
                        <div id="hover_img_3" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                            Juan Dela Cruz
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>                       
                    </div>
                    <div class="">
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-clock mr-1"></i> 5 days ago
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="view_reports" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    Edit Report
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view_reports">
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
            <div class="flex items-center justify-end p-4 md:p-5 rounded-b">
                <button data-modal-hide="view_reports" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <i class="fa-solid fa-eye mr-1"></i> View
                </button>
            </div>
        </div>
    </div>
</div>
@include("partials.footer")