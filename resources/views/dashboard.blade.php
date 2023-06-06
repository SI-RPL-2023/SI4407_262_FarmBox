<x-app-layout>
    <div>
        <div class="mx-auto space-y-6">
            <div class="p-6">
                <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @if ($products->count() == 0)
                        Belum Ada Product
                    @else
                        @foreach ($products as $item)
                            <a class="relative flex items-center justify-center rounded-xl border border-gray-100 p-4 sm:p-6 lg:p-8 border-gray-300"
                                href="{{ route('shop.show', $item->slug) }}">
                                <div class="pt-4 text-gray-500">
                                    <div class="flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Product">
                                    </div>

                                    <h3 class="mt-4 text-sm font-bold text-gray-900 sm:text-sm text-center">
                                        {{ $item->name }}/{{ $item->satuan }}
                                    </h3>
                                    <h3 class="text-lg font-bold text-gray-900/50 sm:text-xl text-center">
                                        @currency($item->price)
                                    </h3>

                                    <div class="flex items-center mt-2.5 justify-center">
                                        @for ($i = 0; $i < $item->rating; $i++)
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>{{ $i + 1 }}
                                                    star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
