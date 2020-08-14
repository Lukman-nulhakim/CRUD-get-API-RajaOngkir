<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use  App\Province;
use App\City;

class PageController extends Controller
{
    public function index(){
        return "Halaman Utama";
    }

    public function getProvince(){
        $client = new Client;
        try {
            $response = $client->get('https://api.rajaongkir.com/starter/province', [
                'headers' => ['key' => '80361f8b033401c3f142ea2d3d4c0e76']
            ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        // json_decode mengambil data yg sudah berformat json dan mengubah data tersebut menjadi array atau string
        $array_result = json_decode($json, true);

        // print_r($array_result);

        // ini manggil province
        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++){
            $province = new Province;
            $province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
            $province->save();
        }
        
    }

    public function getcity(){
        $client = new Client;
        try {
            $response = $client->get('https://api.rajaongkir.com/starter/city', [
                'headers' => ['key' => '80361f8b033401c3f142ea2d3d4c0e76']
            ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        // print_r($array_result);

        // ini manggil city
        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++){
            $city = new City;
            $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $city->save();
        }
    }

    public function checkshipping(){
        $judul = "Halaman Chek Shipping";
        $city = City::get();

        return view('jne.check-shipping', compact('judul','city'));
        
    }

    public function processShipping(Request $request){
        $judul = "Halaman Cek Shipping Result";
        $client = new Client;

        try {
            $response = $client->post('https://api.rajaongkir.com/starter/cost', [
                'body' =>  'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier=tiki',
                'headers' => [
                    'key' => '80361f8b033401c3f142ea2d3d4c0e76',
                    'content-type' => 'application/x-www-form-urlencoded'
                ]
            ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        // print_r($array_result);

        $origin  = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

        return view('jne.check-shipping-result', compact('judul','origin','destination','array_result'));
    }
}
