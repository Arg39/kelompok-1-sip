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
        // Check if the request URI is set
        if (isset($_SERVER['REQUEST_URI'])) {
            // Get the path from the request URI
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            // Remove the base directory if present (e.g., /public)
            $base_dir = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
            $url = str_replace($base_dir, '', $url);
            // Remove leading and trailing slashes
            $url = trim($url, '/');
            // Sanitize the URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Explode the URL into an array
            $url = explode('/', $url);
            return $url;
        }
    }
}
