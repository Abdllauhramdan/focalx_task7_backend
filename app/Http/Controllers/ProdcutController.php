<?php

namespace App\Http\Controllers;

use App\Models\Prodcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products=Product::all();
            return response()->json([
                'status' =>'success',
                'product'  => $products]);
        }catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => 'failed',
                'error' => $th
            ]);
    }
}

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $product = Product::create([
                'name' => $request->name,
                'type' => $request->type,
                'color' => $request->color,
                'Brand_id' => $request->Brand_id,
        
            ]);

            DB::commit();
            return response()->json([
                'statuse' => 'Store Success',
                'product' => $product
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
    public function show(Prodcut $prodcut)
    {
        
        return response()->json([
            'statuse' => 'Show success',
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodcut $prodcut)
    {
        try{
            DB::beginTransaction();

            $product = Product::create([
                'name' => $request->name,
                'type' => $request->type,
                'color' => $request->color,
                'Brand_id' => $request->Brand_id,
        
            ]);


            DB::commit();
            return response()->json([
                'statuse' => 'Update Success',
                'product' => $product
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'statuse' => 'Update Failed',
                'error' => $th
            ]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodcut $prodcut)
    {
        try{
            DB::beginTransaction();
    
        $product->delete();
    
            DB::commit();
            return response()->json([
                'status' => 'Delete Success',
                'product' => $product
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => 'Delete Failed',
    
            ]);
    }
    }
}

