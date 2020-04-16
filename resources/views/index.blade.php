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
    <title>Odros Online Courses</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/faveIcon/favicon.png')}}"/>
</head>
<body>
    {{-- errore messages --}}
    @include('errors.erros')
    {{-- errore messages --}}
    <!-- Start Navebare  -->
    
    <nav class="navbar navbar-expand-lg main-nav navbar-dark py-3 " id="navbar">
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
                        <img src="{{asset('storage/images/index/category.svg')}}" width="15" height="15" alt="categories icon" >
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

            <ul class="navbar-nav ml-3 logins">
                @if (null == auth()->user())
                    {{-- log in --}}
                    <li class="nav-item ">
                        <a class="nav-link text-capitalize login px-3 login" href="#" data-toggle="modal" data-target="#exampleModalLong">login</a>
                        <!-- Modal -->
                        <div class="modal modal1 fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-capitalize text-center" id="exampleModalLongTitle">log in</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="color3 text-center text-capitalize">with your social network</h5>
                                    <a href="http://mail.google.com" target="_blank" rel="noopener noreferrer" class='d-block text-capitalize color3 pl-3 py-3 mb-3'>log in with &nbsp;&nbsp;<i class="fab fa-facebook-square color1"></i></a>
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class='d-block text-capitalize color3 pl-3 py-3 mb-3'>log in with &nbsp;&nbsp;<i class="fab fa-google-plus-square color1"></i></a>
                                    <div class="db-div"><span class=" d-block mb-1"></span><span class=' d-block mb-1'></span></div>
                                    <h5 class="color3 text-center text-capitalize">with your email</h5>
                                    <form action="{{route('login')}}" method="post" class="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control pl-5 py-3 rounded-0"  aria-describedby="emailHelp" placeholder="Email" name="email">
                                            <i class="fas fa-envelope color1"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control pl-5 py-3 rounded-0"  aria-describedby="emailHelp" placeholder="password" name="password">
                                            <i class="fas fa-lock color1"></i>
                                        </div>
                                        <button type="submit" class="btn text-capitalize bg-color2 color-black ">log in</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="d-block text-capitalize color3 mr-auto">forget password</a>
                                    <a href="#" class="d-block text-capitalize color3">sign up</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </li>
                    {{-- sign up  --}}
                    <li class="nav-item">
                        <a class="nav-link text-capitalize signUp px-3 ml-3" href="#" data-toggle="modal" data-target="#exampleModalLong1">sign up</a>
                        <div class="modal modal1 fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-capitalize text-center" id="exampleModalLongTitle1">sign up</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="color3 text-center text-capitalize">with your social network</h5>
                                    <a href="http://mail.google.com" target="_blank" rel="noopener noreferrer" class='d-block text-capitalize color3 pl-3 py-3 mb-3'>sign up with &nbsp;&nbsp;<i class="fab fa-facebook-square color1"></i></a>
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class='d-block text-capitalize color3 pl-3 py-3 mb-3'>sign up with &nbsp;&nbsp;<i class="fab fa-google-plus-square color1"></i></a>
                                    <div class="db-div"><span class=" d-block mb-1"></span><span class=' d-block mb-1'></span></div>
                                    <h5 class="color3 text-center text-capitalize">with an email</h5>
                                    
                                    <form action="{{ route('register') }}" method="post" class="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control pl-5 py-3 rounded-0 @error('name') is-invalid @enderror"  aria-describedby="name" placeholder="Full Name" name="name">
                                            <i class="fas fa-user color1"></i>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control pl-5 py-3 rounded-0"  aria-describedby="emailHelp" placeholder="Email" name="email">
                                            <i class="fas fa-envelope color1"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control pl-5 py-3 rounded-0"  aria-describedby="emailHelp" placeholder="password" name="password">
                                            <i class="fas fa-lock color1"></i>
                                        </div>
                                        <button type="submit" class="btn text-capitalize bg-color2 color-black ">Sign up</button>
                                    
                                    </form>

                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </li>
                @else
                    
                @endif
            </ul>
        </div>
    </nav>
    
    <!-- End Navebare  -->

    <!-- interface -->

    <div class="interface ">
        <div class="overlay">
            <div class=" container-fluid">
                <div class="interface-info d-flex flex-dire flex-column justify-content-center pl-5">
                    <h4 class="color2 font-weight-bold text-capitalize w-50 mb-3 ">
                        Various courses that live up to your ambitions and aspirations
                    </h4>
                    <p class="color3 text-capitalize w-50 text-justify">
                        It is time to overcome the obstacles you face in 
                        order to achieve your goals and to create yourself 
                        at the hands of professional teachers whose 
                        primary concern is to create the learner and 
                        provide him with everything he needs to face his 
                        future challenges primary concern is to create the learner and 
                        provide him with everything he needs to face his 
                        future challenges.
                    </p>
                    <!--  search field -->
                    <form class="form-inline mt-5">
                        <label class="sr-only" for="inlineFormInputName2">search</label>
                        <input type="text" class="form-control rounded-0 mb-2 color2 in-toggle" id="inlineFormInputName2" placeholder="search">
                        <i class="fas fa-search color1"></i>
                        <button type="submit" class="btn mb-2 bg-color1 color3 rounded-0 ">search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- interface -->
    <!-- course sample -->

    <section class="sample-courses">
        <h2 class="text-capitalize color1 text-center">a sample of our courses</h2>
        <!-- items slider -->
        <div id="carouselExampleIndicators" class="carousel slide" >
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($crSm->chunk(3) as $cr)  
                    <div class="carousel-item {{isset($cr[0])?'active':''}}">
                        <div class="carousel-caption d-none d-md-block d-md-flex">
                            @foreach ($cr as $critem)
                                    <!-- item   -->
                                    <div class="card" style="width: 18rem;">
                                        <div class="buy p-rel">
                                            <img class="card-img-top" src="{{asset('storage/images/index/sampleCourses/sample1.svg')}}" alt="Card image cap">
                                            <div class="buy-overlay">
                                            </div>
                                            <a href="{{route('viewCourseDetaills',$critem->id)}}" class="my-0"><img src="{{asset('storage/images/index/buyingIcon.svg')}}" alt="buy cart" class="buy-icon" width="50" height="50"></a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">{{$critem->course_name}}</h5>
                                            <p class="card-text text-left text-capitalize text-muted">{{$critem->instructor->user->name}}</p>
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
                                            <a href="#" class="btn btn-primary">&dollar;{{$critem->course_price}}</a>
                                        </div>
                                    </div>
                            @endforeach
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- course sample -->
    
    <!-- promoter -->

    <div class="promo py-4">
        <div class="container">
            <div class="row">
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/tnw.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/thestreet.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/yahoo.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/onmogul.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/market-watch.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/business-journals.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/huffpost.svg')}}" alt="brand image" class="img-fluid">
                </div>
                <div class="col px-3">
                    <img src="{{asset('storage/images/index/brands/markets-insider.svg')}}" alt="brand image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- promoter -->
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