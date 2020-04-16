@extends('instructor.layout.layout')
@section('title','Instructor Dashboard')
@section('style')
    <style>
        /* navbar icons */
        .navbar .icons .p{padding-top: 17px;}
        /* navbare profile */
        .navbar .profile{
            left: auto;
            right: 0;
            background-color: #BFC5FC;
        }
        .navbar .profile a{
            display: flex;
            justify-content: space-between;
        }
        .navbar .profile a:hover{
            background-color: #646ECB;
        }
        .navbar .profile a i{
            padding-top: 5px;
        }
        /* go back to student dash */
        a.backstd{
            position: relative;
            left: 80%;
            padding: 10px;
            border-radius: 30px;
            text-align: center;
            bottom: -40px;
        }
        a.backstd:hover{
            text-decoration: none;
        }
        a.backstd::after{
            content: " ";
            position: absolute;
            top: 50%;
            left: 98%;
            margin-top: -10px;
            border-width: 10px;
            border-style: solid;
            border-color: transparent transparent transparent #e7e9fb;
        }
        /* go back to student dash */
        /* creating course */

        .creating-course{
            margin: 10% auto 0;
            width: 60%;
            padding: 25px;
            background-color: #474343;
        }
        .creating-course .cr-course{
            display: block;
            width: 50%;
            margin: 0 auto 30px;
            padding: 10px;
            font-size: 1.2rem;
            letter-spacing: 1px;
            font-style: italic;
        }
        .creating-course .cr-course:hover{
            background-color: #646ECB;
            color: #BFC5FC;
            text-decoration: none;
        }
        .creating-course span{
            font-size: 1.5rem;
            font-style: italic;
            word-spacing: 2.1px;
        }
        .creating-course .cr-course-i{
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #ddd;
            margin-left: 10px;
            border-radius: 15px;
            margin-bottom: -15px;
            position: relative;
        }
        .creating-course .cr-course-i i{
            position: absolute;
            font-size: 1.8rem;
            top: 25%;
            left: 43%;
        }
        /* creating course */
        /* your courses */
        .under-line-center::after{
            content: '';
            display: block;
            width: 30%;
            height: 3px;
            margin: 20px auto 0;
            background-color: #e7e9fb;
        }
        .my-courses-title{
            width: 20%;
            margin: 40px auto;
        }
        .courses .inst-course .card{
            margin: auto;
            border-radius: 0;
            border: 3px solid #646ECB;
            background-color: transparent;
            margin-bottom: 60px;
        }
        .courses .inst-course .card a{
            width: 80%;
            margin: 10px auto;
            background-color: #474343;
            color: #BFC5FC;
            padding: 10px;
            border-radius: 0;
        }
        /* your courses */
        /* pagination */
        .pagination{
            width: 35%;
            margin: auto;
            padding-left: 23px;
        }
        .pagination a{
            background-color: transparent;
            border: 1px solid #646ECB;
            color: #BFC5FC;
        }
        /* sidebare */
        .sidebare{
            width: 4%;
            height: 100vh;
            position: fixed;
            top: 13%;
            z-index: 1000;
            padding-top: 50px
        }
        .sidebare ul li{margin-bottom: 8px;padding: 7px 0 7px 11px;}
        .sidebare ul li:hover{background-color: #646ECB;color: #BFC5FC;cursor: pointer;}
        .sidebare ul li.active{border-left: 3px solid #646ECB}
        .sidebare ul li span{display: none;}
        .sidebare ul li img{width:25px;display: inline-block;margin-right: 10px;}
    </style>
@endsection
@section('content')
     <!-- going back to the stdent dashboard -->

     <a href="{{route('dash')}}" class="text-capitalize color-black bg-color3 backstd">go back to student dashboard</a>

     <!-- going back to the stdent dashboard -->
 
     <!-- creating course -->
 
     <div class="creating-course text-center">
         <a href="{{route('instructor.create_course')}}" class="text-capitalize color-black bg-color3 cr-course">create the course</a>
         <span class="color-white text-capitalize">click to create a new course</span>
         <a href="#" class="cr-course-i"><i class="fas fa-caret-right color1"></i></a>
     </div> 
 
     <!-- creating course -->
 
     <!-- your already created courses -->
 
     <h2 class=" color-white text-capitalize text-center my-courses-title under-line-center">
         your courses
     </h2>
 
     <!-- courses -->
     <div class="courses text-center color2">
         <div class="container">
             @foreach ($Courses->chunk(2) as $towCr)
                <div class="row">
                    @foreach ($towCr as $cr)
                        <div class="col">
                            <div class="inst-course">
                                <div class="card" style="width: 30rem;">
                                    <img class="card-img-top" src="{{asset('storage/images/instructor/courses/Rectangle 27.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-capitalize color2">{{$cr->course_name}}</h5>
                                        <a href="{{route('instructo.courses_edit',$cr->id)}}" class="btn d-block text-capitalize">Edit The course</a>
                                        <a href="{{route('instructo.courses_delete',$cr->id)}}" class="btn d-block text-capitalize">Delete Course</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
             @endforeach
            <div style="width : 100%;">{{$Courses->links()}}</div>
         </div>
     </div>
     <!-- navigatino -->
     {{-- <nav aria-label="Page navigation example">
         <ul class="pagination">
             <li class="page-item">
             <a class="page-link py-3 px-3 mx-1" href="#" aria-label="Previous">
                 <span aria-hidden="true">&laquo;</span>
                 <span class="sr-only">Previous</span>
             </a>
             </li>
             <li class="page-item"><a class="page-link py-3 px-3 mx-1" href="#">1</a></li>
             <li class="page-item "><a class="page-link py-3 px-3 mx-1" href="#">2</a></li>
             <li class="page-item "><a class="page-link py-3 px-3 mx-1" href="#">3</a></li>
             <li class="page-item">
             <a class="page-link py-3 px-3 mx-1" href="#" aria-label="Next">
                 <span aria-hidden="true">&raquo;</span>
                 <span class="sr-only">Next</span>
             </a>
             </li>
         </ul>
     </nav> --}}
     <!-- navigatino --> 
     <!-- your already created courses -->
@endsection