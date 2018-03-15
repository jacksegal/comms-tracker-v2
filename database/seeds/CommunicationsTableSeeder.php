<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommunicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communications')->insert([

            'title' => 'My First Comms',
            'description' => 'The first ever comms I created in this tool.',

            'basket_id' => '1',
            'area_id' => '1',
            'sub_area_id' => '1',

            'medium_id' => '1',
            'ask_id' => '1',

            'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
            'date_flexibility' => 'Very Flexible',

            'approx_recipients' => '192',
            'data_selection' => '0',
            'notes' => 'Some notes on this communication',

            //bsd_tag

            'user_id' => 1,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('communication_audiences')->insert([
            'communication_id' => '1',
            'audience_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
