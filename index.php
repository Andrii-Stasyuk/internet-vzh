<?php session_start(); ?>
<?php

      if($_SERVER['HTTP_REFERER'] == 'http://karpaty1/register-users.php'){
          echo '<script>alert("Такий користувач існує")</script>';
      }
      require 'db_conect.php';
      $result = $mysqli->query('SELECT * FROM products');
      $row = [];
      while($products = mysqli_fetch_array($result)){
          $row[]=$products;
      }
      if($_SESSION['once_reg']){
        $_SESSION['same_email'] = false;
        $_SESSION['open_register'] = 'no';
        
        
      }
      if($_SESSION['once_log']){
        $_SESSION['open'] = 'no';
        $_SESSION['wrong'] = false;
      }
      
      
      if($_SESSION['open_update']){
          $result = $mysqli->query("SELECT  * FROM `orders` WHERE `Id`=".$_SESSION['id']);
          $res = mysqli_fetch_array($result);
      }
 ?>
<!-- Hello!!!!!! -->
<html>
<head>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>-->
<link rel="stylesheet" href="css/main.css">     
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css" integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body >

   <div class="header" id="header">
   <i class="fas fa-bars"></i>
   <div class="register_buttons">
            
            <div class="header-user-button"> 
                <?php
            if(!$_SESSION['email']): ?>
                 <a class="register-href"><p class="register-user-button a-paragrap">Реєстрація</p></a>
             <?php endif ?>
                <?php if(!$_SESSION['email']): ?>
                    <a class="register-href"><p class="login-user-button a-paragrap">Вхід</p></a>
                <?php endif ?>
                <?php
                if($_SESSION['email']): 
                    if($_SESSION['status']=='1'):
                ?>
                
                  <a class="register-href"><p class="order-change-btn a-paragrap">Бронювання</p></a>
                  <?php endif ?>
                   <a href='<?php if($_SESSION['status']=='0'){echo 'cabinet.php';} else{echo 'admin.php';} ?>' class="register-href"><p class="login-off-user-button a-paragrap">Кабінет</p></a>
                    <a href='exit.php' class="register-href"><p class="login-off-user-button a-paragrap">Вийти</p></a>
                <?php endif ?>
      
            </div>
    </div>
      <!-- <video class="video_media" src="video/vzh.mp4" autoplay muted loop></video>-->
        <h1 data-aos="zoom-in" data-aos-duration="2000"  class="header-title">
        Вище за хмари   
       </h1>
       <p class="header-subtitle">
        еко-котедж в серці Карпат
       </p>
       <div class="header-viber"> 
        <img class="viber-image" src="image/icons/viber_PNG15.png">
         <p class="viber-name">Viber&nbsp</p>
        <p class="number">+38 (097) 468-85-24 </p>
       </div> 
       <div class="header-button"> 
                <a class="register-href"><p class="register-button">Відвідати</p></a>
        </div>
        
        
        
       <div class="header-arrow">
        <img src="./image/header/chevron-down.svg" alt=""> 
       </div>
    
</div>

    <div class="portfolio">
        <div class="container">
          <h2 class="portfolio-header">Переваги відпочинку</h2>
            <div class="porfolio-cards-wrapper">

              <?php
                  foreach($row as $key=>$product):
                   
              ?>
               
              <div  data-aos="<?php echo 'fade-'.$product['fade']; ?>" class="card width">
                  <img class="card-image" src="<?php echo 'images/'.$product['image']; ?>">
                  <h3 class="card-title"><a href="portfolio.php?card-id=<?php echo $product['Id'];?>"><?php echo $product['title']?></a></h3>
                  <p><?php echo $product['text']?></p>                    
              </div>
              <?php
                endforeach;
              ?>
            </div>
        </div>
    </div>
    <div class="container map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6666.263219783879!2d24.780464!3d48.168821!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ad26dd862dad6b6!2sAbove%20the%20clouds!5e1!3m2!1sru!2sua!4v1661425899499!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <div>
                            <a href=""><i class="fab fa-viber"></i>Viber</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
    </div>
    <div class='form-popap-month'>







    
        <div class='register'>
        <div class="popap-close">
                   <i style=" color: white; pointer-event :none; font-size: 20px;" class="fas fa-times popap-month-close"></i>
               </div>
        <form class="black" method="POST" action="">
            <div class="booking-month-table">
                        <p class="booking-table-title">
                            Виберіть закриті місяці
                        </p>
                        <div class='data-year-number'></div>
                        <div class="booking-month-table-content">
                            
                        </div>
                        
                        <button value='true' name="close_month" type="submit" class=" btn btn-primary close-month">Зберегти</button>
                    </div> 
                    
          </form>
        </div>
    </div>
    
 <div <?php $open_reg=$_SESSION['open_register']; ?> class="<?php if($open_reg=='yes'){echo 'form-user-popap-active ';} ?>form-user-popap">
           <div class="register">
               <div class="popap-close">
                   <i style=" color: white; pointer-event :none; font-size: 20px;" class="fas fa-times register-close"></i>
               </div>
            <form class="black" method="POST" action="register-users.php">
                <div class="form-group">
                    <label  for="exampleInputEmail1">Firstname</label>
                    <input value='<?php if($_SESSION['same_email']){echo $_SESSION['first_reg'];} ?>' name="firstname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <label for="exampleInputEmail1">Lastname</label>
                    <input value='<?php if($_SESSION['same_email']){echo $_SESSION['last_reg'];} ?>' name="lastname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <label for="exampleInputEmail1">Email address</label>
                    <input value='<?php if($_SESSION['same_email']){echo $_SESSION['email_reg'];} ?>' name="email" type="email" class="<?php if($_SESSION['same_email']){echo 'same_email ';}?>form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div class='same_email_text'><?php if($_SESSION['same_email']){
                         echo 'Ця пошта вже використовувалася';
                         $_SESSION['once_reg'] = true;
                    } else{
                        $_SESSION['once_reg'] = false;
                    }?></div>
                    <label for="exampleInputEmail1">Password</label>
                    <input value='<?php if($_SESSION['same_email']){echo $_SESSION['pass_reg'];} ?>' name="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <label for="exampleInputPassword1">Pnone</label>
                    <input value='<?php if($_SESSION['same_email']){echo $_SESSION['phone_reg'];} ?>' name="phone" class="form-control" id="exampleInputPassword1" required>
                    <button value="true" name="button-users" type="submit" class=" btn btn-primary">Submit</button>
                    
                </div>
              
            </form>
    </div>
</div>
<div <?php $open=$_SESSION['open']; ?> class="form-user-login-popap <?php if($open=='yes'){echo 'form-user-login-popap-active';}?>">
           <div class="register">
               <div class="popap-login-close">
                   <i style=" color: white; pointer-event :none; font-size: 20px;" class="fas fa-times login-close"></i>
               </div>
            <form class="black" method="POST" action="check_user.php">
                <div class="form-group">
                
                    <label for="exampleInputEmail1">Email address</label>
                    <input value='<?php if($_SESSION['wrong']){echo $_SESSION['wrong_email'];}?>' name="email" type="email" class="<?php if($_SESSION['wrong']){echo 'same_email ';}?>form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    
                    <label for="exampleInputEmail1">Password</label>
                    <input  value='<?php if($_SESSION['wrong']){echo $_SESSION['wrong_password'];}?>' name="password"  class="<?php if($_SESSION['wrong']){echo 'same_email ';}?>form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <button value="true" name="button-users" type="submit" class=" btn btn-primary">Submit</button>
                    <div class='same_email_text'><?php if($_SESSION['wrong']){
                         echo 'Неправильний логін або пароль';
                         $_SESSION['once_log'] = true;
                    } else{
                        $_SESSION['once_log'] = false;
                    }?></div>
                    
                
              </div> 
            </form>
    </div>
</div>
   
   <div class="<?php if($_SESSION['open_update']){echo 'form-popap-active';}?> form-popap">
       <div class="register">
           <div class="popap-close">
               <i style=" color: white; pointer-event :none; font-size: 20px;" class="fas fa-times"></i>
           </div>
              <form data-update="<?php if($_SESSION['open_update']){echo 'update';}?>" class="order_up black" name="order" method="POST" action="<?php if($_SESSION['open_update']){echo 'update_order.php';}else{echo 'register.php';}?>">
           <div class="form-group">
               <label for="exampleInputEmail1">Firstname</label>
               <input value='<?php if($_SESSION['open_update']){echo $res['firstname'];}?>'  name="firstname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               <label for="exampleInputEmail1">Lastname</label>
               <input value='<?php if($_SESSION['open_update']){echo $res['lastname'];}?>' name="lastname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               <label for="exampleInputEmail1">Email address</label>
               <input value='<?php if($_SESSION['open_update']){echo $res['email'];}?>' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               <label for="exampleInputEmail1">Number</label>
               <input value='<?php if($_SESSION['open_update']){echo $res['mobile'];}?>' name="phone"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               <select name="room" class="form-control rooms-select">
                   <?php 
                   $option_arr = ['Кількість людей', '1', '2', '3', '4', '5', '6'];
                    if($_SESSION['open_update']){
                        $option_update_arr = [];
                        foreach($option_arr as $key=>$value){
                            if($res['number_of_people']==$value){
                                array_unshift($option_update_arr, $value);
                            } else{
                                $option_update_arr[]=$value;
                            }
                        }
                    }
                   ?><?php if($_SESSION['open_update']){foreach($option_update_arr as $key=>$value):  ?>
                    <option value='<?php echo $value;?>'><?php 
                    echo $value;?></option>
                    <?php 
                     endforeach;
                    } else{
                        foreach($option_arr as $key=>$value):  
                   ?>
                    <option value='<?php echo $key;?>'><?php 
                            echo $value;?></option>
                            <?php 
                             endforeach;
                            }
                             ?>
               </select>
               <select style='display: none;' name='rooms' class="form-control rooms">
                   
               </select>
               <div style="display: none" class="booking-table">
                <p class="booking-table-title">
                    Виберіть дату
                </p>
                <div class='data-number'></div>
                <div class='month-number'></div>
                <div class="booking-table-content">
                      
                </div>
                <!-- <div class="close-label">
                         На жаль, цей місяць закритий. Виберіть інший місяць 
                </div> -->
                <div class="booking-btns">
                    <div class="prev">
                        Prev
                    </div>
                    
                    <div class="next">
                        Next
                    </div>
                </div>
            </div>
        <div style='display: none;' class="price">
            
            <div>
                <p class="price_number"></p>
            </div>
        </div>    
               
     <!-- </div> -->
              
               
          
           <button  value=true name="<?php if($_SESSION['open_update']){echo 'button_update';}else{echo 'button';}?>" type="submit" class="btn btn-primary <?php if($_SESSION['open_update']){echo 'update';} else{echo 'order';}?>"><?php if($_SESSION['open_update']){echo 'Оновити';}else{echo 'Відправити';}?></button>
       </form>
   </div>
   </div>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/Jquery/jquery-3.5.1.min.js"></script>
<script src="js/vide/jquery.vide.js"></script>
<script src="js/main.js"></script>

</body>
</html>