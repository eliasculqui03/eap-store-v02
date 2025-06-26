<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 rounded-lg bg-gray-50 font-poppins">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5 bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold"> Categorias</h2>


                        <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                        <ul>
                            @foreach ($categorias as $categoria)
                                <li wire:key="{{ $categoria->id }}" class="mb-4">
                                    <label for="{{ $categoria->slug }}" class="flex items-center ">
                                        <input wire:model.live='selected_categorias' type="checkbox"
                                            class="w-4 h-4 mr-2" id="{{ $categoria->slug }}"
                                            value="{{ $categoria->id }}">
                                        <span class="text-lg">{{ $categoria->nombre }}</span>
                                    </label>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold">Marcas</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                        <ul>
                            @foreach ($marcas as $marca)
                                <li wire:key="{{ $marca->id }}" class="mb-4">
                                    <label for="{{ $marca->slug }}" class="flex items-center">
                                        <input wire:model.live='selected_marcas' type="checkbox" class="w-4 h-4 mr-2"
                                            id="{{ $marca->slug }}" value="{{ $marca->id }}">
                                        <span class="text-lg">{{ $marca->nombre }}</span>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold">Estado de productos</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="destacado" class="flex items-center">
                                    <input type="checkbox" id="destacado" wire:model.live='destacado'
                                        class="w-4 h-4 mr-2">
                                    <span class="text-lg">Destacados</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="en_venta" class="flex items-center">
                                    <input wire:model.live='en_venta' type="checkbox" id="en_venta"
                                        class="w-4 h-4 mr-2">
                                    <span class="text-lg">En venta</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="p-4 mb-5 bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold">Price</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
                        <div>
                            <div class="font-semibold">S/. {{ $precio_rango }}</div>
                            <input wire:model.live='precio_rango' type="range"
                                class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer"
                                max="25000" value="5000" step="500">
                            <div class="flex justify-between ">
                                <span class="inline-block text-lg font-bold text-blue-400 ">S/. 0</span>
                                <span class="inline-block text-lg font-bold text-blue-400 ">S/. 25000</span>
                            </div>
                        </div>
                    </div> --}}


                </div>
                <div class="w-full px-3 lg:w-3/4">
                    {{-- <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex ">
                            <div class="flex items-center justify-between">
                                <select name="" id="" wire:model.live='clasificar'
                                    class="block w-40 text-base bg-gray-100 cursor-pointer">
                                    <option value="ultimo">Ordenar por último</option>
                                    <option value="precio">Ordenar por precio</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}


                    <div class="flex flex-wrap items-center ">



                        @foreach ($productos as $producto)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $producto->id }}">
                                <div class="border border-gray-300">
                                    <div class="relative bg-gray-200">
                                        <a href="{{ route('products.detail', $producto->slug) }}" class="">
                                            <img src="{{ Storage::url($producto->images[0]) }}"
                                                alt="{{ $producto->nombre }}"
                                                class="object-cover w-full h-56 mx-auto ">
                                        </a>
                                    </div>
                                    <div class="p-3 ">
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-medium">
                                                {{ $producto->nombre }}
                                            </h3>
                                        </div>
                                        <p class="text-lg ">
                                            <span class="text-green-600">S/.
                                                {{ number_format($producto->precio, 2) }}</span>
                                        </p>
                                    </div>


                                    <div class="flex justify-center p-4 border-t border-gray-300">

                                        <a wire:click.prevent='agregarCarrito({{ $producto->id }})' href="#"
                                            class="flex items-center space-x-2 text-gray-500 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg><span wire:loading.remove
                                                wire:target='agregarCarrito({{ $producto->id }})'>Agregar al
                                                carrito</span> <span wire:loading
                                                wire:target='agregarCarrito({{ $producto->id }})'>Agregando...</span>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        @endforeach


                    </div>

                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">

                        {{ $productos->links() }}

                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>

</div>
