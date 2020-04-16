@extends('instructor.layout.layout')
@section('title','instructor Dashboard / communication')
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
        .communication-list{margin: 100px 0;font-size: 1.5rem;}
        .communication-list li.active{border-bottom: 3px solid #646ECB;}
        .communication-list li:hover{cursor: pointer;}

        .instructor-communication .com .comment .com-left{display: flex;}
        .instructor-communication .com .comment .com-left .avatar{width: 100px;}
        .instructor-communication .com .comment .com-left .avatar img{max-width: 100%;}
        .instructor-communication .com .reply .reply-header{ display: flex;}
        .instructor-communication .com .reply .reply-header .man{width: 74%;text-align: right;padding-top: 10px;}
        .instructor-communication .com .reply .reply-header h4::after{
            content: "";
            display: block;
            width: 50%;
            height: 3px;
            background-color: #000;
            margin: 20px auto;
        }
        .instructor-communication .com .reply  form textarea{
            width: 100%;
            resize: none;
            text-indent: 11px;
            border: none;
            background-color: #fff;
        }
        .rep{display: none;}
        .answer form{position: relative;}
        .answer form button{
            width: 380px;
            border-radius: 0!important;
            height: 42px;
        }
        .answer form input{
            width: 50px;
            /* margin-bottom: -1px; */
            border: 1px solid #000;
            position: relative;
            top: 4px;
            background-color: transparent;
            text-align: center;
        }
        .answer form .custom-file-field{
            width: 80px;
            height: 80px;
            position: absolute;
            right: 5%;
            bottom: 105%;
            background-color: white;
            text-align: center;
        }
        .answer form .custom-file-field i{
            position: relative;
            bottom: 59px;
        }
        .answer form .custom-file-field input{
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            position: relative;
            z-index: 1;
        }
        .tab-communication .add-assignment{background-color:#474343;}
        
        .select-style {
            width: 50%;
            overflow: hidden;
            margin: auto;
        }

        .select-style select {
            padding: 5px 8px;
            width: 130%;
            border: none;
            color: #fff;
            box-shadow: none;
            background: transparent;
            background-image: none;
            -webkit-appearance: none;
            text-align: center;
        }

        .select-style select:focus {
            outline: none;
        }
        .big {
            font-size: 1.2em;
        }
        .square {
        width: .7em;
        height: .7em;
        margin: .5em;
        display: inline-block;
        }

        /* Custom dropdown */
        .custom-dropdown {
        position: relative;
        display: inline-block;
        vertical-align: middle;
        margin: 10px; /* demo only */
        margin-bottom: 50px;
        width: 60%;
        padding-bottom: 20px;
        border-bottom: 2px solid #fff;
        }
        
        .custom-dropdown select {
        width: 100%;
        background-color: #474343;
        color: #fff;
        font-size: inherit;
        padding: .5em;
        padding-right: 2.5em; 
        border: 0;
        margin: 0;
        border-radius: 3px;
        text-indent: 0.01px;
        text-overflow: '';
        -webkit-appearance: button; /* hide default arrow in chrome OSX */
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
        content: "";
        position: absolute;
        pointer-events: none;
        }

        .custom-dropdown::after { /*  Custom dropdown arrow */
        content: "\25BC";
        height: 1em;
        font-size: .625em;
        line-height: 1;
        right: 1.2em;
        top: 50%;
        margin-top: -.5em;
        background-color: #646ECB;
        }

        .custom-dropdown::before { /*  Custom dropdown arrow cover */
        width: 2em;
        right: 0;
        top: 0;
        bottom: 0;
        border-radius: 0 3px 3px 0;
        }

        .custom-dropdown select[disabled] {
        color: rgba(0,0,0,.3);
        }

        .custom-dropdown select[disabled]::after {
        color: rgba(0,0,0,.1);
        }

        .custom-dropdown::before {
        background-color: rgba(0,0,0,.15);
        }

        .custom-dropdown::after {
        color: rgba(0,0,0,.4);
        }
        
        .custom-f{
            width: 40%;
            margin: 60px auto;
            background-color: #fff;
            padding: 20px 0;
            position: relative;
            font-size: 1.2rem;
        }
        .custom-f input{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }
        .instructor-communication .tab-communication:not(:first-of-type){display: none;}
        .ass .assignment-tab:not(:first-of-type){display: none;}
        .mess .block-msg{position: relative;}
        .mess .block-msg ul li{
            background-color: #474343;
            display: inline-flex;
        }
        .mess .block-msg ul li:hover{
            cursor: pointer;
        }
        .mess .block-msg ul li.active{border-bottom: 3px solid #fff;}
        .mess .block-msg ul li .std-info{text-align: left;}
        .mess .block-msg .messages{
            width: 61%;
            margin: auto;
        }
        .mess .block-msg .messages .msg{display: flex;}
        .mess .block-msg .messages .msg:not(:first-of-type){display: none;}
        .mess .block-msg .messages .msg .msg-content{font-size: 1.1rem;text-align: justify;}
        .mess .block-msg i.fa-caret-left,
        .mess .block-msg i.fa-caret-right{
            position: absolute;
        }
        .mess .block-msg i.fa-caret-right{
            top: 45%;
            right: 0;
        }
        .mess .block-msg i.fa-caret-left{
            top: 45%;
            left: 0;
        }
        .ann h2.title,
        .add-vid h2.title{
            width: 30%;
            margin: 20px auto;
            text-align: center;
        }
        .ann h2.title::after,
        .add-vid h2.title::after{
            content: "";
            display: block;
            width: 50%;
            margin: 20px auto;
            height: 3px;
            background-color: #fff;
        }
        .ann button.add{
            border: none;
            background-color: #474343;
            padding: 15px 40px;
            font-size: 1.1rem;
        }
        .ann button.add:hover{
            cursor: pointer;
            background-color: #aaa7a7;
            color: #474343;
        }
        .ann .add-ann{
            font-size: 1.3rem;
            text-transform: capitalize;
        }
        .ann .add-ann .add-ann-edit button{
            border: none;
            background-color: #474343;
            padding: 15px 80px;
            font-size: 1.3rem;
            margin-top: 4%;
            transition: all 0.5s ease;
        }
        .ann .add-ann .add-ann-edit button:hover{
            cursor: pointer;
            background-color: #aaa7a7;
            color: #474343;
        }
        .video-command .video-command-inf{font-size: 1.4rem}
        .video-command .video-command-ans button{
            border: none;
            width: 200px;
            height: 57px;
            text-transform: capitalize;
            font-size: 1.3rem;
            display: block;
            margin-bottom: 20px;
            transition: all 0.5s ease;
        }
        .video-command .video-command-ans button:hover{
            background-color: #474343;
            color: #fff;
            cursor: pointer;
        }
        .video-command .video-command-desc h3{width: 13%;}
        .video-command .video-command-desc h3::after{
            content: "";
            display: block;
            width: 50%;
            height: 3px;
            background-color: #474343;
            text-transform: capitalize;
            margin: 10px auto;
        }
        .video-command .video-command-desc p{
            font-size: 1.5rem;
            text-align: justify;
            text-indent: 10px;
            text-transform: capitalize;
        }
        .instructor-communication .ann .reply .reply-header {
            display: flex;
        }
        .instructor-communication .ann .reply-header .man {
            width: 74%;
            text-align: right;
            padding-top: 10px;
        }
        .instructor-communication .ann .reply form textarea {
            width: 100%;
            resize: none;
            border: none;
            background-color: #fff;
        }
    </style>
@endsection
@section('content')
    <!-- going back to the stdent dashboard -->

    <a href="#" class="text-capitalize color-black bg-color3 backstd">go back to student dashboard</a>

    <!-- going back to the stdent dashboard -->

    <ul class="communication communication-list list-unstyled list-inline text-center ">
        <li class="list-inline-item color3 text-capitalize mx-5 pb-3 active" data-com=".qa">Q&amp;A</li>
        <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-com=".ass">assignments</li>
        <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-com=".mess">messages</li>
        <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-com=".ann">announcments</li>
        <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-com=".add-vid">additional expalanation</li>
    </ul>

    <section class="instructor-communication">
        <div class="container">
            
            <!-- tab 1 -->
            <div class="tab-communication com qa">
                @foreach ($Comments as $Comment)
                    <div class="comment  color-black px-3 py-3 mb-5">
                        <div class="row bg-color2 px-3 py-3 inf">
                            <div class="col-11 com-left">
                                <div class="avatar">
                                    <img src="{{asset('storage/images/instructor/communication/avt.png')}}" alt="">
                                </div>
                                <p class="text-capitalize ml-3">{{$Comment->comment_detaill}}</p>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary" type="button">Reply</button>
                            </div>
                        </div>
                        <div class="row bg-color3 rep">
                            <div class="col-12">
                                <div class="reply px-3 py-3 ">
                                    <div class="reply-header">
                                        <h4 class="text-capitalize pl-3">put your unswer here</h4>
                                        <div class="man">
                                            <i class="fas fa-bold px-3"></i>
                                            <i class="fas fa-italic px-3"></i>
                                            <i class="fas fa-link px-3"></i>
                                            <i class="fas fa-image px-3"></i>
                                        </div>
                                    </div>
                                    <form action="#" class="px-3">
                                        <textarea name="" id="" rows="10">
    
                                        </textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- tab 2 -->

            <div class="tab-communication ass">
                <ul class="communication-list list-unstyled list-inline ">
                    <li class="list-inline-item color3 text-capitalize mr-5 pb-3 active" data-ass=".view-answer">View answers</li>
                    <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-ass=".add-assignment">add assignments</li>
                    <li class="list-inline-item color3 text-capitalize mx-5 pb-3" data-ass=".eddit-assignment">edit assignments</li>
                </ul>
                <!-- tab1 -->
                <div class="assignment-tab view-answer ">
                    
                    @foreach($assAnswers as $answer)
                        <div class="answer bg-color3 px-3 py-3 mt-5">
                            <ul class="list-unstyled mb-3">
                                <li class="text-capitlize">student:<span class="ml-2">{{$answer->student->user->name}}</span></li>
                                <li class="text-capitlize">course:<span class="ml-2">{{$answer->course->course_name}}</span></li>
                                <li class="text-capitlize">assignment:<span class="ml-2">{{$answer->assignment->id}}</span></li>
                            </ul>
                            <form action="{{route('instructor.assAnswerMark',$answer->id)}}" method="post">
                                @csrf
                                <button class="btn bg-color2 color-black text-capitalize border-0">put a mark and save</button>
                                <input type="text" name="mark" value="{{($answer->mark != null)? $answer->mark : ''}}">
                                <div class="custom-file-field">
                                    <input type="file" name="content" id="">
                                    <i class="fas fa-upload fa-2x"></i>
                                </div>
                            </form>
                        </div>
                    @endforeach
            
                </div>
                <!-- tab2 -->
                <div class="assignment-tab add-assignment color-white px-5 py-5 text-center ">
                    <form action="{{route('instructor.addAssinment')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <span class="custom-dropdown big">
                            <select name="course">    
                                <option>Shoose one of your courses</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </span>
                        <span class="custom-dropdown big">
                            <select name ='section_id' >    
                                <option>Shoose section</option>
                                @foreach ($courses as $course)
                                    @foreach ($course->sections as $section)
                                        <option value="{{$section->id}}">{{$section->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </span>
                        <div class="custom-f color-black">
                            <input type="file" name="content">
                            <span>Add file Content:</span>
                            <i class="fas fa-upload"></i>
                        </div>
                        <button type="submit" class="btn btn-primary">Creat Assingment</button>
                    </form>
                </div>
                <!-- tab3 -->
                <div class="assignment-tab eddit-assignment color-white px-5 py-5 text-center">
                        <form action="#" method="post">
                            <span class="custom-dropdown big">
                                <select>    
                                    <option>Shoose one of your courses</option>
                                    <option>php tutorial</option>  
                                    <option>css tuturial</option>
                                    <option>java script tutorial</option>
                                    <option>database tutorial</option>
                                </select>
                            </span>
                            <span class="custom-dropdown big">
                                <select>    
                                    <option>Shoose section</option>
                                    <option>section 1</option> 
                                    <option>section 2</option> 
                                    <option>section 3</option> 
                                    <option>section 4</option> 
                                </select>
                            </span>
                            <div class="custom-f color-black">
                                <input type="file">
                                <span>Edit Assignment:</span>
                                <i class="fas fa-upload"></i>
                            </div>
                        </form>
                    </div>
            </div>

            <!-- tab 3 -->
            <div class="tab-communication mess">
                <div class="block-msg">
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item color-white text-capitalize mx-1 py-4 px-4 active" data-num=".one">
                            <div class="stud-avt pr-2">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="80" height="80">
                            </div>
                            <div class="std-info">
                                <p class="pt-2">Name</p>
                                <p>05/04/2019</p>
                            </div>
                        </li>
                        <li class="list-inline-item color-white text-capitalize mx-1 py-4 px-4 " data-num=".tow">
                            <div class="stud-avt pr-2">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="80" height="80">
                            </div>
                            <div class="std-info">
                                <p class="pt-2">Name</p>
                                <p>05/04/2019</p>
                            </div>
                        </li>
                        <li class="list-inline-item color-white text-capitalize mx-1 py-4 px-4 " data-num=".three">
                            <div class="stud-avt pr-2">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="80" height="80">
                            </div>
                            <div class="std-info">
                                <p class="pt-2">Name</p>
                                <p>05/04/2019</p>
                            </div>
                        </li>
                    </ul>
                    <div class="messages">
                        
                        <div class="msg one px-4 py-5 bg-color3 color-black">
                            <div class="msg-avt">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="200" height="200">
                            </div>
                            <p class="msg-content pl-3 pt-4">
                                    1is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                     when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </p>
                        </div>
                        
                        <div class="msg tow px-4 py-5 bg-color3 color-black">
                            <div class="msg-avt">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="200" height="200">
                            </div>
                            <p class="msg-content pl-3 pt-4">
                                    2is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </p>
                        </div>

                        <div class="msg three px-4 py-5 bg-color3 color-black">
                            <div class="msg-avt">
                                <img src="{{asset('storage/images/instructor/communication/Rectangle 131.svg')}}" alt="student avatar" width="200" height="200">
                            </div>
                            <p class="msg-content pl-3 pt-4">
                                    3is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </p>
                        </div>
                    </div>

                    <i class="fas fa-caret-left fa-5x color1"></i>
                    <i class="fas fa-caret-right fa-5x color1"></i>
                </div>
            </div>

            <!-- tab 4 -->
            <div class="tab-communication ann">
                <h2 class="color-white text-capitalize title">anouncements</h2>
                @foreach ($anns as $ann)
                    <div class="add-ann bg-color3 color-black px-3 py-3 my-4 row">
                        <div class="add-ann-info col-md-9">
                            <p>{{$ann->course->course_name}}</p>
                            <p>{{$ann->created_at}}</p>
                        </div>
                        <div class="add-ann-edit col-md-3">
                            <button class="color-white ann-edit">Edit</button>
                        </div>
                        <div class="row bg-color3 rep " style="width: 100%;">
                            <div class="col-12">
                                <div class="reply px-3 py-3 ">
                                    <div class="reply-header">
                                        <h4 class="text-capitalize pl-3">you can edit it here</h4>
                                        <div class="man">
                                            <i class="fas fa-bold px-3"></i>
                                            <i class="fas fa-italic px-3"></i>
                                            <i class="fas fa-link px-3"></i>
                                            <i class="fas fa-image px-3"></i>
                                        </div>
                                    </div>
                                    <form action="#" class="px-3">
                                        <textarea name="" id="" rows="10">{{$ann->content}}</textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <form class="add-ann bg-color3 color-black px-3 py-3 my-4 row" action="{{route('instructor.addAnnouncement')}}" method="POST">
                    @csrf
                    <div class="add-ann-info col-md-9">
                        <textarea name="content" id="" rows="10" placeholder="add content" class="form-control mb-4"></textarea>
                        <select name="course" style="background-color: #4a4646;color: white;padding: 10px;">    
                            <option>Shoose one of your courses</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="add-ann-edit col-md-3">
                        <input  type="submit" value="Add Announcement" class="color-white ann-edit" style="padding: 10px 15px;background-color: #4a4646;border: none;">
                    </div>
                </form>
            </div>

            <!-- tab 5 -->

            <div class="tab-communication add-vid">
                <h2 class="color-white text-capitalize title">additional videos</h2>
                @foreach ($reqs as $request)
                <div class="video-command bg-color3 color-black py-4 px-4 mb-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="video-command-inf">
                                    <ul class=" list-unstyled">
                                        <li class="text-capitalize color-black">{{$request->course->course_name}}</li>
                                        <li class="text-capitalize color-black">{{$request->created_at}}</li>
                                        <li class="text-capitalize color-black">{{$request->student->user->name}}</li>
                                        <li class="text-capitalize color-black">expectation time: <span>{{$request->exp_ex_time}}</span> hours</li>
                                        <li class="text-capitalize color-black">price:$<span>{{$request->request_budjet}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="video-command-ans">
                                    <form action="{{route('instructor.refuseAddVideo',$request->id)}}" method="POST">
                                        @csrf
                                        <button class="refuse-button text-capitalze color-white bg-color1" type="submit">refuse &amp; delete</button>
                                    </form>
                                    <form action="{{route('instructor.sendVidRep',['id' => $request->course->id, 'id1' => $request->student->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <button class="refuse-button text-capitalze color-white bg-color1" type="submit">upload video</button>
                                        <div class="custom-f color-black" style="margin: 5px 0;width: 12%;padding: 10px;">
                                            <input type="file" name="reply_content">
                                            <i class="fas fa-upload"></i>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="video-command-desc">
                            <h3>description:</h3>
                            <p>{{$request->request_content}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection