<!--
==================== GDG Odros WebSite Project ====================
Author : Abderraouf Seniguer
spervisor : Yasser
Copy Rights Reserved 2019 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Cart</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/additionalVideos.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentNotification.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/viewCart.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/faveIcon/favicon.png')}}"/>
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
</head>
<body>
    <!-- Start Navebare  -->
    
    <nav class="navbar navbar-expand-lg main-nav navbar-dark " id="navbar">
        <!-- logo -->
        <a class="navbar-brand" href="#">
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
            <form class="form-inline my-2 my-lg-0 p-rel seggest">
                <input class="form-control mr-sm-2 text-capitalize in-toggle " type="search" placeholder="Search for courses" aria-label="Search" id='search-courses'>
                <i class="fas fa-search color1 i-left"></i>
                <ul class="list-group list-unstyled ">
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item1</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item2</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item3</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item4</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;item5</a></li>
                </ul>
            </form>
            <!-- instructor courses notification profile -->
            <ul class="navbar-nav ml-3 icons">
                @if (isset(auth()->user()->instructor))
                    <li class="nav-item ">
                    <a class="nav-link text-capitalize p" href="#" >
                          <img src="{{asset('storage/images/student/TeacherIcon.svg')}}" width="25" height="25" alt="student icon" >                      
                          instructor
                      </a>
                  </li>
                @else
                    
                @endif
                <li class="nav-item">
                  <a class="nav-link text-capitalize p" href="myCourses.html">
                        <img src="{{asset('storage/images/student/CoursesIcon.svg')}}" width="25" height="25" alt="my40 courses icon" >  
                        my courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize p" href="{{route('student.cartView',$student->id)}}">
                        <img src="{{asset('storage/images/student/iconfinder_Basket_877012.svg')}}" width="25" height="25" alt="notification icon" >
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
            </ul>
        </div>
    </nav>
    
    <!-- End Navebare  -->
    
    <!-- start Cartviewing -->

    <div class="viewCart text-capitalize color3 py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cartInfo">
                        <h4>
                            @php
                                $itemNum = 0;
                                $itemsPrice = 0;
                                foreach($studentReservations as $stdRes){
                                    if($stdRes->active == 0){
                                        $itemNum = $itemNum + 1;
                                    }
                                }
                            @endphp
                            this cart contain <span>{{$itemNum}}</span> items 
                            <div class="center-line"></div>
                        </h4>
                        <!-- cart items -->
                        <ul class="list-unstyled color3 mb-5">
                            @foreach ($studentReservations as $studentReservation)
                                @if ($studentReservation->active == 0)
                                    @php
                                        $itemsPrice = $itemsPrice + $studentReservation->course->course_price;
                                    @endphp
                                    <li class="media my-4">
                                        <div class="medi-bare mr-3">
                                            <img src="{{asset('storage/images/student/courses/computer-network.png')}}" alt="Generic placeholder image" width="150" height="90">
                                        </div>
                                        <div class="media-body w-75">
                                            <p>{{$studentReservation->course->course_name}}</p>
                                            <span class="d-block">&dollar;{{$studentReservation->course->course_price}}</span>
                                            <i class="fas fa-trash-alt color1"></i>
                                        </div>
                                    </li>
                                    <div class="center-line"></div>
                                @else
                                    
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="checkout border px-5 py-5">
                        <p>total: <span>&dollar;{{$itemsPrice}}</span></p>
                        <a href="{{route('student.checkout',['student' => $student->id ,'total' => $itemsPrice])}}" class="d-block mt-3 bg-color2 text-center">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start Cartviewing -->
    
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

    <!-- ingo pages -->

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