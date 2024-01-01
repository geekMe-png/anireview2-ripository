<a href="#" {{ $attributes }}>
    <div {{ $attributes->merge(['class' => 'bg-white border-2 border-black rounded-lg p-3 relative space-y-3']) }}>
        <h1>{{ $slot }}</h1>
        <div class="flex">
            <h1 class="bg-orange-400">$4.2</h1>
            <h1 class="">$review_title</h1>
        </div>

        <p class="">$review_content</p>

        <div class="flex">
            <p class=""><img src="" alt="">$create_time</p>
            <p class=""><img src="" alt="">$update_time</p>
        </div>
    </div>
</a>