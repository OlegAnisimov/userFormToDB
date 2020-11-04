<?php
echo
<<<HEAD
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
HEAD;
echo
<<<BODY
<form class="form" method="post">
<input type="text" id="name" name="name" placeholder="ведите имя"> <br />
<input id="submit" type="submit" value="Отправить">
</form>  
<div class="info"></div>
BODY;

echo
<<<SCRIPT
<script>
document.querySelector('.info').innerText = "dddd" 
console.log('fff')
$('.form').on('submit', function() {
  $.ajax({
  url: 'send.php',
  method; 'post',
  dataType: 'html',
  data: $(this).serialize(),
  success: (data) => {
      $('.info').html(data);
      console.log("succ");
     } 
  })
})
</script>  
    
SCRIPT;

