<x-layout>
  <section class="mt-[30px] max-w-md mx-auto">
    <div class="mb-8">
      <h1 class="text-4xl font-bold mb-4">Login</h1>
      <div class="w-20 h-1 bg-gray-600"></div>
    </div>

    <form method="POST" action="/auth/login" class="space-y-6">
      @csrf

      <div>
        <label for="email" :value="old('email')" class="block text-sm font-semibold text-gray-700 mb-2">
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
        <label for="password" :value="old('password')" class="block text-sm font-semibold text-gray-700 mb-2">
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

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input 
            id="remember" 
            name="remember" 
            type="checkbox" 
            class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-300 rounded"
          >
          <label for="remember" class="ml-2 block text-sm text-gray-700">
            Remember me
          </label>
        </div>

        <a 
          href="/forgot-password" 
          class="text-sm text-gray-600 hover:text-gray-900 font-medium"
        >
          Forgot password?
        </a>
      </div>

      <div class="pt-4">
        <button 
          type="submit"
          class="w-full px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300"
        >
          Sign in
        </button>
      </div>

      <div class="text-center pt-4 border-t border-gray-200">
        <p class="text-sm text-gray-600">
          Don't have an account?
          <a 
            href="/auth/create" 
            class="text-gray-900 font-semibold hover:underline"
          >
            Sign up
          </a>
        </p>
      </div>
    </form>
  </section>
</x-layout>