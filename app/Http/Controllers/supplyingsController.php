<?php

namespace App\Http\Controllers;
use App\Oil_Gas;
use App\Pump;
use App\Measurment;
use App\Pump_Measurment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class supplyingsController extends Controller
{
    public function index(){
        $fuel=Oil_Gas::all()->keyBy('id');
        $pumps_type=Pump::with('oil_gas')->get()->groupBy('oil_gas_id');
        $measuring_timing=['الثامنة صباح', 'قبل النقلة','بعد حضور النقلة'];
        
        return view('supplyings.addDailyMeasurment',compact('pumps_type','fuel','measuring_timing'));
    }
    public function store(Request $request){
        $date=Request('date');
        $measurment_timing=Request('measurment_timing');
$mimo=[];
$m_id=[];

        foreach ($request->gas_id as $key => $gas_id) { 

       $measurment=new Measurment();
       $measurment->date=$date;
       $measurment->fuel_id=$request->gas_id[$key];
       $measurment->dafter=$request->dafter[$key];
       $measurment->save();

        }
        foreach ($request->pump_id as $key => $pump_id) {
            $fuel_id=$request->fuel_id[$key];
            $pump_id=$request->pump_id[$key];
            $measurement=$request->measurment[$key];


            $measurment_id =Measurment::where('date',$date)
                                        ->where('fuel_id',$fuel_id)
                                        ->orderBy('id', 'desc')
                                        ->pluck('id')
                                        ->first();
            $m_id[]=$measurment_id;

       $mimo[] = [
           
        'date' => $date,
        'fuel_id' =>$fuel_id,
        'pump_id' =>$pump_id,
        'measurement' =>$measurement,
        'measurment_timing' =>$measurment_timing,
        'measurment_id'=>$measurment_id
    ];
       }
              DB::table('pump_measurment')->insert($mimo);
$namelist[]=array();
$moo =collect($m_id)->unique(); //well

$ff=DB::table('measurments')
->whereIn('id', $moo);
       foreach ($request->gas_id as $key => $gas_id) { 
    $namelist =collect($mimo)
                ->where('fuel_id',  $gas_id)
                ->sum('measurement');
                // $monsh[]=$namelist; //not well

    DB::table('measurments')
            ->where('id', $moo[$key])
            ->update(['total_measurement' => $namelist]);
    

    // $sum=$namelist->where('fuel_id',1)->pluck('measurement');
    // $namelist =collect($mimo);
       }
 $ff->where('fuel_id','1')->decrement('total_measurement','55');
 $ff->where('fuel_id','3')->decrement('total_measurement','55');

//  $ff->where('fuel_id', 1)->update(['total_measurement' => DB::raw('total_measurement - 100')]);;


dd($moo);


    }
}
