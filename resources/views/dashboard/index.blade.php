@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-gray-800 rounded flex flex-col">
                <div class="flex flex-col xl:flex-row items-center justify-between px-5 py-2.5">
                    <svg class="flex-shrink-0 w-10 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/>
                    </svg>
                    <div class="flex flex-col items-center justify-center mt-1 xl:mt-0">
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">{{ number_format($pCount) }}</h2>
                        <span class="text-gray-100 leading-relaxed text-xl font-medium">Projects</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 rounded flex flex-col">
                <div class="flex flex-col xl:flex-row items-center justify-between px-5 py-2.5">
                    <svg class="flex-shrink-0 w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512">
                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                    </svg>
                    <div class="flex flex-col items-center justify-center mt-1 xl:mt-0">
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">{{ number_format($mCount) }}</h2>
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
                        <h2 class="text-gray-100 text-2xl xl:text-3xl leading-relaxed font-bold font-mono mr-2 xl:mr-0">{{ number_format($cCount) }}</h2>
                        <span class="text-gray-100 leading-relaxed text-xl font-medium">Complete</span>
                    </div>
                </div>
            </div>
        </div>
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
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
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
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
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
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                <div class="flex flex-col items-start justify-start">
                                    <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                    <span class="text-gray-300 text-sm font-medium">Added by Juan Dela Cruz</span>
                                </div>
                            </div>
                            <div class="text-gray-300">
                                {{ Carbon\Carbon::parse('2023-11-16 10:00:00 AM')->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                <div class="flex flex-col items-start justify-start">
                                    <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                    <span class="text-gray-300 text-sm font-medium">Deleted by Juan Dela Cruz</span>
                                </div>
                            </div>
                            <div class="text-gray-300">
                                {{ Carbon\Carbon::parse('2023-11-16 7:00:00 AM')->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                <div class="flex flex-col items-start justify-start">
                                    <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                    <span class="text-gray-300 text-sm font-medium">Edited by Juan Dela Cruz</span>
                                </div>
                            </div>
                            <div class="text-gray-300">
                                {{ Carbon\Carbon::parse('2023-11-16 3:00:00 AM')->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                <div class="flex flex-col items-start justify-start">
                                    <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                    <span class="text-gray-300 text-sm font-medium">Edited by Juan Dela Cruz</span>
                                </div>
                            </div>
                            <div class="text-gray-300">
                                {{ Carbon\Carbon::parse('2023-11-16 2:00:00 AM')->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                    <a href="#filter" class="block group px-1">
                        <div class="flex items-center justify-between group-hover:bg-gray-600 px-2 py-2.5 rounded-lg">
                            <div class="inline-flex items-center justify-center">
                                <img class="w-10 h-10 rounded-full mr-2" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                <div class="flex flex-col items-start justify-start">
                                    <h2 class="text-gray-200 font-semibold text-md">Title Recent</h2>
                                    <span class="text-gray-300 text-sm font-medium">Edited by Juan Dela Cruz</span>
                                </div>
                            </div>
                            <div class="text-gray-300">
                                {{ Carbon\Carbon::parse('2023-11-16 1:00:00 AM')->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                </div>
                <a href="#viewAll" class="flex items-center justify-center text-gray-200 mt-2 group mb-2">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-200 mr-1 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                    <span class="text-lg group-hover:text-blue-500">View</span>
                </a>
            </div>
        </div>
        <div class="flex flex-col items-start justify-start mb-4 rounded bg-gray-800">
            <h2 class="text-2xl text-gray-100 font-medium tracking-wider py-2.5 px-5">Project Status</h2>
            <div class="w-full tracking-wider py-2.5 px-5 mb-4">
                <div class="relative overflow-x-auto shadow-md ">
                    <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-md text-gray-300 uppercase ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Project
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Progress
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pCount > 0)
                                <tr class="odd:bg-gray-700 even:bg-gray-800 border-b border-gray-600 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-start">
                                            <img class="w-10 h-10 rounded-full mr-3" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                            <p class="text-lg text-gray-200">Project Title</p>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="bg-gray-400 text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full" style="width: 25%"> 25%</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-green-400">
                                        In Process
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('auth.project.view', now()->timestamp) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="odd:bg-gray-700 even:bg-gray-800 border-b border-gray-600 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-start">
                                            <img class="w-10 h-10 rounded-full mr-3" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                            <p class="text-lg text-gray-200">Project Title</p>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="bg-orange-400 text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-green-400">
                                        In Process
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('auth.project.view', now()->timestamp) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="odd:bg-gray-700 even:bg-gray-800 border-b border-gray-600 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-start">
                                            <img class="w-10 h-10 rounded-full mr-3" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                            <p class="text-lg text-gray-200">Project Title</p>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 65%"> 65%</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-green-400">
                                        In Process
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('auth.project.view', now()->timestamp) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="odd:bg-gray-700 even:bg-gray-800 border-b border-gray-600 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-start">
                                            <img class="w-10 h-10 rounded-full mr-3" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                            <p class="text-lg text-gray-200">Project Title</p>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 65%"> 65%</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-orange-400">
                                        On Hold
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('auth.project.view', now()->timestamp) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="odd:bg-gray-700 even:bg-gray-800 border-b border-gray-600 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-start">
                                            <img class="w-10 h-10 rounded-full mr-3" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" alt="user photo">
                                            <p class="text-lg text-gray-200">Project Title</p>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> 100%</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-blue-500">
                                        Completed
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('auth.project.view', now()->timestamp) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class=" text-white text-center text-lg p-5">No Available Projects</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/lineChart')
@include("partials.footer")