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
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Climate']),
            new Area(['label' => 'Energy']),
        ]);


        /* Forests */
        $basket = new Basket();
        $basket->label = 'Forests';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Amazon']),
            new Area(['label' => 'Boreal']),
            new Area(['label' => 'India']),
            new Area(['label' => 'Indonesia']),
        ]);


        /* Greenpeace Organisation */
        $basket = new Basket();
        $basket->label = 'Greenpeace Organisation';
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
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Peace']),
            new Area(['label' => 'Reactive']),
            new Area(['label' => 'Threats to GP']),
            new Area(['label' => 'Voting']),
        ]);


        /* Oceans */
        $basket = new Basket();
        $basket->label = 'Oceans';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Fishing']),
            new Area(['label' => 'Plastics']),
            new Area(['label' => 'Marine Reserves']),
            new Area(['label' => 'Whaling']),
        ]);


        /* Oil */
        $basket = new Basket();
        $basket->label = 'Oil';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Demand']),
            new Area(['label' => 'Supply']),
            new Area(['label' => 'Save the Arctic']),
        ]);


        /* Toxics */
        $basket = new Basket();
        $basket->label = 'Toxics';
        $basket->save();

        $basket->areas()->saveMany([
            new Area(['label' => 'Detox']),
        ]);

    }
}
