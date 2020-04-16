<nav class="navbar navbar-expand-lg main-nav navbar-dark " id="navbar">
        <!-- logo -->
        <a class="navbar-brand" href="#">
            <img src="{{asset('storage/images/instructor/navebar/favicon.png')}}" width="30" height="30" alt="logo">
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
                        <img src="{{asset('storage/images/instructor/navebar/CatIcon.svg')}}" width="15" height="15" alt="categories icon" >
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
                <li class="nav-item ">
                  <a class="nav-link text-capitalize p" href="#" >
                        <img src="{{asset('storage/images/instructor/navebar/TeacherIcon.svg')}}" width="25" height="25" alt="student icon" >                      
                        instructor
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-capitalize p" href="myCourses.html">
                        <img src="{{asset('storage/images/instructor/navebar/CoursesIcon.svg')}}" width="25" height="25" alt="my40 courses icon" >  
                        my courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize p" href="viewCart.html">
                        <img src="{{asset('storage/images/instructor/navebar/Basket.svg')}}" width="25" height="25" alt="notification icon" >
                    </a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('storage/images/instructor/navebar/notif.svg')}}" width="60" height="50" alt="profile icon" >
                  </a>
                  <div class="dropdown-menu profile " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profileSetting.html" class=" text-capitalize">
                        <span>profile</span>
                        <i class="fas fa-user-circle color-black d-inline-block"></i>
                    </a>
                    <a class="dropdown-item" href="studentnotification.html" class=" text-capitalize">
                        <span>notifications</span>
                        <i class="far fa-bell"></i>
                    </a>
                    <a class="dropdown-item" href="additionalVideosAnwer.html" class=" text-capitalize">
                        <span>additional videos</span>
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a class="dropdown-item" href="index.html" class=" text-capitalize">
                        <span>log out</span>
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                  </div>
                </li>
            </ul>
        </div>
    </nav>