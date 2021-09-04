<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    
    function show(){
        $list = Brand::all();
        return view('brand/list',['brands'=>$list]);
    }

    function form($id = null){
        $brand = new Brand();
        if($id!=null){
            $brand = Brand::findOrFail($id);
        }
        return view('brand/form',['brand'=>$brand]);
    }

    function save(Request $request){

        $request->validate([
            "name"=>'required'
        ]);

        $brand = new Brand();
        if($request->id>null){
            $brand = Brand::findOrFail($request->id);
        }
        $brand->name = $request->name;

        $brand->save();
        return redirect('/brand')->with('message', 'Producto Editado');
    }

    function delete($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('/brand')->with('deleteNotification', 'Producto Eliminado');

    }

}
