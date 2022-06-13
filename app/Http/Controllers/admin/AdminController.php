<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Models\Student;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Crypt;   

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        return view('admin.adminHome');
    }

    public function webinars()
    {
        $webinars = Webinar::get();
        return view('admin.webinars',compact('webinars'));
    }

    public function toggle_status($id)
    {
        $webinar = Webinar::find($id);
        if($webinar) {
            if($webinar->status==1){
                $webinar->status = 0;
                $msg = "Webinar has been disabled";
            }else{
                $webinar->status = 1;
                $msg = "Webinar has been enabled";
            }
            $webinar->save();
            
            return back()->with('success', $msg);
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function student_toggle_status($id)
    {
        $webinar = Webinar::find($id);
        if($webinar) {
            if($webinar->status==1){
                $webinar->status = 0;
                $msg = "Webinar has been disabled";
            }else{
                $webinar->status = 1;
                $msg = "Webinar has been enabled";
            }
            $webinar->save();
            
            return back()->with('success', $msg);
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function students(Request $request)
    {
        if($request->has('id'))  {
            $students = Student::where('webinar_id', '=', $request->id)->get();
        } else {
            $students = Student::get();
        }
        return view('admin.students',compact('students'));
    }

    public function add_student(Request $request)
    {
        return view('admin.add-student');
    }

    public function add_webinar(Request $request)
    {
        return view('admin.add-webinar');
    }

    public function store_webinar(Request $request)
    {
        $this->validate($request, array(
            'title'   => 'required|unique:webinars,title',
            'date'   => 'required',
            'place'   => 'required',
        ));

        $slug = Str::slug($request->title, '-');

        $store = Webinar::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'schedule_date'     => $request->date,
            'place'             => $request->place,
            'status'            => $request->status,
        ]);
        if($store) {
            return redirect()->route('admin.webinars')->with('success', 'Webinar has been created successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit_webinar(Request $request, $id)
    {
        $webinar = Webinar::find($id);
        return view('admin.edit-webinar',compact('webinar'));
    }

    public function update_webinar(Request $request)
    {
        //return $request->all();
        $this->validate($request, array(
            'title'   => 'required|unique:webinars,title,'.$request->id,
            'date'   => 'required',
            'place'   => 'required',
        ));

        $slug = Str::slug($request->title, '-');

        $store = Webinar::find($request->id);

        if($store) {
            $store->title            = $request->title;
            $store->slug             = $slug;
            $store->schedule_date     = $request->date;
            $store->place            = $request->place;
            $store->status            = $request->status;
            $store->save();
        }

        if($store) {
            return redirect()->route('admin.webinars')->with('success', 'Webinar has been updated successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function generate_link(Request $request)
    {
        if($request->has('id')) {
            $data = Webinar::find($request->id);
            $code = Crypt::encryptString($data->id);
            $url = url('/online-webinar').'/'.$code;
            return response()->json(['error' => false, 'message' => $url]);
        } else {
            return response()->json(['error' =>true, 'message' => 'Something went wrong']);
        }
        
    }

}
