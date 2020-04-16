@extends('instructor.layout.layout')
@section('title','Instructor Dashboard / creating course')
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
            left: 90%;
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
        
        /* your courses */
        .under-line-center::after{
            content: '';
            display: block;
            width: 15%;
            height: 3px;
            margin: 20px auto 0;
            background-color: #e7e9fb;
        }
        .cours-title{
            width: 55%;
            margin: 30px auto;
        }
        .cours-title input{
            width: 100%;
            background-color: #474343;
            border: none;
            padding: 10px;
            margin-bottom: 20px;
        }
        .cours-title input::placeholder{color: #ddd;}
        .counter{
            position: absolute;
            right: 14%;
            top: 36%;
        }
        .counter span{
            display: inline-block;
            margin-left: -37px;
        }
        .step-number{
            width: 50px;
            height: 50px;
            text-align: center;
            background-color: #646ECB;
            color: #fff;
            text-transform: capitalize;
        }
        .direction{overflow: hidden;}
        .direction .back{
            float: left;
            padding: 10px;
            background-color: #474343;
            color: #ddd
        }
        .direction .next{
            float: right;
            padding: 10px;
            background-color: #474343;
            color: #ddd
        }
        .direction .back:hover,
        .direction .next:hover{
            color: #646ECB;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <!-- title counter -->
    <div class="counter">
        <img src="{{asset('storage/images/instructor/courses/Path 119.svg')}}" alt="" width="50">
        <span class="color-white text-bold">65</span>
    </div>
        
    
    <!-- going back to the stdent dashboard -->

    <a href="#" class="text-capitalize color-black bg-color3 backstd">cancel</a>

    <!-- going back to the stdent dashboard -->

    <!-- your already created courses -->

    <h2 class=" color-white text-capitalize text-center my-courses-title under-line-center mt-5">
        give us a initial course title
    </h2>

    <div class="cours-title text-center mb-5">
    <form action="{{route('instructor.course_title')}}" method="post" id="course_name_form">
            @csrf
            <input type="text" class="d-block color-white text-capitalize" placeholder="ex:the complete web development course" name="course_name">
        </form>
        <h5 class="text-capitalize color3">you can change it later</h5>
    </div>
    
    <!-- step number -->
    <div class="step-number ml-4">
        step<br>1
    </div>
    <!-- separator -->
    <div class="under-line-center mt-5 mb-5"></div>
    <!-- next back -->
    <div class="direction container">
        <a href="#" class="d-block color-white text-capitalize back ">back</a>
        <a href="#" class="d-block color-white text-capitalize next">next</a>
    </div>
@endsection