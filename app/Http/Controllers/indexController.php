<?php

namespace App\Http\Controllers;
use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class indexController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        $coursesSample = Course::orderBy('id','desc')->take(9)->get();
        $Categories = Category::all();
        return view('index',['crSm' => $coursesSample , 'Cats' => $Categories ]);
    }

    public function SignUp(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|email',
        ]);
        dd($request);
        $user = new User();
        $user->create($request);
        return back();
    }
    // view course detaills
    public function viewCourseDetaills(Course $course){
        $Categories = Category::all();
        return view('viewCourseDetaills',['Cats' => $Categories ,'course' => $course]);
    }
    // view course detaills
}
