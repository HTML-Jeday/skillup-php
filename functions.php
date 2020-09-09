<?php

const USERS_FILE = 'users.json';
const PRODUCTS_FILE = 'products.json';
const CATEGORIES_FILE = 'categories.json';
const ORDERS_FILE = 'orders.json';

function loginEndpoint()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        global $smarty;

        $smarty->display('login.tpl');

        return;
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    makeLogin($email, $password);
}

function makeLogin(string $email, string $password)
{
    $email = strtolower($email);

    if (strpos($email, '@') === false) {
        header("Location: /?action=login&error=Email should be correct");

        return;
    }

    if (strlen($password) < 8) {
        header("Location: /?action=login&error=Password should be at least 8 characters");

        return;
    }

    $users = readFromFile(USERS_FILE);

    foreach ($users as $user) {
        if ($email === $user['email']) {
            if (!password_verify($password, $user['password'])) {
                header("Location: /?action=login&error=Credentials are incorrect or user does not exist");

                return;
            }

            //EMAIL FOUND AND PASSWORD CORRECT
            header("Location: /");

            $_SESSION['user'] = $user;
            return;
        }
    }

    header("Location: /?action=login&error=Credentials are incorrect or user does not exist");
}

function registerEndpoint()
{

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        global $smarty;

        $smarty->display('register.tpl');

        return;
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    makeRegistration($email, $password);
}

function makeRegistration(string $email, string $password)
{
    $email = strtolower($email);

    if (strpos($email, '@') === false) {
        header("Location: /?action=register&error=Email should be correct");

        return;
    }

    if (strlen($password) < 8) {
        header("Location: /?action=register&error=Password should be at least 8 characters");

        return;
    }

    $users = readFromFile(USERS_FILE);

    foreach ($users as $user) {
        if ($email === $user['email']) {
            header("Location: /?action=register&error=User already exists");
            return;
        }
    }

    $users[] = $user = [
        'id' => md5(time() . rand(1,1000000)),
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'is_admin' => 0,
        'created_at' => date("d-m-Y")
    ];

    if (!writeFile(USERS_FILE, $users)) {
        header("Location: /?action=register&error=Server error. Not able to create user");

        return;
    }

    $_SESSION['user'] = $user;

    header("Location: /");
}

function cartEndpoint()
{
    global $smarty;

    $smarty->display('cart.tpl');
}

function logoutEndpoint()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    header("Location: /");
}

function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

function mainPageEndpoint()
{
    global $smarty;

    $arr = readFromFile(CATEGORIES_FILE);

    $sorted = array_orderby($arr, 'order', SORT_DESC);

    $smarty->assign('categories', $sorted);

    $smarty->display('index.tpl');
}

function adminUsersEndpoint()
{
    global $smarty;


    $users = readFromFile(USERS_FILE);

    $smarty->assign('users', $users);

    $smarty->display('admin/users.tpl');
}

function adminCategoriesEndpoint()
{

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        global $smarty;


        $arr = readFromFile(CATEGORIES_FILE);

        $sorted = array_orderby($arr, 'order', SORT_DESC);

        $smarty->assign('categories', $sorted);

        $smarty->display('admin/categories.tpl');

        return;
    }

    $categoryName = $_POST['category_name'] ?? '';
    $categoryOrder = (int) $_POST['category_order'] ?? 0;

    createCategory($categoryName, $categoryOrder);

    

}

function createCategory(string $categoryName, int $categoryOrder)
{

    if (strlen($categoryName) < 3) {
        header("Location: /?action=adminCategories&error=Category name should be at least 3 symbols");
        return;
    }

    $categories = readFromFile(CATEGORIES_FILE);

    $categories[] = [
        'id' => md5(time() . rand(1,10000000)),
        'name' => $categoryName,
        'order' => $categoryOrder
    ];

    writeFile(CATEGORIES_FILE, $categories);

    header("Location: /?action=adminCategories&message=Category <b>$categoryName</b> created successfully!");
}

function adminProductsEndpoint()
{
    global $smarty;

    $smarty->display('admin/products.tpl');
}

function adminOrdersEndpoint()
{
    global $smarty;

    $smarty->display('admin/orders.tpl');
}

function ordersEndpoint()
{
    global $smarty;

    $smarty->display('orders.tpl');
}

function writeFile(string $fileName, $data): bool
{
    return (bool) file_put_contents($fileName, json_encode($data));
}

function readFromFile(string $fileName, $default = [])
{
    if (!file_exists($fileName)) {
        return $default;
    }

    $json = file_get_contents($fileName);

    return json_decode($json, true);
}