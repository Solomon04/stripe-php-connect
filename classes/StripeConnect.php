<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 10:50 AM
 * @author Solomon Antoine
 */

class StripeConnect
{
    public $db;

    public function __construct()
    {
        $connect = new DatabaseConnection();
        $this->db = $connect->db;
    }

    public function getUser($id)
    {
        $result = $this->db->query("SELECT * FROM users WHERE id=$id");
        $row = $result->fetch_assoc();
        return $row;
    }

    public function processSaveConnectAccount($user_id, $code)
    {
        $query = $this->updateStripeIdQuery(
            $user_id,
          $this->processCurlCommand($code)
        );
        if($query){
            $this->stripeLogin($this->processCurlCommand($code));
        }else {
            echo "<script> alert('Failure!'); </script>";
        }
    }
    public function stripeLogin($stripe_id)
    {
        \Stripe\Stripe::setApiKey(Config::STRIPE_SECRET);
        $account = \Stripe\Account::retrieve($stripe_id);
        $link = $account->login_links->create();
        $url = $link->url;
        header("location: $url");
    }

    private function processCurlCommand($code)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://connect.stripe.com/oauth/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "client_secret=" .\Data_Constants::STRIPE_SECRET . "&code=$code&grant_type=authorization_code");
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $obj = json_decode($result,true);
        return $obj['stripe_user_id'];
    }

    private function updateStripeIdQuery($user_id, $stripe_id)
    {
        return $this->db->query("UPDATE users SET stripe_id='$stripe_id' WHERE id=$user_id");
    }

}