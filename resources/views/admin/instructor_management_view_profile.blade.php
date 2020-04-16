@extends('admin.layout.layout')
@section('pageTitle','Admin / Instructor Profile')
@section('pageStyle')
    <style>
            
        /* sidebar-admin */
        .sidebar-admin{
            width: 4%;
            height: 100vh;
            position: fixed;
            z-index: 1000;
            padding-top: 50px;
            left:0;
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

        /* view profile */
        .viewProfile{padding: 90px 0;}
        .viewProfile ul.prof-det li{font-size: 1.6rem;margin-bottom: 40px;}
        .viewProfile .four-lines{
            width: 20%;
        }
        /* view profile */
        
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
        
        .add-tab::not(:first-of-type){display: none;}

    </style>
@endsection
@section('content')

   {{-- viewing profile --}}
   <div class="viewProfile">
        <div class="container">
            <h4 class="text-capitalize color-white text-center">
                {{$instructor->user->name}}
                <div class="four-lines">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </h4>
            <ul class="list-unstyled list-group color-white mt-5 prof-det">
                <li class="color-white text-capitalize py-2"><span class="color2">profission : </span>web developer</li>
                <li class="color-white text-capitalize py-2"><span class="color2">certificates : </span>{{$instructor->inst_certfy}}</li>
                <li class="color-white text-capitalize py-2"><span class="color2">course number created : </span>{{count($instructor->courses)}}</li>
                <li class="color-white text-capitalize py-2"><span class="color2">number of enrollments : </span>{{$enrNum}}</li>
                <li class="color-white text-capitalize py-2"><span class="color2">number of reviews : </span>100</li>
            </ul>
        </div>
    </div>
    
@endsection
