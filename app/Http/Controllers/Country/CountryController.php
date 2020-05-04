<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    public function country()
    {
        return response()->json(Country::all(),200);
    }
    public function countrybyid($value)
    {
        $dd=Country::find($value);
    	if (is_null($dd)) {
        return response()->json('not found',404);
    	}
        return response()->json(Country::find($value),200);
    }
    public function countrycreate(Request $request)
    {
    	$save=Country::create($request->all());
        return response()->json($save,201);
    }
    public function countrycupdate(Request $request,Country $country)
    {
    	$country->update($request->all());
        return response()->json($country,200);    }
}
