<?php

namespace Database\Seeders;

use App\Models\DealStatus;
use Illuminate\Database\Seeder;

class DealStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Jauns leads', 'color' => '#3b82f6', 'order' => 1, 'is_closed' => false],
            ['name' => 'Kvalifikācija', 'color' => '#8b5cf6', 'order' => 2, 'is_closed' => false],
            ['name' => 'Piedāvājums', 'color' => '#f59e0b', 'order' => 3, 'is_closed' => false],
            ['name' => 'Sarunas', 'color' => '#ec4899', 'order' => 4, 'is_closed' => false],
            ['name' => 'Uzvarēts', 'color' => '#10b981', 'order' => 5, 'is_closed' => true],
            ['name' => 'Zaudēts', 'color' => '#ef4444', 'order' => 6, 'is_closed' => true],
        ];

        foreach ($statuses as $status) {
            DealStatus::create($status);
        }
    }
}
