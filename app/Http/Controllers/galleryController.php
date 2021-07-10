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

    // public function galleryOrder(Request $request){
    //     $gallery = Gallery::all(['id','product_name','stock_no']);
    //     return view('makeGalleryOrder', compact('gallery'));
    // }


    
    public function galleryOrder(Request $request){
        $gallery = Gallery::all(['id','product_name','stock_no']);
        return view('gallery.galleryOrderTwo', compact('gallery'));
    }

    public function storeOrder(Request $request){
        $request->validate( [
            // 'date' => 'required',
            'product.*' => 'required',
            'quantity.*' => 'required|numeric',
         
        ]);

        /*DB::beginTransaction();

        try {*/
            for ($i=0;$i<count($request['product']);$i++)
        {
                $gallery_user = new Gallery_User();
                $gallery_user->user_id = 1;
                $gallery_user->date = date('2021-06-27');
                $gallery_user->gallery_id = (int)$request['product'][$i];
                $gallery_user->amount = (int)$request['quantity'][$i];
                $stock = DB::table('gallery')
                        ->where('id','=', $request['product'])
                        ->pluck('stock_no');
                        //dd($stock[0]<$request['quantity'][0]);
                        dd($stock[1]);
                        if($stock[$i]<$request['quantity'][$i]){
                            $request->session()->flash('status', 'no enough qty!');
                            //dd($request['quantity']);
                            return redirect()->back();
                            //dd('aya');
                        }
                $gallery_user->save();
                        //dd('hhhhhh');
                $product=Gallery::findorfail((int)$request['product'][$i]);
                //dd($product);
                $product->stock_no=$product->stock_no - $request['quantity'][$i];
                $product->save();

                $request->session()->flash('status', 'successful');
                return redirect()->back();
         }

           /* DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }*/

        // $gallery_id = Gallery::get('id'); 
        // $gallery_qty= Gallery::get('stock_no'); 
        
    }
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

    // public function totalPriceUpdate(Request $request){
    //     $query1= $request->get('quantity');
    //     $query2= $request->get('dishID');

    //     $op = DB::table('dishes')
    //         ->where('id','=', $query2)
    //         ->pluck('dish_price');
    //     $op=$op[0];
    //     $price=$query1*$op;
    //     return response()->json($price);
    // }

    

// public function storeOrder(Request $request){
      
//     $units = [];
//     $message= array();//place outside the loop
//     $stock = [];
//     // if($request->quantity<0)
//     // dd($stock);
   
//     foreach ($request->product as $key => $product) {
//         $units[] = [
           
//             'user_id' => 1,
//             'gallery_id' => $request->product[$key],
//             'amount' => $request->quantity[$key],
//             'date' => date('2021-06-27'),
//         ];
//         $stock[]= DB::table('gallery')
//             ->where('id',$request->product[$key])
//             // ->where('stock_no','-',$request->quantity[$key],'>=',0)
//             ->pluck('stock_no');
//     } 
//     dd($stock);
//     // while($product->quantity - $item->qty<0);
//     // $message[] = 'Not enough Product' . $item->id;
// //  dd($request->product);
//     if (! empty($units)) {
//         DB::table('gallery_user')->insert($units);
//     }
//     }
}
