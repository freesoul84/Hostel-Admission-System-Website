<!--signup form-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gallery | Malaygiri Hostel admission system</title>
<!--bootstrap css and js files-->
<!-- Latest compiled and minified JavaScript -->
    <link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
   <link rel="stylesheet" href="css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="css/sweetalert.css"/>
<!-- jQuery and BOOTstrap JS-->
<script src="js/bootstrap.js" type="text/javascript" ></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="js/bootstrapValidator.js"></script>
   <script src="js/bootstrapValidator.min.js"></script>
   <style type="text/css">
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}
.img1{border-radius:5px;}
.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}
   </style>
</head>
<body style="margin-top:50px;">
  <div class="container-fluid">
<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-0"><img src="img1.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-1"><img src="img2.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-2"><img src="img3.jpg" class="img1"style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-3"><img src="img4.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-4"><img src="img5.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-5"><img src="img6.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-6"><img src="img7.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-7"><img src="img8.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-8"><img src="img9.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-9"><img src="img10.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-10"><img src="img11.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-11"><img src="m.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-12"><img src="images12.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-13"><img src="img13.jpg" class="img1" style="height:100px;width:100px;border-radius:10px;"></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <img src="img1.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="1">
                                        <img src="img2.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="img3.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="3">
                                        <img src="img4.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="4">
                                        <img src="img5.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="5">
                                        <img src="img6.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="6">
                                        <img src="img7.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="7">
                                        <img src="img8.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="8">
                                        <img src="img9.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="9">
                                        <img src="img10.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="10">
                                        <img src="img11.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="11">
                                        <img src="m.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="12">
                                        <img src="img12.jpg" style="height:480px;width:524px;"></div>

                                    <div class="item" data-slide-number="13">
                                        <img src="img13.jpg" style="height:480px;width:524px;"></div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>

    </div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
   jQuery(document).ready(function($) {

        $('#myCarousel').carousel({
                interval: 5000
        });

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>
