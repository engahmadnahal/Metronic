<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Helpers\Messages;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = City::withCount('regions')->get();
        return view('cms.cities.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::where('active',true)->get();
        return view('cms.cities.create',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'active' => 'required|boolean',
            'code' => 'required|string|unique:cities,code',
            'country_id' => 'required|string|exists:countries,id',
        ]);
        if (!$validator->fails()) {
            $city = new City();
            $city->name_ar = $request->input('name_ar');
            $city->name_en = $request->input('name_en');
            $city->longitude = $request->input('longitude');
            $city->latitude = $request->input('latitude');
            $city->code = $request->input('code');
            $city->country_id = $request->input('country_id');
            $city->active = $request->input('active');
            $city->save();

            return ControllersService::generateProcessResponse(true,'CREATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries = Country::where('active',true)->get();
        return view('cms.cities.edit',['countries'=>$countries,'city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'active' => 'required|boolean',
            'code' => 'required|string|unique:cities,code,'.$city->id,
            'country_id' => 'required|string|exists:countries,id',
        ]);
        if (!$validator->fails()) {
            $city->name_ar = $request->input('name_ar');
            $city->name_en = $request->input('name_en');
            $city->longitude = $request->input('longitude');
            $city->latitude = $request->input('latitude');
            $city->code = $request->input('code');
            $city->country_id = $request->input('country_id');
            $city->active = $request->input('active');
            $city->save();

            return ControllersService::generateProcessResponse(true,'UPDATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
