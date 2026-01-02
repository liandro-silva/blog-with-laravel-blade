@php
$menuItems = [
[
'href' => '/',
'label' => 'Home',
],
[
'href' => '/about',
'label' => 'About',
],
];
@endphp

<header class="w-full flex flex-col items-center">
    <div class="pt-4 pb-10 w-4/5 flex justify-between items-center border-b-2 border-black-500">
        <div class="flex justify-between items-center w-full">
            <a href="/">
                <img src="{{ asset('th.svg') }}" alt="THE BLOG" class="w-12 h-12">
            </a>
            <nav class="hidden md:flex grow justify-end mr-7">
                <ul class="flex gap-6">
                    @foreach($menuItems as $item)
                    <li>
                        <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </nav>
            <div class="hidden md:block">
                <x-shared.button
                    type="anchor"
                    href="/post/create"
                    class="bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 px-4 py-4 rounded-md">
                    Create new post
                </x-shared.button>
            </div>
            <div class="flex md:hidden">
                <x-shared.button
                    type="button"
                    id="mobile-menu-open"
                    class="bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 py-4 px-4 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </x-shared.button>
            </div>
            <!-- Mobile menu -->
            <div
                id="mobile-menu"
                class="fixed top-0 left-0 bg-white border-r-2 border-black-500 h-full w-full p-7 flex-col justify-start gap-10 z-50 md:hidden transform -translate-x-full transition-transform duration-300 ease-in-out">
                <div class="w-full flex justify-end items-end">
                    <x-shared.button
                        type="button"
                        id="mobile-menu-close"
                        class="bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 py-2 px-1 rounded-md self-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </x-shared.button>
                </div>
                <nav>
                    <ul class="flex flex-col gap-4">
                        @foreach($menuItems as $item)
                        <li>
                            <a href="{{ $item['href'] }}" class="text-2xl mobile-menu-link">{{ $item['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="w-full">
                    <x-shared.button
                        type="anchor"
                        href="/post/create"
                        class="bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 px-4 py-4 rounded-md w-full block text-center mt-5">
                        Create new post
                    </x-shared.button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center border-b-2 border-black-500 w-4/5 m-auto">
        <!-- Desktop: only show this from md and up -->
        <h1 class="text-[240px] hidden md:flex font-bold">THE BLOG</h1>
        <!-- Tablet (sm) and mobile: show this BELOW md (so < md). Show only on sm and below -->
        <h1 class="text-[80px] flex md:hidden font-bold">THE BLOG</h1>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuOpenBtn = document.getElementById('mobile-menu-open');
        const menuCloseBtn = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuLinks = document.querySelectorAll('.mobile-menu-link');

        function openMenu() {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');
        }

        function closeMenu() {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');
        }

        menuOpenBtn.addEventListener('click', openMenu);
        menuCloseBtn.addEventListener('click', closeMenu);

        menuLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });
    });
</script>