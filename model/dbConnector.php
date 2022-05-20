<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 09.02.2022
 * @Version : 1.0
 * @Description : This file is designed for connect to the DataBase
 */

/**
 * @brief : This function is designed to send select query to the db
 * @param $query : This function is the query used in the db
 * @return array|false : This array is the return of the query datas
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
 * @brief : This function is designed to connect php to the db
 * @return PDO|null : This return is for enable connection for PHP
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

/**
 * @brief : This function is designed to execute query for insert datas in db
 * @param $registerQuery : This var is for the query to execute in the db
 */
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

/**
 * @brief : This function is designed to delete datas in the db
 * @param $deleteQuery : This var is for delete the datas in the db
 */
function executeQueryDelete($deleteQuery)
{

    $dbConnection = openDBConnection();
    if ($dbConnection != NULL)
    {
        $statement = $dbConnection->prepare($deleteQuery); // Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); // prepare results for client
    }
    $dbConnection = NULL; // close connection to the dataBase for the security

}

/**
 * @brief : This fucntion is designed to update datas in the db
 * @param $updateQuery : This var contains the query to execute in db
 */
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