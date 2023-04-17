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
                                    Feedback
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div style="display: flex;justify-content: center;">
  <h1 style="text-align:center;font-weight:bold;font-size:30px">Leave Message</h1>
</div>
<div style="display:flex; margin-left:350px;margin-top:40px;">
<p style="margin-right:410px">Nama</p>
<p>Email</p>
</div>
<div style="display:flex; margin-left:350px;">
  <input type="text" id="name" name="name" placeholder="Enter your name" style="margin-right:50px;width:400px">

  <input type="email" id="email" name="email" placeholder="Enter your email" style="width:400px">
</div>

<div style="text-align:center;margin-top:40px;">
<p>Feedback</p>
</div>

<div style="text-align:center">
<textarea rows="6" cols="80" placeholder="Enter your feedback"></textarea>
</div>

<div style="text-align:center">
<button type="submit"
class="sm:mt-0 py-2 mt-3 border border-gray-900 bg-[#C6D166] text-black disabled:opacity-50 transition duration-300 hover:enabled:border-[#C6D166]/30 hover:enabled:bg-[#C6D166]/80  dark:text-white  inline-block px-4 rounded-lg font-medium fade text-sm">
Send
</button>
                        </div>
</x-guest-layout>