@extends('admin.layout.layout')
@section('pageTitle','Admin / Categories Management')
@section('pageStyle')
    <style>
            
        /* sidebar-admin */
        .sidebar-admin{
            width: 4%;
            height: 100vh;
            position: fixed;
            z-index: 1000;
            padding-top: 50px
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
        /* pagination */
        .add-tab::not(:first-of-type){display: none;}
        
        /* category management */
        .category-management{padding: 70px 0;}
        .category-management button.adding-n-cat{
            width: 200px;
            height: 60px;
            border: none;
            cursor: pointer;
        }
        .category-management .categories .category{
            background-color: #474343;
            position: relative;
            padding: 20px;
        }
        .category-management .categories .category input{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
            padding: 0 60px;
            color: white;
            font-size: 1.2rem;
            border: none;
        }
        .category-management .categories .category a.close{
            position: absolute;
            right: 25px;
            top: 13px;
            cursor: pointer;
        }
        .category-management .categories .category a.update,
        .category-management .categories .category a.create{
            position: relative;
            left: 15px;
            top: 2px;
            cursor: pointer;
        }
    </style>
@endsection
@section('headerLinks')
    <li class="list-inline-item color-white mx-5 active" data-crd=".cat-man">category management</li>
@endsection
@section('content')

    <!-- categories administration -->
    <div class="category-management">
        <div class="container">

            <div class="categories">
                <h3 class="color-white text-capitalize">Category List</h3>
                @foreach ($cats as $cat)
                    <div class="category my-5">
                        <form action="{{route('category_update',$cat->id)}}" method="post">
                            @csrf
                            <input type="text" value="{{$cat->category_name}}" name="category_name">
                            <a href="#" class="fas fa-pencil-alt color1 update"></a>
                        </form>

                        <form action="{{route('category_delete',$cat->id)}}" method="post" >
                            @csrf
                            @method('delete')
                            <a href="#" class="close fas fa-times color-white"></a>
                        </form>
                    </div>
                @endforeach
                <div style="width : 100%;">{{$cats->links()}}</div>
                <h3 class="color-white text-capitalize"> Add New Category</h3>
                <div class="category my-5">
                    <form action="{{route('category_create')}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="Add A New Category Here" name="category_name">
                        <a href="#" class="fas fa-plus color1 create"></a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- categories administration -->
    
@endsection
