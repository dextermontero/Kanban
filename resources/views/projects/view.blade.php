@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <a href="{{ route('auth.projects') }}" class="mb-2 inline-flex items-center justify-center group">
                <svg class="flex-shrink-0 w-6 h-6 text-gray-100 mr-2 transition duration-75 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider group-hover:text-gray-300">{{ ucwords($data->project_name) }} </h2>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-gray-800 rounded flex flex-col">
                <div class="flex flex-col xl:flex-row items-center justify-between px-5 py-2.5">
                    <svg class="flex-shrink-0 w-10 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/>
                    </svg>
                    <div class="flex flex-col items-center justify-center mt-1 xl:mt-0">
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">{{ $tCounts }}</h2>
                        <span class="text-gray-100 leading-relaxed text-xl font-medium">Tasks</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 rounded flex flex-col">
                <div class="flex flex-col xl:flex-row items-center justify-between px-5 py-2.5">
                    <svg class="flex-shrink-0 w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512">
                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                    </svg>
                    <div class="flex flex-col items-center justify-center mt-1 xl:mt-0">
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">{{ $mCounts }}</h2>
                        <span class="text-gray-100 leading-relaxed text-xl font-medium">Members</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 rounded flex flex-col">
                <div class="flex flex-col xl:flex-row items-center justify-between px-5 py-2.5">
                    <svg class="flex-shrink-0 w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 384 512">
                        <path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM305 273L177 401c-9.4 9.4-24.6 9.4-33.9 0L79 337c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L271 239c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                    </svg>
                    <div class="flex flex-col items-center justify-center mt-1 xl:mt-0">
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">0</h2>
                        <span class="text-gray-100 leading-relaxed text-xl font-medium">Reports</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-1 xl:gap-4 mb-1 xl:mb-0">
                <div class="xl:col-span-2 bg-gray-800 mb-4 px-5 py-2.5 rounded w-full relative h-[31.25rem]">
                    <div class="absolute block top-0 right-0 left-2 bottom-2 p-3">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="flex flex-col min-h-[20rem] rounded bg-gray-800 mb-4">
                    <h2 class="text-2xl text-gray-100 font-medium tracking-wider py-2.5 px-5">Recent Logs</h2>
                    <div class="tracking-wider px-2 h-[25rem] overflow-y-auto">
                        <a href="#filter" class="block group px-1">
                            <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                                <div class="inline-flex items-center justify-center">
                                    <img class="w-10 h-10 rounded-2xl mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                    <div class="flex flex-col items-start justify-start">
                                        <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                        <span class="text-gray-300 text-sm font-medium">Moved by Juan Dela Cruz</span>
                                    </div>
                                </div>
                                <div class="text-gray-300">
                                    {{ Carbon\Carbon::parse('2023-11-16 12:00:00')->diffForHumans()}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('auth.organization.view', $data->uuid)}}" class="flex items-center justify-center text-gray-200 mt-2 group mb-2">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-200 mr-1 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                        <span class="text-lg group-hover:text-blue-500">View</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-auto block py-8 pt-6 px-9 bg-gray-800 rounded-lg shadow">
            <h2 class="text-2xl text-gray-100 font-medium tracking-wider mb-4">Recent Member</h2>
            <div class="overflow-x-auto">
                <table class="w-full my-0 align-middle text-gray-200 border-neutral-200">
                    <thead class="align-bottom">
                        <tr class="font-semibold text-[0.95rem] tracking-wider uppercase">
                            <th class="pb-3 text-start min-w-[170px]">Name</th>
                            <th class="pb-3 text-center min-w-[120px]">Role</th>
                            <th class="pb-3 text-center min-w-[120px]">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $list)
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
                                    <span class="font-medium text-md/normal tracking-wider">{{ ucwords($list->status) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/lineChart')
@include("partials.footer")