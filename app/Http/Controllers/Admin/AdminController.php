<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    //

    public function dashboard()
    {
        Session::put('page', 'dashboard');

        return view('admin.admin_dashboard');
    }

    //

    public function login(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();

            // V0.1 Validator

            $validator = Validator::make($request->all(), [
                    'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:255',
                    // 'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                    'password' => 'required|min:6',
                ]
            // [
            //     'password.regex' => 'Incorrect Password Strength',
            // ]
            );

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }

            /*

            // V0.2 Validator

            $rules = [
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:255',
                // 'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'password' => 'required|min:6',
            ];
            $customMessages = [
                'email.required' => 'Please enter Email',
                'email.regex' => 'Please enter Valid Email',
                'password.required' => 'Please enter Password',
            ];

            $this->validate($request, $rules, $customMessages);
            */

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                return redirect('/admin/dashboard');
            }
            else
            {
                Session::flash('error_message', 'Invalid Credentials');

                return redirect()->back()->withInput($request->input());
            }
        }

        if(Auth::guard('admin')->user() == null)
        {
            return view('admin.admin_login');
        }
        else if(Auth::guard('admin')->user()->type == "admin" || Auth::guard('admin')->user()->type == "sub-admin")
        {
            return redirect('/admin/dashboard');;
        }
        else
        {
            dd("Incorrect User");
        }
    }

    // Profile Function

    public function profile(Request $request)
    {
        Session::put('page', 'profile');

        return view('admin.admin_profile');
    }

    // Check Current Password Function

    public function checkPwd(Request $request)
    {
        if($request->ajax() && $request->isMethod('POST'))
        {
            $data = $request->all();

            if(Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password))
            {
                echo "True";
            }
            else
            {
                echo "False";
            }
        }
    }

    // Update Settings Function

    public function profileUpdate(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();

            // V0.1 Validator

            $validator = Validator::make($request->all(), [
                    'current_pwd' => 'required|min:6',
                    'new_pwd' => 'required|min:6',
                    'confirm_pwd' => 'required|same:new_pwd|min:6',
                ],
                [
                    'current_pwd.required' => 'The Current Password field is required.',
                    'new_pwd.required' => 'The New Password field is required.',
                    'confirm_pwd.required' => 'The Confirm Password field is required.',
                    'new_pwd.min' => 'The New Password must be at least 6 characters.',
                    'confirm_pwd.min' => 'The Confirm Password must be at least 6 characters.',
                    'confirm_pwd.same' => 'The Confirm Password and New Password must match.',
                ]
            );

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }

            if(Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password))
            {
                if($data["new_pwd"] == $data["confirm_pwd"])
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data["new_pwd"])]);

                    Session::flash('success_message', "Password updated successfully");
                }
                else
                {
                    Session::flash('error_message', 'Your New Password and Confirm Password doesn\'t match. Please try again');

                    return redirect()->back();
                }
            }
            else
            {
                Session::flash('error_message', 'Your Current Password is Incorrect, Please try again');

                return redirect()->back();
            }

            return redirect()->back();
        }
    }

    // Logout Function

    public function logout()
    {
        Session::flush();

        Auth::guard('admin')->logout();

        Session::flash('success_message', 'Logged Out Successfully');

        return redirect('/admin');
    }
}
