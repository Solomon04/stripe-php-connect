<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 10:32 AM
 * @author Solomon Antoine
 */

class Config
{
    // database connection constants
    const DB_HOST = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "Solken";
    const DB_DATABASE = "stripe_connect";

    //Stripe API
    const STRIPE_PUBLIC = 'pk_test_WRhN4BKmkqctL2nrjCPJCTXi';
    const STRIPE_SECRET = 'sk_test_AfPrHBd85yRDmJmdW4uK3a9Y';
    const STRIPE_CONNECT = 'https://connect.stripe.com/express/oauth/authorize?redirect_uri=http://localhost:1234/stripe-connect/&client_id=ca_C2CKbfLxpwpxjuTp9xdtuBcL5zSws9mN&state=tfq3tqf';

}