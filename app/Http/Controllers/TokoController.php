<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Toko;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller
{
    public function index(){
        $products = Toko::all();
        return response()->json([
            'products' => $products
        ]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|max:100'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        Toko::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);
        return response()->json([
            'message' => 'Berhasil  menambahkan data'
        ]);
    }

    public function show($id){
        $products = Toko::findOrFail($id);
        return response()->json($products);
    }

    public function search(Request $request){
        $products = Toko::where('name','LIKE','%'.$request->name.'%')->get();
        return response()->json([
            'products' => $products
        ]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|max:100'
        ]);

        Toko::findOrFail($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);
        return response()->json([
            'message' => 'Data berhasil diubah'
        ]);
    }

    public function destroy($id){
        Toko::destroy($id);
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
