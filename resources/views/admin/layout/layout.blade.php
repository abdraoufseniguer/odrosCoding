<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle','admin')</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/faveIcon/favicon.png')}}"/>
    @yield('pageStyle')
</head>
<body>
    <!-- admin header  -->
    <div class="admin-header py-3">
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="text-capitalize color-white">
                        admin dashboard
                        <div class="four-lines">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </h2>
                </div>
                <div class="col-md-9">
                    <ul class="list-unstyled list-inline text-center det-list crad-tabe">
                        @yield('headerLinks')
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- admin header  -->

    <!-- course administration -->
    @yield('content')
    <!-- course administration -->

    <!-- pagination -->

    {{-- <ul class="pagination">
        <li class="page-item">
            <a class="page-link py-3 px-3 mx-1" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link py-3 px-3 mx-1" href="#">1</a></li>
        <li class="page-item "><a class="page-link py-3 px-3 mx-1" href="#">2</a></li>
        <li class="page-item "><a class="page-link py-3 px-3 mx-1" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link py-3 px-3 mx-1" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul> --}}

    <!-- pagination -->

    <!-- sidebar-admin -->

    <div class="sidebar-admin bg-color3 color-black">
        <ul class=" list-unstyled">
            <li class="{{$activeLi == 'CoursesAdminstration'?'active':''}}">
                <img src="{{asset('storage/images/admin/coursimage/iconfinder_SEO_courses_training_flipchart_969264.svg')}}" alt=""><span><a href="{{route('courses_administration')}}">Courses Adminstration</a></span>
            </li>
            <li class="{{$activeLi == 'CatManagement'?'active':''}}">
                <img src="{{asset('storage/images/admin/coursimage/Group 228.svg')}}" alt=""><span><a href="{{route('categories_management')}}">Categories Management</a></span>
            </li>
            <li class="{{$activeLi == 'StudentManagement'?'active':''}}">
                <img src="{{asset('storage/images/admin/coursimage/iconfinder_student_309036.svg')}}" alt=""><span><a href="{{route('students_management')}}">Student Management</a></span>
            </li>
            <li class="{{$activeLi == 'instructorManagement'?'active':''}}">
                <img src="{{asset('storage/images/admin/coursimage/Group 35.svg')}}" alt=""><span><a href="{{route('instructor_management')}}">Instructor Management</a></span>
            </li>
        </ul>
    </div>


    <!-- sidebar-admin -->

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootnavbar.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>