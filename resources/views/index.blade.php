<x-layout>
  <!-- RECENT BLOG POSTS -->
  <section class="mt-[30px]">
    @if ($recentsPosts->count() >= 3)
      <h2 class="text-2xl font-bold mb-8">Recent blog posts</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Card Principal (Esquerda) -->
        <a href="/post/{{ $recentsPosts[0]->slug }}" class="lg:col-span-2 flex flex-col bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer">
          <div class="relative w-full h-auto overflow-hidden">
            <img 
              src="https://images.unsplash.com/photo-1497215842964-222b430dc094?w=800&h=400&fit=crop" 
              alt="{{ $recentsPosts[0]->title }}" 
              class="w-full h-full object-cover"
            >
          </div>
          <div class="p-6 flex flex-col gap-4 flex-1">
            <div class="flex items-center gap-2 text-sm">
              <span class="text-purple-600 font-medium">{{ $recentsPosts[0]->author }}</span>
              <span class="text-gray-400">•</span>
              <span class="text-gray-500">{{ $recentsPosts[0]->created_at->format('d M Y') }}</span>
            </div>
            <div class="flex-1">
              <h3 class="text-2xl font-bold mb-2">{{ $recentsPosts[0]->title }}</h3>
              <p class="text-gray-600 mb-4">{{ $recentsPosts[0]->content }}</p>
            </div>
            <div class="flex flex-wrap gap-2 mb-2">
              @foreach ($recentsPosts[0]->tags as $tag)
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">{{ $tag }}</span>
              @endforeach
            </div>
            <div class="flex justify-end mt-auto">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                <path d="M7 17L17 7M7 7h10v10"/>
              </svg>
            </div>
          </div>
        </a>

        <!-- Cards Secundários (Direita) -->
        <div class="flex flex-col gap-6">
          <!-- Card 1 -->
          <a href="/post/{{ $recentsPosts[1]->slug }}" class="flex flex-col bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer">
            <div class="relative w-full h-48 overflow-hidden">
              <img 
                src="{{ $recentsPosts[1]->image }}" 
                alt="{{ $recentsPosts[1]->title }}" 
                class="w-full h-full object-cover"
              >
            </div>
            <div class="p-4 flex flex-col gap-3">
              <div class="flex items-center gap-2 text-sm">
                <span class="text-purple-600 font-medium">{{ $recentsPosts[1]->author }}</span>
                <span class="text-gray-400">•</span>
                <span class="text-gray-500">{{ $recentsPosts[1]->created_at->format('d M Y') }}</span>
              </div>
              <h3 class="text-xl font-bold">{{ $recentsPosts[1]->title }}</h3>
              <p class="text-gray-600 text-sm line-clamp-2">{{ $recentsPosts[1]->content }}</p>
              <div class="flex flex-wrap gap-2">
                @foreach ($recentsPosts[1]->tags as $tag)
                  <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">{{ $tag }}</span>
                @endforeach
              </div>
            </div>
          </a>

          <!-- Card 2 -->
          <a href="/post/{{ $recentsPosts[2]->slug }}" class="flex flex-col bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer">
            <div class="relative w-full h-48 overflow-hidden">
              <img 
                src="{{ $recentsPosts[2]->image }}" 
                alt="{{ $recentsPosts[2]->title }}" 
                class="w-full h-full object-cover"
              >
            </div>
            <div class="p-4 flex flex-col gap-3">
              <div class="flex items-center gap-2 text-sm">
                <span class="text-purple-600 font-medium">{{ $recentsPosts[2]->author }}</span>
                <span class="text-gray-400">•</span>
                <span class="text-gray-500">{{ $recentsPosts[2]->created_at->format('d M Y') }}</span>
              </div>
              <h3 class="text-xl font-bold">{{ $recentsPosts[2]->title }}</h3>
              <p class="text-gray-600 text-sm line-clamp-2">{{ $recentsPosts[2]->content }}</p>
              <div class="flex flex-wrap gap-2">
                @foreach ($recentsPosts[2]->tags as $tag)
                  <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">{{ $tag }}</span>
                @endforeach
              </div>
            </div>
          </a>
        </div>
      </div>
    @endif
    <!-- ALL BLOG POSTS -->
  <section class="mt-16">
    @if ($posts->count() > 0)
      <h2 class="text-2xl font-bold mb-8">All blog posts</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
          <x-shared.post.card-posts
            :title="$post->title"
            :slug="$post->slug"
            :content="$post->content"
            :image="$post->image"
            :author="$post->author"
            :date="$post->created_at->format('d M Y')"
            :tags="$post->tags"
          />
        @endforeach
      </div>
      <div class="mt-8">
        {{ $posts->links() }}
      </div>
    @else
      <p class="text-center text-gray-500">No posts found</p>
    @endif
  </section>
</x-layout>