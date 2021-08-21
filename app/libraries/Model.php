<?php
namespace app\libraries;

/*
 * Base Model
 * Loads the libereries
 */
class Model{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}