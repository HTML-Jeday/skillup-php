<?php
  function countRand(){
      $number = (int) $_POST['number'];
      $rand = rand(0,100);
      $counter = 1;
      while($number !== $rand){  
          $rand = rand(0,100);
          $counter++;
      };
      return $counter;
  }


  //создаём файл
  $file = 'guess.txt';

  $yourNumber = $_POST['number'];
  $try = countRand();

  $data .= "$yourNumber \n";
  $data .= "$try\n";

  // кладём данные в файл
  file_put_contents($file, $data);


  // достаём данные из файла
  $openFile = file_get_contents($file);
  // разбиваем данные на массив
  $dataArr = explode(' ', $openFile);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randomizer</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
</head>
<body>
    <form class="container" method="POST">
    <h1>Randomizer</h1>
    <div class="row">
    <div class="input-field col s6">
      <input id="first_name2" type="text" name="number" pattern="^[0-9][0-9]?$|^100$" >
      <label class="active" for="first_name2">Write number</label>
    </div>
    </div>
        <button class="waves-effect waves-light btn" type="submit">Start</button>
        
        <?php echo isset($_POST['number'])  ? "<table>" : "<table style='display: none'>"; ?>
  
        <thead>
          <tr>
            <th>Твой номер</th>
            <th>Попытки</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach($dataArr as $data ){
              $html = "<td>{$data}</td>";
              echo $html;
            }
            ?>
          </tr>
        </tbody>
      </table>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

