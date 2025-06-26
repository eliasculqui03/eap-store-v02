{{-- Página de detalle de producto responsive --}}
<div class="w-full max-w-[85rem] py-6 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-8 overflow-hidden bg-white rounded-lg shadow-sm lg:py-11 font-poppins">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-col lg:flex-row lg:-mx-4">

                {{-- Sección de imágenes --}}
                <div class="w-full mb-8 lg:w-1/2 lg:mb-0 lg:px-4" x-data="{ mainImage: '{{ Storage::url($producto->images[0]) }}' }">
                    <div class="lg:sticky lg:top-20">
                        {{-- Imagen principal --}}
                        <div class="relative mb-4 lg:mb-6">
                            <div class="overflow-hidden bg-gray-100 rounded-lg aspect-square">
                                <img x-bind:src="mainImage" alt="{{ $producto->nombre }}"
                                    class="object-cover w-full h-full transition-opacity duration-300">
                            </div>
                        </div>

                        {{-- Galería de miniaturas --}}
                        <div class="grid grid-cols-4 gap-2 sm:gap-3 lg:grid-cols-4">
                            @foreach ($producto->images as $index => $image)
                                <div class="overflow-hidden transition-colors duration-200 border-2 border-transparent rounded-md cursor-pointer aspect-square hover:border-blue-500"
                                    x-on:click="mainImage='{{ Storage::url($image) }}'">
                                    <img src="{{ Storage::url($image) }}"
                                        alt="{{ $producto->nombre }} {{ $index + 1 }}"
                                        class="object-cover w-full h-full">
                                </div>
                            @endforeach
                        </div>

                        {{-- Información de envío --}}
                        <div class="p-4 mt-6 border border-green-200 rounded-lg bg-green-50">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="w-5 h-5 mr-3 text-green-600" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                    </path>
                                </svg>
                                <div>
                                    <h3 class="text-base font-semibold text-green-800">Envío gratis</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sección de información del producto --}}
                <div class="w-full lg:w-1/2 lg:px-4">
                    <div class="lg:pl-6">
                        {{-- Información básica --}}
                        <div class="mb-6">
                            <h1 class="mb-4 text-2xl font-bold leading-tight text-gray-900 sm:text-3xl lg:text-4xl">
                                {{ $producto->nombre }}
                            </h1>

                            {{-- Precios --}}
                            <div class="flex flex-col mb-4 sm:flex-row sm:items-center sm:gap-4">
                                <span class="text-3xl font-bold text-gray-900 sm:text-4xl">
                                    S/. {{ number_format($producto->precio, 2) }}
                                </span>
                            </div>

                            {{-- Descripción --}}
                            <div class="prose text-gray-700 prose-gray max-w-none">
                                {!! Str::markdown($producto->descripcion ?? 'Sin descripción disponible.') !!}
                            </div>
                        </div>

                        {{-- Selector de cantidad --}}
                        <div class="mb-8">
                            <label class="block mb-3 text-lg font-semibold text-gray-900">
                                Cantidad
                            </label>
                            <div class="flex items-center">
                                <div
                                    class="relative flex items-center max-w-[8rem] bg-gray-50 border border-gray-300 rounded-lg">
                                    <button wire:click="decrementarCantidad" type="button"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-gray-600 transition-colors duration-200 border-r border-gray-300 rounded-l-lg hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" wire:model='cantidad' readonly
                                        class="flex-shrink-0 text-center bg-transparent border-0 text-gray-900 text-sm focus:outline-none focus:ring-0 max-w-[2.5rem] py-2.5">
                                    <button wire:click="incrementarCantidad" type="button"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-gray-600 transition-colors duration-200 border-l border-gray-300 rounded-r-lg hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="space-y-4">
                            {{-- Botón agregar al carrito --}}
                            <button wire:click="agregarCarrito({{ $producto->id }})"
                                class="w-full sm:w-auto sm:min-w-[200px] px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
                                wire:loading.attr="disabled" wire:target='agregarCarrito({{ $producto->id }})'>
                                <span wire:loading.remove wire:target='agregarCarrito({{ $producto->id }})'>
                                    <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L17 18">
                                        </path>
                                    </svg>
                                    Agregar al carrito
                                </span>
                                <span wire:loading wire:target='agregarCarrito({{ $producto->id }})'>
                                    <svg class="inline w-5 h-5 mr-3 -ml-1 text-white animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Agregando...
                                </span>
                            </button>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
