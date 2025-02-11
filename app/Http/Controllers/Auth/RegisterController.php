<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nd_name' => ['required', 'string', 'max:255'],
            'nd_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nd_username' => ['required','string', 'max:20','unique:users'],
            'nd_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nd_name' => $data['nd_name'],
            'nd_email' => $data['nd_email'],
            'nd_username' => $data['nd_username'],           
            'nd_password' => Hash::make($data['nd_password']),
            'nd_gioitinh' => $data['nd_gioitinh'],
            'nd_namSinh' => $data['nd_namSinh'],
            'nd_diaChi' => $data['nd_diaChi'],
            'nd_dienThoai' => $data['nd_dienThoai'],
            'q_ma' => 2,
        ]);
    }
    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        
        return redirect('/login')->with('status', 'Vui lòng đăng nhập bằng tài khoản mới đăng ký.');
    }
}
