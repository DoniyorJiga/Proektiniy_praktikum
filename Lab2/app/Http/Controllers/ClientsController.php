<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
  public function all()
  {
    $clients = DB::select('CALL `getclients`()');
    return response()->json([
        'data' => $clients
    ], 200);
  }

  public function one($id)
  {
    $client = DB::select('CALL `getclient`(?)', [$id]);
    return response()->json([
        'data' => $client
    ], 200);
  }

  public function store(Request $request)
  {
    $fullname = $request->input('fullname');
    DB::statement('CALL `addclient`(?)', [$fullname]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function delete($id)
  {
    DB::statement('CALL `deleteclient`(?)', [$id]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $fullname = $request->input('fullname');
    DB::statement('CALL `changeclient`(?,?)', [$fullname, $id]);
    return response()->json([
        'data' => true
    ], 200);
  }


}
