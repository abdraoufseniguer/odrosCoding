@extends('instructor.layout.layout')
@section('title','Instructor Dashboard / creating course')
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
            left: 90%;
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
         /* your courses */
         .under-line-center::after{
            content: '';
            display: block;
            width: 15%;
            height: 3px;
            margin: 20px auto 0;
            background-color: #e7e9fb;
        }
        .cours-title{
            width: 55%;
            margin: 30px auto;
        }
        .cours-title input{
            width: 100%;
            background-color: #474343;
            border: none;
            padding: 10px;
            margin-bottom: 20px;
        }
        .cours-title input::placeholder{color: #ddd;}
        .counter{
            position: absolute;
            right: 14%;
            top: 36%;
        }
        .counter span{
            display: inline-block;
            margin-left: -37px;
        }
        .step-number{
            width: 50px;
            height: 50px;
            text-align: center;
            background-color: #646ECB;
            color: #fff;
            text-transform: capitalize;
        }
        .direction{overflow: hidden;}
        .direction .back{
            float: left;
            padding: 10px;
            background-color: #474343;
            color: #ddd
        }
        .direction .next{
            float: right;
            padding: 10px;
            background-color: #474343;
            color: #ddd
        }
        .direction .back:hover,
        .direction .next:hover{
            color: #646ECB;
            text-decoration: none;
        }
        /*the container must be positioned relative:*/
        .custom-select {
        position: relative;
        font-family: Arial;
        }

        .custom-select select {
        display: none; /*hide original SELECT element:*/
        }

        .select-selected {
        background-color: #474343;
        }

        /*style the arrow inside the select element:*/
        .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
        }

        /*style the items (options), including the selected item:*/
        .select-items div,.select-selected {
        color: #E7E9FB;
        padding: 8px 16px;
        /* border: 1px solid transparent; */
        /* border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent; */
        cursor: pointer;
        user-select: none;
        }

        /*style items (options):*/
        .select-items {
        position: absolute;
        background-color: #474343;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
        text-align: center
        }
        .select-items div{padding: 20px;}
        .select-items div::after {
        content: "";
        display: block;
        width: 50%;
        height: 2px;
        background-color: #E7E9FB;
        margin: 10px auto;
        
        }
        /*hide the items when the select box is closed:*/
        .select-hide {
        display: none;
        }

        .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
        }
        .custom-select{
            padding: 0;
            border: none;
            text-align: left;
        }
    </style>
@endsection
@section('content')
   <!-- going back to the stdent dashboard -->

   <a href="{{route('instructor.create_course')}}" class="text-capitalize color-black bg-color3 backstd">cancel</a>

   <!-- going back to the stdent dashboard -->

   <!-- your already created courses -->

   <h2 class=" color-white text-capitalize text-center my-courses-title under-line-center mt-5">
       what is the general category of your course
   </h2>
   <div class="cours-title text-center mb-5">
       <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
       <div class="custom-select" style="width:600px;">
           <form action="{{route('instructor.course_Category_store',$courseName)}}" method="post" id="ch_cr_cat">
                @csrf
                <select name = 'category_id'>
                    <option>Category</option>
                    @foreach ($Cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                </select>
           </form>
       </div>
       </div>
       <h5 class="text-capitalize color3 text-center">you can change it later</h5>
   </div>
   
   <!-- step number -->
   <div class="step-number ml-4">
       step<br>2
   </div>
   <!-- separator -->
   <div class="under-line-center mt-5 mb-5"></div>
   <!-- next back -->
   <div class="direction container">
       <a href="#" class="d-block color-white text-capitalize back">back</a>
       <a href="#" class="d-block color-white text-capitalize next ch_cat">next</a>
   </div>
@endsection