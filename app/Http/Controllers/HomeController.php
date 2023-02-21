<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = 'http://localhost/curlphp/';

        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $response = curl_exec ($ch);
         $err = curl_error($ch);  
         curl_close ($ch);
         echo $response;
         $result = json_decode($response, true);
         
         $tds_data;
         $ph_data;
         $water_temp_data;
         $water_level_data;
         $water_flow_speed_data;
         $air_temp_data;
        foreach($result as $key=>$resu){
            if($key=='tds_data'){
                $tds_data=$resu;
            }elseif($key=='ph_data'){
                $ph_data=$resu;
            }elseif($key=='water_temp_data'){
                $water_temp_data=$resu;
            }elseif($key=='water_level_data'){
                $water_level_data=$resu;
            }elseif($key=='water_flow_speed_data'){
                $water_flow_speed_data=$resu;
            }else{
                $air_temp_data=$resu;
            }
        }
        
         echo $tds_data.'<br>';
         echo $ph_data.'<br>';
         echo $water_temp_data.'<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';

         // dd('');
        return view('home');
    }
}
