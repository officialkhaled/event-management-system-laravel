<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\District;

class CommonApiController extends Controller
{
    public function getDistricts(Request $request)
    {
        $divisionId = $request->get('division_id');

        $districts = District::query()
            ->where('division_id', $divisionId)
            ->get()
            ->map(function ($district) {
                return [
                    'id' => $district->id,
                    'text' => $district->name,
                ];
            })
            ->prepend(['id' => '', 'text' => 'Select']);

        return response()->json($districts);
    }

    public function getUpazilas(Request $request)
    {
        $districtId = $request->get('district_id');

        $upazilas = Upazila::query()
            ->where('district_id', $districtId)
            ->get()
            ->map(function ($upazila) {
                return [
                    'id' => $upazila->id,
                    'text' => $upazila->name,
                ];
            })
            ->prepend(['id' => '', 'text' => 'Select']);

        return response()->json($upazilas);
    }

    public function getUnions(Request $request)
    {
        $upazilaId = $request->get('upazila_id');

        $unions = Union::query()
            ->where('upazila_id', $upazilaId)
            ->get()
            ->map(function ($union) {
                return [
                    'id' => $union->id,
                    'text' => $union->name,
                ];
            })
            ->prepend(['id' => '', 'text' => 'Select']);

        return response()->json($unions);
    }
}
