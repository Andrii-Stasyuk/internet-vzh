<?php session_start(); ?>
<?php
echo '<pre>';
require "db_conect.php";
if($_SESSION['status']!=="1"&&!empty($_POST["button"])==true){
  echo "<script>window.location.href='thank.html'</script>";
} else{
  "<script>window.location.href='index.php'</script>";

}
if(!empty($_POST["button"])==true){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $number_of_people=$_POST["room"];
    // if(!empty($_SESSION['num_of_room'])&&!empty($_SESSION['arr'])){
      $number_of_room=$_SESSION['num_of_room'];
      $arr = $_SESSION['arr'];
      $date_str = $_SESSION['date_str'];
       $mysqli->query("INSERT INTO `orders`(`id`, `firstname`, `lastname`, `email`, `mobile`, `number_of_people`,  `number_of_rooms`, `dates`, `date_str`) VALUES (null,'$firstname','$lastname','$email','$phone','$number_of_people','$number_of_room', '$arr', '$date_str')");



    if(!empty($_POST['text'])){
        $TextMessage = $_POST['text'];
    }
    else{
        $TextMessage = "Вітаю Андрій, бот Працює";
    }
    function send_message($receiverID,$TextMessage){

        $curl = curl_init();
        $json_data = '{
"receiver":"'.$receiverID.'",
"min_api_version":1,
"sender":{
"name":"Karpatyvzh",
"avatar":"avatar.example.com"
},
"tracking_data":"tracking data",
"type":"text",
"text":"'.$TextMessage.'"
}
';
        $data = json_decode($json_data); // Преобразовываем в json код

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://chatapi.viber.com/pa/send_message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data) , // отправка кода

            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/JSON",
                "X-Viber-Auth-Token: 4fb79e817827e038-6b991c880f346f4c-28894d69a030579f"


            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
// сообщение в viber

    send_message('9O+CHtYtLMnRXUIl3Ld/nA==',$TextMessage);

    //  $call="INSERT INTO `users`(`Id`, `firstname`, `lastname`, `email`, `password`) VALUES (null,'$firstname','$lastname','$email','$password')";
      echo '<script>window.location.href="thank.html"</script>';
   }
 ?>