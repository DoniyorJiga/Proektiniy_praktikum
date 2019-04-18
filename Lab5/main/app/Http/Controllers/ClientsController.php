<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
  public function all()
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getclients');
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function one($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://127.0.0.1:8001/api/getclients/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function store(Request $request)
  {
    $fullname = $request->input('fullname');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'http://127.0.0.1:8001/api/addclients', 
      ['body' => ['fio' => $fullname]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function delete($id)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('DELETE', 'http://127.0.0.1:8001/api/deleteclients/'.$id);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $fullname = $request->input('fullname');
    $client = new \GuzzleHttp\Client();
    $response = $client->request('PUT', 'http://127.0.0.1:8001/api/changeclients/'.$id, 
      ['body' => ['fio' => $fullname]]);
    $json = $response->getBody();
    $json = json_decode($json, true);

    return response()->json([
        'data' => $json['data']
    ], 200);
  }


}
