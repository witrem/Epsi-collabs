<?php

class Article {

    private $id;
    private $title;
    private $description;
    private $create_date;
    private $images_url = array();

    public function __construct($title, $description, $img_array) {

        $this->title = $title;
        $this->description = $description;
        $this->images_url = $img_array;

    }

    public function print_this() {

        echo "
            <div class='card small article'>
                <div class='card-image'>
                    <img src='" . $this->images_url[0] . "'>
                </div>
                <div class='card-content'>
                    <span class='card-title'>" . $this->title . "</span>
                    <p>" . $this->description . "</p>
                </div>
            </div>
        ";

    }

};