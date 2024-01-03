@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <a href="{{ route('auth.report') }}" class="mb-2 inline-flex items-center justify-center group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-100 mr-2 transition duration-75 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                    <h2 class="text-gray-100 text-3xl font-medium tracking-wider">{{ $data->project_name }} Reports</h2>
                </a>
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
        
        @if (count($items) > 0)
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
                @foreach ($items as $item)
                    <a href="{{ route('auth.report.item', $item->id) }}" class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="block text-lg font-medium text-gray-200 hover:underline tracking-wide">{{ ucwords($item->title) }}</h2>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-100 tracking-wide">{{ Str::limit($item->description, 125) }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="inline-flex items-center justify-center">
                                <img data-tooltip-target="hover_img_{{$item->id}}" data-tooltip-placement="bottom" src="{{ asset('assets/profiles/'. $item->profile_img)}}" class="rounded-full h-8 w-8">
                                <div id="hover_img_{{$item->id}}" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                                    {{ ucwords($item->firstname) }} {{ ucwords($item->lastname) }}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="inline-flex items-center">
                                <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-clock mr-1"></i> {{ $item->updated_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $items->links() }}
        @else
            <div class="flex items-center justify-center h-[30rem] mb-4 rounded dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    No available reports
                </p>
            </div>
        @endif
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
                <button type="button" id="close_modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add_report_modal">
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
                        <label for="report_title" class="block mb-2 text-gray-200 tracking-wider text-lg font-medium">Report Title <span class="text-red-500">*</span></label>
                        <input type="text" id="report_title" name="report_title" class="w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400" placeholder="Report Title">
                    </div>
                    <div class="inline-flex items-center justify-center text-gray-100 font-medium text-lg tracking-wider mb-3">
                        <i class="fa-solid fa-file-lines mr-3 text-gray-100"></i>
                        Description&nbsp;<span class="text-red-500">*</span>
                    </div>
                    <p class="text-base leading-relaxed text-gray-300">
                        <textarea rows="10" id="description" name="description" class="block w-full rounded-md bg-gray-600 text-gray-200 placeholder-gray-200 focus:ring-gray-600 focus:border-gray-400 resize-none" placeholder="Report Description"></textarea>
                    </p>
                    <div class="mt-3">
                        <label for="file-upload" class="text-gray-200 inline-flex items-center group mb-2 hover:cursor-pointer">
                            <svg class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500 transition duration-75 group-hover:text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M364.2 83.8c-24.4-24.4-64-24.4-88.4 0l-184 184c-42.1 42.1-42.1 110.3 0 152.4s110.3 42.1 152.4 0l152-152c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-152 152c-64 64-167.6 64-231.6 0s-64-167.6 0-231.6l184-184c46.3-46.3 121.3-46.3 167.6 0s46.3 121.3 0 167.6l-176 176c-28.6 28.6-75 28.6-103.6 0s-28.6-75 0-103.6l144-144c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-144 144c-6.7 6.7-6.7 17.7 0 24.4s17.7 6.7 24.4 0l176-176c24.4-24.4 24.4-64 0-88.4z"/>
                            </svg> 
                            Attach File
                        </label>
                        <input type="file" id="file-upload" name='reportFiles[]' class="hidden" accept=".jpg,.jpeg,.png" multiple > 
                        <div id="files-area" class="mb-2 min-h-0 max-h-14 xl:min-h-0 xl:max-h-32 overflow-y-auto">
                            <span id="filesList"></span>
                        </div>
                        <button type="button" id="addReport" class="mt-2 block w-full rounded-md bg-blue-600 font-md font-medium text-gray-200 hover:bg-blue-700 px-2 py-2.5">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const dt = new DataTransfer();
$("#file-upload").on('change', function(e){
    for(var i = 0; i < this.files.length; i++){
        var ext = this.files[i].name.substr(-3);
        if(ext !== "jpeg" && ext !== "jpg" && ext !== "png" && ext !== "JPEG" && ext !== "JPG" && ext !== "PNG"){
            toastr.info('Image Format: jpeg/jpg and png only');
            return false;
        }
    }

	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<div/>', {class: 'flex flex-wrap items-center justify-center mr-2 text-gray-200 border border-gray-50 px-2 py-1 rounded-md mb-2'}),
        fileName = $('<span/>', {class: 'name mr-2', text: this.files.item(i).name});
        fileBloc.append('<span class="file-delete hover:text-red-600 hover:cursor-pointer order-last disabled"><i class="fa-solid fa-xmark text-sm"></i></span>').append(fileName);
		$("#files-area > #filesList").append(fileBloc);
	};

    for (let file of this.files) {
        var ext = file.name.substr(-3);
        if(ext !== "jpeg" && ext !== "jpg" && ext !== "png" && ext !== "JPEG" && ext !== "JPG" && ext !== "PNG"){
        }else{
            dt.items.add(file);
        }
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

$(document).ready(function() {
    $('#addReport').click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        var totalImages = dt.files.length;
        var token = $('input[type="hidden"]').val();
        var id = "{{ $data->id }}";
        var uuid = "{{ $data->uuid }}";
        var report = $('#report_title').val();
        var description = $('#description').val();
        let files = $('#file-upload')[0];
        for (let i = 0; i < totalImages; i++) {
            formData.append('files' + i, files.files[i]);
        }
        formData.append('totalImages', totalImages);
        formData.append('_token', token);
        formData.append('id', id);
        formData.append('uuid', uuid);
        formData.append('report', report);
        formData.append('description', description);
        if(report !== "" && description !== ""){
            $.ajax({
                type: 'POST',
                url: "{{ route('add.report') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $('input').addClass('disabled:opacity-25');
                    $('textarea').addClass('disabled:opacity-25');
                    $('#report_title').attr('disabled', 'disabled');
                    $('#description').attr('disabled', 'disabled');
                    $('#file-upload').attr('disabled', 'disabled');
                    $('#addReport').attr('disabled', 'disabled');
                    $('#addReport').removeClass('hover:bg-blue-800');
                    $('#addReport').addClass('disabled:opacity-25');
                    $('#close_modal').addClass('disabled:opacity-25');
                    $('#close_modal').attr('disabled', 'disabled');
                },
                success: function(data){
                    console.log(data);
                    if(data.status === "success"){
                        toastr.success(data.message);
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                    }else{
                        toastr.warning(data.message);
                    }
                    setTimeout(() => {
                        $('input').removeClass('disabled:opacity-25');
                        $('textarea').removeClass('disabled:opacity-25');
                        $('#report_title').removeAttr('disabled', 'disabled');
                        $('#description').removeAttr('disabled', 'disabled');
                        $('#file-upload').removeAttr('disabled', 'disabled');
                        $('#addReport').removeAttr('disabled', 'disabled');
                        $('#addReport').addClass('hover:bg-blue-800');
                        $('#addReport').removeClass('disabled:opacity-25');
                        $('#close_modal').removeClass('disabled:opacity-25');
                        $('#close_modal').removeAttr('disabled', 'disabled');
                    }, 3000);
                }
            });
        }else{
            toastr.info('Fill up all required fields!');
        }
    });
});
</script>
@include("partials.footer")