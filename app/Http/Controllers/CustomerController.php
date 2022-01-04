<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestExport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Model\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\Notifications\PasswordResetSuccess;
use App\Notifications\VerifyEmail;
use Validator;
class CustomerController extends Controller
{
    // use Excel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }
    // public function user()
    // {
    //     return response()->json(auth('api')->user());
    // }
    public function index()
    {
        try
        {
            $items = Customer::all();
            return response()->json($items);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function find($id)
    {
        try
        {
            $items = Customer::select('*')->where('id',$id)->get();
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
            'customer_name' => 'required|min:3',
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
            $customer = new Customer();
            $customer->customer_name = $request['customer_name'];
            $customer->gender = $request['gender'];
            $customer->password = Hash::make($request->password);
            $customer->birthday = $request['birthday'];
            if($request->file('image_customer'))
            {
               $filename = $request['image_customer'];
               $name = 'customer_'.time().'.'.$filename->getClientOriginalExtension();
               $destinationPath = public_path('/img/customer');
               $filename->move($destinationPath, $name);
               $customer->image_customer=$name;
            }
            $customer->address=$request['address'];
            $customer->email = $request['email'];
            $customer->isactive='0';
            $customer->status = $request['status'];
            $customer->first_name = $request['first_name'];
            $customer->last_name = $request['last_name'];
            $customer->phone = $request['phone'];
            $customer->save();
        
            return response([
                'customer' => $customer
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
            $post = Customer::find($id);
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
            'customer_name' => 'required|min:3',
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
            $customer = Customer::find($id);
            $customer->customer_name = $request['customer_name'];
            $customer->gender = $request['gender'];
            $customer->password = Hash::make($request->password);
            $customer->birthday = $request['birthday'];
            if($request->file('image_customer'))
            {
               $filename = $request['image_customer'];
               $name = 'customer_'.time().'.'.$filename->getClientOriginalExtension();
               $destinationPath = public_path('/img/customer');
               $filename->move($destinationPath, $name);
               $customer->image_customer=$name;
            }
            $customer->address=$request['address'];
            $customer->email = $request['email'];
            $customer->isactive='0';
            $customer->status = $request['status'];
            $customer->first_name = $request['first_name'];
            $customer->last_name = $request['last_name'];
            $customer->phone = $request['phone'];
            $customer->save();
        
            return response([
                'customer' => $customer
            ], 200);
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
            $category = Customer::find($id);
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
        return Excel::download(new CustomerExport, 'customer'.'_'.time().'.xlsx');
    }
    public function SumRecord()
    {
        try
        {
            $users =  Customer::count();
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
            $users =  Customer::select('*')->whereDate('created_at',$datetoday)->get();
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
                $sum=Customer::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
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
                $users =  Customer::count();
                $datemonth=date('m');
                $dateyear=date('y');
                $year='20'.$dateyear;
                $sum=Customer::select('*')->whereYear('created_at', $year)->whereMonth('created_at', $datemonth)->get();
                $count = count($sum);
                $rate=(round($count/$users,2)) * 100;
                return response()->json($rate);   
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }   
    }
    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
         ],
         [
            'email.required'=>'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa đăng nhập đúng định dạng email',
         ]);

        $user = Customer::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                "message" => "Email này chưa được đăng kí vào hệ thống"
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
            ]
        );
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
    return response()->json([
        'message' => 'Chúng tôi đã gửi link đổi mật khẩu vào email của bạn, hãy kiểm tra!'
    ]);


    }
    public function resetPassword(Request $request,$token)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
         ]);
        $passwordReset = PasswordReset::where([      
            ['email', $request->email],
            ['token', $token],
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'Mật khẩu mới chưa được nhập'
            ], 404);
        $user = Customer::where('email', $passwordReset->email)->first();
        $user->password = app('hash')->make($request->password);
        $user->save();
        $passwordReset->delete();
        return response()->json([
            'message' => 'Thay đổi mật khẩu thành công'
        ]);
    }


    public function register(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'customer_name' => 'required|string',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
        ]);
        try {
            $user = new Customer;
            $user->customer_name = $request->input('customer_name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            // //return successful response
            // $user->notify(new LetterRegister());
            return response()->json(['customer' => $user, 'message' => 'success'], 200);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email    = $request->input('email');
        try {
            $login = Customer::where('email', $email)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if (Hash::check($request->input('password'), $login->password)) {
                        try {
                            $remember_token = sha1($login->id_user.time());
                            Customer::where('id', $login->id)->update(['remember_token' => $remember_token]);
                            $res['status'] = true;
                            $res['message'] = 'Success login';
                            $res['data'] =  $login;
                            return response()->json(auth('api')->user())->header('Authorization', $token);
                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    } else {
                        $res['success'] = false;
                        $res['message'] = 'Username / email / password not found';
                        return response($res, 401);
                    }
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Username / email / password  not found';
                    return response($res, 401);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Username / email / password not found';
                return response($res, 401);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function logout()
    {
        try{
            Auth::logout();      
            return response()->json(['message'=>'Logout success'],200);
        } catch (\Exception $e) {
        //return error message
        return response()->json(['message' => 'Logout Failed!'], 409);
        }
    }
}