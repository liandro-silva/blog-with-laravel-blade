<x-layout>
  <section class="mt-[30px] max-w-md mx-auto">
    <div class="mb-8">
      <h1 class="text-4xl font-bold mb-4">Register</h1>
      <div class="w-20 h-1 bg-gray-600"></div>
    </div>

    <form method="POST" action="/auth/create" class="space-y-6">
      @csrf

      <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
          Name
        </label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="Your name"
        >
        @error('name')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
          Email
        </label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="your@email.com"
        >
        @error('email')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
          Password
        </label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="Your password"
        >
        @error('password')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
          Confirm Password
        </label>
        <input 
          type="password" 
          id="password_confirmation" 
          name="password_confirmation" 
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all"
          placeholder="Confirm your password"
        >
        @error('password_confirmation')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4">
        <button 
          type="submit"
          class="w-full px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300"
        >
          Sign up
        </button>
      </div>

      <div class="text-center pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-600">
          Already have an account?
          <a 
            href="/auth" 
            class="text-gray-900 font-semibold hover:underline"
          >
            Sign in
          </a>
        </p>
      </div>
    </form>
  </section>
</x-layout>