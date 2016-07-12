<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'doLogout']);
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
            'name' => 'required|max:15',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Attempting to login into the system
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doLogin(Request $request)
    {
        $input = $request->all();

        if(empty($input['username']) || empty($input['password'])) {
            \Log::warning('Error on login - empty values');
            return redirect()->back()->exceptInput('password');
        }

        $rules = array(
            'username'  => 'required|alphaNum|min:5',
            'password'  => 'required|alphaNum|min:5'
        );
        \Log::info("Validate user information");
        $validator = Validator::make($input, $rules);

        if ($validator->fails()){
            \Log::warning('Error to validate login data - ' . $validator->messages());
            return redirect()->back()->exceptInput('password');
        }
//        dd($input);
        $loginAttemp = Auth::attempt($input);
        // TODO fix session variable - Log-out automatically
        if ($loginAttemp){
            \Log::info('Login Successful');
            return redirect()->route('/');
        }else{
            \Log::warning('Error on login, incorrect credentials');
            return redirect()->back()->exceptInput('password');
        }
    }

    public function doLogout()
    {
        \Log::info('Attempting to logout the system');
        Auth::logout();
        return redirect()->route('show.login');
    }
}
