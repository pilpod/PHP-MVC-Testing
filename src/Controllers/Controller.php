<?php 

namespace App\Controllers;

use App\Core\View;

class Controller {

    public function __construct()
    {
        print_r($_REQUEST);

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "add-movie")) {
            return $this->Create();
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "home")) {
            return $this->Index();
        }

        return $this->Index();
    }

    public function Index()
    {
        return new View('homepage', null);
    }

    public function Create()
    {
        return new View('add-movie', null);
    }


}

?>