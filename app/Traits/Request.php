<?php

namespace App\Traits;

trait Request
{
        public function getJSON(){
            return  json_decode(file_get_contents('php://input'));
        }

        public function getGET($name){
            return $_GET[$name];
        }

        public function getPOST($name){
            return $_POST[$name];
        }


}