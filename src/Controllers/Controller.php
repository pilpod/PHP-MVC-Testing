<?php 

namespace App\Controllers;

use App\Core\View;

class Controller {

    public function __construct()
    {
        return $this->Index();
    }

    public function Index()
    {
        return new View('homepage', null);
    }


}

?>