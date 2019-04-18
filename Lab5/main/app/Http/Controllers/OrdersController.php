<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
  public function all()
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getorders');
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function one($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getorders/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function store(Request $request)
  {
    $client_id = $request->input('client_id');
    $service_id = $request->input('service_id');
    $date = $request->input('date');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'http://127.0.0.1:8001/api/addorders', 
      ['body' => ['client_id' => $client_id, 'service_id' => $service_id, 'date' => $date]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function delete($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('DELETE', 'http://127.0.0.1:8001/api/deleteorders/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $client_id = $request->input('client_id');
    $service_id = $request->input('service_id');
    $date = $request->input('date');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('PUT', 'http://127.0.0.1:8001/api/changeorders/'.$id, 
      ['body' => ['client_id' => $client_id, 'service_id' => $service_id, 'date' => $date]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

}
