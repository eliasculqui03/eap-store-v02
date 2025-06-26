{{-- Mobile Navigation (Solo visible en pantallas pequeñas) --}}
<nav class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t md:hidden">
    <div class="flex items-center justify-around px-2 py-1">
        {{-- Enlace Home --}}
        <a wire:navigate
            class="flex flex-col items-center flex-1 py-1 px-2 rounded-lg {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : 'text-gray-500' }} transition-all duration-200 hover:text-blue-600 hover:bg-blue-50"
            href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span class="text-xs mt-0.5 font-medium">{{ __('Home') }}</span>
        </a>

        {{-- Enlace Categorías --}}
        <a wire:navigate
            class="flex flex-col items-center flex-1 py-1 px-2 rounded-lg {{ request()->routeIs('categories') ? 'text-blue-600 bg-blue-50' : 'text-gray-500' }} transition-all duration-200 hover:text-blue-600 hover:bg-blue-50"
            href="{{ route('categories') }}" aria-current="{{ request()->routeIs('categories') ? 'page' : 'false' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            <span class="text-xs mt-0.5 font-medium">{{ __('Categorías') }}</span>
        </a>

        {{-- Enlace Productos --}}
        <a wire:navigate
            class="flex flex-col items-center flex-1 py-1 px-2 rounded-lg {{ request()->routeIs('products') ? 'text-blue-600 bg-blue-50' : 'text-gray-500' }} transition-all duration-200 hover:text-blue-600 hover:bg-blue-50"
            href="{{ route('products') }}" aria-current="{{ request()->routeIs('products') ? 'page' : 'false' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
            </svg>
            <span class="text-xs mt-0.5 font-medium">{{ __('Productos') }}</span>
        </a>

        {{-- Enlace Carrito --}}
        <a wire:navigate
            class="flex flex-col items-center flex-1 py-1 px-2 rounded-lg relative {{ request()->routeIs('cart') ? 'text-blue-600 bg-blue-50' : 'text-gray-500' }} transition-all duration-200 hover:text-blue-600 hover:bg-blue-50"
            href="{{ route('cart') }}" aria-current="{{ request()->routeIs('cart') ? 'page' : 'false' }}">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                {{-- Muestra el número de elementos en el carrito si es mayor que 0 --}}
                @if (isset($num_carrito) && $num_carrito > 0)
                    <span
                        class="absolute -top-1 -right-1 flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full min-w-[16px]">
                        {{ $num_carrito > 99 ? '99+' : $num_carrito }}
                    </span>
                @endif
            </div>
            <span class="text-xs mt-0.5 font-medium">{{ __('Carrito') }}</span>
        </a>
    </div>
</nav>
