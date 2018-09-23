<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 12:03 PM
 *
 * @author Solomon Antoine
 */

//necessary imports
include 'include/autoload.php';
include 'include/Stripe/init.php';

//classes
$view = new View();
$connect = new StripeConnect();

//TODO: Change Hardcoded 1 to Your $_SESSION ID
$user = $connect->getUser(1);

//Signup for Stripe - View verifies if user doesn't have an ID
if(isset($_GET['signup'])){
   echo $connect->stripeSignup();
}

//Login to Stripe Dashboard - View verifies if user has an ID
if(isset($_GET['login'])){
    $connect->stripeLogin($user['stripe_id']);
}

//Verifies User Has Signed Up Via Stripe Dashboard
if(isset($_GET['code'])){
    //checks state token to prevent CSRF attacks
    if($_GET['state'] == "tfq3tqf"){
        $connect->processSaveConnectAccount($user['id'], $_GET['code']);
    }
}

//HTML
echo $view->renderHeader();
echo $view->renderBody();