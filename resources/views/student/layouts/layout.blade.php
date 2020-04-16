<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle','Student')</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/additionalVideos.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentNotification.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/courseDetails.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/faveIcon/favicon.png')}}"/>
    @yield('pageStyle')
</head>
<body>
    <!-- Start Navebare  -->
    <nav class="navbar navbar-expand-lg main-nav navbar-dark " id="navbar">
        <!-- logo -->
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="{{asset('storage/images/faveIcon/favicon.png')}}" width="30" height="30" alt="logo">
        </a>
        <!-- logo -->
        <!-- toggelabl items and links-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-capitalize p-rel" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('storage/images/student/CatIcon.svg')}}" width="15" height="15" alt="categories icon" >
                        categories
                    </a>
                    <ul class="dropdown-menu bg-color2 color3 main" aria-labelledby="navbarDropdown">
                        @foreach ($Cats as $cat)
                            <li>
                                <a class="dropdown-item p-rel" href="#">
                                    <img src="{{asset('storage/images/index/nave/cat1.svg')}}" class="pr-2 d-inline-block " width="30" height="30" alt="development icon" >
                                    {{$cat->category_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 p-rel seggest" action="{{route('student.courseSearch')}}" method="GET">
                @csrf
                <input class="form-control mr-sm-2 text-capitalize in-toggle " type="search" placeholder="Search for courses" aria-label="Search" id='search-courses' name="course_search">
                <i class="fas fa-search color1 i-left" id="search-courses-submit"></i>
                {{-- <ul class="list-group list-unstyled ">
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item1</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item2</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item3</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item4</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item5</a></li>
                </ul> --}}
            </form>
            <!-- instructor courses notification profile -->
            <ul class="navbar-nav ml-3 icons">
               @isset($student)
                    @if ($student->user->teacher == 1)
                    <li class="nav-item ">
                        <a class="nav-link text-capitalize p" href="{{route('instructorDash')}}" >
                            <img src="{{asset('storage/images/student/TeacherIcon.svg')}}" width="25" height="25" alt="student icon" >                      
                            instructor
                        </a>
                    </li>
                    @else
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-capitalize p" href="{{route('student.Courses',$student->id)}}">
                            <img src="{{asset('storage/images/student/CoursesIcon.svg')}}" width="25" height="25" alt="my40 courses icon" >  
                            my courses
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('storage/images/student/notif.svg')}}" width="60" height="50" alt="profile icon" >
                        </a>
                        <div class="dropdown-menu profile " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('student.profile',$student->id)}}" class=" text-capitalize">
                            <span>profile</span>
                            <i class="fas fa-user-circle color-black d-inline-block"></i>
                        </a>
                        <a class="dropdown-item" href="{{route('student.notifications',$student->id)}}" class=" text-capitalize">
                            <span>notifications</span>
                            <i class="far fa-bell"></i>
                        </a>
                        <a class="dropdown-item" href="{{route('student.VideosAnswer',$student->id)}}" class=" text-capitalize">
                            <span>additional videos</span>
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="dropdown-item" href="{{ route('student.logout') }}" class=" text-capitalize">
                            <span>log out</span>
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        </div>
                    </li>
               @endisset
            </ul>
        </div>
    </nav>
    
    <!-- End Navebare  -->

    <!-- course administration -->
    @yield('content')
    <!-- course administration -->

    <!-- social media -->
    <section class="social-media text-center pb-5">
        <h2 class=" color2 text-capitalize text-bold">join us on</h2>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-square fa-2x color1"></i></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin fa-2x color1"></i></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square fa-2x color1"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square fa-2x color1"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-2x color1"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus-square fa-2x color1"></i></a></li>
        </ul>
    </section>
    <!-- social media -->
    <!-- footer -->
    <footer class="text-capitalize color2 text-center py-5">
       <h4>copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2019 all rights reserved</h4>
    </footer>
    <!-- footer -->

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootnavbar.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>