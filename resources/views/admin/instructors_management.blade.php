@extends('admin.layout.layout')
@section('pageTitle','Admin / Instructor Management')
@section('pageStyle')
    <style>
            
        /* sidebar-admin */
        .sidebar-admin{
            width: 4%;
            height: 100vh;
            position: fixed;
            z-index: 1000;
            padding-top: 50px;
            left: 0;
        }
        .sidebar-admin ul li{margin-bottom: 8px;padding: 7px 0 7px 11px;}
        .sidebar-admin ul li:hover{background-color: #646ECB;color: #000;cursor: pointer;}
        .sidebar-admin ul li.active{border-left: 3px solid #646ECB}
        .sidebar-admin ul li span{display: none;}
        .sidebar-admin ul li img{width:25px;display: inline-block;margin-right: 10px;}
        /* end sidebar-admin */
        
        /* admin header */
        .admin-header{background-color: #474343;}
        .admin-header h2{font-style: italic;text-align: center;}
        .four-lines{width: 60%;margin: auto;}
        .four-lines ul{list-style-type: none;padding: 0; margin: 0;}
        .four-lines li{height: 2px; background-color: #fff;margin: 10px auto;}
        .four-lines li:first-of-type{width: 100%;}
        .four-lines li:nth-of-type(2){width: 60%;}
        .four-lines li:nth-of-type(3){width: 20%;}
        .four-lines li:last-of-type{width: 5%;}
        .admin-header .det-list{
            font-size: 1.3rem;
            margin-top: 2%;
            text-transform: capitalize;
        } 
        .admin-header .det-list li{transition: all 1s ease-in-out;padding-bottom: 10px;}
        .admin-header .det-list li:hover{color: #646ECB;border-bottom: 3px solid #646ECB;cursor: pointer;}       
        .admin-header .det-list li.active{border-bottom: 3px solid #646ECB;}    
        /* admin header */

        /* course adminstration */
        .course-adiministration{margin-top: 120px;}
        .course-adiministration .courses .course{margin-bottom: 50px;}
        .course-adiministration .courses .course .card{
            border: none;
            border-radius: 0;
            transition: all 1s ease;
        }
        .course-adiministration .courses .course .card img.card-img-top{
            border-radius: 0;
        }
        .course-adiministration .courses .course .card .card-body{
            padding: 0.7rem;
            text-align: center;
            font-size: 1.1rem;
        }
        .course-adiministration .courses .course .card .course-over{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 10;
            display: none;
        }
        .course-adiministration .courses .course .card .course-over a{
            display: inline-block;
            padding: 30px;
            background-color: #646ECB;
            color: #fff;
            text-align: center;
            line-height: 20%;
            border-radius: 50%;
            text-decoration: none;
            position: relative;
            top: 30%;
            left: 35%;
        }
        .course-adiministration .courses .course .card:hover .course-over{display: block;cursor: pointer;}
        
        /* pagination */
        /* pagination */
        .pagination{
            width: 22%;
            margin: 50px auto ;
            padding-left: 23px;
        }
        .pagination a{
            background-color: transparent;
            border: 1px solid #646ECB;
            color: #BFC5FC;
        }
        /*pop up*/
        .popup{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999999999;
            display: none;
            font-size: 1.3rem;
            
        }
        .innerpop{
            width: 550px;
            height: 533px;
            background-color: #474343;
            color: #fff;
            position: fixed;
            top: 50%;
            margin-top: -263px;
            left: 50%;
            margin-left: -275px;
            padding: 20px;
            border: 3px solid #646ECB;
        }
        .innerpop .data-title{
            padding-bottom: 10px;
            border-bottom: 3px solid #fff;
            display: inline-block;
            margin-right: 10px;
        }
        .add-tab::not(:first-of-type){display: none;}
        /* couses demands */
        .demands h2{
            width: 21%;
            margin: auto;
        }
        .demands h2::after{
            content: "";
            display: block;
            width: 50%;
            height: 4px;
            background-color: #474343;
            margin: 25px auto;
        }
        .demands .demand{width: 80%;margin: auto;}
        .demands .demand::after{
            content: "";
            display: block;
            width: 30%;
            height: 4px;
            background-color: #474343;
            margin: 50px auto;
        }
        .demands .demand .card{
            border: none;
            border-radius: 0;
            transition: all 1s ease;
            width: 100%;
        }
        .demands .demand .card img.card-img-top{
            border-radius: 0;
        }
        .demands .demand .card .card-body{
            padding: 0.7rem;
            text-align: center;
            font-size: 1.2rem;
        }
        .demands .demand .card .card-body p a{
            text-decoration: none;
        }
        .demands .demand .card .card-body p a i{
            margin-left: 10px;
        }
        .demands .demand .card .card-body .info{
            text-align: left;
            padding: 0 25px 25px;
            display: none;
            
        }
        .course-image{position: relative;cursor: pointer;}
        .card .course-image .course-image-cover{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 10;
            cursor: pointer;
            display: none;
        }
        .card .course-image:hover .course-image-cover{display: block;}
         .card .course-image .course-image-cover button.course-uns-bt{
            display: block;
            width: 50%;
            padding: 10px 0;
            background-color: #eee;
            text-transform: capitalize;
            font-size: 1.1rem;
            border: 0;
            font-weight: bold;
            margin: 5% auto;
            cursor: pointer;
        }
        .card .course-image .course-image-cover button.course-uns-bt:hover{
            color: #fff;
            background-color: #646ECB;
        }
        .card .course-image .course-image-cover button.course-uns-bt a{
            text-decoration: none;
            color: #000;
        }
     
        /* couses demands */
        /* search field */
        .search{
            width: 80%;
            padding: 30px;
            margin: 50px auto;
            background-color: #474343;
            position: relative;
        }
        .search input{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 1.2rem;
            padding-left: 20px;
        }
        .search i{
            position: absolute;
            right: 15px;
            bottom: 13px;
        }

    </style>
@endsection
@section('headerLinks')
    <li class="list-inline-item color-white mx-5 active" data-crd=".cr-stat">instructor list</li>
@endsection
@section('content')

   {{-- instructor managing --}}

   <div class="course-adiministration">
        <div class="container">
            <!-- search field -->
            <div class="search">
                <input type="text" value="Search Instructor">
                <i class="fas fa-search fa-2x color1"></i>
            </div>
            <!-- search field -->
            <!-- first tab -->
            <div class="courses cr-stat add-tab">
                <div class="row">
                    @foreach($instructors as $instructor)
                        <div class="col">
                            <div class="course">
                                <div class="card" style="width: 21rem;">
                                    <div class="course-image">
                                        <img class="card-img-top" src="{{asset('storage/images/admin/instructorImage/course1.svg')}}" alt="Card image cap">
                                        <div class="course-image-cover">
                                            <button class="course-uns-bt conf popbutton"><a href="{{route('instructor_profile',$instructor->id)}}">view Profile</a></button>
                                            <form action="{{route('instructor_destroy' , $instructor->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type ="submit" class="course-uns-bt regect">Delete Acount</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">{{$instructor->user->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div> 
    
@endsection
