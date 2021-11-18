<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;


class InfoController extends Controller
{
    // Satpam :v
    public function __construct()
    {
        $this -> middleware('auth');
    }

    // Show Index
    // public function storeBegin()
    // {
    //     $provinces = Province::pluck('name', 'code');
    //     return view('client', ['provinces'=>$provinces]);
    // }

    // Provinsi -> City
    public function storeCity(Request $request)
    {
        $cities = City::where('province_code', $request->get('id'))
            ->pluck('name', 'code');
        return response()->json($cities);
    }

    // City -> District
    public function storeDistrict(Request $request)
    {
        $districts = District::where('city_code', $request->get('id'))
            ->pluck('name', 'code');
        return response()->json($districts);
    }

    // District -> Village
    public function storeVillage(Request $request)
    {
        $villages = Village::where('district_code', $request->get('id'))
            ->pluck('name', 'id');
        return response()->json($villages);
    }
}