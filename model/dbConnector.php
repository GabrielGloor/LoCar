<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 09.02.2022
 * @Version : 1.0
 * @Description : This file is designed for connect to the DataBase
 */

/**
 * @param $query
 * @return array|false
 */
function executeQuerySelect($query)
{
    //$queryResult = NULL;

    $dbConnection = openDBConnection();
    if ($dbConnection != NULL)
    {
        $statement = $dbConnection->prepare($query); // Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); // prepare results for client
    }
    $dbConnection = NULL; // close connection to the dataBase for the security

    return $queryResult;
}

/**
 * @return PDO|null
 */
function openDBconnection()
{
    $tempDBConnection = NULL;
    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'snows';
    $username = 'root';
    $userPsw = 'Roro1923';
    $dsn = $sqlDriver.':host='.$hostname.';dbname='.$dbName.';port='.$port.';charset='.$charset;

    try {
        $tempDBConnection = new PDO($dsn, $username, $userPsw);
    }
    catch (PDOException $exception)
    {
        echo 'Connection failed'.$exception->getMessage();
    }
    return $tempDBConnection;
}

function executeQueryInsert($registerQuery)
{

    $dbConnection = openDBConnection();
    if ($dbConnection != NULL)
    {
        $statement = $dbConnection->prepare($registerQuery); // Query prepare
        $statement->execute(); // Execute query
        //$queryResult = $statement->fetchAll(); // prepare results for client
    }
    $dbConnection = NULL; // close connection to the dataBase for the security

}

function executeQueryDelete($registerQuery)
{

    $dbConnection = openDBConnection();
    if ($dbConnection != NULL)
    {
        $statement = $dbConnection->prepare($registerQuery); // Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); // prepare results for client
    }
    $dbConnection = NULL; // close connection to the dataBase for the security

}

function executeQueryUpdate($updateQuery){

    $dbConnection = openDBConnection();
    if ($dbConnection != NULL)
    {
        $statement = $dbConnection->prepare($updateQuery); // Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); // prepare results for client
    }
    $dbConnection = NULL; // close connection to the dataBase for the security
}