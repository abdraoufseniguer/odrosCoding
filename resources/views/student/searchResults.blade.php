@extends('student.layouts.layout')
@section('pageTitle','Course Search Results')
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
        .course-search-results{
            width: 60%;
            margin: auto;
        }   
        .search-result{
            border-bottom: 1px solid #bfc5fc;
            margin-bottom: 25px;
        }
        .search-result a{
            color: #bfc5fc;
            display: flex;
            padding: 25px 0;
            text-decoration: none;
        }
        .search-result a .course-img{
            width: 30%;
            height: 125px;
        }
        .search-result a .course-img img{
            width: 100%;
        }
        .course-info{
            width: 60%;
            padding-left: 20px;
        }
        .course-info h2{
            font-weight: bold;
            color: aliceblue;
        }
        .course-info p span{
            color: aliceblue;
        }
    </style>
@endsection
@section('content')

    <!-- welcomming -->
    <h2 class="h1 color2 mt-5 text-center text-capitalize under-line-center"> The List Of Search Results </h2>
    <!-- welcomming -->

    {{-- results --}}
    <div class="course-search-results">
        <ul>
            @foreach ($cms as $cm)
                <li class="search-result">
                    <a href="">
                        <div class="course-img">
                            <img src="{{asset('storage/images/student/courses/course1.svg')}}" alt="course image">
                        </div>
                        <div class="course-info">
                            <h2>{{$cm->course_name}}</h2>
                            <p class="course-price">Course Price : <span>${{$cm->course_price}}</span></p>
                            <p class="course-des">Course Description : <span>{{$cm->course_description}}</span></p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- results --}}
    

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