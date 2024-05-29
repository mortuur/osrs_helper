<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
<x-app>
    <div class="flex justify-center items-center mx-auto border-solid border-2 border-black h-fit mt-16 w-4/5 p-2">
        {{-- maak er foreach van op een later moment --}}
        @for ($i = 0; $i < 3; $i++)
        <x-trade.block />
            
        @endfor
    </div>
        {{-- de line hier onder is voor later --}}
            {{-- {{dd($items)}} --}}
</x-app>