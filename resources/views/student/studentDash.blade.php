@extends('student.layouts.layout')
@section('pageTitle','Welcome To Student Dashboard')
@section('pageStyle')
    <style>
        .sample-courses{
            border-bottom: none;
            padding: 10px 0 30px;
        }
        .sample-courses h4{
            padding-left: 100px;
        }
        .under-line-center::after{
            content: '';
            display: block;
            width: 500px;
            height: 3px;
            margin: 20px auto 50px;
            background-color: #646ECB;
        }
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
        .sample-courses .carousel .carousel-inner .carousel-item .carousel-caption .card .buy-icon {
            position: absolute;
            top: 28%;
            left: 46%;
            z-index: 1002;
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- welcomming -->
    <h2 class="h1 color2 mt-5 text-center text-capitalize under-line-center"> welcome , {{ Auth::user()->name }} </h2>
    <!-- welcomming -->

    <!-- your courses -->

    <section class="sample-courses">
       
        <h4 class="text-capitalize color3 mb-5  container">your courses</h4>
        @if (count($stdReservations))
            <!-- items slider -->
            <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($stdReservations->chunk(3) as $threeRes)
                        <div class="carousel-item {{isset($threeRes[0])?'active':''}}">
                            <div class="carousel-caption d-none d-md-block d-md-flex">
                            @foreach ($threeRes as $Res)
                                    <!-- item one  -->
                                    <div class="card" style="width: 18rem;">
                                        <div class="buy p-rel">
                                            <img class="card-img-top" src="{{asset('storage/images/student/courses/course1.svg')}}" alt="Card image cap">
                                            <div class="buy-overlay "></div>
                                            <a href="{{route('student.viewCourse',$Res->course->id)}}" class="my-0"><i class="fas fa-caret-right fa-5x color1 buy-icon"></i></a>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mb-4">{{$Res->course->course_name}}</h5>
                                        <p class="card-text text-left text-capitalize text-muted">{{$Res->course->instructor->user->name}}</p>
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
                                        <span class=" d-inline-block mr-2">4.0</span><span>{5000}</span>
                                        <a href="#" class="btn btn-primary">&dollar;{{$Res->course->course_price}}</a>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- items slider -->
        @else
            <p class="text-capitalize color3 text-center" style="width: 50%;margin: auto;background-color: #bfc5fc;padding: 20px;color: #000;">you have no courses yet</p>
        @endif
    </section>
    <!-- your courses -->

    <!-- latest courses -->
    <section class="sample-courses">
        
        <h4 class="text-capitalize color3 mb-5  container">latest couses</h4>
        @if (count($stdReservations))
            <!-- items slider -->
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($ltRes->chunk(3) as $threeltRes)
                        <div class="carousel-item {{isset($threeltRes[0])?'active':''}}">
                            <div class="carousel-caption d-none d-md-block d-md-flex">
                                @foreach ($threeltRes as $ltRe)
                                    <!-- item one  -->
                                    <div class="card" style="width: 18rem;">
                                        <div class="buy p-rel">
                                            <img class="card-img-top" src="{{asset('storage/images/student/courses/course1.svg')}}" alt="Card image cap">
                                            <div class="buy-overlay "></div>
                                            <a href="{{route('student.viewCourse',$ltRe->course->id)}}" class="my-0"><i class="fas fa-caret-right fa-5x color1 buy-icon"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">{{$ltRe->course->course_name}}</h5>
                                            <p class="card-text text-left text-capitalize text-muted">{{$ltRe->course->instructor->user->name}}</p>
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
                                            <span class=" d-inline-block mr-2">4.0</span><span>{5000}</span>
                                            <a href="#" class="btn btn-primary">&dollar;{{$ltRe->course->course_price}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- items slider -->
        @else
            <p class="text-capitalize color3 text-center" style="width: 50%;margin: auto;background-color: #bfc5fc;padding: 20px;color: #000;">you have no courses yet</p>
        @endif
        
    </section>
    <!-- latest courses -->

    <!-- best selling courses -->

    <section class="sample-courses">
        
        <h4 class="text-capitalize color3 mb-5  container">best selling courses</h2>
        @if (count($stdReservations))
            <!-- items slider -->
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="carousel-caption d-none d-md-block d-md-flex">
                        {{-- items --}}
                        @foreach ($bts as $ltRe)
                            <!-- item one  -->
                            <div class="card" style="width: 18rem;">
                                <div class="buy p-rel">
                                    <img class="card-img-top" src="{{asset('storage/images/index/sampleCourses/sample1.svg')}}" alt="Card image cap">
                                    <div class="buy-overlay">
                                    </div>
                                    <a href="{{route('student.viewCourseDetaills',$ltRe->id)}}" class="my-0"><img src="{{asset('storage/images/index/buyingIcon.svg')}}" alt="buy cart" class="buy-icon" width="50" height="50"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-4">{{$ltRe->course_name}}</h5>
                                    <p class="card-text text-left text-capitalize text-muted">{{$ltRe->instructor->user->name}}</p>
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
                                    <span class=" d-inline-block mr-2">4.0</span><span>{5000}</span>
                                    <a href="#" class="btn btn-primary">&dollar;{{$ltRe->course_price}}</a>
                                </div>
                            </div>
                        @endforeach
                        {{-- items --}}
                    </div>
                  </div>
                </div>
            </div>
            <!-- items slider -->
        @else
            <p class="text-capitalize color3 text-center" style="width: 50%;margin: auto;background-color: #bfc5fc;padding: 20px;color: #000;">you have no courses yet</p>
        @endif
        
    </section>

    <!-- best selling courses -->

    <!-- ingo pages -->

    <section class="pages-info text-center">
        <h2 class=" text-uppercase  color1 text-center display-1 mb-5"><span class=" color2">o</span>ur</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col page1 page"><h2 class="color2 text-capitalize">contact us</h2></div>
                <div class="col page2 page"><h2 class=" color2 text-capitalize ">about us</h2></div>
                <div class="col page3 page"><h2 class=" color2 text-capitalize ">conditions</h2></div>
                <div class="col page4 page"><h2 class=" color2 text-capitalize">our blog</h2></div>
            </div>
            <div class="divider bg-color2"></div>
        </div>
    </section>
@endsection