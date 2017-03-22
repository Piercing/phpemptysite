<?php

    class Response {
        var $totalRows;
        var $error;
        var $data;

        // constructor
        function __construct($data) {
            //$this->totalRows = $data.count;
            $this->error = "";
            $this->data = $data;
        }

        // destructor
        function __destruct() {}

        function getJSON() {
            //$jsonArray = array('totalRows' => $this->totalRows);
            //$jsonArray = array("totalRows" => 0);
            $jsonArray = array();
            // array_push($jsonArray, 'error' => $this->error);
            // array_push($jsonArray, 'data' => $this->data);
            //header('Content-Type: application/json');
            // return json_encode($jsonArray);
            return json_encode($jsonArray);
        }
    }

?>