@props([
    'message',
    'letters',
    'rtl'
])

<div {{ $attributes->class(['text-center flex flex-wrap gap-8 mt-auto']) }}>
    @foreach (array_filter(explode(' ', trim($message))) as $word)
        <div class="word flex flex-wrap gap-2 flex-row-reverse">
            @php
                $characters = $rtl ? array_reverse(preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY)) : str_split($word);
            @endphp
            @foreach ($characters as $character)
                <div>
                <span class="material-symbols-outlined character !text-4xl">
                    {{ $letters[strtolower($character)] ?? $character }}
                </span>
                    <div class="bg-gray-200 w-12 h-12"></div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
