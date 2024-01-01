<div class="flex justify-center items-center container" id="header">
    <img src="{{ asset('assets/images/メイドさん.png') }}" alt="映せません" class="w-44">
    <p class="">@yield('text')</p>
<div id="header">
    <div class="flex justify-center items-center">
        <img src="{{ asset('assets/images/メイドさん.png') }}" alt="映せません" class="w-40">
        <p class="text-4xl">@yield('header-text')</p>
    </div>

    <form action="" class="flex justify-center mt-12">
        <x-searchForm />
    </form>
</div>