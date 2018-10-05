<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectUserTo = '/user';
    protected $redirectAgentTo = '/agent';
    protected $redirectAdminTo = '/admin';
    protected $role = 'user';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('guest')->except('logout');
        //$this->middleware('isloginredirecthome:user_agent');
    }

     public function showLoginForm(Request $request)
    {
        if(\Cookie::has('remember') && $request->cookie('times')==1){

            \Cookie::queue(\Cookie::forget('times'));
            return view('auth.login')->with([
                'username'=>$request->cookie('username'),
                'password'=>$request->cookie('password'),
                'role'=>$request->cookie('role'),
                'remember'=>$request->cookie('remember'),
            ]);
        }
        else{
            \Cookie::queue(\Cookie::forget('times'));
            if(Auth::guard('agent')->check()){
                return redirect(route('agentHome'));
                exit;
            }
            if(Auth::guard('user')->check()){
                return redirect(route('userHome'));
                exit;
            }
            return view('auth.login');
        }
    }

     public function showLoginFormAdmin(Request $request)
    {
            return view('auth.adminlogin');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        
        if ($this->attemptLogin($request)) {
             return $this->sendLoginResponse($request);
        }

        
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->role = $request['role'];
        $this->validate($request, [
            'account_phone' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('account_phone', 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());

    }

     
     public function redirectPath()
    {
        if ($this->role == 'user')
            return $this->redirectUserTo;
        if ($this->role == 'agent')
            return $this->redirectAgentTo;
        if ($this->role == 'admin')
            return $this->redirectAdminTo;
        
        return '/';
    }



    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //认证通过后设置记住我cookie;
        if($request->remember=='on'){
            \Cookie::queue('username', $request->account_phone,1024000);
            \Cookie::queue('password', $request->password,1024000);
            \Cookie::queue('role', $request->role,1024000);
            \Cookie::queue('remember', 'on',1024000);
            \Cookie::queue('times', 1,1024000);

        }
        else{
            \Cookie::queue('remember', 'off',1024000);
            \Cookie::queue(\Cookie::forget('username'));
            \Cookie::queue(\Cookie::forget('password'));
            \Cookie::queue(\Cookie::forget('role'));
            \Cookie::queue(\Cookie::forget('times'));
        }
    }



    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'account_phone' => [trans('auth.failed')],
        ]);
    }

   
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request, $guardname)
    {
        $this->role=$guardname;
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->role);
        
    }


     public function username()
    {
        return 'account_phone';
    }


}