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

        $subArea = SubArea::where(['label' => 'Aviation'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Floods Owen Paterson - Feb 2014']),
        ]);

        $subArea = SubArea::where(['label' => 'Fracking'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Acid Drilling - Mar 2018']),
            new CampaignPush(['label' => 'Fracking - Feb 2019']),
            new CampaignPush(['label' => 'Fracking - Jan 2014']),
            new CampaignPush(['label' => 'Fracking - Jan 2015']),
            new CampaignPush(['label' => 'Fracking - Jan 2016']),
            new CampaignPush(['label' => 'Fracking - Jan 2017']),
            new CampaignPush(['label' => 'UK Fracking - Apr 2014']),
        ]);


        $subArea = SubArea::where(['label' => 'Nuclear'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Radioactive Mud - Nov 2017']),
            new CampaignPush(['label' => 'Stop Hinkley - Jul 2017']),
            new CampaignPush(['label' => 'Stop Hinkley - Mar 2016']),
        ]);


        $subArea = SubArea::where(['label' => 'Solar'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Solar Tax Hike - Dec 2016']),
            new CampaignPush(['label' => 'Solar Tax Hike - Jan 2017']),
        ]);


        $subArea = SubArea::where(['label' => 'Wind'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Wind - Mar 2017']),
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
            new CampaignPush(['label' => 'Elephants - May 2017']),
            new CampaignPush(['label' => 'Fires - Mar 2016']),
            new CampaignPush(['label' => 'HSBC - Jan 2017']),
            new CampaignPush(['label' => 'Nexus - Feb 2016']),
            new CampaignPush(['label' => 'Orangutans - Aug 2016']),
            new CampaignPush(['label' => 'Orangutans June 2018']),
            new CampaignPush(['label' => 'Palm Oil - Apr 2015']),
            new CampaignPush(['label' => 'Palm Oil - April 2018']),
            new CampaignPush(['label' => 'Palm Oil - Aug 2017']),
            new CampaignPush(['label' => 'Palm Oil - Jan 2014']),
            new CampaignPush(['label' => 'Palm Oil - Jan 2016']),
            new CampaignPush(['label' => 'Primate Extintion - Feb 2017']),
            new CampaignPush(['label' => 'Procter & Gamble - Feb 2014']),
            new CampaignPush(['label' => 'Rang-Tan - Aug 2018']),
            new CampaignPush(['label' => 'Santander - Feb 2015']),
            new CampaignPush(['label' => 'Standard Chartered - Jul 2017']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Brexit'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Brexit - Jan 2017']),
            new CampaignPush(['label' => 'Brexit - Jul 2016']),
            new CampaignPush(['label' => 'Brexit Watchdog May 2018']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Trump'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Paris Climate Agreement - May 2017']),
            new CampaignPush(['label' => 'Trump - Jan 2017']),
            new CampaignPush(['label' => 'Trump - Jul 2018']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Tuna'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Drop John West - Mar 2014']),
            new CampaignPush(['label' => 'Drop John West - Sep 2015']),
            new CampaignPush(['label' => 'John West - May 2016']),
            new CampaignPush(['label' => 'Princes John West - Oct 2014']),
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
            new CampaignPush(['label' => 'Deposit Return Scheme - Jan 2017']),
            new CampaignPush(['label' => 'Microbeads - Feb 2017']),
            new CampaignPush(['label' => 'Microbeads - Jan 2016']),
            new CampaignPush(['label' => 'Plastic Free Supermarkets - Jan 2018']),
            new CampaignPush(['label' => 'Plastic Rivers - Mar 2019']),
            new CampaignPush(['label' => 'Plastics - Dec 2016']),
            new CampaignPush(['label' => 'Plastics - Mar 2017']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Air Pollution'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Air Pollution - Apr 2016']),
            new CampaignPush(['label' => 'Air Pollution - Feb 2017']),
            new CampaignPush(['label' => 'Air Pollution - Oct 2015']),
            new CampaignPush(['label' => 'Ditch Diesel - Aug 2017']),
            new CampaignPush(['label' => 'Stop Diesel - Mar 2017']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Arctic'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'Arctic  30 - Sep 2015']),
            new CampaignPush(['label' => 'Arctic Sunrise Ship Tour - Feb 2015']),
            new CampaignPush(['label' => 'Arctic Sunrise Ship Tour - Mar 2014']),
            new CampaignPush(['label' => 'End of Oil - Sep 2017']),
            new CampaignPush(['label' => 'Frontiers - Feb 2016']),
            new CampaignPush(['label' => 'Polar Bears - Dec 2016']),
            new CampaignPush(['label' => 'Polar Bears - Jan 2014']),
            new CampaignPush(['label' => 'Polar Bears - Jan 2015']),
            new CampaignPush(['label' => 'Polar Bears - Jan 2017']),
            new CampaignPush(['label' => 'Save the Arctic - Apr 2014']),
            new CampaignPush(['label' => 'Save the Arctic - Feb 2015']),
            new CampaignPush(['label' => 'Shell - Feb 2015']),
            new CampaignPush(['label' => 'Shell - Jan 2014']),
            new CampaignPush(['label' => 'Statoil - Jun 2017']),
            new CampaignPush(['label' => 'Statoil - Oct 2016']),
        ]);
        

        $subArea = SubArea::where(['label' => 'Pipelines'])->first();
        $subArea->campaignPushes()->saveMany([
            new CampaignPush(['label' => 'North American Pipelines - Mar 2018']),
            new CampaignPush(['label' => 'Pipelines - Nov 2016']),
        ]);
               
    }
}