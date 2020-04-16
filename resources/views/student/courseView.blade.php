@extends('student.layouts.layout')
@section('pageTitle','View Your Courses')
@section('pageStyle')
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
        /* brif info*/
        .brief .brief-content-box{border: none;padding: 10px 0;}
        .brief .brief-content-box .btn{padding: .7rem .75rem;width: 100%;}
        .brief .brief-content-box .progress{margin-top: 2rem;}
        .brief .brief-content-box span{font-size: 1.4rem;}
        .brief .rate {height: 32px;}
        .brief .rate:not(:checked) > label {font-size: 30px;}
        .ytp-cued-thumbnail-overlay {height: 70%;}
        .center-line {
            width: 40%;
            height: 2px;
            background-color: #bfc5fc;
            margin: 1rem auto 2.1rem;
        }
        .contQAList{
            background-color: #474343;
            font-size: 1.2rem;
            
        }
        .contQAList .list-inline{margin-bottom: 0;}
        .contQAList .list-inline .list-inline-item{ margin-right: 2rem!important;padding: 15px 0;}
        .contQAList .list-inline .list-inline-item a{color: #fff; padding: 15px 0;}
        .contQAList .list-inline .list-inline-item a:hover{color:#bfc5fc;text-decoration: none;}
        .contQAList .list-inline .list-inline-item a.active{border-bottom: 5px solid #bfc5fc;}
        .contentitr > div:last-child{display: none;}
        .contentitr {min-height: 340px;}
        .contentitr .qa .view-questions button{padding: 10px 20px}
        .contentitr .qa .view-questions button:hover{background-color: #bfc5fc;color: #474343;}
        .view-questions .questions .carre{
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 60px;
            font-size: 1.2rem;
            background-color: #474343;
        }
        .posting-questions{display: none;}
        .posting-questions .question-content {padding: 15px 0;}
        .posting-questions .question-content .configuration{
            width: 60%;
            margin: auto;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .posting-questions .question-content .configuration i{margin: 0 20px;transition: all 0.5 ease-in-out;}
        .posting-questions .question-content .configuration i:hover{
            color: #646ECB;
            transform: scale(1.8);
            cursor: pointer;
        }
        .posting-questions .question-content textarea{resize: none;}
        .starting-course{
            color:#000;
        }
    </style>
@endsection
@section('content')
    <!-- brief -->
    <div class="brief my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="brief-bar">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/iJW-YWqIL3U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="brief-content">
                        <h2 class="text-capitalize color2 text-center" style="line-height:1.8;">
                            {{$course->course_name}}
                            <div class="center-line"></div>
                        </h2>
                        <div class="brief-content-box">
                            <span class="color3 d-inline-block mr-1 text-capitalize">rate this course:</span>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-4">
                                    <a href="{{route('student.courseGallery')}}" class="btn bg-color2 text-capitalize rounded-0 starting-course">start course</a>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress rounded-0 ">
                                        <div class="progress-bar bg-color1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- brief -->
    <!-- dynamique tabs -->

    <div class="contQAList mb-5">
        <div class="container">
            <ul class=" list-inline ">
                <li class="text-capitalize list-inline-item " ><a href="#" class="active" data-inc=".course_content">course content</a></li>
                <li class="text-capitalize list-inline-item" ><a href="#" data-inc=".qa">Q&amp;A</a></li>
            </ul>
        </div>
    </div>
    <div class="contentitr container mb-5">
        <div class="course_content color-white">
            <section class="accordion">
                <h3 class="text-capitalize">
                    <i class="far fa-arrow-alt-circle-down color1"></i>
                    introduction to the course
                </h3>
                <ul class="list-unstyled">
                    <li class="text-capitalize">
                        <i class="fas fa-file-alt color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal" role="banner">
                            this is the file content 
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal1" role="banner">
                            this is the first video 
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal2" role="banner">
                            this is the secand video
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal3" role="banner">
                            this is the third video
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>


                <!-- secand section -->
                <h3 class="text-capitalize">
                    <i class="far fa-arrow-alt-circle-right color1"></i>
                    this is section two
                </h3>
                <ul class="list-unstyled">
                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal4" role="banner">
                            this is the file content 
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal5" role="banner">
                            this is the first video 
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal6" role="banner">
                            this is the secand video
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="text-capitalize">
                        <i class="fas fa-play-circle color1 mr-2"></i>
                        <a  data-toggle="modal" data-target="#exampleModal7" role="banner">
                            this is the third video
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe  src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                    <div class="modal-footer color1 text-center">
                                        <span class="font-weight-bold">Enjoy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
        <div class="qa color-white">
            <div class="view-questions">
                <button class="btn text-capitalize color-white bg-color1 rounded-0 ask">ask question</button>
                <ul class="mt-3 list-unstyled questions">
                    <li class="color-black bg-color2 px-3 py-3 text-capitalize mb-3">
                        <div class="row">
                            <div class="col-sm-10 " style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="carre rounded  color-white ml-1" width="200" height="200">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="lead">here goes the field of comentary section</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>1</p>
                                <p class="text-capitalize">response</p>
                            </div>
                        </div>
                    </li>
                    <li class="color-black bg-color2 px-3 py-3 text-capitalize mb-3">
                        <div class="row">
                            <div class="col-sm-10 " style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="carre rounded  color-white ml-1" width="200" height="200">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="lead">here goes the field of comentary section</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>1</p>
                                <p class="text-capitalize">response</p>
                            </div>
                        </div>
                    </li>
                    <li class="color-black bg-color2 px-3 py-3 text-capitalize mb-3">
                        <div class="row">
                            <div class="col-sm-10 " style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="carre rounded  color-white ml-1" width="200" height="200">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="lead">here goes the field of comentary section</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>1</p>
                                <p class="text-capitalize">response</p>
                            </div>
                        </div>
                    </li>
                    <li class="color-black bg-color2 px-3 py-3 text-capitalize mb-3">
                        <div class="row">
                            <div class="col-sm-10 " style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="carre rounded  color-white ml-1" width="200" height="200">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="lead">here goes the field of comentary section</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>1</p>
                                <p class="text-capitalize">response</p>
                            </div>
                        </div>
                    </li>
                    <li class="color-black bg-color2 px-3 py-3 text-capitalize mb-3">
                        <div class="row">
                            <div class="col-sm-10 " style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="carre rounded  color-white ml-1" width="200" height="200">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="lead">here goes the field of comentary section</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>1</p>
                                <p class="text-capitalize">response</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="posting-questions mg">
                    <h3 class="color-2 text-capitalize">ask any question you want</h3>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <input type="text" class="form-control rounded-0 bg-color3 border-0" id="formTitle" aria-describedby="title" placeholder="Add Title">
                        </div>
                        <div class="form-group question-content bg-color3">
                            <div class="configuration text-center">
                                <i class="fas fa-bold color-black"></i>
                                <i class="fas fa-italic color-black"></i>
                                <i class="fas fa-link color-black"></i>
                                <i class="far fa-image color-black"></i>
                            </div>
                            <textarea class="form-control rounded-0 border-0 bg-color3 text-capitalize" id="exampleFormControlTextarea1" rows="3">Write what you want to ask</textarea>
                        </div>
                        <div class="form-group posting">
                            <button type="submit " class="btn color-black rounded-0 text-capitalize d-inline-block mr-3">post question</button>
                            <button type="button" class="btn color-black rounded-0 text-capitalize cancel">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- dynamique tabs -->
@endsection