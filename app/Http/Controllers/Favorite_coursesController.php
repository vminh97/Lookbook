<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Favorite_courses;
class Favorite_coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $fc = DB::table('favorite_courses')->join('customers', 'favorite_courses.customer_id', '=', 'customers.id')
            ->join('products','favorite_courses.product_id','=','products.id')->get();
            return response()->json($fc);   
        }
        catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'response failed!'], 500);
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
                'customer_id' => 'required|min:5',
                'products_id' => 'required',
                'name'=>'required'
            ]);
        
            $fc = Favorite_courses::find($id);
            $fc->customer_id = $request->input('customer_id');
            $fc->customers_code = $request->input('customers_code');
            $fc->customers_name=$request->input('customers_name');

            $fc->save();
        
            return response([
                'favorite_courses' => $fc
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
                'customer_id' => 'required|min:5',
                'products_id' => 'required',
                'name'=>'required'
            ]);
        
            $fc = Favorite_courses::find($id);
            $fc->customer_id = $request->input('customer_id');
            $fc->customers_code = $request->input('customers_code');
            $fc->customers_name=$request->input('customers_name');

            $fc->save();
        
            return response([
                'favorite_courses' => $fc
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
            $fc = Favorite_courses::find($id);
            $fc->delete();
    
          return response()->json('Successfully Deleted');
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
    }
}
