<?php

    // 1. способ

      //  $data = [
      //   [
      //   'img' => "https://i.pinimg.com/originals/f3/94/13/f39413f8e283ce87d3a172c04d9ef06c.png",
      //   'car' => "Opel",
      //   'name' => "Иван Иванов",
      //   'phone' => "+38 111 111 1111"
      //   ],
      //   [
      //   "img" => "https://i.pinimg.com/originals/f3/94/13/f39413f8e283ce87d3a172c04d9ef06c.png",
      //   "car" => "Opel",
      //   "name" => "Иван Сидоров",
      //   "phone" => "+38 111 111 2222"
      //   ],
      //   [
      //   "img" => "https://i.pinimg.com/originals/f3/94/13/f39413f8e283ce87d3a172c04d9ef06c.png",
      //   "car" => "Opel",
      //   "name" => "Иван Петров",
      //   "phone" => "+38 111 111 3333"
      //   ]
      //   ];

      //   function getData(array $array){
      //     foreach ($array as $item){
      //       $html  .= '<tr>';
      //       $html .= "<td><img src={$item[img]}></td>";
      //       $html .= "<td>{$item[car]}</td>";
      //       $html .= "<td>{$item[name]}</td>";
      //       $html .= "<td>{$item[phone]}</td>";
      //       $html .= '</tr>';
      //     }
      //     echo $html;
      //   }

    // 2. способ через файлы


      //создаём файл
      $file = 'cars.txt';
      // если нет картинки
      $image = $_POST['img'] ?? 'https://exotic-cars.com.ua/img/exotic-cars-kiev.png';
      
      $data = "$image,\n";
      $data .= "$_POST[car],\n";
      $data .= "$_POST[name],\n";
      $data .= "$_POST[phone]";

      // кладём данные в файл
      file_put_contents($file, $data);


      //достаём данные из файла
      $openFile = file_get_contents($file);
      //разбиваем данные на массив
      $dataArr = explode(',', $openFile);
  ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car selling</title>
    <!-- Compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <nav class="grey darken-4">
      <div class="nav-wrapper container">
        <a href="#" class="logo"><img src="https://www.freepnglogos.com/uploads/zent-logo-png-car-22.png"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <a class="waves-effect waves-orange btn-small yellow main-btn">Register</a>
          <a class="waves-effect btn-small yellow main-btn">Login</a>
        </ul>
      </div>
    </nav>
    <main>
      <div class="row">
        <div class="col s2 form-column">
          <!-- <form class="col s12 form" action="send.php" method="POST">  для первого способа-->
          <form class="col s12 form" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input id="first_name" type="text" class="validate" name="name">
                <label for="first_name">First Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="phone" type="text" class="validate" name="phone">
                <label for="phone">Phone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6 input-car">
                <input id="car" type="text" class="validate" name="car">
                <label for="car">Car Model</label>
              </div>
              <div class="file-field input-field btn-field">
                <div class="btn-small">
                  <span>Upload</span>
                  <input type="file" name="file">
                </div>
                <div class="file-path-wrapper path-input">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
            <button type="submit" class="waves-effect btn-small yellow main-btn" >Send</button>
          </form>
        </div>
        <div class="col s9 right">
          <table>
            <thead>
              <tr>
                  <th>Image</th>
                  <th>Car Model</th>
                  <th>First Name</th>
                  <th>Phone</th>
                </tr>
            </thead>
            <tbody>
              <?php
                // для первого способа getData($data);
              ?>
                <!-- для второго -->
                <tr>
                <?php 
                    $html = "<td><img src='{$dataArr[0]}' alt='картинка'></td>";
                    $html .= "<td>{$dataArr[1]}</td>";
                    $html .= "<td>{$dataArr[2]}</td>";
                    $html .= "<td>{$dataArr[3]}</td>";
                    echo $html;
                ?>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>