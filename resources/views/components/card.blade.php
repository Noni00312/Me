@props([
    'title' => 'Sample Card Title',
    'description' => 'This is a sample description for the card component. It can be replaced with any content you like.',
    'status' => 'Not Started',
    'progress' => 20,
    'link' => 'https://www.kshlerin.biz/dolores-ut-hic-eum-laudantium-deleniti-quia-quis',
    'project_type' => 'Web Development',
    'date_created' => 'Wed, 20 Sep 2023 14:00:00 GMT',
])

<div class="p-4 rounded-lg bg-surf-30 border-1 border-transparent hover:border-1 hover:border-white transition-color duration-150 ease-in-out">
    <div class="flex justify-between items-center">
        <span class="px-3 py-2 text-xs font-semibold bg-error-light text-error-dark rounded-sm mb-3 inline-block">{{ $project_type }}</span>
        <span class="text-xs font-semibold mb-3
            @switch($status)
              @case('Not Started')
                text-error font-semibold fill-error-light drop-shadows-xs
                @break
              @case('In Progress')
                text-info font-semibold fill-info-light drop-shadows-xs
                @break
              @case('On Hold')
                text-warn font-semibold fill-warn-light drop-shadows-xs
                @break
              @case('Completed')
                text-success font-semibold fill-success-light drop-shadows-xs
                @break
            @endswitch
        ">{{ __($status) }}</span>
    </div>
    <h3 class="font-semibold text-left line-clamp-2 mb-1">{{ $title }}</h3>
    <p class="text-gray-400 text-xs line-clamp-3 text-justify">{{ $description }}</p>
    @if($link != '')
      <button class="p-2 rounded-md bg-surf-bg flex gap-2 w-full cursor-pointer group hover:bg-surf-10 transition-colors duration-150 ease-in-out mt-4">
          <img src="{{ asset('img/sample-link-placeholder.jpg') }}" alt="{{ $title }}" class="w-[57px] h-full rounded-sm">
          <p class="text-gray-400 text-xs text-justify">{{ __($link) }}</p>
      </button>
    @endif
    <div class="flex gap-4 items-center mt-2">
      <div class="w-full h-[4px] bg-success-light my-3 rounded-xs flex gap-2 items-center">
        <span class="h-full bg-success rounded-xs "
          style="width: {{ min(max($progress, 0), 100) }}%"
        ></span>
      </div>
      <span class="text-xs text-white font-semibold">{{ __($progress) }}%</span>
    </div>
    <div class="mt-2 text-sm text-gray-500 flex items-center gap-2 justify-end">
        @svg('heroicon-o-calendar-days', 'w-[24px] h-[24px] text-gray-400')
        <span>{{ $date_created }}</span>
    </div>
</div>
