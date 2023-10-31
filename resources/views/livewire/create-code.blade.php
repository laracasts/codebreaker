<div class="my-8 flex flex-col items-center gap-10">
    <form action="">
        <textarea wire:model.live="message" cols="30" rows="10"
                  class="bg-white/10 text-white py-2 px-3 rounded-xl"></textarea>
    </form>

    <x-code :message="$message" :letters="$this->letters"/>

    <x-legend :letters="$this->letters" />
</div>




