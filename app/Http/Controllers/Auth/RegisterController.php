<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Model\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
      /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   
    protected $redirectUserTo = '/user';
    protected $redirectAgentTo = '/agent';
    protected $role = 'user';

    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->role = $request['role'];
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectTo());
    }

    public function redirectTo()
    {
        if ($this->role == 'user')
            return $this->redirectUserTo;
        if ($this->role == 'agent')
            return $this->redirectAgentTo;    
        
        return '/';
    }



    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    
     protected function guard()
    {

        if ($this->role == 'user')
        return Auth::guard('web');
        
        if ($this->role == 'agent')
        return Auth::guard('agent');
    
    }



    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

  

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
        
         $message=['account_phone.Integer'=>'请填写手机号码',
            'password.required'=>'请填写至少6位密码',
            'password.confirmed'=>'新旧密码不一致',
        ];
        return Validator::make($data, [
            'account_phone' => 'required|Integer|min:10000000000|max:90000000000',
            'password' => 'required|string|min:6|confirmed',
            ],$message
            );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        if ($this->role == 'user')
            return User::create([
                'account_phone' => $data['account_phone'],
                'password' => bcrypt($data['password']),
            ]);
    
        elseif ($this->role == 'agent')
            return Agent::create([
                'account_phone' => $data['account_phone'],
                'password' => bcrypt($data['password']),
            ]);
    }
}
