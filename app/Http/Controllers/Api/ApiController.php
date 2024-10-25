<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HeroBanner;
use App\Models\Services;
use App\Models\Testimonials;
use App\Models\Blogs;
use App\Models\About;
use App\Models\Doctors;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ApiController extends Controller
{
    public function homeScreen()
    {
        $homebanner = HeroBanner::first();
        $services = Services::all();
        $testimonials = Testimonials::all();
        $blogs = Blogs::all();
        $about = About::first();
        $doctors = Doctors::all();
        $portfolios = Portfolio::all();
        return response()->json([
            'status' => 200,
             'homebanner' => $homebanner , 'services' => $services,
            'testimonials' => $testimonials , 'blogs' => $blogs ,
            'about' => $about, 'doctors' => $doctors , 'portfolios' => $portfolios
        ]);
    }


    public function login(Request $request)
    {
        // Validation
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'Validation Error!',
                'errors' => $validate->errors()
            ], 422);
        }

        // Authenticate User
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        if ($user->role_as == '1') {
                if ($user->status == 'active') {
                    return response()->json([
                        'status' => 'Welcome to Dashboard'
                    ], 200);
                }

                return response()->json([
                    'status' => 'Thank you for signing up, your account is under review. Once approved, you will receive an email.'
                ], 403);
            }
        }

        return response()->json([
            'status' => 'Invalid credentials'
        ], 401);
    }


    public function register(Request $request)
    {
        $messages = [
            'password.regex' => 'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, $, !, %, *, ?, or &).',
        ];

        // Validation
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
            return response()->json([
                'status' => 'Validation Error',
                'errors' => $validate->errors()
            ], 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'status' => 'pending',
            'role_as' => $this->getRoleAsValue($request->role_as), 
        ]);

        // Send verification email for certain role
        if ($user->role_as == 4) {
            $verificationToken = Str::random(32);
            $user->verification_token = $verificationToken;
            $user->save();
        }

        // Generate token
        $token = $user->createToken($request->email)->plainTextToken;

        // Prepare response
        $response = [
            'status' => 'success',
            'message' => 'User created successfully.',
            'data' => [
                'user' => $user,
                'token' => $token,
            ]
        ];

        return response()->json($response, 201);
    }

}
