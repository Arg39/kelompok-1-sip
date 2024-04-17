<?php
class Controller
{
    protected $flash;

    public function __construct() {
        $this->flash = new Flash();
    }
    
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
