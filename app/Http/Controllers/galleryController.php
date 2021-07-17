<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddProductRequest;
use App\Gallery;
use App\Gallery_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class galleryController extends Controller
{
    public function index(){
        $gallery = DB::table('gallery')->paginate(20);
        // $gallery= Gallery::all()->paginate(15);
        return view('gallery.galleryList',compact('gallery'));
    }
    public function delete($id){
        $gallery=Gallery::find($id);
        $gallery->delete();
        return redirect('/galleryList');
    }
     //(function) to bring an item of gallery by id and edit it
     public function edit($id){
        $gallery=Gallery::find($id);
        return view('gallery.editGallery',compact('gallery'));
    }

    //(function) to update the editing and store it to database
    public function update(Request $request,$id){
        $gallery=Gallery::find($id);
        $gallery->product_name=Request('product_name');
        $gallery->stock_no =Request('stock_no');
        $gallery->update();
        return redirect('/galleryList');

    }

    public function addProduct(){
        
        return view('gallery.addProduct');

    }

    public function store(AddProductRequest $request){
       
        $gallery= new Gallery();
        $gallery->product_name=Request('product_name');
        $gallery->stock_no=Request('stock_no');
        $gallery->save();
        return redirect()->back();
    
    }


//function to make new order
    
    public function galleryOrder(Request $request){
        $gallery = Gallery::all(['id','product_name','stock_no']);
        return view('gallery.galleryOrderTwo', compact('gallery'));
    }

    
//fuction to save order
public function storeOrder(Request $request){
    $request->validate( [
        'quantity' => 'required',
        'product' => 'required',
        'date'=>'required'
       
    ]);
    $units = [];
    $message= array();

    foreach ($request->product as $key => $product) {
        $units[] = [
           
            'user_id' => 1,
            'gallery_id' => $request->product[$key],
            'amount' => $request->quantity[$key],
            'date' => $request->date,
        ];
        $stock = \App\Gallery::where('id', $request->product[$key])->firstOrFail();
        if($stock->stock_no-$request->quantity[$key]<0)
        $message[] = 'Not enough quantity of product ' . $stock->product_name;


 
    } 

 

    if(! empty($message)) {
            return redirect()->back()->withErrors($message);
    }
       
  elseif  (! empty($units)) {

            DB::table('gallery_user')->insert($units);
            foreach ($request->product as $key => $product) {
            DB::table('gallery')
            ->where('id',$request->product[$key])->decrement('stock_no',$request->quantity[$key]);
            }
            $request->session()->flash('status', 'successful');
            return redirect()->back();
        }
    }
//funcction to fetch price with ajax
    public  function priceTwo(Request $request )
    {
        $query= $request->get('productID');
        $one = DB::table('gallery_pricing')
            ->where('gallery_id','=', $query)
            ->pluck('pricing_id');
        $op=DB::table('pricing')
            ->where('id','=',$one)
            ->pluck('sale_price');
        $op=$op[0];
        // ($op);
        return response()->json($op);
    }
//funcction to fetch total price with ajax
    public function totalPriceUpdate(Request $request){
        $query1= $request->get('quantity');
        $query2= $request->get('productID');

        $one = DB::table('gallery_pricing')
            ->where('id', $query2)
            ->pluck('pricing_id');
        $op=DB::table('pricing')
            ->where('id',$one)
            ->pluck('sale_price');
        $op=$op[0];
        $price=$query1*$op;
        return response()->json($price);
    }
}

