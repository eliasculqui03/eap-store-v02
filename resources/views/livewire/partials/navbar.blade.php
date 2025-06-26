<header
    class="sticky top-0 z-50 flex flex-wrap w-full py-3 text-sm bg-white shadow-md md:justify-start md:flex-nowrap md:py-0">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold text-gray-900" href="/" aria-label="Brand">EAP Store</a>

            </div>

            <div id="navbar-collapse-with-animation"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block">
                <div
                    class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <div
                        class="flex flex-col mt-5 divide-y divide-gray-200 gap-x-0 divide-dashed md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid">

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6"
                            href="{{ route('home') }}"
                            aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">{{ __('Home') }}</a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('categories') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6"
                            href="{{ route('categories') }}"
                            aria-current="{{ request()->routeIs('categories') ? 'page' : 'false' }}">{{ __('Categorías') }}</a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('products') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6"
                            href="{{ route('products') }}"
                            aria-current="{{ request()->routeIs('products') ? 'page' : 'false' }}">{{ __('Productos') }}</a>

                        <a wire:navigate
                            class="flex items-center py-3 font-medium {{ request()->routeIs('cart') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('cart') }}"
                            aria-current="{{ request()->routeIs('cart') ? 'page' : 'false' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span class="mr-1">{{ __('Carrito') }}</span> <span
                                class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">{{ $num_carrito }}</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
