<?php

class DataBaseHandler
{
    private static string $host = "127.0.0.1";
    private static string $db_name = "api_db";
    private static string $username = "root";
    private static string $password = "root";
    private static PDO $_mHandler;

    private function __construct()
    {
    }

    private static function getHandler(): PDO
    {
        if (isset(self::$_mHandler)) {
            try {
                self::$_mHandler = new PDO("mysql:host=" . self::$host . "; port=3406 ;dbname="
                    . self::$db_name, self::$username, self::$password);
                self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $pdoException) {
                self::CloseConnection();
                trigger_error($pdoException->getMessage(), E_USER_ERROR);
            }
        }
        return self::$_mHandler;
    }

    public static function execute(string $sqlQuery, string $params = null): void
    {
        try {
            $database_handler = self::getHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
        } catch (PDOException $exception) {
            self::CloseConnection();
            trigger_error($exception->getMessage(), E_USER_ERROR);
        }
    }

    public static function getAll(string $sqlQuery, string $params = null, int $fetchStyle = PDO::FETCH_ASSOC): array
    {
        $result = null;
        try {
            $database_handler = self::getHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute();
            $result = $statement_handler->fetchAll($fetchStyle);
        } catch (PDOException $exception) {
            self::CloseConnection();
            trigger_error($exception->getMessage(), E_USER_ERROR);
        }
        return $result;
    }

    public static function getOne(string $sqlQuery, string $params = null) : string {
        $result = null;
        try {
            $database_handler = self::getHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
            $result = $statement_handler->fetch(PDO::FETCH_NUM);
            $result = $result[0];
        }catch (PDOException $exception) {
            self::CloseConnection();
            trigger_error($exception->getMessage(), E_USER_ERROR);
        }
        return $result;
    }

    public static function CloseConnection(): void
    {
        self::$_mHandler = new PDO(":null", null, PDO::PARAM_NULL);
    }


}