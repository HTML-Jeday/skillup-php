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
    $count = $db->query("SELECT COUNT(*) FROM users");
    $counter = $count->field_count;
    echo $counter;

    for ($d = 1; $d <= 500; $d++) {
        $db->query("INSERT INTO users SET `email` = 'user{$d}@user.ru', `password` = 1111");
    }

    for ($d = 1; $d <= 500; $d++) {
        $randNumber = rand(1000, 5000);
        $db->query("INSERT INTO products SET `product_name` = 'Iphone{$d}', `price` = '{$randNumber}'");
    }
   $users = $db->query("SELECT * FROM users limit 100");
   $users_ar = [];
    foreach($users as $user){
        $users_ar[] = $user['id'];
    }
    $products = $db->query("SELECT * FROM products limit 100");
    $products_ar = [];
    foreach($products as $product){
        $products_ar[] = $product['id'];
    }

    for ($d = 1; $d <= 200; $d++) {
        for($i = 0; $i <= count($users_ar); $i++){
            for($r = 1; $r < rand(1, 8); $r++){
                $productRand = rand(0, count($products_ar));
                $db->query("INSERT INTO orders SET `product_id` = $products_ar[$productRand], `user_id` = $users_ar[$i] ");
            }
        }
  }


    header('Location: /index.php');
}
function cleanDB(){

    global $db;
    $db->query("DELETE FROM users, products, orders");

    header('Location: /index.php');
}


function printUser(){
    global $db;
    $users = $db->query("SELECT id, email, COUNT(*) AS CNT FROM users AS u LEFT JOIN orders AS o ON u.id = o.user_id GROUP BY id HAVING COUNT(*) > 1 ORDER BY CNT DESC LIMIT 10");

    $html = '';
    foreach ($users as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['email']}</td>";
        $html .= "<td>{$item['CNT']}</td>";

        $html .= '</tr>';
    }
    return $html;
}


function printTopProducts(){
    global $db;
    $topProducts = $db->query("SELECT id, product_name FROM products AS p LEFT JOIN orders AS o ON p.id = o.product_id GROUP BY product_id HAVING COUNT(*) > 1 ORDER BY COUNT(*) DESC LIMIT 3");

    $html = '';
    foreach ($topProducts as $item) {
        $html .= '<tr>';
        $html .= "<td>1</td>";
        $html .= "<td>{$item['product_name']}</td>";

        $html .= '</tr>';
    }
    return $html;

}




function printDatesTable(){
    global $db;
    $dates = $db->query("SELECT DISTINCT id, email, o.created_at FROM users AS u LEFT JOIN orders AS o ON u.id = o.user_id WHERE o.created_at BETWEEN '2020-10-05' AND '2020-10-06' LIMIT 10");

    $html = '';
    foreach ($dates as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['email']}</td>";
        $html .= "<td>{$item['created_at']}</td>";
        $html .= '</tr>';
    }
    return $html;
}
// создал результирующую таблицу покупок каждого пользователя
# CREATE TABLE totals1 AS SELECT email, SUM(price) as SUM
# FROM orders as o, users as u, products as p
# WHERE u.id = o.user_id
# GROUP BY user_id, product_id


function totalSpendMoney(){
    global $db;
    $total = $db->query("SELECT SUM(SUM) as sum, email FROM totals1 GROUP BY email ORDER BY sum DESC LIMIT 10");

    $html = '';
    foreach ($total as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['email']}</td>";
        $html .= "<td>{$item['sum']}$</td>";
        $html .= '</tr>';
    }
    return $html;

}
totalSpendMoney();

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
                <th scope="col">user</th>
                <th scope="col">orders</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo printUser();
            ?>
            </tbody>
        </table>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Product</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo printTopProducts();
            ?>
            </tbody>
        </table>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">user</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo printDatesTable();
            ?>
            </tbody>
        </table>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">user</th>
                <th scope="col">total spend</th>
            </tr>
            </thead>
            <tbody>
            <?php
            echo totalSpendMoney();
            ?>
            </tbody>
        </table>

    </div>
</body>
</html>