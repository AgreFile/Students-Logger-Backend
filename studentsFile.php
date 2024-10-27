<?php
class StudentFile
{
    private $PDOconnection;

    function __construct(string $filepath){
        try {
            $this->PDOconnection = new PDO("mysql:host=127.0.0.1:3306;dbname=students", "root", "root");
            $this->PDOconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    function createNewRecord($recordName){
        $late = (int) date("H") > 7;
        try {
            $queryName = "INSERT IGNORE INTO students (student_name) VALUES (?);";
            $queryDate = "INSERT INTO checkouts (student_name, is_late) VALUES (?, ?);";

            $statementName = $this->PDOconnection->prepare($queryName);
            $statementDate = $this->PDOconnection->prepare($queryDate);
            $statementName->execute([$recordName]);
            $statementDate->execute([$recordName,$late]);
        } catch (PDOException $e) {
            die("". $e->getMessage());
        }
    }

    function __destruct(){
        $this->PDOconnection = null;
    }
}