<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Messages;
use App\Http\Requests\AboutPrivecyTermUserReqest;
use App\Http\Resources\AboutUsResource;
use App\Http\Trait\CustomTrait;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    use CustomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AboutUs::first();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new AboutUsResource($data)
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
        $about = AboutUs::create($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_SEND'),
            'data' => new AboutUsResource($about)
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(AboutPrivecyTermUserReqest $request, AboutUs $aboutUs)
    {

        $data = $request->validated();
        if($request->hasFile('image')){
            $filePath = $this->uploadFile($request->file('image'));
            $data['image'] = $filePath;
        }else{
            $data['image'] = $aboutUs->image;
        }
        $aboutUs->update($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_EDIT'),
            'data' => new AboutUsResource($aboutUs)
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
