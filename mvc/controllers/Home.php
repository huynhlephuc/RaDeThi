<?php

class Home extends Controller{

    // Controller mặc định sẽ chạy khi ko nhập controller

    function SayHi(){
        $this->View("MaterPage1",[
            "page" => "login"
        ]);
    }

}
?>