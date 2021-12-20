<?php

class FlashBag
{
    private static $instance = null;

    private function __construct()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if (!array_key_exists("flashbag", $_SESSION))
        {
            $_SESSION["flashbag"] = [];
        }
    }


    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new FlashBag();
        }
        return self::$instance;
    }

    public function addMessage(string $message)
    {
        $_SESSION["flashbag"][] = $message;
    }

    public function consumeAllMessage()
    {
        $allMessages = $_SESSION["flashbag"];
        $_SESSION["flashbag"] = [];

        return $allMessages;
    }

}