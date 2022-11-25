<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Helpers\Messages;
use App\Http\Requests\RegionRequest;
use App\Http\Resources\RegionResource;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Region::all();
        return view('cms.regions.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::where('active',true)->get();
        return view('cms.regions.create',['cities' => $cities]);
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
            'city_id' => 'required|string|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $region = new Region();
            $region->name_ar = $request->input('name_ar');
            $region->name_en = $request->input('name_en');
            $region->longitude = $request->input('longitude');
            $region->latitude = $request->input('latitude');
            $region->city_id = $request->input('city_id');
            $region->active = $request->input('active');
            $region->save();

            return ControllersService::generateProcessResponse(true,'CREATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $cities = City::where('active',true)->get();
        return view('cms.regions.edit',['cities' => $cities,'region' => $region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'active' => 'required|boolean',
            'city_id' => 'required|string|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $region->name_ar = $request->input('name_ar');
            $region->name_en = $request->input('name_en');
            $region->longitude = $request->input('longitude');
            $region->latitude = $request->input('latitude');
            $region->city_id = $request->input('city_id');
            $region->active = $request->input('active');
            $region->save();

            return ControllersService::generateProcessResponse(true,'UPDATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
