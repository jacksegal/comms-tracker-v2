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
        /*DB::table('communications')->insert([

            'title' => 'My First Comms',
            'description' => 'The first ever comms I created in this tool.',

            'basket_id' => '1',
            'area_id' => '1',
            'sub_area_id' => '1',
            'campaign_push_id' => '1',
            'push' => 'my push',

            'medium_id' => '1',
            'ask_id' => '1',

            'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
            'date_flexibility' => 'Very Flexible',

            'approx_recipients' => '192',
            'data_selection' => '0',
            'notes' => 'Some notes on this communication',

            'alt_ask' => '1',
            'reminder' => '2',
            'sample' => '1',

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


        DB::table('communications')->insert([

            'title' => 'Dev: Jack Segal test',
            'description' => 'Lorem ipsum dolor amet cardigan farm-to-table gochujang fixie YOLO. Letterpress mlkshk PBR&B, crucifix taiyaki try-hard single-origin coffee cloud bread kogi helvetica. ',

            'basket_id' => '1',
            'area_id' => '1',
            'sub_area_id' => '1',
            'campaign_push_id' => '1',
            'push' => 'my push',

            'medium_id' => '1',
            'ask_id' => '1',

            'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
            'date_flexibility' => 'Very Flexible',

            'approx_recipients' => '192',
            'data_selection' => '0',
            'notes' => 'Some notes on this communication',

            'alt_ask' => '1',
            'reminder' => '2',
            'sample' => '1',

            //bsd_tag

            'user_id' => 1,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);*/


 

DB::table('communications')->insert([
      'id' => '14',
      'title' => 'DRS deadline reminder',
      'description' => 'Consultation reminder, kick and spread.',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '19',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-05-09',
      'end_date' => '2019-05-10',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1300000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '14',
      'audience_id' => '5',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '3',
      'title' => 'Pole to Pole Reminder Cash Mailing',
      'description' => 'Cash reminder mailing with connect for pole to pole ship tour',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '2',
      'ask_id' => '4',
      'start_date' => '2019-06-14',
      'end_date' => '2019-06-15',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '3',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '8',
      'title' => 'Pole to Pole Main Cash Email 2',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '4',
      'start_date' => '2019-05-09',
      'end_date' => '2019-05-10',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '8',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '4',
      'title' => 'Pole to Pole Reminder Upgrade Mailing',
      'description' => 'Upgrade reminder mailing with connect for pole to pole ship tour appeal',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '2',
      'ask_id' => '6',
      'start_date' => '2019-06-14',
      'end_date' => '2019-06-15',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '60000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '4',
      'audience_id' => '9',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '12',
      'title' => 'Pole to Pole Main Upgrade Email 2',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '6',
      'start_date' => '2019-05-09',
      'end_date' => '2019-05-10',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '12',
      'audience_id' => '9',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '16',
      'title' => 'Ocean sanctuaries - email your MP reminder',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '2',
      'start_date' => '2019-05-08',
      'end_date' => '2019-05-09',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '100000',
      'reminder' => '1',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '16',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '13',
      'title' => 'DRS deadline reminder',
      'description' => 'Consultation reminder, kick and spread.',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '19',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-05-06',
      'end_date' => '2019-05-07',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1300000',
      'reminder' => '2',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '13',
      'audience_id' => '5',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '25',
      'title' => 'Bonnie Wright Rivers update',
      'description' => 'Email from Bonnie Wright asking supporters to sign the Rivers petition',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '1',
      'start_date' => '2019-04-30',
      'end_date' => '2019-05-01',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1000000',
      'reminder' => '2',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '25',
      'audience_id' => '5',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '9',
      'title' => 'Pole to Pole Main Cash Email 3',
      'description' => 'Cash ask for pole to pole ship tour appeal',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '4',
      'start_date' => '2019-05-14',
      'end_date' => '2019-05-15',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      'reminder' => '2',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '9',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '10',
      'title' => 'Pole to Pole Main Cash Email 4',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '4',
      'start_date' => '2019-05-16',
      'end_date' => '2019-05-17',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      'reminder' => '3',
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '10',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '24',
      'title' => 'Berry Cochrane',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '21',
      'medium_id' => '1',
      'ask_id' => '1',
      'start_date' => '2019-05-13',
      'end_date' => '2019-05-14',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '40000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '24',
      'audience_id' => '5',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '19',
      'title' => 'Email MP pledge',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '2',
      'start_date' => '2019-05-29',
      'end_date' => '2019-05-30',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1000000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '19',
      'audience_id' => '1',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '22',
      'title' => 'Rivers: email MP',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '2',
      'start_date' => '2019-06-19',
      'end_date' => '2019-06-20',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1000000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '22',
      'audience_id' => '1',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '26',
      'title' => 'Rivers: Kick Bonnie',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '1',
      'start_date' => '2019-05-07',
      'end_date' => '2019-05-08',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '1000000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '26',
      'audience_id' => '5',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '20',
      'title' => 'Spread email MP',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '3',
      'start_date' => '2019-06-04',
      'end_date' => '2019-06-05',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '100000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '20',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '21',
      'title' => 'Rivers: Come to event',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-06-12',
      'end_date' => '2019-06-13',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '200000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '21',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '28',
      'title' => 'Rivers Check In at Westminster',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '12',
      'sub_area_id' => '14',
      'campaign_push_id' => '22',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-04-26',
      'end_date' => '2019-04-27',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '200000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '28',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '29',
      'title' => 'ULEZ - questions for the mayor',
      'description' => 'Email to ULEZ consultation signers asking them any questions they have for the mayor ahead of an interview in May.',
      'basket_id' => '6',
      'area_id' => '15',
      'sub_area_id' => '16',
      'campaign_push_id' => '23',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-04-26',
      'end_date' => '2019-04-27',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '40000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '29',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '1',
      'title' => 'Pole to Pole Main Cash Mailing',
      'description' => 'Cash Appeal for the Pole to Pole ship tour.',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '2',
      'ask_id' => '4',
      'start_date' => '2019-05-15',
      'end_date' => '2019-05-16',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '1',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '6',
      'title' => 'Pole to Pole Reminder Cash SMS',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '4',
      'ask_id' => '4',
      'start_date' => '2019-06-28',
      'end_date' => '2019-06-29',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '14000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '6',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '7',
      'title' => 'Pole to Pole Main Cash Email 1',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '4',
      'start_date' => '2019-05-07',
      'end_date' => '2019-05-08',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '25000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '7',
      'audience_id' => '8',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '2',
      'title' => 'Pole to Pole Main Upgrade Mailing',
      'description' => 'Upgrade Mailing for Pole to Pole',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '2',
      'ask_id' => '6',
      'start_date' => '2019-05-15',
      'end_date' => '2019-05-16',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '60000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '2',
      'audience_id' => '9',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '5',
      'title' => 'Pole to Pole Reminder Upgrade SMS',
      'description' => 'Upgrade Reminder SMS for Pole to Pole Ship Tour Appeal',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '4',
      'ask_id' => '6',
      'start_date' => '2019-06-28',
      'end_date' => '2019-06-29',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '14000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '5',
      'audience_id' => '9',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '11',
      'title' => 'Pole to Pole Main Upgrade Email 1',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '6',
      'start_date' => '2019-05-07',
      'end_date' => '2019-05-08',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '60000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '11',
      'audience_id' => '9',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '15',
      'title' => 'Ocean Sanctuaries - email your MP',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '2',
      'start_date' => '2019-05-02',
      'end_date' => '2019-05-03',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '120000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '15',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '17',
      'title' => 'Ocean Sanctuaries - join the PLN 1st wave',
      'description' => '',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-05-08',
      'end_date' => '2019-05-09',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '20000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '17',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '18',
      'title' => 'Ocean sanctuaries - join the PLN 2nd wave email',
      'description' => 'join the PLN (people who have emailed their MP)',
      'basket_id' => '5',
      'area_id' => '13',
      'sub_area_id' => '20',
      'campaign_push_id' => '26',
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-05-15',
      'end_date' => '2019-05-16',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '5000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '18',
      'audience_id' => '4',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '23',
      'title' => 'DD Conversion (Biodiversity)',
      'description' => 'Monthly payday DD conversion email, with biodiversity theme to link in to cash/upgrade appeal content and Unearthed biodiversity explainer videos (launching in April)',
      'basket_id' => '3',
      'area_id' => '6',
      
      
      'medium_id' => '1',
      'ask_id' => '5',
      'start_date' => '2019-05-03',
      'end_date' => '2019-05-04',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '200000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  
DB::table('communication_audiences')->insert([
      'communication_id' => '23',
      'audience_id' => '6',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('communications')->insert([
      'id' => '27',
      'title' => 'Bio Diversity email series',
      'description' => 'An email to ask people to watch and share UE biodiversity video and sign up for all of them',
      'basket_id' => '3',
      'area_id' => '7',
      
      
      'medium_id' => '1',
      'ask_id' => '10',
      'start_date' => '2019-05-06',
      'end_date' => '2019-05-07',
      'date_flexibility' => 'A bit flexible',
      'approx_recipients' => '30000',
      
      'user_id' => 1,
      'data_selection' => '0',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);  



    }
}
