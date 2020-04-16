<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/profileStyle.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/faveIcon/favicon.png')}}"/>
    
</head>
<body>
    <!-- profile setting -->
    <section class="profile-setings">
        <div class="back">
            <a href="{{route('dash')}}" class=" text-capitalze color3">go back</a>
        </div>
        <div class="container">
            <h2 class="text-capitalize color3 h1 d-inline-block">
                profile &amp; setings
                <div class="center-line"></div>
            </h2>
            <ul class="nav  mb-3 mt-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active color3 px-0 mr-5 text-capitalize" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">profile info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color3 px-0 text-capitalize" id="pills-profile-tab " data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">profile picture</a>
                </li>
            </ul>
            <!-- tap 1 -->
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active color3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form action="{{route('student.profile.update',$student->id)}}" method="POST" class="profile-info-form">
                    @csrf
                    <div class="form-group my-5">
                        <label for="exampleInputEmail1" class=" text-capitalize">full name</label>
                        <input type="text" class="form-control text-capitalize pl-3" name="name" aria-describedby="emailHelp" value="{{$student->user->name}}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1" class=" text-capitalize">country</label>
                        <select class="form-control text-capitalize" id="exampleFormControlSelect1" name="nationality">
                            @foreach ($countries as $country)
                                <option value="{{$country->country_name}}" @if($student->user->nationality == $country->country_name) selected @else @endif >{{$country->country_name}}</option>
                            @endforeach
                            {{-- <option value="algeria" @if($student->user->nationality == 'algeria') selected @else @endif >algeria</option>
                            <option value="tunisia" @if($student->user->nationality == 'tunisia') selected @else @endif >tunisia</option>
                            <option value="morroco" @if($student->user->nationality == 'morroco') selected @else @endif >morroco</option>
                            <option value="egypt"   @if($student->user->nationality == 'egypt') selected @else @endif >egypt</option> --}}
                        </select>
                    </div>
                    <label for="exampleInputEmail1" class=" text-capitalize d-block mb-3">gender</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label ml-4 mr-2">Male</label>
                        <input class="form-check-input" type="radio" name="gender"  value="m" {{($student->user->gender == 'm')?'checked':''}} >
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label ml-4 mr-2">Female</label>
                        <input class="form-check-input " type="radio" name="gender"  value="f" {{($student->user->gender == 'f')?'checked':''}}>
                    </div>
                    <button type="submit" class="btn btn-primary px-3">save</button>
                </form>
            </div>
            <!-- tab 2 -->
            <div class="tab-pane fade color3" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="img-container">
                    <img src="{{asset('storage/images/user/'.$student->user->profileimg)}}" alt="profile" >
                </div>
                <form action="{{route('student.profile.image',$student->id)}}" method="POST" enctype='multipart/form-data' class="profile-picture-form">
                    @csrf
                    @method('PUT')
                    <input type="file" name = "profileimg" id="">
                    <input type="submit" value="save">
                </form>
            </div>
            </div>
        </div>
    </section>
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