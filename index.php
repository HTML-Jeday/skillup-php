<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Send</button>
    </form>
</body>
</html>


<?php

if($_FILES){
    //получили путь к файлу
    $getFile = file_get_contents($_FILES['file']['tmp_name']);
    //разбиваем файл на массив
    $pieces = explode(PHP_EOL , $getFile);

    //перегоняем массив в json
    $getJSOn = json_encode($pieces);
    //создаём json файл и грузим в него данные
    $writeJSON= file_put_contents('table.json', $getJSOn);

    // читаем созданный json 
    $readJSON = file_get_contents('table.json');
    // декодим json
    $newArrayFromJSON = json_decode($readJSON);
    

    function HTMLBuilder($array){

        $html = '';
        $html .= '<table border="1">';
        foreach($array as $item){
            $html .= '<tr>';
            $html .= "<td>{$item}</td>";
            $html .= '</tr>';
        }
        $html .= '</table>';

        echo $html;
    }

    //строим таблицу
    HTMLBuilder($newArrayFromJSON);
}


?>