@props([
    'message',
    'letters'
])

<div {{ $attributes->class(['text-center flex flex-wrap gap-8 mt-auto']) }}>
    @foreach(array_filter(explode(' ', trim($message))) as $word)
        <div class="word flex flex-wrap gap-2">
            @foreach(str_split($word) as $character)
                <div>
                     <span class="material-symbols-outlined character !text-4xl">
                        {{ $letters[strtolower($character)] ?? $character }}
                    </span>

                    <div class="
                    @if(preg_match("/[a-z]/i", $character))
                        bg-gray-200
                    @endif
                         w-12 h-12"></div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
