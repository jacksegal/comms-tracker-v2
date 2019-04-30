<?php

use Illuminate\Database\Seeder;
use App\Area;
use App\SubArea;

class SubAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = Area::where(['label' => 'Climate'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Aviation']),
        ]);

        $area = Area::where(['label' => 'Energy'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Fracking']),
            new SubArea(['label' => 'Solar']),
            new SubArea(['label' => 'Nuclear']),
            new SubArea(['label' => 'Wind']),
        ]);

        $area = Area::where(['label' => 'Amazon'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Tapajos']),
        ]);

        $area = Area::where(['label' => 'Boreal'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Resolute']),
        ]);

        $area = Area::where(['label' => 'Indonesia'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Palm Oil', 'tag' => 'PamOil']),
        ]);

        $area = Area::where(['label' => 'Fundraising'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);

        $area = Area::where(['label' => 'Mobilisation'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);

        $area = Area::where(['label' => 'Outreach'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);

        $area = Area::where(['label' => 'VR'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);

        $area = Area::where(['label' => 'Reactive'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Bees']),
            new SubArea(['label' => 'Brexit']),
            new SubArea(['label' => 'Trump']),
        ]);

        $area = Area::where(['label' => 'Fishing'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'CFP']),
            new SubArea(['label' => 'Tuna']),
        ]);

        $area = Area::where(['label' => 'Pollution'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Plastics']),
        ]);

        $area = Area::where(['label' => 'Marine Reserves'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Antarctic']),
        ]);

        $area = Area::where(['label' => 'Whaling'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);

        $area = Area::where(['label' => 'Demand'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Air Pollution', 'tag' => 'AirPollution']),
        ]);

        $area = Area::where(['label' => 'Supply'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Pipelines']),
            new SubArea(['label' => 'Arctic']),
            new SubArea(['label' => 'Reef']),
        ]);

        $area = Area::where(['label' => 'Detox'])->first();
        $area->subAreas()->saveMany([
            //new SubArea(['label' => 'N/A', 'tag' => 'NA']),
        ]);


        $area = Area::where(['label' => 'Marine Reserves'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Global']),
        ]);

    }
}
