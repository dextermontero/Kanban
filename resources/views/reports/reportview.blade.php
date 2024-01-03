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
                    <div class="popup-gallery flex flex-wrap items-start justify-start">
                        @php
                            $image = explode(',', $items->images)
                        @endphp
                        @foreach ($image as $item)
                            @if ($item !== '')
                                <a href="{{ asset('assets/projects/reports/'. $item) }}" alt="{{ $item }}">
                                    <img class="xl:h-36 xl:w-48 w-38 h-20  rounded-lg m-2 border border-gray-600" src="{{ asset('assets/projects/reports/'. $item) }}" alt="{{ $item }}">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="mb-4 px-0 xl:px-20">
                    <div class="flex items-start py-2.5 mb-2">
                        <img class="h-10 w-10 rounded-full mr-3 hidden xl:block" src="{{ asset('assets/profiles/'. $profile->profile_img) }}" alt="{{ ucwords($profile->firstname) }} {{ ucwords($profile->lastname) }}">
                        <div class="px-4 py-2 bg-gray-200 rounded-lg w-full">
                            <form action="{{ route('report.comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="report_id" value="{{ $items->id }}" readonly>
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" name="comment" rows="4" class="w-full px-0 text-md text-gray-900 bg-gray-200 border-0 focus:ring-0 resize-none" placeholder="Write a comment..." ></textarea>
                                <div class="border-t border-gray-600 p-2 text-end">
                                    <button type="submit" class="px-4 py-2.5 bg-blue-700 rounded-lg text-gray-200">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="divide-y min-h-96 overflow-y-auto">
                        @if (count($comments) > 0)
                            @foreach ($comments as $item)
                                <div class="flex items-start py-3">
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('assets/profiles/'. $item->profile_img) }}" alt="{{ ucwords($item->firstname) }} {{ ucwords($item->lastname) }}">
                                    <div class="px-4 rounded-lg w-full">
                                        <div class="flex items-center justify-start">
                                            <h2 class="text-gray-200 text-xl font-bold tracking-wider mr-2">{{ ucwords($item->firstname) }} {{ ucwords($item->lastname) }} </h2> 
                                            <span class="text-gray-300 text-md">&bullet;  {{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-200 text-md text-left">{{ $item->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image </a> could not be loaded.',
		}
	});
});
</script>
@include("partials.footer")