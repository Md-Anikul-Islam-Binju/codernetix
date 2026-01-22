<?php

namespace Database\Seeders;

use App\Models\TrackedPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackedPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            'https://www.fiverr.com/users/anikul_binju/seller_dashboard',
            'https://www.upwork.com/nx/find-work/best-matches',
        ];

        foreach ($pages as $url) {
            TrackedPage::updateOrCreate(
                ['page_url' => $url],
                ['is_active' => true]
            );
        }
    }
}
