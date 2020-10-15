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

//     cоздание пользователей
    $setUsers = "INSERT INTO users (email, password) VALUES ";
    $arrUsers = [];
    for ($d = 1; $d <= 500; $d++) {
        $arrUsers[] = "('user{$d}@user.ru', 1111)";
    }
    $query = $setUsers . implode("," , $arrUsers);
//    $db->query($query);

//     создание товаров
    $setProducts = "INSERT INTO products (product_name, price) VALUES ";
    $arrProducts = [];
    for ($d = 1; $d <= 500; $d++) {
        $arrProducts[] = "('Iphone{$d}', '".rand(1000, 5000)."')";
    }
    $query = $setProducts . implode("," , $arrProducts);
//    $db->query($query);


   $users = $db->query("SELECT id FROM users ORDER BY RAND() limit 100;")->fetch_all(MYSQLI_ASSOC);
   $users = array_map(function ($array) {
        return $array['id'];
    }, $users);


    $products = $db->query("SELECT id FROM products ORDER BY RAND() LIMIT 900;")->fetch_all(MYSQLI_ASSOC);
    $products = array_map(function ($array) {
        return $array['id'];
    }, $products);


    $orders = [];

    $setOrders = "INSERT INTO orders (user_id, created_at) VALUES ";

    foreach ($users as $user) {
            $ordersCount = rand(1, 8);
            for ($i = 0; $i < $ordersCount; $i++) {
                $orders[] = "($user, '". date("Y-m-d H:i:s", rand(1590969600, 1598918399))."')";
            }
    }


//    $db->query($setOrders . implode(",",$orders));


    $orderIds = $db->query("SELECT user_id FROM orders")->fetch_all(MYSQLI_ASSOC);


    $orderIds = array_map(function ($array) {
        return $array['user_id'];
    }, $orderIds);

    $productMaxIndex = count($products) - 1;

    $orderQuery = "INSERT INTO order_items (order_id, item_id, `count`, price) VALUES ";
    $orderItems = [];

    foreach ($orderIds as $orderId) {
        $productsInOrder = rand(1,3);
        for ($i = 0; $i < $productsInOrder; $i++) {
            $orderItems[] = "($orderId, " . $products[rand(0, $productMaxIndex)] . ", " . rand(1,3) . ", " . (rand(1000, 100000) / 100) . ")";
        }
    }
//  echo $orderQuery . implode(",", $orderItems);
//    $db->query($orderQuery . implode(",", $orderItems));

//заполнение погоды
    $dates = [];
    $days = [];
    $times = [];
    $temperatures = [];
    $data = [];

    //генирируем данные
    for($i=0;$i<500;$i++) {
        $dates[] = date("Y-m-d,H:i", time() - rand(1, 31499600));
        $temperatures[] = rand(10,20) . '.' . rand(0,10);
    }
    // бьём время и дату на массивы
    foreach ($dates as $date){
        $arr = explode(',',$date);
        $days[]= $arr[0];
        $times[] = $arr[1];
    }

    //готовый массив данных для запроса
    for($i=0;$i<500;$i++) {
        $data[] = "('$days[$i]', '$times[$i]', $temperatures[$i])";

    }


    $dataSet = "INSERT INTO weather (date, time, temperature) VALUES ";
    $db->query($dataSet . implode(",", $data));



    // запрос на AVG по месяцам
    $query = "SELECT date, time, temperature, AVG(temperature),month(date) AS m
                FROM weather
                WHERE time LIKE '12%'
                GROUP BY m";



    header('Location: /index.php');
}


function cleanDB(){

    global $db;

    $deleteOrderItems = "DELETE FROM order_items";
    $deleteOrders = "DELETE FROM orders";
    $deleteProducts = "DELETE FROM products";
    $deleteUsers = "DELETE FROM users";

    $db->query($deleteOrderItems);
    $db->query($deleteOrders);
    $db->query($deleteProducts);
    $db->query($deleteUsers);


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
    $query = 'SELECT
                item_id, p.id, p.product_name, SUM(count) as c
            FROM
                 order_items as oi, products as p
            WHERE
                  p.id = oi.item_id
            GROUP
                BY item_id, p.id, count
            ORDER
                BY c DESC
            LIMIT 3;';

    $topProducts = $db->query($query);

    $html = '';
    foreach ($topProducts as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['item_id']}</td>";
        $html .= "<td>{$item['product_name']}</td>";

        $html .= '</tr>';
    }
    return $html;

}





function printDatesTable(){
    global $db;
    $query = "SELECT DISTINCT
                   u.id , u.email, o.user_id, o.created_at
            FROM
                 users as u, orders as o
            WHERE o.created_at
                BETWEEN'2020-06-30' AND '2020-08-31'
            ORDER BY RAND()
            LIMIT 10";

    $dates = $db->query($query);

    $html = '';
    foreach ($dates as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['email']}</td>";
        $html .= "<td>{$item['created_at']}</td>";
        $html .= '</tr>';
    }
    return $html;
}



function totalSpendMoney(){
    global $db;
    $query = "SELECT oi.order_id, o.user_id, oi.price, u.email, SUM(oi.count * price) as total
                FROM
                     order_items as oi, orders as o, users as u
                WHERE
                      oi.order_id = o.user_id AND
                      oi.order_id = u.id
                GROUP BY
                         oi.order_id
                ORDER BY
                         total DESC
                LIMIT 10";
    $total = $db->query($query);


    $html = '';
    foreach ($total as $item) {
        $html .= '<tr>';
        $html .= "<td>{$item['email']}</td>";
        $html .= "<td>{$item['total']}$</td>";
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
<!--            --><?php
//                echo printUser();
//            ?>
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
<!--            --><?php
//                echo printTopProducts();
//            ?>
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
<!--            --><?php
//                echo printDatesTable();
//            ?>
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
<!--            --><?php
//            echo totalSpendMoney();
//            ?>
            </tbody>
        </table>

    </div>
</body>
</html>