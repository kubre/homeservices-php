<?php

class DB
{
    public const HOST = "localhost";
    public const DBNAME = "services";
    public const USERNAME = "root";
    public const PASSWORD = "";
 
    /**
     * PDOStatement object used by Database class
     *
     * @var \PDOStatement
     */
    protected static $_stmt = null;

    /**
     * method returns the connection to the database
     *
     * @throws \PDOException
     *
     * @return PDO connection object
     */
    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USERNAME, self::PASSWORD, []);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $conn;
    }

    /**
     * Query performs query on database
     *
     * @param string $sql SQL query to be performed
     *
     * @param array $param Parameters to be bound
     *
     * @return PDOStatement
     */
    public static function query($sql, $params = array())
    {
        try {
            self::$_stmt = self::getConnection()->prepare($sql);
            
            if (strstr($sql, "SELECT") === false) {
                return self::$_stmt->execute($params);
            }

            if (empty($params)) {
                self::$_stmt->execute();
            } else {
                self::$_stmt->execute($params);
            }

            return self::$_stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getStmt()
    {
        return self::$_stmt;
    }
}
