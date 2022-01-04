<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $course = Course::all();
            return response()->json($course);   
            $course = DB::table('products')
            ->join('category','products.category_id','=','category.id')
            ->join('teachers', 'products.teacher_id', '=', 'teachers.id')
            ->join('certificates','products.certificate_id','=','certificates.id')
            ->get();
            return response()->json($course);   
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
            $items = Course::select('*')->where('id',$id)->get();
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
                'slug_url' => 'required|min:5',
                'name_product' => 'required',
                'teacher_id' => 'required',
                'introduction_product' => 'required',
                'content_product' => 'required',
                'title_procduct' => 'required',
                'certificate_id' => 'required',
                'category_id'=>'required',
                'name_brand' => 'required|min:5',
                'price' => 'required',
                'price_no_tax' => 'required',
                'price_offsale' => 'required',
                'price_offsale_no_tax' => 'required',
                'product_image' => 'required',
                'product_image_text' => 'required',
                'video'=>'required',
                'material_name'=>'required',
                'search_keywords' => 'required',
                'list_image' => 'required',
                'isPublic' => 'required',
                'isRefund' => 'required',
                'isCertification' => 'required',
                'isOnlinePayment' => 'required',
                'isRate'=>'required',
                'isFreeShip'=>'required',
                'timeRefund'=>'required',
                'count_video' => 'required|min:5',
                'sum_time_video' => 'required',
                'date_start' => 'required',
                'date_end' => 'required',
                'count_discount' => 'required',
                'discount_code' => 'required',
                'activationcode' => 'required',
                'date_promotion_start'=>'required',
                'date_promotion_end'=>'required',
            ]);
        
            $course =Course::find($id);
            $course->slug_url = $request->slug_url;
            $course->name_product = $request->name_product;
            $course->teacher_id=$request->teacher_id;
            $course->introduction_product = $request->introduction_product;
            $course->content_product = $request->content_product;
            $course->title_procduct=$request->title_procduct;
            $course->certificate_id = $request->certificate_id;
            $course->category_id = $request->category_id;
            $course->name_brand = $request->name_brand;
            $course->price=$request->price;
            $course->price_no_tax = $request->price_no_tax;
            $course->price_offsale = $request->price_offsale;
            $course->price_offsale_no_tax=$request->price_offsale_no_tax;
            $course->product_image = $request->product_image;
            $course->product_image_text = $request->product_image_text;
            $course->video = $request->video;
            $course->material_name=$request->material_name;
            $course->hashtag_name=$request->hashtag_name;
            $course->search_keywords = $request->search_keywords;
            $course->list_image = $request->list_image;
            if($request->isPublic==='true') {$request_public=1;}
            else{$request_display=0; }            
            $category->isPublic = $request_public;
            if($request->isRefund==='true') {$request_refund=1;}
            else{$request_refund=0; }
            if($request->isCertification==='true') {$request_certification=1;}
            else{$request_certification=0; }
            if($request->isOnlinePayment==='true') {$request_onlinePayment=1;}
            else{$request_onlinePayment=0; }
            if($request->isdiscount==='true') {$request_discount=1;}
            else{$request_discount=0; }
            if($request->isactive==='true') {$request_active=1;}
            else{$request_active=0; }  
            if($request->isRate==='true') {$request_rate=1;}
            else{$request_rate=0; }
            if($request->isFreeShip==='true') {$request_freeShip=1;}
            else{$request_freeShip=0; }                     
            $course->timeRefund=$request->timeRefund;
            $course->count_video= $request->count_video;
            $course->sum_time_video = $request->sum_time_video;
            $course->date_start = $request->date_start;
            $course->date_end=$request->date_end;
            $course->discount_code=$request->discount_code;
            $course->status=$course->status;
            $course->count_discount = $request->count_discount;
            $course->date_promotion_start=$request->date_promotion_start;
            $course->date_promotion_end = $request->date_promotion_end;
            
            $course->save();
        
            return response([
                'products' => $course
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
        try{
            $this->validate($request, [
                'slug_url' => 'required|min:5',
                'name_product' => 'required',
                'teacher_id' => 'required',
                'introduction_product' => 'required',
                'content_product' => 'required',
                'title_procduct' => 'required',
                'certificate_id' => 'required',
                'category_id'=>'required',
                'name_brand' => 'required|min:5',
                'price' => 'required',
                'price_no_tax' => 'required',
                'price_offsale' => 'required',
                'price_offsale_no_tax' => 'required',
                'product_image' => 'required',
                'product_image_text' => 'required',
                'video'=>'required',
                'material_name'=>'required',
                'search_keywords' => 'required',
                'list_image' => 'required',
                'isPublic' => 'required',
                'isRefund' => 'required',
                'isCertification' => 'required',
                'isOnlinePayment' => 'required',
                'isRate'=>'required',
                'isFreeShip'=>'required',
                'timeRefund'=>'required',
                'count_video' => 'required|min:5',
                'sum_time_video' => 'required',
                'date_start' => 'required',
                'date_end' => 'required',
                'count_discount' => 'required',
                'discount_code' => 'required',
                'activationcode' => 'required',
                'date_promotion_start'=>'required',
                'date_promotion_end'=>'required',
            ]);
        
            $course =Course::find($id);
            $course->slug_url = $request->slug_url;
            $course->name_product = $request->name_product;
            $course->teacher_id=$request->teacher_id;
            $course->introduction_product = $request->introduction_product;
            $course->content_product = $request->content_product;
            $course->title_procduct=$request->title_procduct;
            $course->certificate_id = $request->certificate_id;
            $course->category_id = $request->category_id;
            $course->name_brand = $request->name_brand;
            $course->price=$request->price;
            $course->price_no_tax = $request->price_no_tax;
            $course->price_offsale = $request->price_offsale;
            $course->price_offsale_no_tax=$request->price_offsale_no_tax;
            $course->product_image = $request->product_image;
            $course->product_image_text = $request->product_image_text;
            $course->video = $request->video;
            $course->material_name=$request->material_name;
            $course->hashtag_name=$request->hashtag_name;
            $course->search_keywords = $request->search_keywords;
            $course->list_image = $request->list_image;
            if($request->isPublic==='true') {$request_public=1;}
            else{$request_display=0; }            
            $category->isPublic = $request_public;
            if($request->isRefund==='true') {$request_refund=1;}
            else{$request_refund=0; }
            if($request->isCertification==='true') {$request_certification=1;}
            else{$request_certification=0; }
            if($request->isOnlinePayment==='true') {$request_onlinePayment=1;}
            else{$request_onlinePayment=0; }
            if($request->isdiscount==='true') {$request_discount=1;}
            else{$request_discount=0; }
            if($request->isactive==='true') {$request_active=1;}
            else{$request_active=0; }  
            if($request->isRate==='true') {$request_rate=1;}
            else{$request_rate=0; }
            if($request->isFreeShip==='true') {$request_freeShip=1;}
            else{$request_freeShip=0; }                     
            $course->timeRefund=$request->timeRefund;
            $course->count_video= $request->count_video;
            $course->sum_time_video = $request->sum_time_video;
            $course->date_start = $request->date_start;
            $course->date_end=$request->date_end;
            $course->discount_code=$request->discount_code;
            $course->status=$course->status;
            $course->count_discount = $request->count_discount;
            $course->date_promotion_start=$request->date_promotion_start;
            $course->date_promotion_end = $request->date_promotion_end;
            
            $course->save();
        
            return response([
                'products' => $course
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
            $course = Course::find($id);
            $course->delete();
    
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
            $users =  Course::count();
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
            $users =  Course::select('*')->whereDate('created_at',$datetoday)->get();
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
            $sum=Course::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  Course::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Course::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
                $count = count($sum);
                $rate=(round($count/$users,2)) * 100;
                return response()->json($rate);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }   
    }
    public function CourseByCategory($id)
    {
        try
        {
                $course = DB::table('products')
                ->join('category','products.category_id','=','category.id')
                ->join('teachers', 'products.teacher_id', '=', 'teachers.id')
                ->join('certificates','products.certificate_id','=','certificates.id')
                ->where('products.category_id',$id)
                ->get(); 
                return response()->json($course);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }   
    }
    public function CountCourse($id)
    {
        try
        {
                $course = DB::table('products')
                ->select(DB::raw('count(*) as count, products.category_id'))
                ->where('products.category_id',$id)
                ->groupBy('products.category_id')
                ->get();
                return response()->json($course);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }  
    }
}
