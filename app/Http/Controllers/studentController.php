<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;
use App\Reservation;
use App\Category;
use App\Notification;
use App\Assignment;
use App\Reply;
use App\Course;
use App\Country;
use App\Assigmentanswer;
class studentController extends Controller
{   
    public function dash(){

        // studtent 
        $student = new Student();
        $student->user_id = Auth::user()->id;
        $student->save();
        $student = Student::where('user_id',Auth::user()->id)->first();
        $studentReservations = $student->reservations;
        $latestReservations = Reservation::orderBy('id','desc')->where('student_id',$student->id)->take(6)->get();         
        // student

        // category
        $Categories = Category::all();
        // category

        // best selling course
        $mrcs = Reservation::select('course_id')
        ->groupBy('course_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(3)
        ->get();
        $bestSellingCourses =array();
        foreach($mrcs as $mrc){
            $bestSellingCourses[] = Course::where('id',$mrc->course_id)->first(); 
        }
        // best selling course
        return view('student.studentDash',['student' => $student , 'stdReservations' => $studentReservations ,'ltRes' => $latestReservations , 'Cats' => $Categories , 'bts' => $bestSellingCourses ]);
    } 

    public function Profile($studentId){
        $student = Student::where('id',$studentId)->first();
        // countries
        $countries = Country::all();
        return view('student.profile' , ['student' => $student] , ['countries' => $countries]);
    }

    public function ProfileUpdate(Student $student , Request $request){
        $request->validate([
            'name'          => 'required',
            'nationality'   => 'required',
            'gender'        => 'required',
        ]);

        $student->user->name = $request->name;
        $student->user->nationality = $request->nationality;
        $student->user->gender = $request->gender;

        $student->user->save();

        return back();
    }

    public function ProfileImage(Student $student , Request $request){
        $request->validate([
            'profileimg'   => 'image|max:1999',
        ]);
        //check if thier is an image
        if($request->hasFile('profileimg')){
            $File = $request->file('profileimg');
            $fullImageNameWithExt = $File->getClientOriginalName();
            $imageExt = $File->getClientOriginalExtension();
            $imageName = pathinfo($fullImageNameWithExt,PATHINFO_FILENAME);
            $fileNameToStore = $imageName .time().'.'.$imageExt;
            $store = $File->storeAs('public/images/user/',$fileNameToStore);
        }else{
            $fileNameToStore = 'person-dummy.jpg';
        }
        $student->user->profileimg = $fileNameToStore;
        $student->user->save();
        return back();
    }

    public function studentNotifications(Student $student){
        $Categories = Category::all();
        $coursesId =  array();
        foreach($student->reservations as $reservation){
            $coursesId[] = $reservation->course_id;
        }
        $notifications =  array();
        $assignments =  array();
        $crNum = count($coursesId);
        for ($i=0 ; $i<$crNum ; $i++){
            $notifications[$i] = Notification::where('course_id',$coursesId[$i])->get();
        }
        
        for ($i=0 ; $i<$crNum ; $i++){
            $assignments[$i] = Assignment::where('course_id',$coursesId[$i])->get();
        }
        
        return view('student.notifications',['student' => $student , 'Cats' => $Categories , 'notifications' => $notifications , 'assignments' => $assignments]);
    }

    public function studentVideosAnswer(Student $student){
        $Categories = Category::all();
        $videosReplies = Reply::where('student_id',$student->id)->get();
        return view('student.videosAnswer',['student' => $student , 'Cats' => $Categories ,'videosReplies' => $videosReplies]);
    }

    public function studentCourses(){
        $Categories = Category::all();
        $student    = Auth::user()->student()->first();
        $studentReservations = $student->reservations;
        return view('student.courses',['Cats' => $Categories , 'studentReservations' => $studentReservations , 'student' => $student]);
    }

    public function cartView(Student $student){
        $Categories = Category::all();
        $studentReservations = $student->reservations;
        return view('student.viewCart',['student' => $student , 'Cats' => $Categories , 'studentReservations' => $studentReservations]);
    }

    public function viewCourse(Course $course){
        $Categories = Category::all();
        $student = Student::where('user_id',Auth::user()->id)->first();
        return view('student.courseView',['Cats' => $Categories , 'student' => $student , 'course' => $course]);
    }
    public function checkout(Student $student,$total){
        $Categories = Category::all();
        return view('student.checkout',['student' => $student , 'Cats' => $Categories ,'total' => $total]);
    }

    public function viewCourseDetaills(Course $course){
        if(null !== Auth::user()){
            $Categories = Category::all();
            $student = Student::where('user_id',Auth::user()->id)->first();
            $requirments = $course->requirments;
            $instructor = $course->instructor;
            $instructor_courses = $instructor->courses;
            $instructor_courses_number = $instructor_courses->count();
            $studentNum = 0;
            foreach($instructor_courses as $instructor_course){
                $reservations = $instructor_course->reservations;
                foreach($reservations as $reservation){
                    $studentNum += 1;
                }
            }
            return view('student.viewCourseDetaills',[
                        'Cats' => $Categories ,
                        'course' => $course ,
                        'student' => $student , 
                        'requirments' => $requirments,
                        'ins_cr_num'  => $instructor_courses_number,
                        'std_num'     => $studentNum
                        ]);
        }
        else{
            return back();
        }
    }
    
    // course searching
    public function courseSearch(Request $request){
        $searchWord = $request->course_search;
        $coursesMutched = Course::where('course_name','like',"%{$searchWord}%")->get();
        $Categories = Category::all();
        $student = Student::where('user_id',Auth::user()->id)->first();
        return view('student.searchResults',['cms' => $coursesMutched , 'Cats' => $Categories ,'student' => $student]);
    }
    // course searching
    public function logout(){
        auth()->logout();
        return redirect(route('index'));
    }
    // loading assingment
    public function loadingAssignment($id){
        $assigment = Assignment::where('id',$id)->firstOrFail();
        $fileName = $assigment->ast_file_content;
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/storage/files/assignments/" . $fileName;

        $headers = array(
            'Content-Type: application/msword',
            'Content-Type: application/vnd.ms-excel',
            'Content-Type: audio/wave',
            'Content-Type: audio/wav',
            'Content-Type: audio/x-wav',
            'Content-Type: audio/x-pn-wav',
            'Content-Type: audio/webm',
            'Content-Type: video/webm',
            'Content-Type: audio/ogg',
            'Content-Type: video/ogg',
            'Content-Type: application/ogg',
        );
        return response()->download($file, $fileName, $headers);
    }
    public function aditional_video_loader($id){
        $reply = Reply::where('id',$id)->firstOrFail();
        $fileName = $reply->reply_content;
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/storage/files/videoReplis/" . $fileName;

        $headers = array(
            'Content-Type: application/msword',
            'Content-Type: application/vnd.ms-excel',
            'Content-Type: audio/wave',
            'Content-Type: audio/wav',
            'Content-Type: audio/x-wav',
            'Content-Type: audio/x-pn-wav',
            'Content-Type: audio/webm',
            'Content-Type: video/webm',
            'Content-Type: audio/ogg',
            'Content-Type: video/ogg',
            'Content-Type: application/ogg',

        );
        return response()->download($file, $fileName, $headers); 
    }
    // loading assingment
    public function loadingAssignmentAnswer($couseId,$instructorId,Request $request){
        $student = Student::where('user_id',Auth::user()->id)->first();
        $assigmentAnswer = new Assigmentanswer();
        $assigmentAnswer->instructor_id = $instructorId;
        $assigmentAnswer->course_id = $couseId;
        $assigmentAnswer->student_id = $student->id;
        $assigmentAnswer->completed = true;
        if($request->hasFile('assigmentAnswer')){
            $File = $request->file('assigmentAnswer');
            $fullFileNameWithExt = $File->getClientOriginalName();
            $fileExt = $File->getClientOriginalExtension();
            $fileName = pathinfo($fullFileNameWithExt,PATHINFO_FILENAME);
            $fileNameToStore = $fileName .time().'.'.$fileExt;
            $store = $File->storeAs('public/files/assignmentsReplies/',$fileNameToStore);
        }else{
            $fileNameToStore = 'nothing.txt';
        }
        $assigmentAnswer->ast_file_response = $fileNameToStore;
        $assigmentAnswer->save();
        return back();
    }
    // course gallery 
    public function courseGallery(){
        return view('student.courseGallery');
    }
}
