<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/BaseModel.php';

class Popularity extends BaseModel {
    public $driver_id;
    public $rating;
    public $vote_count;
}
?>
