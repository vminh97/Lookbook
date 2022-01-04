<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Model\Order;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $od = DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.id')->get();
            return response()->json($od);   
        }
        catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'response failed!'], 500);
        }
    }
    public function show($id)
    {
        try
        {
            $items = Order::select('*')->where('id',$id)->get();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        try{
            $this->validate($request, [
                'total_amount' => 'required|min:5',
                'total_quanity' => 'required',
                'shipper_on' => 'required',
                'status' => 'required',
                'comment' =>'required',
                'payment_method' => 'required',
                'customer_birthday'=>'required',
                'customer_code' =>'required',
                'customer_name' => 'required',
                'customer_phone' => 'required',
                'customer_email' =>'required',
                'receiver_name' => 'required',
                'receiver_phone'=>'required',
                'receiver_email' =>'required',
                'receiver_address' => 'required',
                'receiver_city' => 'required',
                'receiver_provice'=>'required',
                'receiver_tower'=>'required'
            ]);
        
            $od = Order::find($id);
            $od->total_amount = $request->input('total_amount');
            $od->total_quanity = $request->input('total_quanity');
            $od->shipper_on=$request->input('shipper_on');
            $od->status = $request->input('status');
            $od->comment= $request->input('comment');
            $od->payment_method = $request->input('payment_method');
            $od->customer_birthday = $request->input('customer_birthday');
            $od->customer_code = $request->input('customer_code');
            $od->customer_name = $request->input('customer_name');
            $od->customer_phone = $request->input('customer_phone');
            $od->customer_email = $request->input('customer_email');
            $od->receiver_name = $request->input('receiver_name');
            $od->receiver_phone = $request->input('receiver_phone');
            $od->receiver_email = $request->input('receiver_email');
            $od->receiver_address = $request->input('receiver_address');
            $od->receiver_city = $request->input('receiver_city');
            $od->receiver_provice = $request->input('receiver_provice');
            $od->receiver_tower = $request->input('receiver_tower');
            
            
            $od->save();
        
            return response([
                'order_detail' => $od
            ], 200);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $od = Order::find($id);
            $od->delete();
    
          return response()->json('Successfully Deleted');
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
    }
    public function SumRecord()
    {
        try
        {
            $users =  Order::count();
            return response()->json($users);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }     
    }
    public function SumRecordInDate()
    {
        try
        {
            $datetoday=date('y-m-d');
            $users =  Order::select('*')->whereDate('created_at',$datetoday)->get();
            $count = count($users);
            return response()->json($count);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }     
    }
    public function SumRecordInMonth()
    {
        try
        {

                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Order::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
                $count = count($sum);
                return response()->json($count);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }     
    }
    public function MonthlyGrowthRate()
    {
        try
        {
                $users =  Order::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Order::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
                $count = count($sum);
                $rate=(round($count/$users,2)) * 100;
                return response()->json($rate);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }   
    }
}
