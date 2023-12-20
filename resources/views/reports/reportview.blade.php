@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <a href="{{ route('auth.report.view', $items->uuid) }}" class="mb-2 inline-flex items-center justify-center group">
                <svg class="flex-shrink-0 w-7 h-7 text-gray-100 mr-2 transition duration-75 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider group-hover:text-gray-300">{{ ucwords($items->project_name) }}</h2>
            </a>
        </div>
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div class="min-h-[6rem] rounded bg-gray-800 dark:bg-gray-800 p-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-3xl font-medium text-gray-200 hover:underline tracking-wide m-2">{{ ucwords($items->title) }}</h2>
                </div>
                <div class="mb-4">
                    <p class="text-gray-100 tracking-wide text-lg text-justify m-2">{{ $items->description }} </p>
                </div>
                <div class="mb-4">
                    <div class="flex flex-wrap items-start justify-start">
                        @php
                            $image = explode(',', $items->images)
                        @endphp
                        @foreach ($image as $item)
                            <img class="xl:h-36 w-[45%] md:w-1/4 xl:w-1/6 rounded-lg m-2 border border-gray-600" src="{{ asset('assets/projects/reports/'. $item) }}" alt="{{ $item }}">
                        @endforeach
                    </div>
                </div>
                <div class="mb-4 px-0 xl:px-20">
                    <div class="flex items-start py-2.5 mb-2">
                        <img class="h-10 w-10 rounded-full mr-3 hidden xl:block" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg">
                        <div class="px-4 py-2 bg-gray-200 rounded-lg w-full">
                            <form>
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" name="comment" rows="4" class="w-full px-0 text-md text-gray-900 bg-gray-200 border-0 focus:ring-0 resize-none" placeholder="Write a comment..." ></textarea>
                                <div class="border-t border-gray-600 p-2 text-end">
                                    <button type="submit" class="px-4 py-2.5 bg-blue-700 rounded-lg text-gray-200">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="divide-y min-h-96 overflow-y-auto">
                        <div class="flex items-start py-2.5">
                            <img class="h-10 w-10 rounded-full" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg">
                            <div class="px-4 rounded-lg w-full">
                                <h2 class="text-gray-200 text-xl font-bold tracking-wider">Juan Dela Cruz</h2>
                                <p class="text-gray-200 text-md">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="flex items-start py-2.5">
                            <img class="h-10 w-10 rounded-full" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg">
                            <div class="px-4 rounded-lg w-full">
                                <h2 class="text-gray-200 text-xl font-bold tracking-wider">Juan Dela Cruz</h2>
                                <p class="text-gray-200 text-md">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="flex items-start py-2.5">
                            <img class="h-10 w-10 rounded-full" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg">
                            <div class="px-4 rounded-lg w-full">
                                <h2 class="text-gray-200 text-xl font-bold tracking-wider">Juan Dela Cruz</h2>
                                <p class="text-gray-200 text-md">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="flex items-start py-2.5">
                            <img class="h-10 w-10 rounded-full" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg">
                            <div class="px-4 rounded-lg w-full">
                                <h2 class="text-gray-200 text-xl font-bold tracking-wider">Juan Dela Cruz</h2>
                                <p class="text-gray-200 text-md">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("partials.footer")