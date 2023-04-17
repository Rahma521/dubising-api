<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User1Request;
use App\Http\Requests\User2Request;
use App\Http\Requests\User3Request;
use App\Models\User;
use App\Repository\UserInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $UserRepository;
    public function __construct(UserInterface $UserRepository)
    {
            $this-> UserRepository = $UserRepository;
    }
    public function registerUser1(User1Request $request)
    {
        $data = $request->all();
        $this->UserRepository->storeData($data);
        return response()->json([
            'status'=>true,
            'message'=>'User Created Successfully',
            //'token'=>$this->createToken("API TOKEN")->plainTextToken
        ],200);
    }

    public function registerUser2(User2Request $request)
    {
      
        $data = $request->except('cert_file');
        $certFile = $request->file ('cert_file');
        $fileName = hexdec(uniqid()).'.'.$certFile->getClientOriginalExtension();
        $certFile->move(public_path('upload'),$fileName);
        $data['cert_file']=$fileName;
        $this->UserRepository->storeData($data);


        return response()->json([
            'status'=>true,
            'message'=>'User Created Successfully',
            //'token'=>$this->createToken("API TOKEN")->plainTextToken
        ],200);
    }

    public function registerUser3(User3Request $request)
    {

        $data = $request->except('date_of_birth');
        $date_of_birth =Carbon::parse($request->date_of_birth);
        $data['date_of_birth'] = $date_of_birth;
        $this->UserRepository->storeData($data);

        return response()->json([
            'status'=>true,
            'message'=>'User Created Successfully',
            'token'=>$this->createToken("API TOKEN")->accessToken
        ],200);
    }
}
