<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery_user;
use App\User_Esdar;
use App\User_Pump;
use Illuminate\Support\Facades\DB;
class salesController extends Controller

{
    public function galleryFuelSales(Request $request){
        return view('sales.galleryFuelSales');
    }
    public function fetchSales(Request $request){
        // $fuel=  Oil_Gas::all(['id','name']);
        $date= Request('date');
        $gallery_sales=Gallery_User::where('date',$date)->sum('total_price');
        $gallery_cost=Gallery_User::where('date',$date)->sum('cost_price');
        //  echo($date);
        
        $bons=User_Esdar::where('date',$date)->count();
        $bon_sales=($bons*2);
        $fuel_sales=User_Pump::where('date',$date)->sum('sold');
        $total_sales=$gallery_sales+$bon_sales;
        // ANALYSIS THE SALES
        
        return view('sales.test',compact('gallery_sales'));

        // return response()->json($gallery_sales);
        // $bon_pricing= DB::table('esdar_gas_type')
        // ->join('user_esdar', 'esdar_gas_type.esdar_id', '=', 'user_esdar.esdar_id')
        // ->pluck('esdar_gas_type.gas_price');
        //  dd($bon_pricing);

        // $gallery_purchase= 
        // dd($date);
        // BONS CASH AND GALLERY COST
        // $bon_price
        // $total_bons_cash=
         
      }
}
