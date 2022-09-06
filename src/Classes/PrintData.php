<?php

namespace Classes;

class printData
{

    protected $country_code = null;

    public function printingData()
    {
        $con = mysqli_connect("localhost", 'root', 'bynbnf', 'mtc');

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $query = "SELECT * FROM MyJsonData";

        $result = mysqli_query($con, $query);

        $rows = array();
        while ($r = mysqli_fetch_array($result)) {
            $rows[] = $r;
        }
        echo "<pre>";
        echo json_encode($rows, JSON_PRETTY_PRINT);
        echo "<pre>";

        mysqli_close($con);


        return;
    }
    
}
