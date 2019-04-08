<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
  public function all()
  {
    $orders = DB::select('CALL `getorders`()');
    return response()->json([
        'data' => $orders
    ], 200);
  }

  public function one($id)
  {
    $order = DB::select('CALL `getorder`(?)', [$id]);
    return response()->json([
        'data' => $order
    ], 200);
  }

  public function store(Request $request)
  {
    $client_id = $request->input('client_id');
    $service_id = $request->input('service_id');
    $date = $request->input('date');
    DB::statement('CALL `addorder`(?,?,?)', [$client_id,$service_id,$date]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function delete($id)
  {
    DB::statement('CALL `deleteorder`(?)', [$id]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $client_id = $request->input('client_id');
    $service_id = $request->input('service_id');
    $date = $request->input('date');
    DB::statement('CALL `changeorder`(?,?,?,?)', [$client_id,$service_id,$date,$id]);
    return response()->json([
        'data' => true
    ], 200);
  }

}
