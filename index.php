<?php
date_default_timezone_set('Europe/Kiev');

require_once "libs/Smarty.class.php";
require_once "functions.php";
require_once "session.php";


$smarty = new Smarty();
$smarty->setTemplateDir('templates');

$action = $_GET['action'] ?? 'main';


if (strpos($action, 'admin') === 0) {
    if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0) {
        $action = 'main';
    }
}

switch ($action) {
    case "login":
        loginEndpoint();
        break;
    case "register":
        registerEndpoint();
        break;
    case "admin":
    case "adminUsers":
        adminUsersEndpoint();
        break;
    case "adminCategories":
        adminCategoriesEndpoint();
        break;
    case "adminProducts":
        adminProductsEndpoint();
        break;
    case "adminOrders":
        adminOrdersEndpoint();
        break;
    case "cart":
        cartEndpoint();
        break;
    case "orders":
        ordersEndpoint();
        break;
    case "logout":
        logoutEndpoint();
        break;
    default:
        mainPageEndpoint();
        break;
}