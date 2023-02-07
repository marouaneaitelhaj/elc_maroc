<?php
class app
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        if (isset($_GET['url'])) {
            $arr = $this->parseUrl();
            if (file_exists('../app/controllers/' . $arr[0] . '.php')) {
                $this->controller = $arr[0];
                unset($arr[0]);
                require_once('../app/controllers/' . $this->controller . '.php');
                $this->controller = new $this->controller;
                if (isset($arr[1])) {
                    if (method_exists($this->controller, $arr[1])) {
                        $this->method = $arr[1];
                        unset($arr[1]);
                        $this->params = $arr ? array_values($arr) : [];
                        call_user_func([$this->controller, $this->method], $this->params, $this->params);
                        unset($arr);
                    }
                } 
            }
        } else{
            unset($arr[0]);
            $this->controller = 'home';
            require_once('../app/controllers/home.php');
            $this->controller = new $this->controller;
        }
    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            //return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            // echo $_GET['url'];
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
