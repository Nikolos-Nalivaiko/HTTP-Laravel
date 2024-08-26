<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request) {

        $cities = City::where('region_id', $request->input('region_id'))->get();

        return response()->json(['cities' => $cities]);
    }
}
