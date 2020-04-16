<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use App\RequirmentsCr;
use App\Comment;
use App\Assanswer;
use App\Assignment;
use App\section;
use App\announcement;
use App\Request as Req;
use App\Reply;
use App\Coursesection;
use App\Lecture;
class instructorController extends Controller
{
    public function instructorDash(){
        $Categories = Category::all();
        // $Courses = Course::where('instructor_id',auth()->user()->instructor->id)->get();
        $Courses = Course::where('instructor_id',auth()->user()->instructor->id)->paginate(4);
        return view('instructor.instructorDash',['Cats' => $Categories , 'Courses' => $Courses , 'sidebare' => 'yes']);
    }

    public function courseCreation(){
        $Categories = Category::all();
        return view('instructor.creatingCourse',['Cats' => $Categories ,]);
    }

    public function courseTitleStore(Request $request){
        $request->validate([
            'course_name' => 'required'
        ]);
        // creating course
        $course = new Course();
        $course->course_name       = $request->course_name;
        $course->course_price      = 0.0;
        $course->course_type       = 'paid';
        $course->course_objectives = 'blabla';
        $course->course_description = 'this is the discription of the course';
        $course->approval = 0;
        $course->instructor_id = auth()->user()->instructor->id;
        $course->save();
        // creating the first section of the course
        $section = new Coursesection();
        $section->section_name = 'Introduction';
        $section->course_id = $course->id;
        $section->save();
        // creating the initial lecture 
        $lecture = new Lecture();
        $lecture->lecture_name = 'Introduction';
        $lecture->coursesection_id = $section->id;
        $lecture->save();

        return redirect(route('instructor.course_category',$request->course_name));

    }

    public function courseCategory($courseName){
        $Categories = Category::all();
        return view('instructor.creatingCourse1',['Cats' => $Categories , 'courseName' => $courseName]);
    }

    public function courseCategoryStore($courseName,Request $request){
        $course = Course::where('course_name',$courseName)->first();
        $course->category_id = $request->category_id;
        $course->save();
        //than go to adding description and ...
        return redirect(route('instructor.course_more_info',$course->id));
    }

    public function courseMoreInfo(Course $course){
        $Categories = Category::all();
        $crReq = $course->requirments;
        return view('instructor.creatingCourse2',['Cats' => $Categories , 'course' => $course , 'navebare' => 'no' , 'crReq' => $crReq]);
    }

    public function courseDescriptionStore(Course $course,Request $request){
        $course->course_description = $request->description_content;
        $course->save();
        return back()->with(['course'=>$course]);
    }

    public function courseRequiremnetStore(Course $course,Request $request){
        $requirement = new RequirmentsCr();
        $requirement->course_id = $course->id;
        $requirement->instructor_id = auth()->user()->instructor->id;
        $requirement->requirement_content = $request->course_requirement;
        $requirement->save();
        return back();
    }

    public function courseAttachementStore(Course $course,Request $request){
        if ($request->video != null){
            return 'video';
        }
        elseif($request->aritcle !=null){
            return 'article';
        }
        else{
            return 'assignment';
        }
    }
    public function CourseDelete(Course $course){
        $course->delete();
        return back();
    }
    public function CourseEdit(Course $course){
        $Categories = Category::all();
        $crReq = $course->requirments;
        // sections
        $sections = $course->sections;
        $sectionNum = 0;
        $lectureNum = 0;
        return view('instructor.creatingCourse2',[
            'Cats' => $Categories , 
            'course' => $course , 
            'navebare' => 'no' , 
            'crReq' => $crReq,
            'sections' => $sections,
            'sectionNum' => $sectionNum,
            'lectureNum' => $lectureNum,
        ]);
    }
    //course section and lecture
    public function sectionNameChange(Course $course,$sectionId,Request $request){
       $Categories = Category::all();
        $crReq = $course->requirments;
        // sections
        $section = Coursesection::find($sectionId);
        $section->section_name = $request->coursName;
        $section->save();
        $sections = $course->sections;
        $sectionNum = 0;
        $lectureNum = 0;
        return view('instructor.creatingCourse2',[
            'Cats' => $Categories , 
            'course' => $course , 
            'navebare' => 'no' , 
            'crReq' => $crReq,
            'sections' => $sections,
            'sectionNum' => $sectionNum,
            'lectureNum' => $lectureNum,
        ]);
    }
    public function addingLecture($id,Request $request){
        $lecture = new Lecture();
        $lecture->coursesection_id = $id;
        $lecture->lecture_name = $request->lecture_name;
        $lecture->save();
        return back();
    }
    // about instructor 

    public function aboutInstructor(){
        $Categories = Category::all();
        return view('instructor.aboutInstructor',['Cats' => $Categories]);
    }

    public function InstructorExp(Request $request){
        $instructor = auth()->user()->instructor;
        $instructor->inst_exp = $request->inst_exp;
        $instructor->save();
        return back();
    }

    public function InstructorCtr(Request $request){
        $instructor = auth()->user()->instructor;
        $instructor->inst_certfy = $request->inst_crt;
        $instructor->save();
        return back();
    }

    public function instructorCommunication(){
        $Categories = Category::all();
        $Comments = Comment::where('instructor_id',auth()->user()->instructor->id)->get();
        $assAnswers = Assanswer::where('instructor_id',auth()->user()->instructor->id)->get();
        $courses = auth()->user()->instructor->courses;
        $announcements = announcement::where('instructor_id',auth()->user()->id)->get();
        $addExpReq = Req::where('instructor_id',auth()->user()->id)->get();
        return view('instructor.communication',
        ['Cats' => $Categories ,
         'sidebare' => 'yes' , 
         'Comments' => $Comments ,
         'assAnswers' => $assAnswers ,
         'courses' => $courses,
         'anns' => $announcements,
         'reqs' => $addExpReq]);
    }

    public function assAnswerMark($id,Request $request){
        $answer = Assanswer::where('id',$id)->first();
        $answer->mark = $request->mark;
        $answer->save();
        return back();
    }

    public function addAssinment(Request $request){
        $assignment = new Assignment();
        $assignment->instructor_id = auth()->user()->instructor->id;
        $assignment->course_id = $request->course;
        $assignment->section_id = $request->section_id;
        // adding file 
        //check if thier is an image
        if($request->hasFile('content')){
            $File = $request->file('content');
            $fullFileNameWithExt = $File->getClientOriginalName();
            $fileExt = $File->getClientOriginalExtension();
            $fileName = pathinfo($fullFileNameWithExt,PATHINFO_FILENAME);
            $fileNameToStore = $fileName .time().'.'.$fileExt;
            $store = $File->storeAs('public/files/assignments/',$fileNameToStore);
        }else{
            $fileNameToStore = 'nothing.txt';
        }
        $assignment->ast_file_content = $fileNameToStore;
        $assignment->save();


        $Course = Course::where('id',$request->course)->first();
        $sections = $Course->sections;
        // foreach($sections as $section){
        //     if($section->id = $request->section_id){
        //         $Ass = Assignment::where('section_id',$request->section_id)->first();
        //         $section
        //         $section->assignment_id = $Ass->id;
        //     }
        // }
        return back();
    }

    public function addAnnouncement(Request $request){
        $newAnn = new announcement();
        $newAnn->instructor_id = auth()->user()->id;
        $newAnn->course_id = $request->course;
        $newAnn->content = $request->content;
        $newAnn->save();
        return back();
     }

    public function refuseAddVideo($id){
        $req = Req::where('id',$id)->first();
        $req->delete();
        return back();
    }

    public function sendVidRep(Request $request,$id,$id1){
        $reply = new Reply();
        $reply->instructor_id = auth()->user()->instructor->id;
        $reply->course_id = $id;
        $reply->student_id = $id1;
        if($request->hasFile('reply_content')){
            $File = $request->file('reply_content');
            $fullFileNameWithExt = $File->getClientOriginalName();
            $fileExt = $File->getClientOriginalExtension();
            $fileName = pathinfo($fullFileNameWithExt,PATHINFO_FILENAME);
            $fileNameToStore = $fileName .time().'.'.$fileExt;
            $store = $File->storeAs('public/files/videoReplis/',$fileNameToStore);
        }else{
            $fileNameToStore = 'nothing.txt';
        }
        $reply->reply_content = $fileNameToStore;
        $reply->save();
        return back();
    }

    public function instructorPerformance(){
        $Categories = Category::all();
        // $Comments = Comment::where('instructor_id',auth()->user()->instructor->id)->get();
        // $assAnswers = Assanswer::where('instructor_id',auth()->user()->instructor->id)->get();
        $courses = auth()->user()->instructor->courses;
        $currentMonth = date('m');
        //$coursesOfTheMonth = DB::table("courses")->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
        $coursesOfTheMonth = Course::whereRaw('MONTH(created_at) = ?',[$currentMonth])->get(); 
        // $announcements = announcement::where('instructor_id',auth()->user()->id)->get();
        // $addExpReq = Req::where('instructor_id',auth()->user()->id)->get();
        // calculating total revenu

        $total = 0;
        foreach($courses as $course){
            foreach($course->reservations as $reservation){
                $total = $total + $reservation->course->course_price;
            }
        }

        $totalForMonth = 0;
        foreach($coursesOfTheMonth as $courseOfMonth){
            foreach($courseOfMonth->reservations as $reservation){
                $totalForMonth = $totalForMonth + $reservation->course->course_price;
            }
        }
        $students = array();
        $students_ids = array();
        foreach($courses as $course){
            foreach($course->reservations as $reservation){
                if(!in_array($reservation->student->id,$students_ids)){
                    $students[] =  $reservation->student;
                    $students_ids[] = $reservation->student->id;
                }
            }
        }
        return view('instructor.performance',
        ['Cats' => $Categories ,
         'sidebare' => 'yes' , 
         'courses' => $courses,
         'coursesOfTheMonth' => $coursesOfTheMonth,
         'total' => $total,
         'totalForMonth' => $totalForMonth,
         'students' => $students
        ]);
    }
}
