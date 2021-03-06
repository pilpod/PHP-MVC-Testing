<?php

namespace App\Models;

use App\Database\DbConnection;
use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\StaticMethod;

class MovieModel {

    private ?string $id;
    private string $img;
    private string $title;
    private string $description;
    private $database;

    public function __construct(string $title, string $description, string $img, ?string $id = null )
    {
        $this->id = $id;
        $this->img = $img;
        $this->title = $title;
        $this->description = $description;

        if(!$this->database) {
            $this->database = new DbConnection();
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId()
    {
        $this->id = uniqid("mov_");
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public static function getAll()
    {
        $database = new DbConnection();
        $query = $database->mysql->query('SELECT * FROM movies');
        $arrMovies = $query->fetchAll();
        $moviesList = [];

        foreach ($arrMovies as $value) {
            $movie = new self($value['title'], $value['description'], $value['img'], $value['id_movie']);
            array_push($moviesList, $movie);
        }

        return $moviesList;

    }

    public function save()
    {
        try {
            $this->setId();
            $this->database->mysql->query(
                "INSERT INTO `movies` (id_movie, title, description, img) 
                VALUES ('{$this->id}', '{$this->title}', '{$this->description}', '{$this->img}');");
        }
        catch (Exception $ex) {
            // $this->database->mysql->rollBack();
            echo 'Error: ' . $ex->getMessage();
        }

    }

    public static function delete($id)
    {
        $database = new DbConnection();
        try {
            $database->mysql->query("DELETE FROM movies WHERE id_movie='{$id}';");
        }
        catch (Exception $ex) {
            echo 'A Error Happen: ' . $ex->getMessage();
        }
    }
}