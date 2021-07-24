<?php 

namespace App\Controllers;

use App\Core\View;
use App\Models\MovieModel;

class Controller {

    public function __construct()
    {
        // print_r($_REQUEST);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['action'] = 'add-movie') {
            $data = $_POST;
            return $this->Save($data);
        }

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

    public function Save(array $data)
    {
        $movie = new MovieModel($data['title'], $data['description'], $data['img'], null);
        $result = $movie->save();
        $this->Index();
    }


}

?>