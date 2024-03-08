<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        // Parse URL
        $url = $this->parseURL();

        // Setup Controller
        if (!empty($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Setup Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Setup Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Run Controller & Method, and send params if exist
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Make a method to parse the URL with Filter Sanitize URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
