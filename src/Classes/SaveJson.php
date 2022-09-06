<?php

namespace Classes;


class SaveJson
{

  protected $con;

  public function savingJson($username, $password, $json)
  {

    //connect to mysql db
    $con = mysqli_connect("localhost", $username, $password, "mtc"); //or die('Could not connect: ' . mysqli_error($con));
    //connect to database
    mysqli_select_db($con, "mtc");
    // Check connection
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }


    //convert json object to php associative array
    $data = json_decode($json, true);



    // sql to create table
  //   $new_table = "CREATE TABLE MyData (
  // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  // uuid VARCHAR(30) NOT NULL,
  // county VARCHAR(30) NOT NULL,
  // country VARCHAR(50),
  // reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  // )";
    $new_json_table = "CREATE TABLE MyJsonData (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tags JSON DEFAULT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
    if ($con->query($new_json_table) === TRUE) {
      echo "Table MyJsonData created successfully";
    } else {
      echo "Error creating table: " . $con->error;
    }
    //insert into mysql table
    //$sql = "INSERT INTO MyData (uuid, county, country)  VALUES ($uuid , $county, $country)";
    // $sql = "INSERT INTO first_1 (uuid, county, country)
    // VALUES (1, 'Cardinal', 'Tom B. Erichsen', 'Skagen 21')";
    foreach ($data as $value) {
      $json_data = trim(json_encode($value), '[');
      $json_data = trim(json_encode($json_data), ']');
      $sql_json = "INSERT INTO MyJsonData (tags)  VALUES ($json_data)";
      if (!mysqli_query($con, "INSERT INTO MyJsonData (tags)  VALUES ($json_data)")) {
        die('Error : ' . mysqli_error($con));
      }
    }

    return "Table MyJsonData created successfully";
  }
}
