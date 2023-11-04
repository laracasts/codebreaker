<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateCode extends Component
{
    public string $message;

    public bool $rtl;

    #[Computed(persist: true)]
    public function letters(): array
    {
        $symbols = $this->getSymbols();
        shuffle($symbols);

        return collect($this->getAlphabets())
            ->combine($symbols)
            ->toArray();
    }

    public function mount(bool $rtl): void
    {
        $this->rtl = $rtl;
    }

    public function render()
    {
        return view('livewire.create-code');
    }

    protected function getAlphabets(): array
    {
        $english = range('a', 'z');
        $arabic = array(
            'ا',
            'ب',
            'ت',
            'ث',
            'ج',
            'ح',
            'خ',
            'د',
            'ذ',
            'ر',
            'ز',
            'س',
            'ش',
            'ص',
            'ض',
            'ط',
            'ظ',
            'ع',
            'غ',
            'ف',
            'ق',
            'ك',
            'ل',
            'م',
            'ن',
            'ه',
            'و',
            'ء',
            'ي'
        );
        $farsi = ['پ', 'چ', 'ژ', 'گ'];
        $urdu = ['ڈ', 'ڑ', 'ں', 'ھ', 'ہ'];
        $pashto = ['ټ', 'ځ', 'څ', 'ډ', 'ړ', 'ږ', 'ښ', 'ګ', 'ڼ', 'ء', 'ې', 'ۍ', 'ي', 'ې', 'ۍ'];
        $miscellaneous = ['ی', 'ک', 'ئ', 'ة', 'ؤ', 'أ', 'آ',];
        return $this->rtl ? array_unique(array_merge($arabic, $farsi, $urdu, $pashto, $miscellaneous)) : $english;
    }

    public function getSymbols(): array
    {
        $symbols = [
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
            'alarm',
            'coffee',
            'cloud',
            'build',
            'dashboard',
            'lightbulb',
            'notifications',
            'palette',
            'search',
            'shopping_cart',
            'print',
            'volume_up',
            'wifi',
            'account_circle',
            'attach_file',
            'book',
            'check_circle',
            'cloud_upload',
            'email',
            'favorite',
            'gamepad',
            'help',
            'insert_chart',
            'language',
            'mic',
            'notifications_active',
            'laptop',
            'lock',
            'send',
            'settings',
            'thumb_up',
            'add_circle',
            'edit',
            'radio_button_checked',
            'person',
            'accessibility',
            'alarm_add',
            'videogame_asset',
            'map',
            'watch',
            'attach_money',
            'build_circle',
            'card_giftcard',
            'done_all',
            'event',
            'hotel',
            'local_shipping',
            'mood',
            'phone',
            'favorite_border',
            'history',
            'keyboard',
            'palette',
            'record_voice_over',
            'save',
            'cloud_done',
            'chat',
            'flight_takeoff',
            'grade',
            'notifications_off',
            'perm_identity',
            'pets',
            'portrait',
            'restaurant',
            'rotate_left',
            'timer',
            'toys',
            'wb_sunny'
        ];

        return $this->generateRandomUniqueArray($symbols, count($this->getAlphabets()));
    }

    public function toggleDirection(): bool
    {
        return !$this->rtl;
    }

    public function generateRandomUniqueArray($symbols, $length): array
    {
        $randomSymbols = [];

        while (count($randomSymbols) < $length) {
            $randomItem = Arr::random($symbols);
            if (!in_array($randomItem, $randomSymbols)) {
                $randomSymbols[] = $randomItem;
            }
        }

        return $randomSymbols;
    }
}
