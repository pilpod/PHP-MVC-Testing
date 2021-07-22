<?php 

namespace App\Controllers;

use App\Core\View;
use App\Models\MovieModel;

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
        $movies = MovieModel::getAll();
        return new View('homepage', $movies);
    }

    public function Create()
    {
        return new View('add-movie', null);
    }


}

?>