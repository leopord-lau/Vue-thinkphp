<?php 
require_once 'AipFace.php';

const APP_ID = '15780231';
const API_KEY = 'avGGaMbLkCf59ePI1MgmGbCe';
const SECRET_KEY = 'oH6v0ixyy2wakSAiwS5RaS22Si3mZHTd';

$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

//定义需要检测的图片
$img=base64_encode(file_get_contents("pic/img.jpg"));

$result=$client->detect($img,"base64");
echo "$result"
?>