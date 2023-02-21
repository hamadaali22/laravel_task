<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sensor;
use DB;
use Crypt;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
         $url = 'http://localhost/curlphp/';

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $response = curl_exec ($ch);
         $err = curl_error($ch);  
         curl_close ($ch);

        // $add = new Sensor();
        // $add->tds_data  = $response->tds_data;    
        // $add->ph_data  = $response->ph_data;   
        // $add->water_temp_data  = $response->water_temp_data; 
        // $add->water_level_data  = $response->water_level_data; 
        // $add->water_flow_speed_data  = $response->water_flow_speed_data; 
        // $add->air_temp_data  = $response->air_temp_data; 


        // $add->save();
        // \Log::info($response->local['INFO']['tds_data']);
        \Log::info($response);
        



        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "http://127.0.0.1:8000/api/registerr",// your preferred url
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30000,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => json_encode($response),
        //     CURLOPT_HTTPHEADER => array(
        //         "accept: */*",
        //         "accept-language: en-US,en;q=0.8",
        //         "content-type: application/json",
        //     ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //   print_r(json_decode($response));
        // }


    }
}
