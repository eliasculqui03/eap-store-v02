<div class="w-full max-w-[100rem] min-h-[60vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container px-4 mx-auto">
        <h1 class="mb-4 text-2xl font-semibold">Carrito de compras</h1>

        <!-- Mostrar mensajes de error si existen -->
        @if (session()->has('error'))
            <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-300 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col gap-4 md:flex-row">
            <!-- Contenedor principal con ancho responsivo -->
            <div class="w-full md:w-3/4">
                <!-- En pantallas móviles, cambiamos a un diseño de tarjetas -->
                <div class="p-4 mb-4 overflow-x-auto bg-white rounded-lg shadow-md">
                    <!-- Tabla visible solo en tabletas y escritorio -->
                    <table class="hidden w-full md:table">
                        <thead>
                            <tr>
                                <th class="font-semibold text-left">Producto</th>
                                <th class="font-semibold text-left">Precio</th>
                                <th class="font-semibold text-left">Cantidad</th>
                                <th class="font-semibold text-left">Total</th>
                                <th class="font-semibold text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carrito_items as $item)
                                <tr wire:key='{{ $item['product_id'] }}'>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="w-16 h-16 mr-4" src="{{ Storage::url($item['image']) }}"
                                                alt="{{ $item['name'] }}">
                                            <span class="font-semibold">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">S/. {{ number_format($item['unit_amount'], 2) }}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button wire:click="decrementarItem({{ $item['product_id'] }})"
                                                class="px-4 py-2 mr-2 border rounded-md hover:bg-gray-100">-</button>
                                            <span class="w-8 text-center">{{ $item['quantity'] }}</span>
                                            <button wire:click="incrementarItem({{ $item['product_id'] }})"
                                                class="px-4 py-2 ml-2 border rounded-md hover:bg-gray-100">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4">S/. {{ number_format($item['total_amount'], 2) }}</td>
                                    <td>
                                        <button wire:click="eliminarItem({{ $item['product_id'] }})"
                                            class="px-3 py-1 transition-colors border-2 rounded-lg bg-slate-300 border-slate-400 hover:bg-red-500 hover:text-white hover:border-red-700">
                                            <span wire:loading.remove
                                                wire:target='eliminarItem({{ $item['product_id'] }})'>Eliminar</span>
                                            <span wire:target='eliminarItem({{ $item['product_id'] }})'
                                                wire:loading>Eliminando...</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-10 py-20 text-4xl font-semibold text-center text-slate-500">
                                        No hay productos en el carrito
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Vista de tarjetas para móviles -->
                    <div class="md:hidden">
                        @forelse ($carrito_items as $item)
                            <div wire:key='{{ $item['product_id'] }}' class="p-4 mb-4 border rounded-lg">
                                <div class="flex items-center mb-3">
                                    <img class="w-16 h-16 mr-3" src="{{ Storage::url($item['image']) }}"
                                        alt="{{ $item['name'] }}">
                                    <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-2 mb-3">
                                    <div>
                                        <p class="text-sm text-gray-500">Precio:</p>
                                        <p>S/. {{ number_format($item['unit_amount'], 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Total:</p>
                                        <p>S/. {{ number_format($item['total_amount'], 2) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="mb-1 text-sm text-gray-500">Cantidad:</p>
                                        <div class="flex items-center">
                                            <button wire:click="decrementarItem({{ $item['product_id'] }})"
                                                class="px-3 py-1 mr-2 border rounded-md hover:bg-gray-100">-</button>
                                            <span class="w-6 text-center">{{ $item['quantity'] }}</span>
                                            <button wire:click="incrementarItem({{ $item['product_id'] }})"
                                                class="px-3 py-1 ml-2 border rounded-md hover:bg-gray-100">+</button>
                                        </div>
                                    </div>
                                    <button wire:click="eliminarItem({{ $item['product_id'] }})"
                                        class="px-3 py-2 text-sm transition-colors border-2 rounded-lg bg-slate-300 border-slate-400 hover:bg-red-500 hover:text-white hover:border-red-700">
                                        <span wire:loading.remove
                                            wire:target='eliminarItem({{ $item['product_id'] }})'>Eliminar</span><span
                                            wire:target='eliminarItem({{ $item['product_id'] }})'
                                            wire:loading>Eliminando...</span>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="px-4 py-10 text-2xl font-semibold text-center text-slate-500">
                                No hay productos en el carrito
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar del resumen -->
            <div class="md:w-1/4">
                <div class="p-6 mb-10 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-lg font-semibold">Resumen</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>S/. {{ number_format($this->total_general, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>IGV (18%)</span>
                        <span>S/. 0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Envío</span>
                        <span>S/. 0.00</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">S/. {{ number_format($this->total_general, 2) }}</span>
                    </div>

                    @if ($carrito_items)
                        <button wire:click="enviarPorWhatsApp"
                            class="flex items-center justify-center w-full px-4 py-3 mt-4 text-white transition-colors bg-green-500 rounded-lg hover:bg-green-600"
                            wire:loading.attr="disabled">
                            <svg wire:loading.remove wire:target="enviarPorWhatsApp" class="w-5 h-5 mr-2"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                            </svg>
                            <span wire:loading.remove wire:target="enviarPorWhatsApp">Enviar por WhatsApp</span>

                            <div wire:loading wire:target="enviarPorWhatsApp" class="flex items-center">
                                <svg class="w-5 h-5 mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Procesando...
                            </div>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
