<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
  public function all()
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getservices');
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function one($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getservices/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function store(Request $request)
  {
    $name = $request->input('name');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'http://127.0.0.1:8001/api/storeservices', 
      ['body' => ['name' => $name]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function delete($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('DELETE', 'http://127.0.0.1:8001/api/deleteservices/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $name = $request->input('name');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('PUT', 'http://127.0.0.1:8001/api/changeservices/'.$id, 
      ['body' => ['name' => $name]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

}
