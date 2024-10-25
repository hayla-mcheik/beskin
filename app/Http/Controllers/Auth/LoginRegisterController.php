<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Mail\StatusEmailNotification; 
use App\Mail\VerificationEmail; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Validator;


class LoginRegisterController extends Controller
{
     /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function loginpage(Request $request)
     {
         if (!auth()->check()) {
             $previousUrl = url()->previous();

         }
         return view('auth.login');
     }

     
    public function login(Request $request)
    {
        dd(1);
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);   
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('status', 'Validation Error!');
        }   
        $user = User::where('email', $request->email)->first();   
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('status', 'Invalid credentials')->with('error_status', 401);
        }   
        auth()->login($user); 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if ($user->role_as == 4) {
                if (!$user->hasVerifiedEmail()) {
                    auth()->logout();
                    $token = Str::random(60);
                    $user->verification_token = $token;
                    $user->save();
                    
                    Mail::to($user->email)->send(new VerificationEmail($user, $token));
                    return back()->with('status', 'Your email is not verified. Please check your email for a verification link.');
                }
                $previousUrl = session()->pull('previousUrl');
        if ($previousUrl) {
            return redirect()->to($previousUrl);
        } else {
            return redirect()->route('user.dashboard')->with('message', 'Welcome to Dashboard');
        }
            }  elseif ($user->role_as == '1') {
                if ($user->status == 'active') {
                    return redirect('admin/dashboard')->with('message', 'Welcome to Dashboard');
                }
                return redirect()->back()->with('status', 'Thank you for signing up, your account is under review. Once approved, you will receive an email.');
            }
        } else {
            auth()->logout();
            return back()->with('status', 'Unauthorized to access.');
        }
    }
    


    public function registerpage()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $messages = [
        'password.regex' => 'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, $, !, %, *, ?, or &).',
    ];

    $validate = Validator::make($request->all(), [
        'name' => 'required|string|max:250|alpha',
        'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ],
        'phone' => 'required|numeric|digits_between:8,15|unique:users,phone',
    ], $messages);

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'status' => 'pending',
        'role_as' => $this->getRoleAsValue($request->role_as),
    ]);

if($user->role_as == 4){
    $verificationToken = Str::random(32);
    $user->verification_token = $verificationToken;
    $user->save();
    Mail::to($user->email)->send(new VerificationEmail($user, $verificationToken));
}


    $data['token'] = $user->createToken($request->email)->plainTextToken;
    $data['user'] = $user;

    $response = [
        'status' => 'success',
        'message' => 'User is created successfully.',
        'data' => $data,
    ];

    return redirect()->route('login')->with('status', 'User is registered successfully.')->with('response', $response);
}


    public function forgetpasswordpage()
    {
        return view('auth.forgot-password');
    }
    
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
        $email = $request->email;
    
        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('password.reset')->with(['status' => __($status)])
            : redirect()->back()->withErrors(['email' => __($status)]);
    }
    
    
    public function changepasswordpage(Request $request)
    {
        return view('auth.reset-password', ['token' => $request->token, 'email' => $request->email]);
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );
    
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => [__($status)]]);
    }
    
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::guard('web')->logout();
    
        Session::flash('success', 'User is logged out successfully');
    
        return redirect('/');
    }
        
}