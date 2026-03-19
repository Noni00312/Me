@props([
    'title' => 'Sample Card Title',
    'description' => 'This is a sample description for the card component. It can be replaced with any content you like.',
    'image' => 'https://via.placeholder.com/400x200',
    'date_created' => 'Wed, 20 Sep 2023 14:00:00 GMT',
    'project_type' => 'Web Development',
])

<a href="#" class="p-4 rounded-lg bg-surf-30">
    <span class="px-3 py-2 text-xs font-semibold bg-error-light text-error-dark rounded-sm mb-3 inline-block">{{ $project_type }}</span>
    <h3 class="font-semibold text-justify mb-1">{{ $title }}</h3>
    <p class="text-gray-400 text-xs line-clamp-3 text-justify">{{ $description }}</p>
    <button class="p-2 rounded-md bg-surf-bg flex gap-2 w-full cursor-pointer group hover:bg-surf-10 transition-colors duration-150 ease-in-out mt-4">
        <img src="{{ asset('img/sample-link-placeholder.jpg') }}" alt="{{ $title }}" class="w-[57px] h-full rounded-sm">
        <span class="text-sm font-medium">{{ __($title) }}</span>
    </button>
    <div class="w-full h-[2px] bg-gray-300 my-3 rounded-xs"></div>
    <div class="mt-2 text-sm text-gray-500 flex items-center gap-2 justify-end">
        @svg('heroicon-o-calendar-days', 'w-[24px] h-[24px] text-gray-400')
        <span>{{ $date_created }}</span>
    </div>
</a>
