<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
<x-app>

    <h1 class="flex justify-center mt-2">
        trade offers
    </h1>

    <div class="flex justify-center items-center mx-auto border-solid border-2 border-black h-fit mt-6 w-4/5 p-2">
        {{-- maak er foreach van op een later moment --}}
        @for ($i = 0; $i < 3; $i++)
            <x-trade.block />
        @endfor
    </div>

    <h1 class="flex justify-center mt-2">
        add trade offer
    </h1>
    
    <div class="flex justify-center items-center mx-auto border-solid border-2 border-black h-fit mt-6 w-4/5 p-2">
        {{-- maak er foreach van op een later moment --}}
        @for ($i = 0; $i < 3; $i++)
            <x-trade.block />
        @endfor 
    </div>
       
</x-app>