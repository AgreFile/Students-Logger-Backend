<?php
class StudentFile
{
    private $dbFile;
    private $dbArray;

    function __construct(string $filepath){
        fclose(fopen($filepath,"a")); // iba aby sa vytvoril ak by neexistoval

        $this->dbArray = json_decode(file_get_contents($filepath), true);
        $this->dbFile = fopen($filepath,"w");
    }

    function createNewRecord($recordName){
        $late = (int) date("H") > 7;
        $this->dbArray[$recordName]["logs"][] = array(date("d-m-y H:i:s"),$late);
    }

    function __destruct(){
        fwrite($this->dbFile, json_encode($this->dbArray));
        fclose($this->dbFile);
    }
}