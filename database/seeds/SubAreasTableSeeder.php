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
            new SubArea(['label' => 'Politics']),
            new SubArea(['label' => 'Aviation']),
            new SubArea(['label' => 'Polar Bears']),
        ]);

        $area = Area::where(['label' => 'Energy'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Fracking']),
            new SubArea(['label' => 'Coal']),
            new SubArea(['label' => 'Solar']),
            new SubArea(['label' => 'Nuclear']),
            new SubArea(['label' => 'Banking']),
            new SubArea(['label' => 'Wind']),
        ]);

        $area = Area::where(['label' => 'Amazon'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Hard Woods']),
            new SubArea(['label' => 'Jewson']),
            new SubArea(['label' => 'Reef']),
            new SubArea(['label' => 'Tapajos']),
        ]);

        $area = Area::where(['label' => 'Boreal'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Resolute']),
        ]);

        $area = Area::where(['label' => 'India'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Mahan']),
        ]);

        $area = Area::where(['label' => 'Indonesia'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Palm Oil']),
        ]);

        $area = Area::where(['label' => 'Peace'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Trident']),
        ]);

        $area = Area::where(['label' => 'Reactive'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Aid']),
            new SubArea(['label' => 'Bees']),
            new SubArea(['label' => 'Brexit']),
        ]);

        $area = Area::where(['label' => 'Threats to GP'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Governments']),
        ]);

        $area = Area::where(['label' => 'Voting'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Elections']),
            new SubArea(['label' => 'Referenda']),
        ]);

        $area = Area::where(['label' => 'Fishing'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'CFP']),
            new SubArea(['label' => 'Save our Sealife']),
            new SubArea(['label' => 'Tuna']),
            new SubArea(['label' => 'Vaquita']),
        ]);

        $area = Area::where(['label' => 'Plastics'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Beluga Tour']),
            new SubArea(['label' => 'Corporate']),
            new SubArea(['label' => 'Deposit Return Scheme']),
            new SubArea(['label' => 'Microbeads']),
        ]);

        $area = Area::where(['label' => 'Marine Reserves'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Great Barrier Reef']),
            new SubArea(['label' => 'The Antarctic']),
        ]);

        $area = Area::where(['label' => 'Whaling'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'IWC']),
            new SubArea(['label' => 'Japan']),
        ]);

        $area = Area::where(['label' => 'Demand'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Air Pollution']),
            new SubArea(['label' => 'Fleets']),
            new SubArea(['label' => 'Formula E']),
        ]);

        $area = Area::where(['label' => 'Supply'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'Arctic 30']),
            new SubArea(['label' => 'Arctic Fishing']),
            new SubArea(['label' => 'Arctic Sanctuary']),
            new SubArea(['label' => 'Arctic Sunrise']),
            new SubArea(['label' => 'Clyde River']),
            new SubArea(['label' => 'End of Oil']),
            new SubArea(['label' => 'Pipelines']),
            new SubArea(['label' => 'Save the Arctic']),
            new SubArea(['label' => 'Shell']),
            new SubArea(['label' => 'Social Licence']),
            new SubArea(['label' => 'Statoil']),
        ]);

        $area = Area::where(['label' => 'Detox'])->first();
        $area->subAreas()->saveMany([
            new SubArea(['label' => 'North Face']),
        ]);


    }
}
