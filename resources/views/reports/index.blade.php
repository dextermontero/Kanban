@include("partials.header", [$title])
<div class="p-4 xl:ml-64">
    <div class="py-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-row justify-between items-center mb-5">
            <div class="mb-2">
                <h2 class="text-gray-100 text-3xl font-medium tracking-wider">Project Reports</h2>
            </div>
        </div>
        @if ($count > 0)
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-4">
                @foreach ($list as $project)
                    <a href="{{ route('auth.report.view', $project->uuid) }}" class="min-h-[6rem] block rounded bg-gray-800 dark:bg-gray-800 p-4 hover:cursor-pointer border border-gray-800 hover:border-gray-400">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-medium text-gray-200 tracking-wide">{{ $project->project_name }}</h2>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-100 tracking-wide">{{ Str::limit($project->description, 125) }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="inline-flex items-center justify-center">
                                <img data-tooltip-target="hover_img_1" data-tooltip-placement="bottom" src="https://png.pngtree.com/png-vector/20220814/ourlarge/pngtree-rounded-vector-icon-in-flat-black-and-white-for-user-profile-vector-png-image_19500858.jpg" class="rounded-full h-8 w-8">
                                <div id="hover_img_1" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip tracking-wider">
                                    Juan Dela Cruz
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="inline-flex items-center">
                                <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-clock mr-1"></i> {{ number_format(Carbon\Carbon::parse($project->end_date)->diffInDays(now()->toDateString())) }} days left
                                </span>
                            </div>
                        </div>
                    </a>                
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center h-[30rem] mb-4 rounded dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    No available report
                </p>
            </div>
        @endif
    </div>
</div>
@include("partials.footer")