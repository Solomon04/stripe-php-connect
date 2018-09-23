<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 10:55 AM
 */

class DatabaseConnection
{
    public $db;
    public function __construct()
    {
        try{
            $this->db = $this->connect();
        }
        catch(Exception $e)
        {
            echo "<br/>Error: " . $e;
        }
    }

    private function connect()
    {
        return $model = new mysqli(
            Config::DB_HOST,
            Config::DB_USERNAME,
            Config::DB_PASSWORD,
            Config::DB_DATABASE
        );
    }
}