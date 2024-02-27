<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Dbfx\LaravelStrapi\LaravelStrapi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class StrapiController extends Controller
{
    // public function getDataFromStrapi()
    // {
       
    //     $strapi = new LaravelStrapi();
    //     $products = $strapi->collection('products');
    //     // dd($products);
    //     return view('home', compact(['products']));
    // }


public function getDataFromStrapi()
{
    $url = 'http://localhost:1337/api/products';
    

    $client = new Client();
    
    try {
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        return view('home', compact('data'));
    } catch (\Exception $e) {
        return view('error', ['error' => $e->getMessage()]);
    }
}


    public function getDetailProduct($id)
    {
        $strapi = new LaravelStrapi();
        $entry = $strapi->entry('products', $id);
        // dd($entry);
        return view('detail', compact(['entry']));
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/strapi');
    }

    public function addStapiproduct(Request $request){

        $url = 'http://localhost:1337/api/products'; // Ganti dengan URL API Strapi Anda
    
        $client = new Client();
    
        try {
            // Data yang akan disisipkan
            $data = [
                "data" => [
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'type' => $request->get('type'),
                ]
            ];
    
            // Lakukan HTTP POST request ke API Strapi
            $response = $client->post($url, [
                'json' => $data,
            ]);
    
            // Ambil data dari response jika diperlukan
            $insertedData = json_decode($response->getBody(), true);
    
            // Lakukan apapun yang diperlukan dengan data yang telah disisipkan
            return view('/welcome');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return $e->getMessage();
            
        }
    }

    public function addproduct(){

        return view('addproduct');

    }


}
