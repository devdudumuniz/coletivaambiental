
<script type="text/javascript">
    $(document).ready(function() {  
    var $colorsHTML =
    '<div class="styleSwitcher">' +
    '<a href="#" id="showHideSwitcher"><i class="icon-cog"></i></a>' +
    '<div id="switcherContent">' +
    '<h1>Mudar Cores</h1><ul class="switcher">' +
    '<li><a href="css/orange.css" style="background:#F86D18">Orange</a></li>' +
    '<li><a href="css/yellow.css" style="background:#FFCC00">Yellow</a></li>' +
    '<li><a href="css/sea-green.css" style="background:#3CB6B6">Sea green</a></li>' +
    '<li><a href="css/green.css" style="background:#A4C618">Green</a></li>' +
    '<li><a href="css/blue.css" style="background:#136597">Dark blue</a></li>' +
    '<li><a href="css/light.css" style="background:#44BCDD">Light blue</a></li>' +
    '<li><a href="css/pink.css" style="background:#F897F5">Pink</a></li>' +
    '<li><a href="css/coffee.css" style="background:#A38757">Coffee</a></li>' +
    '<li><a href="css/red.css" style="background:#E44832">Red</a></li>' +
    '<li><a href="css/dark.css" style="background:#555">Purple</a></li>' +
    '</ul>' + 
    '<a href="#" class="btnSwitcher full">Fullwidth</a>' +
    '<a href="#" class="btnSwitcher box">Boxed</a>' +
    '</div>' +

    /*'<ul class="switcher dark">' +
    '<li><a href="css/dark-orange.css" style="background:#F86D18">Dark Orange</a></li>' +
    '<li><a href="css/dark-yellow.css" style="background:#FFCC00">Dark Yellow</a></li>' +
    '<li><a href="css/dark-sea-green.css" style="background:#3CB6B6">Dark Sea green</a></li>' +
    '<li><a href="css/dark-green.css" style="background:#A4C618">Dark Green</a></li>' +
    '<li><a href="css/dark-blue.css" style="background:#136597">Dark Dark blue</a></li>' +
    '<li><a href="css/dark-light.css" style="background:#44BCDD">Dark Light blue</a></li>' +
    '<li><a href="css/dark-pink.css" style="background:#F897F5">Dark Pink</a></li>' +
    '<li><a href="css/dark-coffee.css" style="background:#A38757">Dark Coffee</a></li>' +
    '<li><a href="css/dark-red.css" style="background:#E44832">Dark Red</a></li>' +
    '<li><a href="css/dark-purple.css" style="background:#C44AD0">Dark Black &amp; white</a></li>' +            
    '</ul>' +*/


    '</div>'; 

    $("body").append($colorsHTML);  

    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "js-plugin/jquery-cooki/jquery.cooki.js";
    $("body").append(s);  


    if($.cookie("css")) {
        $("#colors").attr("href",$.cookie("css"));
    }

    if($.cookie("bodyStyle")) {
        $("body").attr('id', $.cookie("bodyStyle"));
    }  

    if($.cookie("header")) {
        $("body").attr('class', $.cookie("header"));
    }  


    $(".switcher li a").click(function() { 
        $("#colors").attr("href",$(this).attr("href"));
        $.cookie("css",$(this).attr("href"));
        return false;
    });




    $('.styleSwitcher .btnSwitcher').click(function (e) {
        var $id;
        if($(this).hasClass('full')){
            $id= '';
        }else{

            $id= 'boxedLayout';
        }

        $("body").attr('id', $id);

        $.cookie("bodyStyle", $id);
        e.preventDefault();
    });


    

    $('#showHideSwitcher').click(function(e) { 
        if($('.styleSwitcher').css('left') === '-170px'){
            $('.styleSwitcher').animate(
                {'left':0},
                300, 'easeOutQuart',function() {
                // stuff to do after animation is complete
            });

        }else{
            $('.styleSwitcher').animate(
                {'left':-170},
                300, 'easeInQuart',function() {
                // stuff to do after animation is complete
            });
        }

        e.preventDefault();
    });

    $('#showHideSwitcher').trigger('click');
    setTimeout(function(){$('#showHideSwitcher').trigger('click');},5000)
}); 
      </script> 