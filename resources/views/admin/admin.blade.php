@extends('admin.layout.layout')
@section('pageTitle','Admin / Courses Administration')
@section('pageStyle')
    <style>
            
        /* sidebar-admin */
        .sidebar-admin{
            width: 4%;
            height: 100vh;
            position: fixed;
            z-index: 1000;
            padding-top: 50px;
        }
        .sidebar-admin ul li{margin-bottom: 8px;padding: 7px 0 7px 11px;}
        .sidebar-admin ul li:hover{background-color: #646ECB;color: #000;cursor: pointer;}
        .sidebar-admin ul li.active{border-left: 3px solid #646ECB}
        .sidebar-admin ul li span{display: none;}
        .sidebar-admin ul li img{width:25px;display: inline-block;margin-right: 10px;}
        .sidebar-admin ul li span a{color: #000; text-decoration: none;}
        /* end sidebar-admin */
        
        /* admin header */
        .admin-header{background-color: #474343;}
        .admin-header h2{font-style: italic;text-align: center;}
        .four-lines{width: 60%;margin: auto;}
        .four-lines ul{list-style-type: none;padding: 0; margin: 0;}
        .four-lines li{height: 2px; background-color: #fff;margin: 10px auto;}
        .four-lines li:first-of-type{width: 100%;}
        .four-lines li:nth-of-type(2){width: 60%;}
        .four-lines li:nth-of-type(3){width: 20%;}
        .four-lines li:last-of-type{width: 5%;}
        .admin-header .det-list{
            font-size: 1.3rem;
            margin-top: 2%;
            text-transform: capitalize;
        } 
        .admin-header .det-list li{transition: all 1s ease-in-out;padding-bottom: 10px;}
        .admin-header .det-list li:hover{color: #646ECB;border-bottom: 3px solid #646ECB;cursor: pointer;}       
        .admin-header .det-list li.active{border-bottom: 3px solid #646ECB;}    
        /* admin header */

        /* course adminstration */
        .course-adiministration{margin-top: 120px;}
        .course-adiministration .courses .course{margin-bottom: 50px;}
        .course-adiministration .courses .course .card{
            border: none;
            border-radius: 0;
            transition: all 1s ease;
        }
        .course-adiministration .courses .course .card img.card-img-top{
            border-radius: 0;
        }
        .course-adiministration .courses .course .card .card-body{
            padding: 0.7rem;
            text-align: center;
            font-size: 1.1rem;
        }
        .course-adiministration .courses .course .card .course-over{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 10;
            display: none;
        }
        .course-adiministration .courses .course .card .course-over a{
            display: inline-block;
            padding: 30px;
            background-color: #646ECB;
            color: #fff;
            text-align: center;
            line-height: 20%;
            border-radius: 50%;
            text-decoration: none;
            position: relative;
            top: 30%;
            left: 35%;
        }
        .course-adiministration .courses .course .card:hover .course-over{display: block;cursor: pointer;}
        
        /* pagination */
        /* pagination */
        .pagination{
            width: 22%;
            margin: 50px auto ;
            padding-left: 23px;
        }
        .pagination a{
            background-color: transparent !important;
            border: 1px solid #646ECB !important;
            color: #BFC5FC !important;
        }
        /*pop up*/
        .popup{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999999999;
            display: none;
            font-size: 1.3rem;
            
        }
        .innerpop{
            width: 550px;
            height: 533px;
            background-color: #474343;
            color: #fff;
            position: fixed;
            top: 50%;
            margin-top: -263px;
            left: 50%;
            margin-left: -275px;
            padding: 20px;
        }
        .innerpop .data-title{
            padding-bottom: 10px;
            border-bottom: 3px solid #fff;
            display: inline-block;
            margin-right: 10px;
        }
        .add-tab::not(:first-of-type){display: none;}
        /* couses demands */
        .demands h2{
            width: 21%;
            margin: auto;
        }
        .demands h2::after{
            content: "";
            display: block;
            width: 50%;
            height: 4px;
            background-color: #474343;
            margin: 25px auto;
        }
        .demands .demand{width: 80%;margin: auto;}
        .demands .demand::after{
            content: "";
            display: block;
            width: 30%;
            height: 4px;
            background-color: #474343;
            margin: 50px auto;
        }
        .demands .demand .card{
            border: none;
            border-radius: 0;
            transition: all 1s ease;
            width: 100%;
        }
        .demands .demand .card img.card-img-top{
            border-radius: 0;
        }
        .demands .demand .card .card-body{
            padding: 0.7rem;
            text-align: center;
            font-size: 1.2rem;
        }
        .demands .demand .card .card-body p a{
            text-decoration: none;
        }
        .demands .demand .card .card-body p a i{
            margin-left: 10px;
        }
        .demands .demand .card .card-body .info{
            text-align: left;
            padding: 0 25px 25px;
            display: none;
            
        }
        .demands .demand .card .course-image{position: relative;cursor: pointer;}
        .demands .demand .card .course-image .course-image-cover{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 10;
            cursor: pointer;
            display: none;
        }
        .demands .demand .card .course-image:hover .course-image-cover{display: block;}
        .demands .demand .card .course-image .course-image-cover button.course-uns-bt{
            display: block;
            width: 25%;
            padding: 10px 0;
            background-color: #eee;
            text-transform: capitalize;
            font-size: 1.1rem;
            border: 0;
            font-weight: bold;
            margin: 5% auto;
            cursor: pointer;
        }
        .demands .demand .card .course-image .course-image-cover button.course-uns-bt a{color:#000;}
        .demands .demand .card .course-image .course-image-cover button.course-uns-bt a:hover{text-decoration: none;}
        .demands .demand .card .course-image .course-image-cover button.course-uns-bt:hover{
            color: #fff;
            background-color: #646ECB;
        }
        .demands .demand .card .course-image .course-image-cover form textarea.reg-exp{
            width: 90%;
            margin: 5%;
            padding: 30px;
            font-size: 1.3rem;
            text-transform: capitalize;
            resize: none;
            min-height: 250px;
        }
        .demands .demand .card .course-image .course-image-cover form input[type='submit']{
            display: block;
            width: 25%;
            padding: 10px 0;
            background-color: #eee;
            text-transform: capitalize;
            font-size: 1.1rem;
            border: 0;
            font-weight: bold;
            margin: 2% auto;
            cursor: pointer;
        }.demands .demand .card .course-image .course-image-cover form input[type='submit']:hover{
            color: #fff;
            background-color: #646ECB;
        }
        /* couses demands */

    </style>
@endsection
@section('headerLinks')
    <li class="list-inline-item color-white mx-5 active" data-crd=".cr-stat">course statistics</li>
    <li class="list-inline-item color-white mx-5" data-crd=".cr-dmd">course demands</li>
@endsection
@section('content')
    <!-- course administration -->
    <div class="course-adiministration">
        <div class="container">
            
            <!-- first tab -->
            <div class="courses cr-stat add-tab">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col">
                            <div class="course">
                                <div class="card" style="width: 21rem;">
                                    <img class="card-img-top" src="{{asset('storage/images/admin/coursImage/course1.svg')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">{{$course->course_name}}</p>
                                    </div>
                                    <div class="course-over">

                                        <a href="#" class="popbutton" data-target="#courseCard1">Show</a>
                                        <div class="popup">
                                            <div class="innerpop py-5 px-3">
                                                <ul class="list-unstyled list-group">
                                                    <li class="text-capitalize mb-4"><span class="data-title">course name :</span><span class="data-content color1">{{$course->course_name}} </span></li>
                                                    <li class="text-capitalize mb-4"><span class="data-title">course price :</span><span class="data-content color1">{{$course->course_price}} &dollar;</span></li>
                                                    <li class="text-capitalize mb-4"><span class="data-title">course instructor :</span><span class="data-content color1">{{$course->instructor->user->name}}</span></li>
                                                    <li class="text-capitalize mb-4"><span class="data-title">course enrollments :</span><span class="data-content color1">{{count($course->reservations)}}</span></li>
                                                    <li class="text-capitalize mb-4"><span class="data-title">course gains :</span><span class="data-content color1">{{($course->course_price)*count($course->reservations)}} &dollar;</span></li>
                                                    <li class="text-capitalize mb-4"><span class="data-title">course duration :</span><span class="data-content color1">1 hours</span></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div style="width : 100%;">{{$courses->links()}}</div>
                </div>

            </div>
            <!-- first tab -->
 
            <!-- secand tab -->
            <div class="add-tab cr-dmd demands">
                <h2 class="color-white text-capitalize text-center">
                    all creation demands
                </h2>
                @if(count($c_cd) > 0)
                    @foreach ($courses_creation_demands as $ccd)
                        <div class="demand mt-5">
                            <div class="card">
                                <div class="course-image">
                                    <img class="card-img-top" src="{{asset('storage/images/admin/coursImage/course1.svg')}}" alt="Card image cap">
                                    <div class="course-image-cover">
                                        <button class="course-uns-bt conf">
                                            <a href="{{route('demande_confirmation',$ccd->course->id)}}">confirme</a>
                                        </button>
                                        <button class="course-uns-bt regect">reject</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-capitalize"><a href="#" class="color-black">show informations<i class="fas fa-question-circle color1"></i></a></p>
                                    <div class="info">
                                        <ul class="list-unstyled list-group">
                                            <li class="color-black text-capitalize py-2"><span class="text-muted">course name : </span>{{$ccd->course->course_name}}</li>
                                            <li class="color-black text-capitalize py-2">
                                                <span class="text-muted">instructor name : </span>{{$ccd->instructor->user->name}}
                                            </li>
                                            <li class="color-black text-capitalize py-2"><span class="text-muted">course categorie : </span>{{$ccd->course->category->category_name}}</li>
                                        </ul>
                                        <h3 class="text-capitalize text-muted">course description :</h3>
                                        <p class="dr-desc text-capitlize">{{$ccd->course->course_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div style="width : 100%;">{{$courses_creation_demands->links()}}</div>
                    @else
                    <h4 class="color-white text-capitalize text-center" >no creation demands</h4>
                @endif
            </div>
            <!-- secand tab -->

        </div>
    </div>
    <!-- course administration -->
@endsection