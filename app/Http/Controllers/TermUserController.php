<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Messages;
use App\Http\Requests\AboutPrivecyTermUserReqest;
use App\Http\Resources\TermUserResource;
use App\Http\Trait\CustomTrait;
use App\Models\TermUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TermUserController extends Controller
{
    use CustomTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TermUser::first();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new TermUserResource($data)
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
        $term = TermUser::create($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_SEND'),
            'data' => new TermUserResource($term)
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermUser  $termUser
     * @return \Illuminate\Http\Response
     */
    public function show(TermUser $termUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermUser  $termUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TermUser $termUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermUser  $termUser
     * @return \Illuminate\Http\Response
     */
    public function update(AboutPrivecyTermUserReqest $request, TermUser $termUser)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $filePath = $this->uploadFile($request->file('image'));
            $data['image'] = $filePath;
        }else{
            $data['image'] = $termUser->image;
        }
        $termUser->update($data);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_EDIT'),
            'data' => new TermUserResource($termUser)
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermUser  $termUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermUser $termUser)
    {
        $termUser->delete();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS'),
        ],Response::HTTP_OK);
    }
}
