<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 12:03 PM
 *
 * @author Solomon Antoine
 */

include 'include/autoload.php';
include 'include/Stripe/init.php';

$view = new View();
$connect = new StripeConnect();
//TODO: Change Hardcoded 1 to $_SESSION ID
$user = $connect->getUser(1);
if(isset($_GET['signup'])){
    return 0;
}
if(isset($_GET['login'])){
    $connect->stripeLogin($user['stripe_id']);
}
echo $view->renderHeader();
echo $view->renderBody();