<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Messages;
use App\Http\Requests\AboutPrivecyTermUserReqest;
use App\Http\Resources\PrivecyResource;
use App\Http\Trait\CustomTrait;
use App\Models\Privecy;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrivecyController extends Controller
{
    use CustomTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Privecy::first();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new PrivecyResource($data)
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutPrivecyTermUserReqest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $filePath = $this->uploadFile($request->file('image'));
            $data['image'] = $filePath;
        }else{
            $data['image'] = null;
        }
        $priv = Privecy::create($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_SEND'),
            'data' => new PrivecyResource($priv)
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Privecy  $privecy
     * @return \Illuminate\Http\Response
     */
    public function show(Privecy $privecy)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Privecy  $privecy
     * @return \Illuminate\Http\Response
     */
    public function edit(Privecy $privecy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Privecy  $privecy
     * @return \Illuminate\Http\Response
     */
    public function update(AboutPrivecyTermUserReqest $request, Privecy $privecy)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $filePath = $this->uploadFile($request->file('image'));
            $data['image'] = $filePath;
        }else{
            $data['image'] = $privecy->image;
        }
        $privecy->update($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_EDIT'),
            'data' => new PrivecyResource($privecy)
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Privecy  $privecy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Privecy $privecy)
    {
        $privecy->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
