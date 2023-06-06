<x-guest-layout>
    <div class="w-full">
        <div class="bg-cover bg-center hidden sm:block bg-no-repeat"
            style="height:12rem; background-image: url({{ asset('img/bg1.jpg') }});">
            <div class="flex justify-center h-full sm:mt-32 mt-0">
                <div class="h-full w-full">
                    <div class="bg-[#C6D16680]/50 w-full h-full">
                        <div class="z-20 p-8 w-full text-center">
                            <div class="sm:mt-10 mt-0">
                                <div class="text-[40px] font-bold flex justify-center items-center ">
                                    <h1 class="text-white ">
                                        {{ $blog->title }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: center;padding-top:20px">
            <img src={{ asset('storage/' . $blog->image) }} alt={{ $blog->tilte }}
                style="width:1000px; height: 600px;">
        </div>
        <div style="padding-top:20px ;padding-right:255px;padding-left:255px">
            <p>{{ $blog->text }}</p>
            {{-- <p style="font-weight: bold; font-size: 24px; padding-top:30px">
                The Corner window forms a place within a place that is a resting point </br>within the large space </p>
            <p style="padding-top:30px">
                The study area is located at the back with a view of the vast nature . Together with the other
                buildings. a congruent story has been managed in which the whole has reinforcing
                effect on the components. The use of materials seeks connection to the main house, the adjacent stables.
                The study area is located at the back with a view of the vast nature.
                Together with the other buildings, a congruent story has been managed in which the whole has a
                reinforcing effect on the components. The use of materials seeks connection to
                the main house, the adjacent stables </p> --}}

            <div>
                <table>
                    <tr>
                        <td><img src={{ asset('img/chef.jpg') }} alt="Your Image"
                                style="border-radius: 50%; 
        width:150px;height:150px;margin-top:20px"></td>
                        <td>
                            <p>Ariana Clarissa </br> Author</p>
                        </td>
                        <td style="float:center; padding-left:320px">
                            <p>Categories : Food </br> Tags : All, Trending, Cooking, Healthy Food, Life Style</p>
                        </td>

                </table>


            </div>
            <hr style="margin: 50px 0; border: none; border-top: 2px solid black;">

            <div style="text-align: center; font-weight: bold;font-size:20px">
                <h1>Recent News</h1>
            </div>
            <table style="width: 100%; text-align: center;align-items:center; margin-left:60px; margin-top:30px">
                <tr>
                    <td style="text-align: left;"><img src={{ asset('img/d1.jpg') }} alt="Image 1"
                            style="width:200px;height:200px">
                    </td>
                    <td style="text-align: center;"><img src={{ asset('img/d2.jpg') }}
                            alt="Image 3"style="width:200px;height:200px"></td>
                    <td style="text-align: right;"><img src={{ asset('img/d3.jpg') }}
                            alt="Image 5"style="width:200px;height:200px">
                    </td>

                </tr>

                <tr>
                    <td style="text-align: left;">09 Kinds of vegetables </br>Protect the liver</td>
                    <td style="text-align: left;">09 Kinds of vegetables </br>Protect the liver</td>
                    <td style="text-align: left;">09 Kinds of Fruits </br>Protect the liver</td>

                </tr>

                <tr>
                    <td style="text-align: left;font-size:10px">Maret 05,2023</td>
                    <td style="text-align: left;font-size:10px">Maret 05,2023</td>
                    <td style="text-align: left;font-size:10px">Maret 05,2023</td>
                </tr>
            </table>
</x-guest-layout>
