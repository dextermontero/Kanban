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
                                @if ($project->status === "active")
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">In Progress</span>
                                @endif
                            </div>
                            <div class="inline-flex items-center">
                                <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-1 rounded">
                                    <i class="fa-solid fa-clock mr-1"></i> {{ number_format(Carbon\Carbon::now()->diffInDays($project->end_date)) }} days left
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