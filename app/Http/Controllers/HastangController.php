<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Hastang;

class HastangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $items = Hastang::all();
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
                'hastang_title' => 'required|min:5',
                'status' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'isDisplay' =>'required',
                'keyword' => 'required',
                'description'=>'required',
                'show_order' =>'required',
            ]);
        
            $hastang = Hastang::find($id);
            $hastang->hastang_title = $request->input('hastang_title');
            $hastang->status = $request->input('status');
            $hastang->start_date=$request->input('start_date');
            $hastang->end_date = $request->input('end_date');
            $hastang->isDisplay = $request->input('isDisplay');
            $hastang->keyword = $request->input('keyword');
            $hastang->description = $request->input('description');
            $hastang->show_order = $request->input('show_order');
            
            $hastang->save();
        
            return response([
                'hastang' => $hastang
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
    public function show($id)
    {
        //
    }

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
        try{
            $this->validate($request, [
                'hastang_title' => 'required|min:5',
                'status' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'isDisplay' =>'required',
                'keyword' => 'required',
                'description'=>'required',
                'show_order' =>'required',
            ]);
        
            $hastang = Hastang::find($id);
            $hastang->hastang_title = $request->input('hastang_title');
            $hastang->status = $request->input('status');
            $hastang->start_date=$request->input('start_date');
            $hastang->end_date = $request->input('end_date');
            $hastang->isDisplay = $request->input('isDisplay');
            $hastang->keyword = $request->input('keyword');
            $hastang->description = $request->input('description');
            $hastang->show_order = $request->input('show_order');
            
            $hastang->save();
        
            return response([
                'hastang' => $hastang
            ], 200);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
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
            $hastang = Hastang::find($id);
            $hastang->delete();
    
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
            $users =  Hastang::count();
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
            $users =  Hastang::select('*')->whereDate('created_at',$datetoday)->get();
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
                $sum=Hastang::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  Hastang::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Hastang::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
