@extends('student.layouts.layout')
@section('pageTitle','Student Videos Answer')
@section('pageStyle')
<style>
    .aditional_video_loader{
        width: 25%;
        background-color: #bfc5fc;
        border: none;
        padding: 5px;
        cursor: pointer;
        transition: all 1s ease;
        text-align: center;
        color: black!important;
    }
    .aditional_video_loader:hover{
        background-color: #646ecb;
        color: #fff!important;
        text-decoration:none;
    }
</style>
@endSection
@section('content')
   
 <!-- title -->

 <div class="title text-center my-5">
    <h1 class="text-capitalize color3 d-inline-block ">
        {{$student->user->name}}
        <div class="center-line"></div>
    </h1> 
</div>

<!-- title -->

<!-- additional videos answer -->

<section class="container mb-5">
    <div class="additional-videos-responses">
        <h2 class="font-italic text-center text-capitalize color3">/&nbsp;&nbsp;&nbsp;&nbsp;your additional videos responces&nbsp;&nbsp;&nbsp;&nbsp;/</h2>
        @foreach ($videosReplies as $videosReply)
            <!-- video one -->
            <div class="response" id="response1">
                <div class="response-content mt-5 mb-3">
                    <div class="response-info mr-5 ">
                        <img src="{{asset('storage/images/user/'.$videosReply->instructor->user->profileimg)}}" alt="instructor avatar" width="64" height="64" class=" mb-4 ml-2 rounded border border-primary">
                        <p class="text-capitalize"><span class="color1 mx-2">instructor:</span><span class="color3">{{$videosReply->instructor->user->name}}</span></p>
                        <p class="text-capitalize"><span class="color1 mx-2">date:</span><span class="color3">{{$videosReply->created_at}}</span></p>
                        <p class="text-capitalize"><span class="color1 mx-2">course:</span><span class="color3">{{$videosReply->course->course_name}}</span></p>
                    </div>
                    <div class="response-video ">
                        <a href="#" class="d-block">
                            <img src="{{asset('storage/images/student/videoAnswers/TriangleRight.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="upload">
                    <a class="aditional_video_loader" href="{{route('aditional_video_loader',$videosReply->id)}}">Load Video</a>
                </div>    
            </div>
        @endforeach
    </div>
</section>

 <!-- additional videos answer -->
    
@endsection