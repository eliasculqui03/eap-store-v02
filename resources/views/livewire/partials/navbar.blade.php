<header
    class="sticky top-0 z-50 flex flex-wrap w-full py-3 text-sm bg-white shadow-md md:justify-start md:flex-nowrap md:py-0 dark:bg-gray-800">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="/" aria-label="Brand">EAP Store</a>
                <div class="md:hidden">
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-lg hs-collapse-toggle w-9 h-9 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="flex-shrink-0 w-4 h-4 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="flex-shrink-0 hidden w-4 h-4 hs-collapse-open:block"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="navbar-collapse-with-animation"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block">
                <div
                    class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500">
                    <div
                        class="flex flex-col mt-5 divide-y divide-gray-200 gap-x-0 divide-dashed md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid dark:divide-gray-700">

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('home') }}"
                            aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">{{ __('Home') }}</a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('categories') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('categories') }}"
                            aria-current="{{ request()->routeIs('categories') ? 'page' : 'false' }}">{{ __('Categorias') }}</a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->routeIs('products') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} md:py-6 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('products') }}"
                            aria-current="{{ request()->routeIs('products') ? 'page' : 'false' }}">{{ __('Productos') }}</a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
