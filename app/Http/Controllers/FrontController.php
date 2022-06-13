<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Webinar;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    public function register_link($link) {
        try {
            $code = Crypt::decryptString($link);
            $webinar = Webinar::find($code);
            if($webinar) {
                return view('webinar_register');
            }
        } catch(\Throwable $e) {
            return abort(404);
        }
    }

    public function register_user(Request $request)
    {
        $this->validate($request, array(
            'name'          => 'required|max:100',
            'email'         => 'required|email|unique:students,email|unique:users,email',
            'type'          => 'required|in:Student,Faculty/Staff,Academia/Industry,Research Scholar',
            'phone'         => 'required|integer|unique:students,phone', 
            'qualification' => 'required|max:150',
            'organization'  => 'required|max:200',
            'department'    => 'required|max:200',
            //'f_desig'       => 'required|max:200',
            'address'       => 'required'
        ));
        $code = Crypt::decryptString($request->webinar_id);
        $webinar = Webinar::find($code);
        if($webinar) {        
            $store = Student::create([
                'webinar_id'        => $code,
                'name'              => $request->name,
                'email'             => $request->email,
                'type'              => $request->type,
                'phone'             => $request->phone,
                'qualification'     => $request->qualification,
                'organization'      => $request->organization,
                'department_name'   => $request->department,
                'f_desig'           => $request->faculty_designation,
                'address'           => $request->address,
                'status'            => 1
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => 0,
                'password' => Hash::make($request->email),
            ]);
        } else {
            return back()->with('error', 'Something went wrong');
        }
        if($store && $user) {
            return redirect()->route('thankyou')->with(['success' => 'Your registration for online webinar has been successfully done.', 'data' => $store]);
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function thankyou() {
        return view('thankyou');
    }
}
