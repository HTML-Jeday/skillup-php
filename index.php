<?php

require_once 'session.php';

    $user = $_SESSION['user'] ?? 'unregistered user';
    $phones = [];

    if (file_exists('phone.json')) {
        $phones = json_decode(file_get_contents('phone.json'), true);
    };

    if($_GET['action'] == 'logout'){
        session_destroy();
        header("Location: /");
    }

    if($_POST){
       
        $error = null;

        if($_SESSION){
       

            if(is_numeric($_POST['phone'])){

                $phones[] = $_POST['phone'];
                file_put_contents('phone.json', json_encode($phones));

            }else{
                $error = 'Make sure you entered the correct phone number';
            }           
           
        }else{
            $error = 'Please, login';
        }     
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <a href="/">
        <span class="font-semibold text-xl tracking-tight"> <?php echo "Hello, $user"?></span>
    </a>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <?php
    if($_SESSION){
        echo '<div>
        <a href="/?action=logout" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Logout</a>
      </div>';
    }else{
        echo '<div>
        <a href="/login.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Signin</a>
        <a href="/signup.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Signup</a>
      </div>';
    }?>
  </div>
</nav>
<?php

if($phones){
    echo '
        <table class="table-fixed" style="margin: 20px auto">
            <thead>
                <tr>
                <th class="w-1/2 px-4 py-2">Phones</th>
                </tr>
            </thead>
        <tbody>';
        foreach($phones as $item){
            $html = '<tr>';
            $html.= "<td class='border px-4 py-2'>{$item}</td>";
            $html.= '</tr>';
            echo $html;
        };

}?>
 </tbody>
</table>

<?php

if($_SESSION){
    echo "<div class='flex'>
    <form style='margin: 20px auto' class='flex-shrink-0' method='POST' action='authorized'>
        <input placeholder='Enter your number' name='phone' type='text'>
        <button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline' type='submit'>
            Add a number
        </button>";
       if($error){
            echo "<p class='text-red-500 text-xs italic mb-2 mt-2'>{$error}</p>";
        }
 echo "</form> </div>";
} ?>



</body>
</html>