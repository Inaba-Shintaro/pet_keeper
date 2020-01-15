<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Pettype;
use App\PettypeUser;
use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo ='/';

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
    // protected function validator(Request $request)
    {
                
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area' => ['required', 'string', 'max:255'],
            'host_experience' => ['required', 'string', 'max:255'],
            'pettypes' => ['required'],
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
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'area' => $data['area'],
            'host_experience' => $data['host_experience'],
        ]);

            // dd((array)$data['pettypes']);

        foreach( (array)$data['pettypes'] as  $value ){//ペットの種類の名前が入ってる配列の中のペットの種類の名前だけ取り出す
            
            $pettype = Pettype::where('type_name',$value)->first();//pettypesテーブルから入力されたペットの種類の名前で検索

            // dd($pettype->id);

             PettypeUser::create([//
                'user_id' => $user->id,
                'pettype_id' => $pettype->id,
                ]);
        }
        return $user;//これでマイページに遷移する
    }
}
