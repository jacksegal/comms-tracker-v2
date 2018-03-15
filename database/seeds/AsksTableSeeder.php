<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AsksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asks')->insert([
            'label' => 'Petition',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Speakout',
            'color_font' => '#0f0d0d',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Share',
            'color_font' => '#ffffff',
            'color_background' => '#34ce2f',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'One-off donation',
            'tag' => 'cash',
            'color_font' => '#ffffff',
            'color_background' => '#ff35b8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Direct Debit',
            'color_font' => '#ffffff',
            'color_background' => '#46e2e2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Upgrade',
            'color_font' => '#000000',
            'color_background' => '#e2b046',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Legacy',
            'color_font' => '#ffffff',
            'color_background' => '#ff0000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Survey',
            'color_font' => '#ffffff',
            'color_background' => '#598e3e',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Offline Action',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Online Action',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Information',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Admin',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Sales',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('asks')->insert([
            'label' => 'Other',
            'color_font' => '#ffffff',
            'color_background' => '#4286f4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
