<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    // use Excel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $items = Category::all();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        try
        {
            $items = Category::select('*')->where('id',$id)->get();
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
    public function listcategorydad()
    {
        try
        {
            $items = Category::select('*')->where('order_number','1')->get();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
            'name_Display'=>  'required|min:3',
            'parent_id'=>'required|numeric',
            'is_display'=>'required|numeric',
            'category_status'=>'required',
            'order_number'=>'required|numeric',
        ]); 
        try {             
            $category = new Category();
            $category->Name = $request['Name'];
            $category->name_Display = $request['name_Display'];
            $category->parent_id=$request['parent_id'];
            if($request['is_display']==='true') {$request_display=1;}
            else{$request_display=0; }            
            $category->is_display = $request_display;
            $category->category_status = $request['category_status'];
            $category->order_number = $request['order_number'];
            $slug_url=str_replace(' ','_',$request['name_Display']);
            $category->slug_url = $slug_url;
            $category->save();
        
            return response([
                'category' => $category
            ], 200);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $post = Category::find($id);
            return response()->json($post);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
            'name_Display'=>  'required|min:3',
            'parent_id'=>'required|numeric',
            'is_display'=>'required|numeric',
            'category_status'=>'required',
            'order_number'=>'required|numeric',
        ]); 
        try {             
            $category = Category::find($id);
            $category->Name = $request->Name;
            $category->name_Display = $request->name_Display;
            $category->parent_id=$request->parent_id;
            if($request->is_display==='true') {$request_display=1;}
            else{$request_display=0; }            
            $category->is_display = $request_display;
            $category->category_status = $request->category_status;
            $category->order_number = $request->order_number;
            $slug_url=str_replace(' ','_',$request->name_Display);
            $category->slug_url = $slug_url;
            $category->save();
        
            return response()->json(['message'=>"successful"]);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
    }

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $category = Category::find($id);
            $category->delete();
    
            return response('Delete Successfully', 200);
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
            $users =  Category::count();
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
            $users =  Category::select('*')->whereDate('created_at',$datetoday)->get();
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
                $sum=Category::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  Category::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Category::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
                $count = count($sum);
                $rate=(round($count/$users,2)) * 100;
                return response()->json($rate);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }   
    }
    public function getmenu()
    {
        try
        {
            $items = Category::select('*')->where('order_number','1')->get();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function getmenudetail($id)
    {
        try
        {
            $items = Category::select('*')
            ->Where('parent_id', $id)
            ->where('order_number', '>', 1)
            ->get();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

}