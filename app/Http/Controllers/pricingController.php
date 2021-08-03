<?php

namespace App\Http\Controllers;
use App\Gallery;
use Illuminate\Support\Facades\DB;
use App\Gallery_Pricing;
use App\Oil_Gas_Pricing;
use App\Oil_Gas;
use Illuminate\Http\Request;

class pricingController extends Controller
{
//FUNCTION TO VIEW GALLERY PRICING PAGE
    public function galleryPricing(){
      $gallery=  Gallery::all(['id','product_name']);
        return view('pricing.galleryPricing',compact('gallery'));
    }

    public function storeGalleryPricing(Request $request ){
        $gallery_pricing=new Gallery_Pricing();
        $gallery_pricing->date=Request('date');
        $gallery_pricing->gallery_id=Request('gallery_product');
        $gallery_pricing->sale_price=Request('sale_price');
        $gallery_pricing->purchase_price=Request('purchase_price');
        $gallery_pricing->commission=Request('commission');
        $gallery_pricing->save();
        $request->session()->flash('status', 'successful');
        return redirect()->back();
    }
    public function indexGalleryPricing(){
      
        $gallery_pricing= DB::table('gallery_pricing')
        ->join('gallery', 'gallery_pricing.gallery_id', '=', 'gallery.id')
        ->select('gallery_pricing.*', 'gallery.product_name')
        ->paginate(20);
        return view('pricing.galleryPricingList',compact('gallery_pricing'));
    }
    public function deleteGalleryPricing($id){
        $gallery_pricing=Gallery_Pricing::find($id);
        $gallery_pricing->delete();
        return redirect('/galleryList');
    }
     //(function) to bring an item of gallery by id and edit it
     public function editGalleryPricing($id){
        $gallery_pricing=Gallery_Pricing::find($id);
        return view('pricing.editGalleryPricing',compact('gallery_pricing'));
    }

    //(function) to update the editing and store it to database
    public function updateGalleryPricing(Request $request,$id){
        $gallery_pricing=Gallery_Pricing::find($id);
        $gallery_pricing->date=Request('date');
        $gallery_pricing->gallery_id=Request('gallery_product');
        $gallery_pricing->sale_price=Request('sale_price');
        $gallery_pricing->purchase_price=Request('purchase_price');
        $gallery_pricing->commission=Request('commission');
        $gallery_pricing->update();
        $request->session()->flash('status', 'successful');
        return redirect()->back();

    }
    //FUEL PRICING SECTION 
   
    //FUNCTION TO VIEW FUEL PRICING PAGE
    public function fuelPricing(){
        $fuel=  Oil_Gas::all(['id','name']);
          return view('pricing.fuelPricing',compact('fuel'));
      }
      public function storeFuelPricing(Request $request ){
        $fuel_pricing=new Oil_Gas_Pricing();
        $fuel_pricing->date=Request('date');
        $fuel_pricing->oil_gas_id=Request('oil_gas_id');
        $fuel_pricing->sale_price=Request('sale_price');
        $fuel_pricing->purchase_price=Request('purchase_price');
        $fuel_pricing->commission=Request('commission');
        $fuel_pricing->save();
        $request->session()->flash('status', 'successful');
        return redirect()->back();
    }
    public function indexFuelPricing(){
        $fuel_pricing= DB::table('oil_gas_pricing')
        ->join('oil_gas', 'oil_gas_pricing.oil_gas_id', '=', 'oil_gas.id')
        ->select('oil_gas_pricing.*', 'oil_gas.name')
        ->paginate(20);
        return view('pricing.fuelPricingList',compact('fuel_pricing'));
    }
    public function deleteFuelPricing($id){
        $fuel_pricing= Oil_Gas_Pricing::find($id);
        $fuel_pricing->delete();
        return redirect('/fuel-pricing-list');
    }
}
