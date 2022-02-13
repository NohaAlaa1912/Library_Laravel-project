<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCatController extends Controller
{
    public function index()
    {
        // $cats = Cat::all();
        $cats = Cat::paginate(2);


        return CatResource::collection($cats);
    }

    public function show($id)
    {
        $cat = Cat::find($id);
        if ($cat == null) {
            return response()->json([
                'msg' => '404 not found'
            ], 404);
        }
        
        return new CatResource($cat);

        // return response()->json([
        //     'cat' => new CatResource($cat),
        //     200, [
        //         'any header'
        //     ]
        // ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required|string|max:50',
            'desc' =>'required|string',
            'img' =>'required|image|max:1024|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 409);
        }

        $imgPath = Storage::putFile("cats", $request->img);
        
        $cat = Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img'  => $imgPath
        ]);
        return response()->json([
            'msg' => 'created successfully',
            'cat' => new CatResource($cat),
        ], 201);
    }

    public function update(Request $request, $id) 
    { 
        $validator = Validator::make($request->all(), [
            'name' =>'required|string|max:50',
            'desc' =>'required|string',
            'img' =>'nullable|required|image|max:1024|mimes:jpg,jpeg,png'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 409);
        }
        $cat = Cat::find($id);

        if ($cat == null) {
            return response()->json([
                'msg' => '404 not found'
            ], 404);
        }

        $imgPath = $cat->img;

        if ($request->hasFile('img')) {
            
            Storage::delete($imgPath);
            $imgPath = Storage::putFile("cats", $request->img);
        }
        
        $cat->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img'  => $imgPath
        ]);

         return response()->json([
            'msg' => 'updated successfully',
            'cat' => new CatResource($cat),
        ], 200);

    }
    public function delete($id) 
    {
        $cat =Cat::find($id);
        if ($cat == null) {
            return response()->json([
                'msg' => '404 not found'
            ], 404);
        }

        Storage::delete($cat->img);
        $cat->delete();

        return response()->json([
            'msg' => 'deleted successfully',
        ], 200);
    }
}