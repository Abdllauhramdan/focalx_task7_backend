<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try{
            DB::beginTransaction();

            $brand = Brand::create([
                'name' => $request->name,
                'Brand_id' => $request->type,
        
            ]);

            DB::commit();
            return response()->json([
                'statuse' => 'Store Success',
                'brand' => $brand
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'statuse' => 'Store Failed',
                'error' => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        
        return response()->json([
            'statuse' => 'Show success',
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        try{
            DB::beginTransaction();

            $brand = Brand::update([
                'name' => $request->name,
                'Brand_id' => $request->type,
        
            ]);

            DB::commit();
            return response()->json([
                'statuse' => 'Store Success',
                'brand' => $brand
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'statuse' => 'Store Failed',
                'error' => $th
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try{
            DB::beginTransaction();
    
        $brand->delete();
    
            DB::commit();
            return response()->json([
                'status' => 'Delete Success',
                'product' => $brand
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => 'Delete Failed',
    
            ]);
    }
    }
}
