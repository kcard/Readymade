
 <link rel="stylesheet" href="js/rolling/css/style.css" type="text/css" media="screen"/>

    <div class="menu">
    <div class="item">
                <a class="link icon_menu"></a>
                <div class="item_content">
                    <h2>Menu</h2>
                    <p>
                        <a href="<? echo $url ?>?s=1">Add</a>
                        <a href="<? echo $url ?>?s=2">Edit</a>
                        <a href="<? echo $url ?>?s=3">Remove</a>
                    </p>
                </div>
            </div>
            
            
           <div id="pad-menu"></div>
           
            <div class="item">
                <a class="link icon_category"></a>
                <div class="item_content">
                    <h2>Category</h2>
                    <p>
                        <a href="<? echo $url ?>?s=4">Add</a>
                        <a href="<? echo $url ?>?s=5">Edit</a>
                        <a href="<? echo $url ?>?s=6">Remove</a>
                    </p>
                </div>
            </div>
           
            <div id="pad-menu"></div>
           
           <div class="item">
                <a class="link icon_comment"></a>
                <div class="item_content">
                    <h2>Comment Tag</h2>
                    <p>
                        <a href="<? echo $url ?>?s=7">Add</a>
                        <a href="<? echo $url ?>?s=8">Edit</a>
                        <a href="<? echo $url ?>?s=9">Remove</a>
                    </p>
                </div>
            </div>
 
 			 <div id="pad-menu"></div>
            
            <div class="item">
                <a class="link icon_show"></a>
                <div class="item_content">
                    <h2>Show</h2>
                    <p>
                        <a href="<? echo $url ?>?s=10">Menu</a>
                        <a href="<? echo $url ?>?s=11">Category</a>
                        <a href="<? echo $url ?>?s=12">Comment Tag</a>
                    </p>
                </div>
            </div>
        </div>

 <script type="text/javascript" src="js/rolling/jquery.min.js"></script>
        <script src="js/rolling/jquery-css-transform.js" type="text/javascript"></script>
        <script src="js/rolling/jquery-animate-css-rotate-scale.js" type="text/javascript"></script>
        <script>
                       $('.item').hover(
                function(){
                    var $this = $(this);
                    expand($this);
                },
                function(){
                    var $this = $(this);
                    collapse($this);
                }
            );
             
                       
            function expand($elem){
                var angle = 0;
                var t = setInterval(function () {
                    if(angle == 1440){
                        clearInterval(t);
                        return;
                    }
                    angle += 80;
                    $('.link',$elem).stop().animate({rotate: '+=-20deg'}, 0);
                },10);
                $elem.stop().animate({width:'220px'},800)
                .find('.item_content').fadeIn(400,function(){
                    $(this).find('p').stop(true,true).fadeIn(600);
                });
            }
            function collapse($elem){
                var angle = 1440;
                var t = setInterval(function () {
                    if(angle == 0){
                        clearInterval(t);
                        return;
                    }
                    angle -=80;
                    $('.link',$elem).stop().animate({rotate: '+=20deg'}, 0);
                },10);
                $elem.stop().animate({width:'52px'}, 1000)
                .find('.item_content').stop(true,true).fadeOut().find('p').stop(true,true).fadeOut();
            }
        </script>