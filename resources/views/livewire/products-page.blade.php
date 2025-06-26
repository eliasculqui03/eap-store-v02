<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 rounded-lg bg-gray-50 font-poppins">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">

            {{-- Botón para mostrar filtros en móvil --}}
            <div class="mb-4 lg:hidden">
                <button
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"
                    onclick="document.getElementById('mobile-filters').classList.toggle('hidden')">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                    Filtros
                </button>
            </div>

            <div class="flex flex-wrap mb-24 -mx-3">
                {{-- Sidebar de filtros - Desktop --}}
                <div class="hidden w-full pr-2 lg:w-1/4 lg:block">
                    <div class="sticky space-y-5 top-20">
                        {{-- Filtro de Categorías --}}
                        <div class="p-4 mb-5 bg-white border border-gray-200">
                            <h2 class="text-2xl font-bold">Categorías</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                            <ul>
                                @foreach ($categorias as $categoria)
                                    <li wire:key="{{ $categoria->id }}" class="mb-4">
                                        <label for="desktop-{{ $categoria->slug }}" class="flex items-center">
                                            <input wire:model.live='selected_categorias' type="checkbox"
                                                class="w-4 h-4 mr-2" id="desktop-{{ $categoria->slug }}"
                                                value="{{ $categoria->id }}">
                                            <span class="text-lg">{{ $categoria->nombre }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Filtro de Marcas --}}
                        <div class="p-4 mb-5 bg-white border border-gray-200">
                            <h2 class="text-2xl font-bold">Marcas</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                            <ul>
                                @foreach ($marcas as $marca)
                                    <li wire:key="{{ $marca->id }}" class="mb-4">
                                        <label for="desktop-{{ $marca->slug }}" class="flex items-center">
                                            <input wire:model.live='selected_marcas' type="checkbox"
                                                class="w-4 h-4 mr-2" id="desktop-{{ $marca->slug }}"
                                                value="{{ $marca->id }}">
                                            <span class="text-lg">{{ $marca->nombre }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Filtro de Estado de productos --}}
                        <div class="p-4 mb-5 bg-white border border-gray-200">
                            <h2 class="text-2xl font-bold">Estado de productos</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                            <ul>
                                <li class="mb-4">
                                    <label for="desktop-destacado" class="flex items-center">
                                        <input type="checkbox" id="desktop-destacado" wire:model.live='destacado'
                                            class="w-4 h-4 mr-2">
                                        <span class="text-lg">Destacados</span>
                                    </label>
                                </li>
                                <li class="mb-4">
                                    <label for="desktop-en_venta" class="flex items-center">
                                        <input wire:model.live='en_venta' type="checkbox" id="desktop-en_venta"
                                            class="w-4 h-4 mr-2">
                                        <span class="text-lg">En venta</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Filtros móviles (ocultos por defecto) --}}
                <div id="mobile-filters" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 lg:hidden">
                    <div class="fixed inset-y-0 left-0 w-full max-w-xs overflow-y-auto bg-white shadow-xl">
                        <div class="flex items-center justify-between p-4 border-b">
                            <h2 class="text-lg font-semibold">Filtros</h2>
                            <button onclick="document.getElementById('mobile-filters').classList.add('hidden')"
                                class="p-2 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="p-4 space-y-6">
                            {{-- Categorías móvil --}}
                            <div>
                                <h3 class="mb-3 text-lg font-medium">Categorías</h3>
                                <div class="space-y-3">
                                    @foreach ($categorias as $categoria)
                                        <label wire:key="mobile-{{ $categoria->id }}"
                                            class="flex items-start cursor-pointer">
                                            <input wire:model.live='selected_categorias' type="checkbox"
                                                class="w-4 h-4 mt-0.5 mr-3" id="mobile-{{ $categoria->slug }}"
                                                value="{{ $categoria->id }}">
                                            <span class="text-sm text-gray-700">{{ $categoria->nombre }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Marcas móvil --}}
                            <div>
                                <h3 class="mb-3 text-lg font-medium">Marcas</h3>
                                <div class="space-y-3">
                                    @foreach ($marcas as $marca)
                                        <label wire:key="mobile-{{ $marca->id }}"
                                            class="flex items-start cursor-pointer">
                                            <input wire:model.live='selected_marcas' type="checkbox"
                                                class="w-4 h-4 mt-0.5 mr-3" id="mobile-{{ $marca->slug }}"
                                                value="{{ $marca->id }}">
                                            <span class="text-sm text-gray-700">{{ $marca->nombre }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Estado de productos móvil --}}
                            <div>
                                <h3 class="mb-3 text-lg font-medium">Estado de productos</h3>
                                <div class="space-y-3">
                                    <label for="mobile-destacado" class="flex items-start cursor-pointer">
                                        <input type="checkbox" id="mobile-destacado" wire:model.live='destacado'
                                            class="w-4 h-4 mt-0.5 mr-3">
                                        <span class="text-sm text-gray-700">Destacados</span>
                                    </label>
                                    <label for="mobile-en_venta" class="flex items-start cursor-pointer">
                                        <input wire:model.live='en_venta' type="checkbox" id="mobile-en_venta"
                                            class="w-4 h-4 mt-0.5 mr-3">
                                        <span class="text-sm text-gray-700">En venta</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contenido principal de productos --}}
                <div class="w-full px-3 lg:w-3/4">
                    @if ($productos->count() > 0)
                        <div class="flex flex-wrap items-center">
                            @foreach ($productos as $producto)
                                <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $producto->id }}">
                                    <div class="border border-gray-300">
                                        <div class="relative bg-gray-200">
                                            <a href="{{ route('products.detail', $producto->slug) }}" class="">
                                                <img src="{{ Storage::url($producto->images[0]) }}"
                                                    alt="{{ $producto->nombre }}"
                                                    class="object-cover w-full h-56 mx-auto">
                                            </a>
                                        </div>
                                        <div class="p-3">
                                            <div class="flex items-center justify-between gap-2 mb-2">
                                                <h3 class="text-xl font-medium">
                                                    {{ $producto->nombre }}
                                                </h3>
                                            </div>
                                            <p class="text-lg">
                                                <span class="text-green-600">S/.
                                                    {{ number_format($producto->precio, 2) }}</span>
                                            </p>
                                        </div>

                                        <div class="flex justify-center p-4 border-t border-gray-300">
                                            <a wire:click.prevent='agregarCarrito({{ $producto->id }})'
                                                href="#"
                                                class="flex items-center space-x-2 text-gray-500 hover:text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="w-4 h-4 bi bi-cart3"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                    </path>
                                                </svg>
                                                <span wire:loading.remove
                                                    wire:target='agregarCarrito({{ $producto->id }})'>
                                                    Agregar al carrito
                                                </span>
                                                <span wire:loading wire:target='agregarCarrito({{ $producto->id }})'>
                                                    Agregando...
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Estado vacío cuando no hay productos --}}
                        <div
                            class="flex flex-col items-center justify-center py-12 text-center bg-white border border-gray-200 rounded-lg">
                            <div class="w-24 h-24 mb-4 text-gray-300">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-gray-700">No hay productos disponibles</h3>
                            <p class="max-w-md mb-4 text-gray-500">
                                @if (count($selected_categorias) > 0 || count($selected_marcas) > 0 || $destacado || $en_venta)
                                    No se encontraron productos que coincidan con los filtros seleccionados.
                                    Intenta ajustar los criterios de búsqueda.
                                @else
                                    Actualmente no hay productos disponibles en esta categoría.
                                @endif
                            </p>

                        </div>
                    @endif

                    {{-- Paginación --}}
                    <div class="flex justify-end mt-6">
                        {{ $productos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
