@extends('student.layouts.layout')
@section('pageTitle','view course detaills')
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
    </style>
@endsection
@section('content')
    <!-- brief -->

    <div class="brief my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="brief-bar">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3q7JOIk7nGk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                        @if ($course->free == false)
                            <a href="#" class="color3 text-capitalize border  d-block mt-3 py-3 px-5 text-center"  data-toggle="modal" data-target="#addToCart">
                                <img src="images/courseDetails/iconfinder_paper_money_2639880.svg" alt="" width="20" height="20" class="mr-2">
                                add to cart
                            </a>
                        @else
                            
                        @endif
                        <!-- adding to cart  Modal -->
                        <div class="modal fade py-5 px-5" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="card " style="width: 18rem;">
                                                    <img class="card-img-top" src="{{asset('storage/images/instructor/courses/Rectangle 1.svg')}}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4 color2 text-center">{{$course->course_name}}</h5>
                                                        <p class="card-text text-left text-capitalize text-muted">{{$course->instructor->user->name}}</p>
                                                        <!-- rating  -->
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
                                                        
                                                        <!-- rating  -->
                                                        <span class=" d-inline-block mr-2 color2">4.0</span><span class="color2">{5000}</span>
                                                        <button class="btn btn-primary rounded mt-3 mx-auto">&dollar;{{$course->course_price}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="goToCart text-capitalize text-center">
                                                    <h4 class="color2">
                                                        this course is added to the cart
                                                        <div class="center-line"></div>
                                                    </h4>
                                                    <p class="color2">value of the items in</p>
                                                    <p class="color2">the cart is : <span class="color3">$80</span></p>
                                                    <a href="{{route('student.cartView',$student->id)}}" class="color3 mt-4">go to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- adding to cart Modal -->
                        @if ($course->free == false)
                            <a href="#" class="color3 text-capitalize border  d-block mt-3 py-3 px-5 text-center">
                                <img src="images/courseDetails/iconfinder_Basket_877012.svg" alt="" width="20" height="20" class="mr-2">
                                buy it now
                            </a>
                        @else
                            
                        @endif
                        @if ($course->free == true)
                            <a href="#" class="color3 text-capitalize border  d-block mt-3 py-3 px-5 text-center">
                                enroll now
                            </a>
                        @else
                            
                        @endif
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="brief-content">
                        <h2 class="text-capitalize color2">
                            {{$course->course_name}}
                        </h2>
                        <p class="color3">
                            {{$course->course_description}}
                        </p>
                        <div class="brief-content-box">
                            <span class="color3 d-inline-block mr-1">Rating:</span>
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
                            <span class="color3 d-inline-block ml-2">|&nbsp;&nbsp;4.0 {5000}</span>
                            <p class="color3 my-3">
                                20 hours on-demand video &nbsp; <i class="fas fa-video color1"></i>
                            </p>
                            <p class="color3 mb-3">
                                10 articles &nbsp; <i class="far fa-file-alt color1"></i>
                            </p>
                            <p class="color3 mb-3">
                                5 assignments &nbsp; <i class="fas fa-home color1"></i>
                            </p>
                            <p class="color3 mb-3">
                                created by {{$course->instructor->user->name}} &nbsp; <i class="fas fa-chalkboard-teacher color1"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brief -->
    
    <!-- informations -->

      <div class="container">
        <nav class="course-informations mb-4 color1">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active text-capitalize" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">course description</a>
              <a class="nav-item nav-link text-capitalize" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">course content</a>
              <a class="nav-item nav-link text-capitalize" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">requiremnt</a>
              <a class="nav-item nav-link text-capitalize" id="nav-contact-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-contact" aria-selected="false">about instructor</a>
              <a class="nav-item nav-link text-capitalize" id="nav-contact-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">feedback</a>
            </div>
        </nav>
        <div class="tab-content tab-content1 my-4" id="nav-tabContent">
            <div class="tab-pane fade show active color3 py-4 px-4 " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="  rounded py-4 px-4 color3 text-capitalize course-description ">
                    {{$course->course_description}}
                </div>
            </div>
            <div class="tab-pane fade color3 py-4 px-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="content py-4 px-4 color3 text-capitalize  course-content rounded">
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
            </div>
            <div class="tab-pane fade color3 py-4 px-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="content py-4 px-4 color3 text-capitalize  course-requirement rounded">
                     <h2>this is the requiremnt of this course:</h2>
                     <ul class=" list-group">
                         @foreach ($requirments as $requiremnt)
                            <li class="group-item">{{$requiremnt->requirement_content}}</li>
                         @endforeach
                     </ul>   
                </div>
            </div>
            <div class="tab-pane fade color3 py-4 px-4" id="nav-about" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="content py-4 px-4 color3 text-capitalize  about-instructor rounded">
                    <div class="media text-captalize">
                        <div class="media-bare">
                            <img class="mr-5" src="{{asset('storage/images/user/Rectangle 47.png')}}" alt="instructor image">
                            <div class="media-bare-info mt-5">
                                <i class="fas fa-play-circle color1 mr-1"></i>
                                <span>courses :</span>
                                <span class="color1">{{$ins_cr_num}}</span>
                            </div>
                            <div class="media-bare-info mt-3">
                                <i class="fas fa-chalkboard-teacher color1 mr-1"></i>
                                <span>students :</span>
                                <span class="color1">{{$std_num}}</span>
                            </div>
                            <div class="media-bare-info mt-3">
                                <i class="fas fa-comment-dots color1 mr-1"></i>
                                <span>reviews :</span>
                                <span class="color1">2000</span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-0 color2">{{$course->instructor->user->name}}</h5>
                            <h6 class="mt-3">{{$course->instructor->profession}}</h6>
                            <p class="content">
                                {{$course->instructor->inst_exp}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade color3 color3 py-4 px-4" id="nav-feedback" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="content py-4 px-4 color3 text-capitalize  feedback rounded">
                    <ul class="list-unstyled color3 ">
                        <li class="media">
                            <div class="medi-bare mr-5">
                                <img class="mr-3" src="images/notification assingments/avatar.jpg" alt="Generic placeholder image">
                                <span class="d-block text-capitalize mt-3">abdullh mokhtar</span>
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
                            </div>
                            <div class="media-body w-75">
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <div class="center-line"></div>
                        <li class="media my-4">
                            <div class="medi-bare mr-5">
                                <img class="mr-3" src="images/notification assingments/avatar.jpg" alt="Generic placeholder image">
                                <span class="d-block text-capitalize mt-3">abdullh mokhtar</span>
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
                            </div>
                            <div class="media-body w-75">
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <div class="center-line"></div>
                        <li class="media">
                            <div class="medi-bare mr-5">
                                <img class="mr-3" src="images/notification assingments/avatar.jpg" alt="Generic placeholder image">
                                <span class="d-block text-capitalize mt-3">abdullh mokhtar</span>
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
                            </div>
                            <div class="media-body w-75">
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>

    <!-- informations -->
@endsection