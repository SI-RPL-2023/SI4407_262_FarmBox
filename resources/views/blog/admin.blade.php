@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div>
        <div class="mx-auto space-y-6">
            <div class="p-6">
                <h5 class="font-bold text-black text-2xl">Product</h5>
                <div class="border-t border-gray-900 my-2"></div>
                <div class="sm:flex justify-between items-center inline gap-6 p-8">
                    <div class="sm:w-2/4 w-full sm:mb-0 mb-3">
                        <form>
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search Mockups, Logos..." required>
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-[#C6D166] hover:bg-[#C6D16650]/50 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                                    Search
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="sm:w-3/4 w-full sm:mb-0 mb-3 flex justify-end">
                        <button data-drawer-target="create-product" data-drawer-show="create-product"
                            aria-controls="create-product"
                            class="w-full sm:w-auto border border-gray-900 bg-[#C6D166] text-black disabled:opacity-50 transition duration-300 hover:enabled:border-slate-300 hover:enabled:bg-slate-200 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:shadow dark:hover:enabled:border-slate-600 dark:hover:enabled:bg-slate-700 py-2 inline-block px-4 rounded-lg font-medium fade text-sm">
                            Tambah Blog
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

                    @foreach ($blogs as $blog)
                        {{-- BLOG CARD --}}
                        <div class="max-w-sm p-6 bg-white">

                            <img class="h-auto max-w-lg rounded-lg" src="{{ asset('storage/' . $blog->image) }}"
                                alt="image description">
                            <div class="flex justify-start items-center mt-2 text-xs text-gray-500">
                                <div class="flex justify-between items-center gap-3">
                                    <div class="flex justify-between gap-2 items-center">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calendar-event w-4 h-4"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                </path>
                                                <path d="M16 3l0 4"></path>
                                                <path d="M8 3l0 4"></path>
                                                <path d="M4 11l16 0"></path>
                                                <path d="M8 15h2v2h-2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span> {{ $blog->created_at->format('h m Y') }} </span>
                                        </div>
                                    </div>

                                    {{-- Comment Count --}}
                                    {{-- <div class="flex justify-between gap-2 items-center">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-message w-4 h-4" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 9h8"></path>
                                                <path d="M8 13h6"></path>
                                                <path
                                                    d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span> 10 </span>
                                        </div>
                                    </div> --}}
                                    {{-- Comment Count End --}}
                                </div>
                            </div>
                            <a href={{ route('blog.show', $blog->slug) }}>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $blog->slug }}</h5>
                            </a>
                            <div>
                                <form action="{{ route('admin-blog.destroy', $blog->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                        {{-- BLOG CARD END --}}
                    @endforeach

                </div>
            </div>
        </div>
    </div>


    @include('blog.partials.create')
</x-app-layout>
