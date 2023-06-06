@php use Carbon\Carbon; @endphp
<x-guest-layout>
    <section class="py-24 sm:mt-48 sm:py-3">

        <div class="max-w-7xl mx-auto">
            <div class="w-full sm:p-0 p-6">
                <div class="bg-white border border-2 border-black overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5 ">
                            <div class="flex justify-between items-center gap-3">
                                <h1 class="uppercase font-bold sm:text-3xl text-sm"> All Blogs </h1>
                            </div>
                        </div>
                        <div class="border-t border-gray-900 mb-5"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @if ($blogs->count() == 0)
                            Belum Ada Product
                        @else
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
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                            {{-- <div class="flex justify-between gap-2 items-center">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-message w-4 h-4"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                        </div>
                                    </div>
                                    <a href={{ route('blog.show', $blog->slug) }}>
                                        <h5
                                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                           {{ $blog->title }}</h5>
                                    </a>

                                    <a href={{ route('blog.show', $blog->slug) }}
                                        class="text-white bg-[#C6D16680]/100 hover:bg-[#C6D16680]/80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Baca
                                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                                {{-- BLOG CARD END --}}
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
