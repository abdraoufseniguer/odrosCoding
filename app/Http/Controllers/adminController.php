<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Course_creation_demande;
use App\Category;
use App\Instructor;
use App\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminController extends Controller
{
    public function administration(){
        // all course creation demands 
        $ccd = Course_creation_demande::where('approved', 0)->get();
        $courses_creation_demands = Course_creation_demande::where('approved', 0)->paginate(6);
        // all aproved Courses ast week
        $courses = Course::where('approval', 1)->paginate(6);
        return view('admin.admin',[ 'activeLi' => 'CoursesAdminstration' , 'courses' => $courses , 'courses_creation_demands' => $courses_creation_demands , 'c_cd' => $ccd]);
    }
    // admin category managment 
    public function demandeConfirmation($id){
        $course = Course::find($id);
        $course->approval = 1;
        $course->save();
        $course_creation_demande = Course_creation_demande::where('course_id',$id)->first();
        $course_creation_demande->approved = 1;
        $course_creation_demande->save();
        return redirect('\admin');
    }

    public function categories_management(){
        $categories = Category::paginate(6);
        return view('admin.categories_management',[ 'activeLi' => 'CatManagement' , 'cats' => $categories]);
    }

    public function category_update($id,Request $request){
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        return back();
    }

    public function category_delete($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function category_create(Request $request){
        $category = new Category(); 
        $category->category_name = $request->category_name;
        $category->save();
        return back();
    }

    // admin category managment 

    // admin instructor managment 
    public function instructors_management(){
        $instructors = Instructor::all();
        return view('admin.instructors_management',['activeLi' => 'instructorManagement' , 'instructors' => $instructors
        ]);
    }
    public function instructors_profile($id){
        $instructor = Instructor::find($id);
        // getting the number of enrollments
        $TheInstructorCourses = $instructor->courses;
        $instructorEnrollements = 0;
        foreach($TheInstructorCourses as $instCourse){
            $instructorEnrollements+= count($instCourse->reservations);
        }
        // getting the number of enrollments
        return view('admin.instructor_management_view_profile',['activeLi' => 'instructorManagement' ,'instructor' => $instructor , 'enrNum' => $instructorEnrollements]);
    }

    public function instructors_destroy($id){
        $inst = Instructor::find($id);
        $inst->delete();
        return back();
    }

    // admin students managment 
    public function students_management(){
        $students = Student::all();
        return view('admin.student_management',['activeLi' => 'StudentManagement' , 'students' => $students]);
    }

    public function student_destroy($id){
        $inst = Student::find($id);
        $inst->delete();
        return back();
    }
    // admin login
    public function admin_login(){
        return view('admin.login');
    }
    public function admin_store(Request $request){
        $request->validate([
            'userName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('userName','email','password');
        if(!Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'message' => 'try again',
            ]);
        }
        //session message 
        session()->flash('message','welcome to dash');
        //redirect
        return redirect(route('courses_administration'));
    }
}
