@props([
    'title' => '',
    'content' => '',
    'image' => '',
    'author' => '',
    'slug' => '',
    'date' => '',
    'tags' => [],
])


<a href="/post/{{ $slug }}" class="flex flex-col bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer">
        <div class="relative w-full h-48 overflow-hidden">
          <img 
            src="{{ $image }}" 
            alt="{{ $title }}" 
            class="w-full h-full object-cover"
          >
        </div>
        <div class="p-4 flex flex-col gap-3">
          <div class="flex items-center gap-2 text-sm">
            <span class="text-purple-600 font-medium">{{ $author }}</span>
            <span class="text-gray-400">•</span>
            <span class="text-gray-500">{{ $date }}</span>
          </div>
          <h3 class="text-xl font-bold">{{ $title }}</h3>
          <p class="text-gray-600 text-sm line-clamp-2">{{ $content }}</p>
          <div class="flex flex-wrap gap-2">
            @foreach($tags as $tag)
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">{{ $tag }}</span>
            @endforeach
          </div>
          <div class="flex justify-end mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
              <path d="M7 17L17 7M7 7h10v10"/>
            </svg>
          </div>
        </div>
</a>