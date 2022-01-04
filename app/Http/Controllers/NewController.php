<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Model\News;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $news = DB::table('news')
            ->join('category','news.category_id','=','category.id')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->get();
            return response()->json($news);   
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
                'title_news' => 'required|min:5',
                'description_news' => 'required',
                'content_news' => 'required',
                'user_id' => 'required',
                'editer_by' => 'required',
                'status' => 'required',
                'news_Date' => 'required',
                'news_image'=>'required',
                'category_id'=>'required'
            ]);
        
            $news = News::find($id);
            $news->title_news = $request->title_news;
            $news->description_news = $request->description_news;
            $news->content_news=$request->content_news;
            $news->user_id = $request->user_id;
            $news->status=$request->status;
            $news->news_Date = $request->news_Date;
            $news->news_image=$request->news_image;
            $news->category_id = $request->category_id;
            
            $news->save();
        
            return response([
                'news' => $news
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
        try
        {
            $items = News::select('*')->where('id',$id)->get();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $post = News::select('*')->where('id',$id)->get();
            return response()->json($post);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }
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
                'title_news' => 'required|min:5',
                'description_news' => 'required',
                'content_news' => 'required',
                'user_id' => 'required',
                'status' => 'required',
                'news_Date' => 'required',
                'news_image'=>'required',
                'category_id'=>'required'
            ]);
            $news = News::find($id);
            $news->title_news = $request->title_news;
            $news->description_news = $request->description_news;
            $news->content_news=$request->content_news;
            $news->user_id = $request->user_id;
            $news->status=$request->status;
            $news->news_Date = $request->news_Date;
            $news->news_image=$request->news_image;
            $news->category_id = $request->category_id;
            
            $news->save();
        
            return response()->json(['message'=>"successful"]);
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
            $news = News::find($id);
            $news->delete();
    
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
            $users =  News::count();
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
            $users =  News::select('*')->whereDate('created_at',$datetoday)->get();
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
                $sum=News::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  News::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=News::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
