<x-layout>
  <section class="mt-[30px] max-w-4xl mx-auto">
    <div class="mb-8">
      <h1 class="text-4xl font-bold mb-4">Edit Post</h1>
      <div class="w-20 h-1 bg-gray-600"></div>
    </div>

    <form method="POST" action="/post/{{ $post->slug }}" class="space-y-6">
      @csrf
      @method('PUT')

      <div class="flex items-center justify-end w-full">
        <button form="delete-post-form" class="px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
          Delete post
        </button>
      </div>

      <div>
        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
          Title
        </label>
        <input 
          type="text" 
          id="title" 
          name="title" 
          value="{{ old('title', $post->title) }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="Enter the title of the post..."
          required
        >
        @error('title')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
          Slug
          <span class="text-xs text-gray-500 font-normal">(can be edited manually)</span>
        </label>
        <input 
          type="text" 
          id="slug" 
          name="slug" 
          value="{{ old('slug', $post->slug) }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="the-slug-will-be-generated-automatically-from-the-title"
        >
        <p class="mt-1 text-xs text-gray-500">The slug can be edited manually or generated automatically from the title</p>
        @error('slug')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="tags" class="block text-sm font-semibold text-gray-700 mb-2">
          Tags
        </label>
        <input 
          type="text" 
          id="tags" 
          name="tags" 
          value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : $post->tags) }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="Design, Research, Development (separated by comma)"
        >
        <p class="mt-1 text-xs text-gray-500">Separate the tags by comma</p>
        @error('tags')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
          Content
        </label>
        <textarea 
          id="editor_wrapper" 
          name="content"
          class="w-full min-h-[400px] border border-gray-300 rounded-lg"
        >{{ old('content', $post->content) }}</textarea>
        @error('content')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex gap-4 pt-4">
        <button 
          type="submit"
          id="update-post-button"
          class="px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300"
        >
          Update post
        </button>
        <a 
          href="/post/{{ $post->slug }}" 
          class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors duration-300"
        >
          Cancel
        </a>
      </div>
    </form>
    <form method="POST" action="/post/{{ $post->slug }}" class="hidden" id="delete-post-form">
      @csrf
      @method('DELETE')
    </form>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const titleInput = document.getElementById('title');
      const slugInput = document.getElementById('slug');
      const updatePostButton = document.getElementById('update-post-button');
      const contentInput = document.getElementById('editor_wrapper');
      let slugManuallyEdited = false;

      function generateSlug(text) {
        return text
          .toLowerCase()
          .trim()
          .normalize('NFD')
          .replace(/[\u0300-\u036f]/g, '') // Remove accents
          .replace(/[^\w\s-]/g, '')
          .replace(/[\s_-]+/g, '-')
          .replace(/^-+|-+$/g, '');
      }

      // Mark if slug was manually edited
      slugInput.addEventListener('input', function() {
        slugManuallyEdited = true;
      });

      // Generate slug automatically only if not manually edited
      titleInput.addEventListener('input', function() {
        if (!slugManuallyEdited) {
          const slug = generateSlug(this.value);
          slugInput.value = slug;
        }
      });

    });
  </script>
</x-layout>