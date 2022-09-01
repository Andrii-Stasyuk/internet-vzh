<?php

if(!empty($_POST['firstname'])){
    $TextMessage = $_POST['firstname'];
}
else{
    $TextMessage = "Тестовое сообщение";
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
 session_start();
 require "db_conect.php";  
 $res = $mysqli->query('SELECT * FROM `orders` WHERE id='.$_SESSION["id"]);
if($_POST['button_update']==true){
$firstname=$_POST["firstname"]; // Відправлення оновлених даних
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$mobile=$_POST["phone"];
if(!$_SESSION['arr']){
    $dates = mysqli_fetch_array($res)['dates'];
} else{
    $dates = $_SESSION['arr'];
}

$number_of_people=$_POST["room"];
$number_of_rooms=$_SESSION['num_of_room'];
$date_str = $_SESSION['date_str'];
$text = "UPDATE orders SET firstname='$firstname',lastname='$lastname',email='$email',
mobile='$mobile',dates='$dates',number_of_people='$number_of_people',
number_of_rooms='$number_of_rooms', date_str='$date_str' WHERE id=".$_SESSION["id"];
$mysqli->query($text);
if(!$_SESSION['status']){
    echo '<script>window.location.href="cabinet.php"</script>';
} else{
    echo '<script>window.location.href="orders.php"</script>';
}

}
?>