<div>
    <div class="w-full h-screen px-4 py-10 mx-auto bg-gradient-to-r from-blue-200 to-cyan-200 sm:px-6 lg:px-8">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid -->
            <div class="grid gap-4 md:grid-cols-2 md:gap-8 xl:gap-20 md:items-center">
                <div>
                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight">
                        Comienza tu viaje con <span class="text-blue-600">EAP Store</span></h1>
                    <p class="mt-3 text-lg text-gray-800">Compre una amplia variedad de productos
                        electrónicos como teléfonos inteligentes, computadoras portátiles, relojes inteligentes,
                        televisores y muchos más.</p>
                </div>
                <!-- End Col -->

                <div class="relative ms-4">
                    <img class="w-full rounded-md"
                        src="https://static.vecteezy.com/system/resources/previews/011/993/278/non_2x/3d-render-online-shopping-bag-using-credit-card-or-cash-for-future-use-credit-card-money-financial-security-on-mobile-3d-application-3d-shop-purchase-basket-retail-store-on-e-commerce-free-png.png"
                        alt="Image Description">
                    <div
                        class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 w-full h-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6">
                    </div>

                    <!-- SVG-->
                    <div class="absolute bottom-0 start-0">
                        <svg class="w-2/3 h-auto text-white ms-auto" width="630" height="451" viewBox="0 0 630 451"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="531" y="352" width="99" height="99" fill="currentColor" />
                            <rect x="140" y="352" width="106" height="99" fill="currentColor" />
                            <rect x="482" y="402" width="64" height="49" fill="currentColor" />
                            <rect x="433" y="402" width="63" height="49" fill="currentColor" />
                            <rect x="384" y="352" width="49" height="50" fill="currentColor" />
                            <rect x="531" y="328" width="50" height="50" fill="currentColor" />
                            <rect x="99" y="303" width="49" height="58" fill="currentColor" />
                            <rect x="99" y="352" width="49" height="50" fill="currentColor" />
                            <rect x="99" y="392" width="49" height="59" fill="currentColor" />
                            <rect x="44" y="402" width="66" height="49" fill="currentColor" />
                            <rect x="234" y="402" width="62" height="49" fill="currentColor" />
                            <rect x="334" y="303" width="50" height="49" fill="currentColor" />
                            <rect x="581" width="49" height="49" fill="currentColor" />
                            <rect x="581" width="49" height="64" fill="currentColor" />
                            <rect x="482" y="123" width="49" height="49" fill="currentColor" />
                            <rect x="507" y="124" width="49" height="24" fill="currentColor" />
                            <rect x="531" y="49" width="99" height="99" fill="currentColor" />
                        </svg>
                    </div>
                    <!-- End SVG-->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </div>


    {{-- Inicio de la section de marca --}}

    <section class="py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold text-gray-800"> Explorar marcas <span class="text-blue-500">
                            populares
                        </span> </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-blue-200">
                        </div>
                        <div class="flex-1 h-2 bg-blue-400">
                        </div>
                        <div class="flex-1 h-2 bg-blue-600">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">

                @foreach ($marcas as $marca)
                    <div wire:key="{{ $marca->id }}" class="bg-white rounded-lg shadow-md">
                        <a href="{{ route('products', '?selected_marcas[0]=' . $marca->id) }}" class="">
                            <img src="{{ Storage::url($marca->imagen) }}" alt="{{ $marca->nombre }}"
                                class="object-contain w-full h-64 rounded-t-lg">
                        </a>
                        <div class="p-5 text-center">
                            <a href="" class="text-2xl font-bold tracking-tight text-gray-900">
                                {{ $marca->nombre }}
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Fin de la section de marca --}}


    {{-- Inicio de la section de categoria --}}

    <div class="py-20 bg-orange-200">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold text-gray-800"> Explorar <span class="text-blue-500"> Categorías
                        </span> </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-blue-200">
                        </div>
                        <div class="flex-1 h-2 bg-blue-400">
                        </div>
                        <div class="flex-1 h-2 bg-blue-600">
                        </div>
                    </div>
                </div>
                {{-- <p class="mb-12 text-base text-center text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
                    Pariatur
                    numquam, odio quod nobis ipsum ex cupiditate?
                </p> --}}
            </div>
        </div>

        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-6">

                @foreach ($categorias as $categoria)
                    <a wire:key="{{ $categoria->id }}"
                        class="flex flex-col transition bg-white border shadow-sm group rounded-xl hover:shadow-md"
                        href="{{ route('products', '?selected_categorias[0]=' . $categoria->id) }}">
                        <div class="p-4 md:p-5">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                        src="{{ Storage::url($categoria->imagen) }}" alt="{{ $categoria->nombre }}">
                                    <div class="ms-3">
                                        <h3 class="font-semibold text-gray-800 group-hover:text-blue-600">
                                            {{ $categoria->nombre }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

    </div>


    {{-- Fin de la section de categoria --}}

</div>
