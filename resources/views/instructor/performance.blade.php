@extends('instructor.layout.layout')
@section('title','instructor Dashboard / performance')
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
        .sidebare ul li:hover{background-color: #646ECB;color: #000;cursor: pointer;}
        .sidebare ul li.active{border-left: 3px solid #646ECB}
        .sidebare ul li span{display: none;}
        .sidebare ul li img{width:25px;display: inline-block;margin-right: 10px;}
        /* end sidebare */
        
        /* performances */

        .performances{margin-top: 100px;position: relative;}
        .performances .performance-list{margin-left: 4%;font-size: 1.2rem;}
        .performances .performance-list li:hover{cursor: pointer;}
        .performances .performance-list li.active{border-bottom: 3px solid #fff;}
        .performances .rev h3.title{
            width: 20%;
            margin:  auto;
            text-align: center;
        }
        .performances .rev h3.title::after{
            content: "";
            display: block;
            width: 35%;
            margin: 20px auto;
            height: 3px;
            background-color: #474343;
        }
        .performances .rev p.revenu{
        font-size: 1.3rem;
        color: #474343;
        }
        .performances .rev p.revenu span{
        color: #000;
        font-weight: bold;
        }
        .performances .perfor-tab{margin: 100px 0 150px;}
        .performances i{
            position: absolute;
        }
        .performances .perfor-tab{
            position: relative;
        }
        .performances .perfor-tab i{
            position: absolute;
        }
        .performances .perfor-tab i.fa-caret-right{
            bottom: -19%;
            right: 40%;
        }
        .performances .perfor-tab i.fa-caret-left{
            bottom: -19%;
            left: 40%;
        }
        .performances .perfor-tab.std i.fa-caret-right,
        .performances .perfor-tab.std i.fa-caret-left{
        bottom: -5%;
        }
        .enr p {
            font-size: 1.3rem;
        }
        .performances .perfor-tab:not(:first-of-type){display: none;}
        .performances .enr h3.title{
            width: 20%;
            margin:  auto;
            text-align: center;
        }
        .performances .enr h3.title::after{
            content: "";
            display: block;
            width: 35%;
            margin: 20px auto;
            height: 3px;
            background-color: #474343;
        }
        .students .student-cart{border: 5px solid #646ECB; margin-bottom: 30px;}
        .students .student-cart img{width: 100px;}
        .students .student-cart ul li{
            text-align: left;
            text-indent: 30px;
            font-size: 1.1rem;
            padding: 20px 0px;
            border-bottom: 1px solid #474343;
        }
        /* performances */
    </style>
@endsection
@section('content')
    <!-- going back to the stdent dashboard -->

    <a href="{{route('dash')}}" class="text-capitalize color-black bg-color3 backstd">go back to student dashboard</a>

    <!-- going back to the stdent dashboard -->

    <!-- performances -->
    <div class="performances">
        <ul class="list-unstyled list-inline performance-list ">
            <li class="list-inline-item color3 text-capitalize mx-4 pb-3 active" data-per=".rev">revenue</li>
            <li class="list-inline-item color3 text-capitalize mx-4 pb-3" data-per=".enr">enrollments</li>
            <li class="list-inline-item color3 text-capitalize mx-4 pb-3" data-per=".std">students</li>
            <li class="list-inline-item color3 text-capitalize mx-4 pb-3" data-per=".rat">rating</li>
        </ul>
        <div class="container">
            <!-- tab 1 -->
            <div class="perfor-tab rev py-4 px-4 bg-color3 color-black ">
                <h3 class="text-capitalize title">this month</h3>
                <p class="revenu text-capitalize">total revenue : <span> ${{$totalForMonth}}</span></p>
                <ul class="list-unstyled">
                    @foreach ($coursesOfTheMonth as $course)
                        @foreach($course->reservations as $reservation)
                            <li class="media mt-5">
                                <img class="mr-3" src="{{asset('storage/images/instructor/performance/Rectangle 134.svg')}}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 text-capitalize">{{$reservation->course->course_name}}</h4>
                                    <h5 class="font-weight-bold mt-3">{{$reservation->course->course_price}}</h5>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <i class="fas fa-caret-left fa-5x color1"></i>
                <i class="fas fa-caret-right fa-5x color1"></i>
            </div>
            <!-- tab 2 -->
            <div class="perfor-tab enr py-4 px-4 bg-color3 color-black ">
                <h3 class="text-capitalize title">total enrolments</h3>
                <p class=" text-capitalize ">total : <span class="color1"> ${{$total}}</span></p>
                <ul class="list-unstyled">
                    @foreach ($courses as $course)
                        @foreach($course->reservations as $reservation)
                            <li class="media mt-5">
                                <img class="mr-3" src="{{asset('storage/images/instructor/performance/Rectangle 134.svg')}}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 text-capitalize">{{$reservation->course->course_name}}</h4>
                                    <h5 class="font-weight-bold mt-3">{{$reservation->course->course_price}}</h5>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <i class="fas fa-caret-left fa-5x color1"></i>
                <i class="fas fa-caret-right fa-5x color1"></i>
            </div>
            <!-- tab 3 -->
            <div class="perfor-tab std py-4 px-4  color-black ">
                @foreach (array_chunk($students,3) as $threeStudents)
                    <div class="row students">
                        @foreach ($threeStudents as $student)
                            <div class="col">
                                <div class="student-cart color-white bg-color2 text-center py-4 px-2">
                                    <img src="{{asset('storage/images/instructor/performance/Rectangle 134.svg')}}" widht = "100" alt="student image">
                                    <ul class="list-group list-unstyled">
                                        <li class= "text-capitalize">{{$student->user->name}}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                

            </div>
        </div>
    </div>
    <!-- performances -->
@endsection