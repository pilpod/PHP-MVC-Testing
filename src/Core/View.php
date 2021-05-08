<?php 

namespace App\Core;

class View {

    private string $path;
    private ?array $data;

    public function __construct( string $path, ?array $data)
    {
        require_once("./src/Views/${path}" . '.php');
    }

}

?>