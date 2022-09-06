<?php

namespace Main;

class Main {
    
     public function getData($url) {
         $continent_data = json_decode(file_get_contents($url));
         return json_encode($continent_data->data);
     }
}
