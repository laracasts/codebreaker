<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateCode extends Component
{
    public string $message;
    private array $umlaute = ['ö', 'ä', 'ü', "ß"];

    protected array $symbols = [
        'enable',
        'public',
        'grade',
        'rocket',
        'cookie',
        'thunderstorm',
        'face',
        'skull',
        'home',
        'mode_cool',
        'bedroom_baby',
        'flatware',
        'single_bed',
        'sprinkler',
        'umbrella',
        'token',
        'skillet',
        'stadia_controller',
        'airwave',
        'floor_lamp',
        'close',
        'quiet_time',
        'heat',
        'tools_power_drill',
        'nest_eco_leaf',
        'air_freshener',
        'favorite',
        'bolt',
        'key',
        'sunny',

    ];

    #[Computed(persist: true)]
    public function letters(): array
    {
        shuffle($this->symbols);
        return collect([...range('a', 'z'), ...$this->umlaute])
            ->combine($this->symbols)
            ->toArray();
    }

    /**
     * Display german umlaut only if present in the message
     */
    public function legendLetters(string $message): array
    {

        if (count(array_intersect(mb_str_split($message), $this->umlaute)) == 0) {
            return array_filter($this->letters, function ($key) {
                return !in_array($key, $this->umlaute);
            }, ARRAY_FILTER_USE_KEY);
        }

        // get uppercase ß
        $letters = $this->letters;
        $letters['ẞ'] = $letters["ß"];
        unset($letters['ß']);

        return $letters;
    }

    public function render()
    {
        return view('livewire.create-code');
    }
}
