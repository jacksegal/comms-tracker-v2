<?php

use Illuminate\Database\Seeder;
use App\CampaignPush;
use App\SubArea;

class CampaignPushesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subArea = SubArea::where(['label' => 'Fracking'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'My NEW push!']),
        ]);
    }
}
