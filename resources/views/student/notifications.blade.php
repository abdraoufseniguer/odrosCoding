@extends('student.layouts.layout')
@section('pageTitle','Student Notifications')
@section('pageStyle')
    <style>
        .custom-file span{
            left: 28%;
            top: 10%;
        }
        .ldAss{
            display: inline-block;
            width: 294px;
            background-color: #ddd;
            color: #000;
            text-transform: capitalize;
            margin-left: 15px;
            text-align: center;
            
            margin-top: 20px;
            padding: 2px 0px;
        }
        .ldAss:hover{
            color: #ddd;
            background-color: #545050;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <!-- title -->

    <div class="title text-center my-5">
        <h1 class="text-capitalize color3 d-inline-block ">
            student
            <div class="center-line"></div>
        </h1> 
    </div>
    
    <!-- title -->
        
    <!-- notification -->
    
    <div class="notifications">
        <div class="container">
            <!-- tabs  -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item mr-3">
                    <a class="nav-link active text-capitalize" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">notifiactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">assignments</a>
                </li>
            </ul>
            
            <div class="tab-content my-5 " id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <ul class="list-unstyled color3 mb-5">
                        @foreach ($notifications as $notification)
                            @php
                                $not = $notification[0];    
                            @endphp
                            <li class="media">
                                <div class="medi-bare mr-5">
                                    <img class="mr-3" src="{{asset('storage/images/user/'.$not->instructor->user->profileimg)}}" width='64' height='64' php artisan make:migration add_profile_to_usersalt="Generic placeholder image">
                                    <span class="d-block text-capitalize mt-3">{{$not->instructor->user->name}}</span>
                                </div>
                                <div class="media-body w-75">
                                    {{$not->content}}
                                </div>
                            </li>
                            <div class="center-line"></div>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="list-unstyled color3 mb-5">
                        @foreach ($assignments as $assignment)
                            @php
                                if(isset($assignment[0])){
                                    $ass = $assignment[0]; 
                                }   
                            @endphp
                            <li class="media">
                                <div class="medi-bare mr-5">
                                    <img class="mr-3" src="{{asset('storage/images/user/'.$ass->instructor->user->profileimg)}}" alt="Generic placeholder image" width='64' height='64'>
                                    <span class="d-block text-capitalize mt-3">{{$ass->instructor->user->name}}</span>
                                </div>
                                <div class="media-body w-75">
                                    {{$ass->content}}
                                    <form action="{{route('loadingAssignmentAnswer',['courseId'=>$ass->course_id , 'instructorId'=>$ass->instructor_id])}}" class="load-answer mt-5" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- <input type="file" class="loadAssignment">  --}}
                                        <input type="file" class="loadAnswer" name="assigmentAnswer"> 
                                        <button class="btn btn-info" type="submit">Send Answer</button>
                                    </form>
                                    <a href="{{route('loadingAssignment',$ass->id)}}" class="ldAss">Load assignment</a> 
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- tabs  -->
        </div>
    </div>

    <!-- notification -->
    
@endsection