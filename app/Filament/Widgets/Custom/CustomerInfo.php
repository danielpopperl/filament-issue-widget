<?php

namespace App\Filament\Widgets\Custom;

use Filament\Widgets\Widget;

class CustomerInfo extends Widget
{
    public static ?string $pollingInterval = '1000s';

    public static string $view = 'test';

    public bool $avarageStatus = false;
    public $avarage;

    public $date1 = '', $date2 = '';
    public $dateStart = '', $dateEnd = '';


    protected $listeners = [
        'date_1_filter_dashboard',
        'date_2_filter_dashboard',
    ];


    public static function canView(): bool
    {
        return true;
    }

    protected function getViewData(): array
    {
        $avarage = 0;

        return [
            $this->avarageStatus = $avarage < 4.55 ? false : true,
            $this->avarage = round($avarage, 2),
        ];
    }

    public function date_1_filter_dashboard($date)
    {
        $this->date1 = $date;
    }

    public function date_2_filter_dashboard($date)
    {
        $this->date2 = $date;
    }

    // public function listeners()
    // {
    //     $this->emit('date_1_filter_dashboard', $this->dateStart);
    //     $this->emit('date_2_filter_dashboard', $this->dateEnd);
    // }
}
