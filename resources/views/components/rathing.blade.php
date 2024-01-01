<div {{ $attributes }}>
    <span class="rate-wrap flex space-x-8 items-center p-1 my-5 font-bold">
        <span class="rate relative inline-block w-[150px] h-[30px] text-3xl before:content-['★★★★★'] before:absolute before:inline-block before:h-8 before:leading-8 before:text-gray-500 after:content-['★★★★★'] after:absolute after:inline-block after:  after:overflow-hidden after:h-8 after:leading-8 after:w-[70%] after:text-yellow-500"></span>
        <span class="num text-3xl">{{ $slot }}</span>
    </span>
</div>