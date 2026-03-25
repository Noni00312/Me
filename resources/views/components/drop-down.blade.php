@props([
  'selection_list' => ['Web Developent', 'Mobile App Development', 'Desktop App Development', 'UI/UX Design'],
  'placeholder' => 'Select items'
])

<div class="focus-within:border-info outline-none border border-gray-300 rounded-md relative">
  <div class="flex items-center gap-2 px-3">
    <input type="text" id="select-input" class=" w-full py-2 border-none outline-none placeholder:text-sm cursor-default" placeholder="Select items" readonly>
    @svg('heroicon-o-chevron-down', 'w-[24px] h-[24px] text-gray-300')
  </div>
  <div class="dropdown absolute w-full top-full left-0  rounded-md shadow-lg shadow-gray-300/10 border border-gray-300  mt-2 bg-white p-1  hidden">
    <div class="flex flex-col gap-2 max-h-[10rem] ">
      <input type="search" id="search" class="sticky top-0 text-surf-bg bg-white  border-2 border-gray-300 outline-none focus:border-info w-full py-2 placeholder:text-sm placeholder:text-gray-500 px-3 rounded-sm" placeholder="Search item" >
      <div class="overflow-y-auto no-scrollbar">
        @if (isset($selection_list))
          @foreach ($selection_list as $key => $option)
              <button data-key='{{ $key }}' data-value='{{ $option }}' class="dropdown-item w-full px-3 py-2 text-surf-bg cursor-pointer hover:bg-info hover:text-white transition-all duration-150 east-in-out rounded-sm ">{{ $option }}</button>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>

<script>
  const searchInput = document.getElementById('search');
  const selectInput = document.getElementById('select-input');
  const dropDown = document.querySelector('.dropdown');

  function handleInputEvent(event) {
    if(event.type === 'input' || event.type === 'focus') {
        dropDown.classList.remove('hidden');
    } else if(event.type === 'focusout') {
        const relatedTarget = event.relatedTarget;

        if(relatedTarget === searchInput || relatedTarget && relatedTarget.closest('.dropdown')) {
          return;
        } else {
            dropDown.classList.add('hidden');
        }
    }
  }

  document.querySelectorAll('.dropdown-item').forEach(button => {
    button.addEventListener('mousedown', (e) => {
      e.preventDefault();
      const key = button.getAttribute('data-key');
      const value = button.getAttribute('data-value');

      selectInput.value = value;

      dropDown.classList.add('hidden');
      selectInput.blur();
    });
  });

  selectInput.addEventListener('input', handleInputEvent);
  selectInput.addEventListener('focus', handleInputEvent);
  selectInput.addEventListener('focusout', handleInputEvent);

  searchInput.addEventListener('mousedown', (e) => {
    e.stopPropagation();
  })
</script>