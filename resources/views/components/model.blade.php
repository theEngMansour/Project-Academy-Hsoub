<div x-show="isOpen" class="absolute top-0 bottom-0 left-0 right-0 shadow-md flex justify-center bg-gray-700 bg-opacity-40">
    <div @click.away="isOpen = false" class="w-96 h-52 bg-white m-auto shadow-lg rounded-lg">
        {{ $test }}
    </div>
</div>