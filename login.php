<?php

require_once 'functions.php';
require_once 'session.php';



if ($_POST){


  
  $login = $_POST['name'];
  $password = $_POST['password'];

  $_SESSION['user'] = $login;

  

  $data = [];
  $error = null;


 


  if (file_exists('users.json')) {
      $data = json_decode(file_get_contents('users.json'), true);
  }




  foreach($data as $item ){
      if($item['name'] == $login && password_verify($password, $item['password'])){
        header("Location: /"); 
      }
  }

  $error = 'Wrong login or password';


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
<div class="w-full max-w-xs" style="margin: 20px auto;">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="name">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
    </div>
    <?php if($error){
      echo "<p class='text-red-500 text-xs italic mb-2'>{$error}</p>";
    };?>
    <div class="flex items-center justify-between mb-2">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
    </div>
    <div class="flex items-center justify-between mb-2">
        Don't have an account yet ?
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="signup.php">Sign Up</a>
    </div>

 </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
</body>
</html>

