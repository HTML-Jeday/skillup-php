<?php

require_once 'session.php';


if($_POST){

$login = $_POST['name'];
$password = $_POST['password'];

$_SESSION['user'] = $login;

$error = null;
$data = [];
$succes = false;

if(strlen($login) < 4 || strlen($password) < 4){

  $error = 'Minimum length is 4 characters';

}else{


  if (file_exists('users.json')) {
    $data = json_decode(file_get_contents('users.json'), true);
  }


  foreach($data as $item ){
    if($item['name'] == $login && password_verify($password, $item['password'])){
      $error = 'This account already taken';
    }
  }




  if(!$error){
    $data[] = [
      'name' => $login,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
  
    file_put_contents('users.json', json_encode($data));


    $succes = true;
  }
  
  

}


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <form class="w-full max-w-lg " style="margin: 20px auto" method="POST">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full  px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              First Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane" name="name">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Password
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************" name="password">
            <?php if($error){
              echo "<p class='text-red-500 text-xs italic mb-2'>{$error}</p>";
            }
            ?>
          </div>
        </div>
        <div class="flex items-center justify-between mb-2">
        <?php
        if($succes){
          echo "<div class='flex items-center'>
          <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline' href='/'>Enter</a>
          <p class='text-green-500 text-xs italic mb-2'>Your account has been created successfully</p>              
          </div>
          ";
        }else{
          echo "<button
            class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline'
            type='submit'>
            Sign Up
          </button>";
            }?>
          </div>
      </form>
</body>
</html>

