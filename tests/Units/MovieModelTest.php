<?php

namespace Tests;

use App\Database\DbConnection;
use App\Models\MovieModel;
use PHPUnit\Framework\TestCase;

class MovieModelTest extends TestCase {

    private function initDb()
    {
        $database = new DbConnection();
    }

    public function test_can_create_movie()
    {
        $movieData = [
            "title" => "Shazam",
            "description" => "Lorem ipsum dolor sit amet.",
            "img" => "imagen.jpg"
        ];

        $movie = new MovieModel($movieData['title'], $movieData['description'], $movieData['img']);

        $movieName = $movie->getTitle();
        $movieImg = $movie->getImg();

        $this->assertEquals('Shazam', $movieName);
        $this->assertEquals('imagen.jpg', $movieImg);
    }

}