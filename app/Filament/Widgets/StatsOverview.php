<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Deal;
use App\Models\Invoice;
use App\Models\Contract;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Kopā klienti', Customer::count())
                ->description('Aktīvi: ' . Customer::where('status', 'active')->count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, Customer::count()]),

            Stat::make('Aktīvie darījumi', Deal::whereHas('status', function ($query) {
                $query->where('is_closed', false);
            })->count())
                ->description('Vērtība: €' . number_format(
                        Deal::whereHas('status', function ($query) {
                            $query->where('is_closed', false);
                        })->sum('value'), 2
                    ))
                ->descriptionIcon('heroicon-m-currency-euro')
                ->color('warning'),

            Stat::make('Rēķini šomēnes', Invoice::whereMonth('created_at', now()->month)->count())
                ->description('Summa: €' . number_format(
                        Invoice::whereMonth('created_at', now()->month)->sum('total'), 2
                    ))
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Aktīvie līgumi', Contract::where('status', 'active')->count())
                ->description('Drīz beidzas: ' . Contract::where('status', 'active')
                        ->where('end_date', '<=', now()->addDays(30))
                        ->count())
                ->descriptionIcon('heroicon-m-document-check')
                ->color('info'),
        ];
    }
}
