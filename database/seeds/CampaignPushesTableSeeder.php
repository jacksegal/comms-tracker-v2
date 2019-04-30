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
            new CampaignPush(['label' => 'Acid Drilling - Mar 2018']),
            new CampaignPush(['label' => 'Fracking - Feb 2019']),
        ]);


        $subArea = SubArea::where(['label' => 'Nuclear'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Radioactive Mud - Nov 2017']),
            new CampaignPush(['label' => 'Stop Hinkley - Jul 2017']),
        ]);


        $subArea = SubArea::where(['label' => 'Solar'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Solar Tax Hike - Jan 2017']),
        ]);


        $subArea = SubArea::where(['label' => 'Wind'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Wind vs Nuclear - Sep 2017']),
        ]);


        $subArea = SubArea::where(['label' => 'Tapajos'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Tapajos - May 2016']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Palm Oil'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Carex - Mar 2018']),
            new CampaignPush(['label' => 'Drop Dirty Palm Oil - Sep 2018']),
            new CampaignPush(['label' => 'HSBC - Jan 2017']),
            new CampaignPush(['label' => 'Orangutans - Aug 2016']),
            new CampaignPush(['label' => 'Rang-Tan - Aug 2018']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Brexit'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Brexit Watchdog May 2018']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Trump'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Trump - Jul 2018']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Antarctic'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Antarctic Sanctuary - Sep 2017']),
            new CampaignPush(['label' => 'Antarctic Ship Tour - Dec 2017']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Plastics'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Beluga Tour - Jan 2017']),
            new CampaignPush(['label' => 'Coke - Apr 2017']),
            new CampaignPush(['label' => 'Deposit Return Scheme - Feb 2019']),
            new CampaignPush(['label' => 'Microbeads - Feb 2017']),
            new CampaignPush(['label' => 'Plastic Free Supermarkets - Jan 2018']),
            new CampaignPush(['label' => 'Plastic Rivers - Mar 2019']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Air Pollution'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Air Pollution - Feb 2017']),
            new CampaignPush(['label' => 'Ditch Diesel - Aug 2017']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Pipelines'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'North American Pipelines - Mar 2018']),
        ]);


        $subArea = SubArea::where(['label' => 'Global'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Protect the oceans - Apr 2019']),
        ]);
               
    }
}