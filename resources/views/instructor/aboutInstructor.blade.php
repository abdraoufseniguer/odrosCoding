@extends('instructor.layout.layout')
@section('title','Instructor Dashboard / About Instructor')
@section('style')
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
        /* go back to student dash */
        a.backstd{
            position: relative;
            left: 80%;
            padding: 10px;
            border-radius: 30px;
            text-align: center;
            bottom: -40px;
        }
        a.backstd:hover{
            text-decoration: none;
        }
        a.backstd::after{
            content: " ";
            position: absolute;
            top: 50%;
            left: 98%;
            margin-top: -10px;
            border-width: 10px;
            border-style: solid;
            border-color: transparent transparent transparent #e7e9fb;
        }
        /* go back to student dash */
        /* creating course */

        .creating-course{
            margin: 10% auto 0;
            width: 60%;
            padding: 25px;
            background-color: #474343;
        }
        .creating-course .cr-course{
            display: block;
            width: 50%;
            margin: 0 auto 30px;
            padding: 10px;
            font-size: 1.2rem;
            letter-spacing: 1px;
            font-style: italic;
        }
        .creating-course .cr-course:hover{
            background-color: #646ECB;
            color: #BFC5FC;
            text-decoration: none;
        }
        .creating-course span{
            font-size: 1.5rem;
            font-style: italic;
            word-spacing: 2.1px;
        }
        .creating-course .cr-course-i{
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #ddd;
            margin-left: 10px;
            border-radius: 15px;
            margin-bottom: -15px;
            position: relative;
        }
        .creating-course .cr-course-i i{
            position: absolute;
            font-size: 1.8rem;
            top: 25%;
            left: 43%;
        }
        /* creating course */
        /* your courses */
        .under-line-center::after{
            content: '';
            display: block;
            width: 30%;
            height: 3px;
            margin: 20px auto 0;
            background-color: #e7e9fb;
        }
        .my-courses-title{
            width: 20%;
            margin: 40px auto;
        }
        .courses .inst-course .card{
            margin: auto;
            border-radius: 0;
            border: 3px solid #646ECB;
            background-color: transparent;
            margin-bottom: 60px;
        }
        .courses .inst-course .card a{
            width: 80%;
            margin: 10px auto;
            background-color: #474343;
            color: #BFC5FC;
            padding: 10px;
            border-radius: 0;
        }
        /* your courses */
        /* pagination */
        .pagination{
            width: 22%;
            margin: auto;
            padding-left: 23px;
        }
        .pagination a{
            background-color: transparent;
            border: 1px solid #646ECB;
            color: #BFC5FC;
        }
        /* sidebare */
        .sidebare{
            width: 4%;
            height: 100vh;
            position: fixed;
            top: 13%;
            z-index: 1000;
            padding-top: 50px
        }
        .sidebare ul li{margin-bottom: 8px;padding: 7px 0 7px 11px;}
        .sidebare ul li:hover{background-color: #646ECB;color: #BFC5FC;cursor: pointer;}
        .sidebare ul li.active{border-left: 3px solid #646ECB}
        .sidebare ul li span{display: none;}
        .sidebare ul li img{width:25px;display: inline-block;margin-right: 10px;}

         .course-desc h2{width: 50%; margin: 70px 0;}
         .course-desc h2::after{
            content: "";
            width: 40%;
            margin: 30px 0;
            height: 3px;
            display: block;
            background-color: #BFC5FC;
        }
         .course-desc form textarea{
            width: 100%;
            resize: none;
            border: none;
            background-color: #474343;
            margin-bottom: 20px;
            color: #BFC5FC;
            text-indent: 10px;
        }
         .course-desc .manipulation button{
            background-color: #474343;
            color: #BFC5FC;
            width: 100px;
            text-align: center;
            text-transform: capitalize;
            border-bottom: 5px solid #BFC5FC;
            border-radius: 0;
            margin-right: 20px;
            font-size: 1.2rem;
            padding-top: 10px;
            padding-bottom: 10px;
        }
         .course-desc .manipulation button:hover{
            background-color: #BFC5FC;
            color: #474343;
        }
    </style>
@endsection
@section('content')
    <!-- going back to the stdent dashboard -->

    <a href="#" class="text-capitalize color-black bg-color3 backstd">go back to student dashboard</a>

    <!-- going back to the stdent dashboard -->
    <section class="about-inst">
        <div class="container">
            <!-- adding experience -->

            <div class="tab-content course-desc ">
                <h2 class="color3 text-capitalize">add your experience</h2>
                <form action="{{route('instructor.exp')}}" method="POST">
                    @csrf
                    <textarea name="inst_exp" id=""  rows="10"></textarea>
                    <div class="form-group manipulation">
                        <button type="submit" class="btn">Save</button>
                        <button type="button" class="btn">Edit</button>
                    </div>
                </form>
            </div>

            <!-- adding experience -->

            <!-- adding certificats -->

            <div class="tab-content course-desc ">
                    <h2 class="color3 text-capitalize">add your certificates</h2>
                    <form action="{{route('instructor.crt')}}" method="POST">
                        @csrf
                        <textarea name="inst_crt" id=""  rows="10"></textarea>
                        <div class="form-group manipulation">
                            <button type="submit" class="btn">Save</button>
                            <button type="button" class="btn">Edit</button>
                        </div>
                    </form>
                </div>
    
            <!-- adding certificats -->
        </div>
    </section>
@endsection