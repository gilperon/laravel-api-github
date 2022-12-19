<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background:radial-gradient(circle farthest-side, rgb(51, 51, 51), rgb(17, 17, 17)) rgb(153, 153, 153);">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="padding:30px 40px;">
        {{ $slot }}
    </div>
</div>
