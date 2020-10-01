<?php
$action = $_GET['action'];

$db = new mysqli("db", 'root', '', 'skillup');

$query = $db->query("SELECT * FROM users");
$result = $query->fetch_all(MYSQLI_ASSOC);



switch ($action) {
    case "fillDB":
        fillDB();
        break;
    case "cleanDB":
        cleanDB();
        break;
}



function fillDB(){


    global $db;
//    $count = $db->query("SELECT COUNT(*) FROM users");
//    $counter = $count->field_count;
//    echo $counter;

    for ($d = 1; $d <= 500; $d++) {
        $db->query("INSERT INTO users SET email = 'user{$d}@user.ru', password = 1111");
    }



    header('Location: /index.php');
}
function cleanDB(){

    global $db;
    $db->query("DELETE FROM users");

    header('Location: /index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>DB</title>
</head>
<body>
    <div class="container">
        <a href="?action=fillDB" class="btn btn-success">Сидирование</a>
        <a href="?action=cleanDB" class="btn btn-danger">Очитска БД</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">email</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $html = '';
                foreach ($result as $item) {
                    $html .= '<tr>';
                    $html .= "<td>{$item['id']}</td>";
                    $html .= "<td>{$item['email']}</td>";

                    $html .= '</tr>';
                }
                echo $html;
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>