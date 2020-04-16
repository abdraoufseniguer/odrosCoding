@extends('instructor.layout.layout')
@section('title','Instructor Dashboard / creating course')
@section('style')
    <style>
        .cr-course-tabs{height: 70px;overflow: hidden;}
        .cr-course-tabs .back a{width: 100%;border-radius: 0;font-size: 1.4rem;}
        .cr-course-tabs .back a i{color: #a0a0a0;}
        .cr-course-tabs .back a span{margin-left: 5px;}
        .cr-course-tabs .tabs{padding-left: 0;font-size: 1.4rem;}
        .cr-course-tabs .tabs ul li{border-bottom: 5px solid #BFC5FC;}
        .cr-course-tabs .tabs ul li:hover{cursor: pointer;}
        .cr-course-tabs .tabs ul li.active{background-color: #232121;}
        .tabs-contents .course-desc h2{width: 50%; margin: 100px auto;text-align: center;}
        .tabs-contents .course-desc h2::after{
            content: "";
            width: 40%;
            margin: 40px auto;
            height: 3px;
            display: block;
            background-color: #BFC5FC;
        }
        .tabs-contents .course-desc form textarea{
            width: 100%;
            resize: none;
            border: none;
            background-color: #474343;
            margin-bottom: 20px;
            color: #BFC5FC;
            text-indent: 10px;
        }
        .tabs-contents .course-desc .manipulation button{
            background-color: #474343;
            color: #BFC5FC;
            width: 100px;
            text-align: center;
            text-transform: capitalize;
            border-bottom: 5px solid #BFC5FC;
            border-radius: 0;
            margin-right: 20px;
            font-size: 1.2rem;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .tabs-contents .course-desc .manipulation button:hover{
            background-color: #BFC5FC;
            color: #474343;
        }
        .tabs-contents .course-requ h2{width: 50%; margin: 100px auto;text-align: center;}
        .tabs-contents .course-requ h2::after{
            content: "";
            width: 40%;
            margin: 40px auto 30px;
            height: 3px;
            display: block;
            background-color: #BFC5FC;
        }
        .tabs-contents .course-requ form input{
            width: 84%;
            background-color: #474343;
            border: none;
            margin-right: 3%;
            color: #fff;
            padding: 10px;
        }
        .tabs-contents .course-requ form input::placeholder{
            color: #fff;
            text-transform: capitalize;
        }
        .tabs-contents .course-requ form button.adder{
            width: 12%;
            background-color: #474343;
            text-align: center;
            border: none;
            border-right: 3px solid #BFC5FC;
            color: #fff;
            padding: 10px;
        }
        .tabs-contents .course-requ form button.adder:hover{
            cursor: pointer;
            background-color: #BFC5FC;
            color: #474343;
        }
        .tabs-contents .course-requ form .cr-rquerements{
            padding: 10px;
            background-color: #474343;
            border-left: 3px solid #BFC5FC;
            color: #FFF;
        }
        .tabs-contents .course-requ form .cr-rquerements li{
            padding: 10px;
            font-size: 1.2rem;
            text-transform: capitalize;
        }
        .tabs-contents .course-requ form button.save{
            background-color: #474343;
            color: #BFC5FC;
            width: 100px;
            text-align: center;
            text-transform: capitalize;
            border-bottom: 5px solid #BFC5FC;
            border-radius: 0;
            margin-right: 20px;
            font-size: 1.2rem;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .tabs-contents .course-cont h2{width: 50%; margin: 100px auto 60px;text-align: center;}
        .tabs-contents .course-cont h2::after{
            content: "";
            width: 40%;
            margin: 30px auto;
            height: 3px;
            display: block;
            background-color: #BFC5FC;
        }
        .sections .section{
            background-color: #474343;
            color: #E7E9FB;
            position: relative;
            padding: 20px 20px 70px;
        }
        .sections .section .lecture{
            width: 80%;
            margin: auto;
            color: #000;
            background-color: #e7e9fb;
            padding: 20px;
            font-weight: bold;
            font-size: 1.1rem;
            text-transform: capitalize;
            margin-bottom: 10px;
        }
        .sections .section .lecture button{
            background-color: #fff;
            border: none;
            min-width: 100px;
            text-align: left;
            border-left: 4px solid #646ECB;
            position: relative;
            left: 60%;
        }
        .sections .section .lecture button:hover{
            cursor: pointer;
        }
        .sections .section .lecture button::after{
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 10px solid #fff;
            position: absolute;
            right: 10%;
        }
        .sections .section .lectureAdder{
            background-color: #646ECB;
            width: 5%;
            text-align: center;
            border-radius: 0 5px 5px 0;
            position: absolute;
            left: 0;
            bottom: 10%;
        }
        .sections .section .lectureAdder:hover{cursor: pointer;}
        .sections .section .media-adder{
            width: 80%;
            margin: auto;
            color: #000;
            background-color: #e7e9fb;
            padding: 20px;
            font-weight: bold;
            font-size: 1.1rem;
            text-transform: capitalize;
            border-top: #000 solid 1px;
            display: none;
        }
        .sections .section .media-adder .media-content form{
            display: flex;
            justify-content: center;
        }
        .sections .section .media-adder .media-content form div{
            width: 20%;
            margin-right: 1rem;
            position: relative;
            z-index: 1;
            height: 6rem;
        }
        .sections .section .media-adder .media-content form div i{
            position: absolute;
            z-index: 10;
            color: #fff;
            font-size: 3rem;
            right: 38%;
            top:  16%;
        }
        .sections .section .media-adder .media-content form div input{
            width: 100%;
            height: 100%;
            z-index: 2;
            position: relative;
            display: block;
            opacity: 0;
            cursor: pointer;
        }
        .sections .section .media-adder .media-content form div.custom-f{
            background-color: #545050;
            text-align: center;
        }
        .sections .section .media-adder .media-content form div.custom-f p{
            color: #fff;
            position: absolute;
            bottom: -15%;
            left: 36%;
        }
        .tab-content:not(:first-of-type){display: none;}
        .secion_name{
            border: none;
            background: transparent;
            outline: none;
            color: #646ecb;
        }
        .name_changer{
            margin-top: -5px;
        }
        .lecture_adder{
            text-align: center;
            padding-top: 20px;
            display: none;
        }
        .lecture_adder input[type="text"]{
            display: inline-block;
            width: 65%;
            border: none;
            padding: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="cr-course-tabs color-white bg-color4">
        <div >
            <div class="row">
                <div class="col-md-2 back">
                    <a href="{{route('instructor.course_category',$course->course_name)}}" class="btn color-black bg-color2 text-capitalize px-3 py-3"><i class="fas fa-chevron-left color-black"></i><span>back</span></a>
                </div>
                <div class="col-md-10 tabs list-unstyled list-inline">
                    <ul>
                        <li class="text-capitalize mr-4 px-3 py-3 list-inline-item active" data-list='.course-desc'>course description</li>
                        <li class="text-capitalize mr-4 px-3 py-3 list-inline-item" data-list='.course-requ'>course requiremnents</li>
                        <li class="text-capitalize mr-4 px-3 py-3 list-inline-item" data-list='.course-cont'>course content</li>
                        <li class="text-capitalize mr-4 px-3 py-3 list-inline-item" data-list='.course-tr'>terms &amp; conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- tabs content -->
    <div class="container tabs-contents">
        <!-- tabe content one -->
        <div class="tab-content course-desc ">
            <h2 class="color3 text-capitalize">add your description here</h2>
            <form action="{{route('instructor.course_description_store',$course->id)}}" method="POST">
                @csrf
                <textarea name="description_content" id=""  rows="10">@empty($course) @else {{$course->course_description}}@endempty</textarea>
                <div class="form-group manipulation">
                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn">Edit</button>
                </div>
            </form>
        </div>
        <!-- tabe content two -->
        <div class="tab-content course-requ ">
            <h2 class="color3 text-capitalize">add course requiremnents</h2>
            <form action="{{route('instructor.course_requirement_store',$course->id)}}" method="POST">
                @csrf
                <input type="text" class=" text-capitalize color-3 bg-color4" placeholder="type a new requirement" name="course_requirement">
                <button type="button" class="color-3 bg-color4 text-capitalize adder">add</button>
                <h3 class=" color3 mt-5 mb-4">The Previous requiremnents:</h3>
                <ul class="cr-rquerements list-unstyled">
                    @foreach ($crReq as $req)
                        <li>{{$req->requirement_content}}</li>
                    @endforeach
                </ul>
                <button type="submit" class="btn save">save</button>
            </form>
        </div>

        <!-- tabe content three -->
        <div class="tab-content course-cont">
            <h2 class="color3 text-capitalize">create the course content</h2>
            <h4 class="color3 text-capitalize mb-5">here where you are add sections and lectures ,files and assignments.</h4>
            <div class="sections">
                @foreach ($sections as $section)
                    @php
                        $sectionNum +=1;
                    @endphp
                    <div class="section ">
                        <h3 class="mb-5">section <span>{{$sectionNum}}</span> / <form action="{{route('instructor.sectionNameChange',['course' => $course->id , 'coursesection' => $section->id])}}" method="post" style="display:inline-block">@csrf<input type="text" placeholder="section name" class="secion_name" value="{{$section->section_name}}" name="coursName"> <button class="btn btn-info name_changer" type="submit"><i class="fa fa-edit"></i></button></form></h3>
                        @foreach ($section->lectures as $lecture)
                            <div class="lecture">
                                @php
                                    $lectureNum +=1;
                                @endphp
                                <span>Lecture</span>
                                <span class="lectureNumber"> {{$lectureNum}}</span>
                                <span>: </span>
                                <i class="fas fa-file-alt color1"></i>
                                <span class="course-name"> {{$lecture->lecture_name}}</span>
                                <button class="ml-auto text-capitalize">content</button>
                            </div>
                            <div class="media-adder mb-3">
                                <h6 class=" text-capitlize color-black mb-3">select one of this :</h6>
                                <div class="media-content">
                                    <form action="{{route('instructor.course_attachement_store',$course->id)}}" class="course-attach" enctype="multipart/form-data" method="POST">
                                        <input type="file" name="video" >
                                        <input type="file" name="aritcle" >
                                        <input type="file" name="assignement">
                                    </form>
                                    <button class="btn btn-info adding-attachment" type="submit">Upload</button>
                                </div>
                            </div>
                        @endforeach  
                        <form action="{{route('instructor.addingLecture',$section->id)}}" method="POST" class="lecture_adder">
                            @csrf
                            <input type="text" name="lecture_name">
                            <button type="submit" class="btn btn-info">Add Lecture</button>
                        </form>      
                        <div class="lectureAdder">
                            <i class="fas fa-plus color-white"></i>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="course-publish text-center mt-5">
                <h5 class="text-uppercase color-white">if you finish editing the course</h5>
                <button type="button" class="color-white text-uppercase bg-color1 color-white border-0 px-3 py-2">publish to review</button>
            </div>
        </div>
    </div>
@endsection
