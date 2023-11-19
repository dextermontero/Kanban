@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Reports</h2>
            </div>
            <div class="inline-flex items-center justify-center">
                <button type="button" data-tooltip-target="add_report" data-modal-target="add_report_modal" data-modal-toggle="add_report_modal" data-tooltip-placement="bottom" class="border-2 border-dashed border-gray-200 rounded-full h-12 w-12">
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

<div id="add_report_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-100 tracking-wider">
                    Add Report
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_report_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="inline-flex items-center justify-center text-gray-100 font-medium text-lg tracking-wider">
                    <i class="fa-solid fa-file-lines mr-3 text-gray-100"></i>
                    Description
                </div>
                <form>
                    <p class="text-base leading-relaxed text-gray-300">
                        <textarea rows="10" name="description" class="block w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400" placeholder="Report Description"></textarea>
                    </p>
                    <div class="mt-3">
                        <label for="file-upload" class="text-gray-200 inline-flex items-center group mb-2">
                            <svg class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500 transition duration-75 group-hover:text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M364.2 83.8c-24.4-24.4-64-24.4-88.4 0l-184 184c-42.1 42.1-42.1 110.3 0 152.4s110.3 42.1 152.4 0l152-152c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-152 152c-64 64-167.6 64-231.6 0s-64-167.6 0-231.6l184-184c46.3-46.3 121.3-46.3 167.6 0s46.3 121.3 0 167.6l-176 176c-28.6 28.6-75 28.6-103.6 0s-28.6-75 0-103.6l144-144c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-144 144c-6.7 6.7-6.7 17.7 0 24.4s17.7 6.7 24.4 0l176-176c24.4-24.4 24.4-64 0-88.4z"/>
                            </svg> 
                            Attach File
                        </label>
                        <input type="file" id="file-upload" name='reportFiles[]' class="hidden" multiple> 
                        <div id="files-area" class="mb-2 min-h-0 max-h-14 xl:min-h-0 xl:max-h-32 overflow-y-auto">
                            <span id="filesList"></span>
                        </div>
                        <button type="submit" class="mt-2 block w-full rounded-md bg-blue-600 font-md font-medium text-gray-200 hover:bg-blue-700 px-2 py-2.5">Upload</button>
                    </div>
                </form>
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
<script>
const dt = new DataTransfer();
$('#file-upload').on('change', function() {
    for(var i = 0; i < this.files.length; i++){
        let FileLists = $('<div/>', {class: 'inline-flex items-center justify-center mr-2 text-gray-200 border border-gray-50 px-2 py-1 rounded-md mb-2'}), fileName = $('<span/>', {class: 'mr-2',text: this.files.item(i).name});
        FileLists.append(fileName).append('<span class="file-delete hover:text-red-600"><i class="fa-solid fa-xmark text-sm"></i></span>');
        $("#filesList").append(FileLists);
    }

    for (let file of this.files) {
		dt.items.add(file);
	}

    this.files = dt.files;

    $('span.file-delete').click(function(){
		let name = $(this).next('span.name').text()
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			if(name === dt.items[i].getAsFile().name){
				dt.items.remove(i);
				continue;
			}
		}
		document.getElementById('file-upload').files = dt.files;
	});
});
</script>
@include("partials.footer")