<?php

namespace App\Http\Controllers;

use App\Models\ModelUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UrlRequestController extends Controller
{
    public function index()
    {
        $urls = ModelUrl::all();
        // return view('index', compact('url'));
        // $response = Http::get('https://viacep.com.br/ws/89306076/json/');
        // dd($url);
        // dd($response->body(), $response->status());
        // update($response, 1);
        foreach ($urls as $url) {
            // echo "{$url->id}=>{$url->description_url}"."<br>";
            $response = Http::get($url->description_url);
            echo "ID: {$url->id}, Body:<br>{$response->body()}, <br> Status: {$response->status()}<br><br>";
            ModelUrl::where(['id' => $url->id])->update([
                'status_code' => $response->status(),
                'response' => $response->body()
            ]);

        }
        die;
    }

    // public function update(Request $request, $id)
    // {
    //     $edit = ModelUrl::where(['id' => $id])->update([
    //         'description_url' => $request->url,
    //         'status_code' => $request->status,
    //         'response' => $request->response,
    //         'id_user' => $request->id_user
    //     ]);
    //     if($edit){
    //         return redirect('urls');
    //     }
    // }
}
