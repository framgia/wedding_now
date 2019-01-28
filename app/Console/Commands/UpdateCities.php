<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cities:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Cities, Districts from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urlCity = config('define.api_location') . '/api/city';
        $getCity = json_decode(file_get_contents($urlCity), true);

        foreach ($getCity['LtsItem'] as $value) {
            DB::table('cities')->insert([
                'id' => $value['ID'],
                'name' => $value['Title'],
                'slug' => str_replace('/', '', $value['SolrID'])
            ]);

            $urlDistrict = config('define.api_location') . '/api/city/' . $value['ID'] . '/district';
            $getDistrict = json_decode(file_get_contents($urlDistrict), true);

            foreach ($getDistrict as $val) {
                DB::table('districts')->insert([
                    'name' => $val['Title'],
                    'city_id' => $value['ID'],
                ]);
            }
        }
    }
}
