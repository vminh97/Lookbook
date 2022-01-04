<?php

namespace App\Http\Controllers;

use App\Model\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facedes\Excel;
use App\Exports\TestExport;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
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
            $items = Teacher::all();
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
            $items = Teacher::select('*')->where('id',$id)->get();
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher_name' => 'required|min:3',
            'image_customer'=> 'required|required|image',
            'gender'=>'required',
            'birthday'=>'required|date',
            'address'=>'required|min:10',
            'status'=>'required',
            'email'=>'required|email|unique:customers',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|numeric|digits:10',
        ]);
        try {             
            $teacher = new Teacher();
            $teacher->teacher_name = $request['teacher_name'];
            $teacher->gender = $request['gender'];
            $teacher->password = Hash::make($request->password);
            $teacher->birthday = $request['birthday'];
            if($request->file('image_teacher'))
            {
               $filename = $request['image_teacher'];
               $name = 'customer_'.time().'.'.$filename->getClientOriginalExtension();
               $destinationPath = public_path('/img/teacher');
               $filename->move($destinationPath, $name);
               $teacher->image_teacher=$name;
            }
            $teacher->address=$request['address'];
            $teacher->email = $request['email'];
            $teacher->isactive='0';
            $teacher->status = $request['status'];
            $teacher->first_name = $request['first_name'];
            $teacher->last_name = $request['last_name'];
            $teacher->phone = $request['phone'];
            $teacher->save();
        
            return response([
                'teachers' => $teacher
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
            $post = Teacher::find($id);
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
            'teacher_name' => 'required|min:3',
            'image_customer'=> 'required|required|image',
            'gender'=>'required',
            'birthday'=>'required|date',
            'address'=>'required|min:10',
            'status'=>'required',
            'email'=>'required|email|unique:customers',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|numeric|digits:10',
        ]); 
        try {                
            $teacher = Teacher::find($id);
            $teacher->teacher_name = $request->teacher_name;
            $teacher->gender = $request['gender'];
            $teacher->password = Hash::make($request->password);
            if($request->file('image_teacher'))
            {
               $filename = $request['image_teacher'];
               $name = 'teacher_'.time().'.'.$filename->getClientOriginalExtension();
               $destinationPath = public_path('/img/teacher');
               $filename->move($destinationPath, $name);
               $teacher->image_teacher=$name;
            }
            $teacher->birthday = $request->birthday;
            $teacher->address=$request->address;
            $teacher->email = $request->email;
            $teacher->status = $request->status;
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->phone = $request->phone;
            $teacher->save();
        
            return response()->json(['message'=>"successful"]);
        }
        catch (\Exception $e) {
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
            $category = Teacher::find($id);
            $category->delete();
    
            return response('Delete Successfully', 200);
        }
        catch (\Exception $e) {
            //return error message
            return $e->getMessage();
        }


    }
    public function export()
    {  
        return Excel::dowload(new TestExport(), 'categorys.xlxs');
    }
    public function SumRecord()
    {
        try
        {
            $users =  Teacher::count();
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
            $users =  Teacher::select('*')->whereDate('created_at',$datetoday)->get();
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
                $sum=Teacher::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  Teacher::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Teacher::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
