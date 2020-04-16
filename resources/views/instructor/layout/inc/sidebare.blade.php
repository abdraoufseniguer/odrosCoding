<!-- sidebare -->

<div class="sidebare bg-color3 color-black">
    <ul class=" list-unstyled">
        <li class="{{Route::currentRouteName()=='instructorDash'?'active':''}}"><a href="{{route('instructor.create_course')}}" style="color:black;text-decoration:none"><img src="{{asset('storage/images/instructor/sidebar/iconfinder_video-24_103168.svg')}}" alt=""><span>courses</span></a></li>
        <li class="{{Route::currentRouteName()=='instructor.about.dash'?'active':''}}"><a href="{{route('instructor.about.dash')}}" style="color:black;text-decoration:none"><img src="{{asset('storage/images/instructor/sidebar/iconfinder_237_professor_student_scientist_teacher_school_3957678.svg')}}" alt=""><span>about instructor</span></a></li>
        <li class="{{Route::currentRouteName()=='instructor.communication.dash'?'active':''}}"><a href="{{route('instructor.communication.dash')}}" style="color:black;text-decoration:none"><img src="{{asset('storage/images/instructor/sidebar/iconfinder_icons_Message_1564513.svg')}}" alt=""><span>communication</span></a></li>
        <li class="{{Route::currentRouteName()=='instructor.performance.dash'?'active':''}}"><a href="{{route('instructor.performance.dash')}}" style="color:black;text-decoration:none"><img src="{{asset('storage/images/instructor/sidebar/iconfinder_performance-clock-speed_353431 (1).svg')}}" alt=""><span>performance</span></a></li>
    </ul>
</div>

<!-- sidebare -->