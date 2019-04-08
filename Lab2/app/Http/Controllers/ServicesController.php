<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
  public function all()
  {
    $services = DB::select('CALL `getservices`()');
    return response()->json([
        'data' => $services
    ], 200);
  }

  public function one($id)
  {
    $service = DB::select('CALL `getservice`(?)', [$id]);
    return response()->json([
        'data' => $service
    ], 200);
  }

  public function store(Request $request)
  {
    $name = $request->input('name');
    DB::statement('CALL `addservice`(?)', [$name]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function delete($id)
  {
    DB::statement('CALL `deleteservice`(?)', [$id]);
    return response()->json([
        'data' => true
    ], 200);
  }

  public function change(Request $request, $id)
  {
    $name = $request->input('name');
    DB::statement('CALL `changeservice`(?,?)', [$name, $id]);
    return response()->json([
        'data' => true
    ], 200);
  }

}
