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
    <title>checkout</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/additionalVideos.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentNotification.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
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
    
   <!-- checkout -->

   <div class="container">
        <div class="checkout text-capitalize">
            <h2 class="color3 d-inline-block">
                total: <span class="color2">&dollar;{{$total}}</span>
                <div class="center-line"></div>
            </h2>
            <!-- patypal and visa card -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-paypal-tab" data-toggle="pill" href="#pills-paypal" role="tab" aria-controls="pills-paypal" aria-selected="true">
                        <img src="{{asset('storage/images/student/checkout/iconfinder__Paypal-39_1156727.svg')}}" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-visa-tab" data-toggle="pill" href="#pills-visa" role="tab" aria-controls="pills-visa" aria-selected="false">
                        <img src="{{asset('storage/images/student/checkout/Group 115.svg')}}" alt="">
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-paypal" role="tabpanel" aria-labelledby="pills-paypal-tab">
                    <div class="paypal text-center text-capitalize bg-color3 w-75 py-5">
                        <p class="w-50 mx-auto color-black font-weight-bold">
                            You Will Be Redirect To secure <span class="color1">PayPal</span> Page
                                To Complete Your Purchase 
                        </p>
                        <a href="https://www.paypal.com/dz/home" class="d-block bg-color3 w-25 mx-auto py-2 px-4 rounded mt-4">
                            <img src="{{asset('storage/images/student/checkout/iconfinder__Paypal-39_1156727.svg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-visa" role="tabpanel" aria-labelledby="pills-visa-tab">
                    <form action="" class="text-capitalize w-50 ml-5 mt-5 color3">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control rounded-0 text-capitalize" placeholder="card number">
                        </div>
                        <div class="form-group mb-3">
                            <select id="inputState" class="form-control rounded-0 text-capitalize">
                                <option selected>country</option>
                                <option>algeria</option>
                                <option>egypt</option>
                                <option>usa</option>
                                <option>uk</option>
                                <option>mali</option>
                                <option>germany</option>
                            </select>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control text-center rounded-0 text-capitalize" id="inputEmail4" placeholder="zip/postal code">
                            </div>
                            <div class="form-group col-md-6">
                            <input type="text" class="form-control text-center rounded-0 text-capitalize" id="inputPassword4" placeholder="security code">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control rounded-0 text-capitalize" placeholder="name on carde">
                        </div>
                        <div class="form-group submit">
                            <input type="submit" class=" rounded-0 text-capitalize color3" value="complete payment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- checkout -->

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