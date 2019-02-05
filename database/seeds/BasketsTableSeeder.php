<?php

use Illuminate\Database\Seeder;
use App\Basket;
use App\Area;

class BasketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Energy & Climate Change */
        $basket = new Basket();
        $basket->label = 'Energy & Climate Change';
        $basket->tag = 'EC';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Climate']),
            new Area(['label' => 'Energy']),
        ]);


        /* Forests */
        $basket = new Basket();
        $basket->label = 'Forests';
        $basket->tag = 'FO';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Amazon']),
            new Area(['label' => 'Boreal']),
            new Area(['label' => 'Indonesia']),
        ]);


        /* Greenpeace Organisation */
        $basket = new Basket();
        $basket->label = 'Greenpeace Organisation';
        $basket->tag = 'GO';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Fundraising']),
            new Area(['label' => 'Mobilisation']),
            new Area(['label' => 'Outreach']),
            new Area(['label' => 'VR']),
        ]);


        /* No Basket */
        $basket = new Basket();
        $basket->label = 'No Basket';
        $basket->tag = 'NB';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Reactive']),
        ]);


        /* Oceans */
        $basket = new Basket();
        $basket->label = 'Oceans';
        $basket->tag = 'OC';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Fishing']),
            new Area(['label' => 'Pollution']),
            new Area(['label' => 'Marine Reserves']),
            new Area(['label' => 'Whaling']),
        ]);


        /* Oil */
        $basket = new Basket();
        $basket->label = 'Oil';
        $basket->tag = 'OI';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Demand']),
            new Area(['label' => 'Supply']),
        ]);


        /* Toxics */
        $basket = new Basket();
        $basket->label = 'Toxics';
        $basket->tag = 'TX';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Detox']),
        ]);

    }
}
