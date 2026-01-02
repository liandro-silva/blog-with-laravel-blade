<x-layout>
  <article class="mt-[30px] max-w-4xl mx-auto">
    <!-- Header do Post -->
    <header class="mb-8">
      <div class="mb-6">
        <a href="/" class="text-gray-600 hover:text-gray-900 text-sm font-medium inline-flex items-center gap-2 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m12 19-7-7 7-7"/>
            <path d="M19 12H5"/>
          </svg>
          Back to posts
        </a>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">{{ $post->title }}</h1>
        <div class="w-20 h-1 bg-gray-600"></div>
      </div>

      <!-- Meta informações -->
      <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-6">
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <polyline points="12 6 12 12 16 14"/>
          </svg>
          <span>{{ $post->created_at->format('F d, Y') }}</span>
        </div>
        @if($post->tags && count($post->tags) > 0)
          <div class="flex items-center gap-2 flex-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
              <line x1="7" y1="7" x2="7.01" y2="7"/>
            </svg>
            @foreach($post->tags as $tag)
              <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">{{ $tag }}</span>
            @endforeach
          </div>
        @endif
      </div>

      <!-- Imagem destacada -->
      @if($post->image)
        <div class="relative w-full h-96 mb-8 rounded-lg overflow-hidden">
          <img 
            src="{{ $post->image }}" 
            alt="{{ $post->title }}" 
            class="w-full h-full object-cover"
          >
        </div>
      @endif
    </header>

    <!-- Conteúdo do Post -->
    <div class="post-content">
      {!! $post->content !!}
    </div>

    <!-- Footer do Post -->
    <footer class="mt-12 pt-8 border-t border-gray-200">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
          <p class="text-sm text-gray-600 mb-2">Published on {{ $post->created_at->format('F d, Y') }}</p>
          @if($post->updated_at && $post->updated_at->ne($post->created_at))
            <p class="text-xs text-gray-500">Last updated on {{ $post->updated_at->format('F d, Y') }}</p>
          @endif
        </div>
        <div class="flex gap-3">
          <a 
            href="/post/{{ $post->slug }}/edit" 
            class="px-4 py-2 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-colors duration-300"
          >
            Edit post
          </a>
          <a 
            href="/" 
            class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-300 transition-colors duration-300"
          >
            Back to home
          </a>
        </div>
      </div>
    </footer>
  </article>

  <style>
    .post-content {
      line-height: 1.75;
      color: #374151;
    }
    
    .post-content p {
      margin-bottom: 1.5rem;
      line-height: 1.75;
    }
    
    .post-content h1 {
      font-size: 2.25rem;
      font-weight: 700;
      margin-top: 2rem;
      margin-bottom: 1rem;
      color: #111827;
      line-height: 1.2;
    }
    
    .post-content h2 {
      font-size: 1.875rem;
      font-weight: 700;
      margin-top: 2rem;
      margin-bottom: 1rem;
      color: #111827;
      line-height: 1.3;
    }
    
    .post-content h3 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-top: 1.5rem;
      margin-bottom: 0.75rem;
      color: #111827;
      line-height: 1.4;
    }
    
    .post-content ul {
      margin: 1.5rem 0;
      padding-left: 1.5rem;
      list-style-type: disc;
    }
    
    .post-content ol {
      margin: 1.5rem 0;
      padding-left: 1.5rem;
      list-style-type: decimal;
    }
    
    .post-content li {
      margin: 0.5rem 0;
      line-height: 1.75;
    }
    
    .post-content ul ul,
    .post-content ol ol,
    .post-content ul ol,
    .post-content ol ul {
      margin: 0.5rem 0;
      padding-left: 1.5rem;
    }
    
    .post-content a {
      color: #2563eb;
      text-decoration: underline;
    }
    
    .post-content a:hover {
      color: #1d4ed8;
    }
    
    .post-content blockquote {
      border-left: 4px solid #d1d5db;
      padding-left: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      font-style: italic;
      color: #6b7280;
      margin: 1.5rem 0;
      background-color: #f9fafb;
    }
    
    .post-content img {
      max-width: 100%;
      height: auto;
      border-radius: 0.5rem;
      margin: 1.5rem 0;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .post-content strong {
      font-weight: 700;
      color: #111827;
    }
    
    .post-content em {
      font-style: italic;
    }
    
    .post-content code {
      background-color: #f3f4f6;
      padding: 0.125rem 0.375rem;
      border-radius: 0.25rem;
      font-size: 0.875em;
      font-family: 'Courier New', monospace;
    }
    
    .post-content pre {
      background-color: #1f2937;
      color: #f9fafb;
      padding: 1rem;
      border-radius: 0.5rem;
      overflow-x: auto;
      margin: 1.5rem 0;
    }
    
    .post-content pre code {
      background-color: transparent;
      padding: 0;
      color: inherit;
    }
    
    .post-content table {
      width: 100%;
      border-collapse: collapse;
      margin: 1.5rem 0;
    }
    
    .post-content table th,
    .post-content table td {
      border: 1px solid #e5e7eb;
      padding: 0.75rem;
      text-align: left;
    }
    
    .post-content table th {
      background-color: #f9fafb;
      font-weight: 600;
    }
  </style>
</x-layout>