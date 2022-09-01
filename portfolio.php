<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/swiper.min.css">
<style>
 img{
     width:10%
 }
</style>
<link rel="stylesheet" href="css/main.css">  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css" integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<?php
   $card_id = $_GET['card-id'];
   require 'db_conect.php';
   $result = $mysqli->query("SELECT * FROM `portfolio_products` WHERE product_id='$card_id'");
   $content = mysqli_fetch_array($result);
 ?>
    <div class="container">
        <h1 class="portfolio-title">
            <?php echo $content['text'];
            ?>
            
         </h1> 
         <!-- треба взяти з бази даних -->
        <div class="portfolio-image">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image1'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image2'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image3'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image4'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image5'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image6'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image7'];?>" alt=""></div>

                </div>
                
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image1'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image2'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image3'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image4'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image5'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image6'];?>" alt=""></div>
                    <div class="swiper-slide"><img src="/image/portfolio/<?php echo $content['image7'];?>" alt=""></div>
                </div>
            </div>
        </div>
        <!-- треба взяти з бази даних -->
        <div class="portfolio-subtitle">
            <p>Зустріч з природою наодинці в Карпатах - це завжди хороша ідея</p>
            <p> . <a href="">Відвідати</a></p>
        </div>
        <a class="back-to-site" href="/">На головну</a>
    </div>
<footer class="footer">
        <div class="container">
            <div class="row footer-content">
                <div class="col-12 col-sm-4">
                    <div class="footer-links">
                           <a target=blank href="https://www.google.com/travel/hotels/entity/CgoItq3rloa7m-l6EAE/overview?g2lb=2502548%2C4258168%2C4270442%2C4271060%2C4306835%2C4317915%2C4322823%2C4328159%2C4371334%2C4401769%2C4419364%2C4425458%2C4433754%2C4444000%2C4445603%2C4447566%2C4448315%2C4270859%2C4284970%2C4291517%2C4412690&hl=uk&gl=ua&un=1&rp=ELat65aGu5vpehC2reuWhrub6Xo4AkAASAHAAQI&ictx=1&sa=X&cshid=1603033068518601&utm_campaign=sharing&utm_medium=link&utm_source=htls&hrf=KhYKBwjkDxAKGBkSBwjkDxAKGBoYASgAggElMHg0NzM2ZWYxYzYxNzIxYTQxOjB4N2FkMjZkZDg2MmRhZDZiNpoBJxolMHg0NzM2ZWYxYzYxNzIxYTQxOjB4N2FkMjZkZDg2MmRhZDZiNg"><i style= "color: #fff; font-size: 22px; " class="fab fa-google"></i> </a>
                           <a target=blank href="https://www.facebook.com/vyshchezakhmary"><img src="image/icons/facebook.svg"> </a>
                           <a target=blank href="https://www.booking.com/hotel/ua/vyshche-za-hmary.uk.html"><img wight=40 height=40 src="image/icons/b.svg"> </a>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="footer-info">
                        <div>
                            <span>вул. Гостинна, с.Ільці,</span>
                            <span>Верховинський р-н, Івано-Франківська обл.</span>
                            <span>Координати: 48.1691, 24.7803</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="footer-contacts">
                        <p>+38 (097) 468-85-24</p>
                        <p>+38 (099) 413-05-19</p>
                        <div>
                            <a href=""><i class="fab fa-viber"></i>Viber</a>
                            <a href=""><i class="fab fa-whatsapp"></i>Whatsapp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2660.961603388307!2d24.77827521565017!3d48.16882127922595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4736ef1c61721a41%3A0x7ad26dd862dad6b6!2z0JLQuNGJ0LUg0LfQsCDRhdC80LDRgNC4!5e0!3m2!1suk!2sua!4v1605553768274!5m2!1suk!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  -->
    
    </div>

    <!--/*<map name="tourism" >*/
<area shape="circle" coords="89,182,50" href="https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B3%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0" alt="tourism">
</map>
<img src="image/portfolio/28577801_1879171908773501_1957965879601790976_n.jpg" usemap="#tourism"> -->
    <script src="js/swiper.min.js"></script>
<script src="js/Jquery/jquery-3.5.1.min.js"></script>
<script src="js/vide/jquery.vide.js"></script>
<script src="js/main.js"></script>    
</body>
</html>
