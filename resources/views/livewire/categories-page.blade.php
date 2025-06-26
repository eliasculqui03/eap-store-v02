<div class="w-full max-w-[85rem] min-h-[70vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 sm:gap-6">

            @foreach ($categorias as $categoria)
                <a class="flex flex-col transition bg-white border shadow-sm group rounded-xl hover:shadow-md"
                    href="{{ route('products', '?selected_categorias[0]=' . $categoria->id) }}"
                    wire:key="{{ $categoria->id }}">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img class="h-[5rem] w-[5rem]" src="{{ Storage::url($categoria->imagen) }}"
                                    alt="{{ $categoria->nombre }}" />
                                <div class="ms-3">
                                    <h3 class="text-2xl font-semibold text-gray-800 group-hover:text-blue-600">
                                        {{ $categoria->nombre }}
                                    </h3>
                                </div>
                            </div>
                            <div class="ps-3">
                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
