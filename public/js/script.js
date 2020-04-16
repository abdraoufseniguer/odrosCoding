$(document).ready(function(){
    // interface
    var navh = $('.main-nav').outerHeight();
    var winh = $(window).height();
    $('.interface').innerHeight(winh-navh);
    // interface
    // toglling search icon and placeholder
    $(".in-toggle").focus(function(){
        $(this).attr("data-holder",$(this).attr("placeholder"));
        $(this).attr("placeholder","");
        $(this).next(".fa-search").hide(1000);
    }).blur(function(){
        $(this).next(".fa-search").show(1000);
        $(this).attr("placeholder",$(this).attr("data-holder"));
    });
    // multi drop down tregring
    $(function(){
        $("#navbar").bootnavbar();
    });
    // showing list of sugestions on key up
    // $('#search-courses').on('keyup',function(){
    //     $('.navbar .seggest ul').show(500,function(){
    //     });
    // });
    // $('.navbar .seggest ul li').on('click',function(){
    //     $(this).parent('ul').hide(500);
    // });

    //input field customization
    $('.profile-setings form.profile-picture-form input[type="file"]').wrap('<div class="custom-file"></div>');
    $('.custom-file').prepend('<span>upload picture</span>');
    function customFile(selector,spanValue,fatherSelector){
        $(selector).wrap('<div class="custom-file"></div>');
        $(fatherSelector).prepend('<span>'+spanValue+'</span>');
    }
    customFile('.notifications .loadAssignment','Load Assignment','.custom-file:first-child');
    customFile('.notifications .loadAnswer','load answer', '.custom-file');
    customFile('.additional-videos-responses #response1 input','load video', '.additional-videos-responses #response1 .custom-file');
    customFile('.additional-videos-responses #response2 input','load video', '.additional-videos-responses #response2 .custom-file');
    customFile('.additional-videos-responses #response3 input','load video', '.additional-videos-responses #response3 .custom-file');
    $(".accordion h3").click(function(){
        $(this).next().slideToggle(500);
        $(".accordion ul").not($(this).next()).slideUp(500);
        $('section.accordion h3 i').each(function(){
            $(this).toggleClass('fa-arrow-alt-circle-down fa-arrow-alt-circle-right');
        });
    });
    // $('.loadAssignment').click(function(e){
    //     e.preventDefault();
    //     var form = $(this).parents('form');
    //     form.next('a').show();
    // }); 
    // going to buy cart
    $('.carousel-inner .card .buy img.buy-icon').click(function(){
        $(this).next('a').click();
    });
    // toglling search icon and placeholder
    $(".checkout form input").focus(function(){
        $(this).attr("data-holder",$(this).attr("placeholder"));
        $(this).attr("placeholder","");
    }).blur(function(){
        $(this).attr("placeholder",$(this).attr("data-holder"));
    });
    // dynamique tabs intrCourse
    $('.contQAList .list-inline .list-inline-item a').click(function(e){
        e.preventDefault();
        $(this).addClass('active').parent('li').siblings('li').find('a').removeClass('active');
        $(".contentitr > div").fadeOut();
        $($(this).data('inc')).show(1000);
        console.log($(this).data('inc'));
    });
    $('.view-questions button.ask').click(function(){
        $(this).hide(function(){
            $('.questions').hide(function(){
                $('.posting-questions').show(500);
            });
        })
    });
    $('.posting-questions .cancel').click(function(){
        $('.posting-questions').hide(function(){
            $('.view-questions button.ask').show(500,function(){
                $('.questions').show(500);
            });
        });
    });
    //fixed menu
    $(".fixed-gear").click(function(){
        $(this).toggleClass("visible");
        if($(this).hasClass("visible")){
            $("body").animate({
                paddingLeft : $(".fixed-menu").innerWidth()
            });
            $(".fixed-menu").animate({
                left:0
            });
        }
        else{
            $("body").animate({
                paddingLeft : 0
            });
            $(".fixed-menu").animate({
                left:$(".fixed-menu").innerWidth() * (-1) 
            });
        }
       });
    //sidebare
    var nvHeight = $("#navbar").outerHeight();
    $('.sidebare').css('top',nvHeight);
    $(window).scroll(function(){
        if($(this).scrollTop() >= nvHeight){
            $('.sidebare').animate({
                top : 0
            });
        }
        else if($(this).scrollTop() < nvHeight){
            $('.sidebare').animate({
                top : nvHeight
            },1000);
        }
    });
    $('.sidebare').hover(function () {
            // over
            $(this).animate({
                width : "20%"
            },1000,function(){
                $('.sidebare ul li span').fadeIn(1000);
            });
            
        }, function () {
            // out
            $('.sidebare ul li span').fadeOut(); 
            $(this).animate({
                width : "4%"
            },1000);
        }
    );
    // select box
        var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                for (k = 0; k < y.length; k++) {
                y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                break;
            }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
        arrNo.push(i)
        } else {
        y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
        }
    }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
    // creating course 
    $(".cr-course-tabs .tabs ul li").click(function  () { 
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("list")).show().siblings(".tab-content").hide();
    });
    $(".tabs-contents .course-requ form button.adder").click(function(){
        var inputCont = $(".tabs-contents .course-requ form input[type='text']").val();
        $(".tabs-contents .course-requ form .cr-rquerements").append("<li>"+inputCont+"</li>");
    });
    // showing content
    $(".sections .section .lecture button").click(function(){
        var lecture = $(this).parent('.lecture');
        lecture.next(".sections .section .media-adder").toggle(1000);
    });
    // adding lecture
    $(".sections .section .lectureAdder").on("click",function(){
        $('.lecture_adder').fadeToggle(1000);
    });
    //adding content to lecture
    $('.adding-attachment').on('click',function(){
        $(this).prev('form').submit();
    });
    $(".sections .section .media-adder .media-content form input").wrap("<div class='custom-f'></div>");
    $(".sections .section .media-adder .media-content form div.custom-f").prepend("<i class='fas fa-file'></i>");
    $(".sections .section .media-adder .media-content form div.custom-f:first-of-type").append("<p>Video</p>");
    $(".sections .section .media-adder .media-content form div.custom-f:nth-of-type(2)").append("<p>Article</p>");
    $(".sections .section .media-adder .media-content form div.custom-f:last-of-type").append("<p>Assgn</p>");
    //teacher communication
    $(".communication.communication-list li").click(function  () { 
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("com")).show().siblings(".tab-communication").hide();
    });

    $(".instructor-communication .com .comment  button").click(function(){
        $(".rep").toggle(1000);
    });
    // assignments
    $(".ass .communication-list li").click(function(){
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("ass")).show().siblings(".assignment-tab").hide();
    });
    // messages 
    // assignments
    $(".mess .block-msg ul li").click(function(){
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("num")).css("display","flex");
        $($(this).data("num")).show().siblings(".msg").hide();
    });

    // add anouncement
    // $(".ann button.add").on('click',function(){
    //     $(".ann").append("<div class='add-ann bg-color3 color-black px-3 py-3 my-4 row'><div class='add-ann-info col-md-9'><form action='#' class='px-3'><textarea name='' id='' rows='10'></textarea></form></div><div class='add-ann-edit col-md-3'><button class='color-white'>Edit</button></div></div><div class='row bg-color3 rep ' style='width: 100%;'><div class='col-12'><div class='reply px-3 py-3 '><div class='reply-header'><h4 class='text-capitalize pl-3'>you can edit it here</h4></div></div></div></div>");
    // });

    // SectionMessageChanger
    function sectionNameChanger() {
        $.ajax({
           type:'POST',
           url:'/sectionNameChange',
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data) {
              $("#msg").html(data.msg);
           }
        });
    }
    $(".ann-edit").click(function(){
        $(this).parent('.add-ann-edit').next('.rep').toggle(1000);
    });
    // performances
    $(".performances .performance-list li").on("click",function(){
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("per")).show().siblings(".perfor-tab").hide();
    });
    // admin 
    // details list 
    $(".admin-header .det-list li").on("click",function(){
        $(this).addClass('active').siblings().removeClass("active");
        $($(this).data("crd")).show().siblings(".add-tab").hide();
        console.log($(this).data("crd"));
    });
    // sidebar admin
    var nvadminh = $(".admin-header").outerHeight();
    $('.sidebar-admin').css('top',nvadminh);
    $(window).scroll(function(){
        if($(this).scrollTop() >= nvadminh){
            $('.sidebar-admin').css('top',0);
        }else{
            $('.sidebar-admin').css('top',nvadminh);
        }
    });
    $('.sidebar-admin').hover(function () {
            // over
            $(this).animate({
                width : "20%"
            },1000,function(){
                $('.sidebar-admin ul li span').fadeIn(1000);
            });
            
        }, function () {
            // out
            $('.sidebar-admin ul li span').fadeOut(); 
            $(this).animate({
                width : "4%"
            },1000);
        }
    );
    //pop up
   $(".popbutton").click(function(){
    $(".popup").show(400);
   });
   $(".popup").click(function(){
    $(this).hide(400);
   });
   $(".innerpop").click(function(e){
    e.stopPropagation();
   });
   $(".close").click(function(e){
    $(this).parentsUntil(".popup").parent().hide(400);
   });
   // course demand confirmation 
   $(".demands .demand .card .course-image .course-image-cover button.conf a").click(function(){
        $(this).parentsUntil('demand').fadeOut(1000);
    });
   // course demand rejection 
    $(".demands .demand .card .course-image .course-image-cover button.regect").click(function(){
        $(this).fadeOut(function(){
            $(this).siblings('.course-uns-bt').fadeOut(function () { 
                $(this).parent(".course-image-cover").append("<form action='admin\\deletingCourseDemande'><textarea class='reg-exp'>here you will type the explanation</textarea><input type='submit' value='send'></form>");
             });
        });
    });
    $(".demands .demand .card .card-body p a").click(function(e){
        e.preventDefault();
        $(this).parent("p").siblings(".info").fadeToggle(500);
    });
    // adding category
    // $(".category-management button.adding-n-cat").on('click',function(){
    //     $(".categories").append("<div class='category my-5'> <form action='/admin/category_create/{id}' method='post'>  <input type='text'  name='category_name'><a href='#' class='fas fa-plus color1 create'></a></form></div>");
    // });
    
    $(".category-management .categories .category a").click(function(e){
        e.preventDefault();
    });
    // updating categories
    $('.category-management .categories .category a.update').click(function(){
        $(this).parent('form').submit();
    });
    //deleting category
    $('.category-management .categories .category a.close').click(function(){
        $(this).parent('form').submit();
    });

    $('.category-management .categories .category a.create').on('click',function(e){
        e.preventDefault();
        $(this).parent('form').submit();
    });

    //adding course name 
    $('.direction a.next').click(function(e){
        e.preventDefault();
        $('#course_name_form').submit();
    });

    $('.direction a.ch_cat').click(function(e){
        e.preventDefault();
        $('#ch_cr_cat').submit();
    });

    var colors = ['1abc9c', '2c3e50', '2980b9', '7f8c8d', 'f1c40f', 'd35400', '27ae60'];

    colors.each(function (color) {
    $$('.color-picker')[0].insert(
        '<div class="square" style="background: #' + color + '"></div>'
    );
    });

    $$('.color-picker')[0].on('click', '.square', function(event, square) {
    background = square.getStyle('background');
    $$('.custom-dropdown select').each(function (dropdown) {
        dropdown.setStyle({'background' : background});
    });
    });
});