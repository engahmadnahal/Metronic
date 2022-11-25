<?php

namespace App\Http\Controllers;

use App\Helpers\ControllersService;
use App\Helpers\Messages;
use App\Http\Requests\StudioServiesReqest;
use App\Http\Resources\ServiceStudioResource;
use App\Models\ServiceStudio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceStudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ServiceStudio::all();
        return view('cms.servcies.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.servcies.create');
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
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $serviceStudio = new ServiceStudio();
            $serviceStudio->name_ar = $request->input('name_ar');
            $serviceStudio->name_en = $request->input('name_en');
            $serviceStudio->active = $request->input('active');
            $serviceStudio->save();

            return ControllersService::generateProcessResponse(true,'CREATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceStudio  $serviceStudio
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceStudio $serviceStudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceStudio  $serviceStudio
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceStudio $serviceStudio)
    {
        return view('cms.servcies.edit',['serviceStudio' => $serviceStudio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceStudio  $serviceStudio
     * @return \Illuminate\Http\Response
     */
    public function update(StudioServiesReqest $request, ServiceStudio $serviceStudio)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $serviceStudio->name_ar = $request->input('name_ar');
            $serviceStudio->name_en = $request->input('name_en');
            $serviceStudio->active = $request->input('active');
            $serviceStudio->save();
            return ControllersService::generateProcessResponse(true,'UPDATE');
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceStudio  $serviceStudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceStudio $serviceStudio)
    {
        $serviceStudio->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
