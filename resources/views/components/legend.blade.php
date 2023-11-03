@props(['letters'])

<div class="flex flex-wrap mt-auto">
    @foreach ($letters as $letter => $symbol)
        <div class="flex flex-col items-center border border-white/10 print:border-gray-400 p-2">
            <span class="mb-2 font-bold">{{ ucwords($letter) }}</span>
            <span class="material-symbols-outlined character">{{ $symbol }}</span>
        </div>
    @endforeach
</div>
