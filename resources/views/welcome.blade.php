<x-layout :rtl="$rtl">
    <section class="container mx-auto px-6 h-full flex flex-col" style="max-width: 1000px;">
        <header class="flex justify-between">
            <h1>
                <img src="/logo.svg" alt="Codebreaker" aria-label="Codebreaker" class="print:invert w-52 print:w-36">
            </h1>
            <button class="px-2 py-1 text-sm font-semibold rounded-md disabled:bg-gray-300 print:hidden h-1/3 hover:bg-gray-400 transition" onclick="window.location.href = '{{ Request::fullUrlWithQuery(['rtl' => Request::query('rtl') === 'true' ? 'false' : 'true']) }}'">@if($rtl) ABC @else ا ب ت @endif</button>
        </header>

        <livewire:create-code :rtl="$rtl"/>
    </section>
</x-layout>
