<?php


namespace App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

// TODO: добавить класс Route для большего ООП

class Kernel
{
    const ROUTES_FILEPATH = '/config/routes.yaml';
    const VUE_HTML_RESOURCE = '/resources/index.html';

    private $routes;

    public function __construct()
    {
        $this->routes = YAML::parseFile(getenv('PROJECT_DIR') . self::ROUTES_FILEPATH);
    }

    /**
     * @param string $requestedUrl
     * @return array|null
     */
    private function findApiRoute(string $requestedUrl)
    {
        foreach($this->routes as $route) {
            if($route['path'] === $requestedUrl ) {
                return $route;
            }
        }

        return null;
    }

    /**
     * Это будет браться из сборки
     * TODO: текущая папка resources будет вне гита(если вообще будет существовать), т.к. это вообще файлы сборки -_-
     * @return false|string
     */
    private function getVueHtmlResource()
    {
        return file_get_contents(getenv('PROJECT_DIR') . self::VUE_HTML_RESOURCE);
    }

    /**
     * @param $controllerName
     * @return mixed
     */
    private function getController($controllerName)
    {
        $controllerClassName = "App\\Controller\\$controllerName";
        if(class_exists($controllerClassName)) {
            return new $controllerClassName();
        } else {
            throw new \Exception('Не найден класс контроллера для маршрута');
        }
    }

    public function execute()
    {
        $request = Request::createFromGlobals();

        $route = $this->findApiRoute($request->getPathInfo());
        if($route) {
            $controller = $this->getController($route['controller']);
            $methodName = (string) $route['method'];
            $controller->$methodName($request);
        } else {
            echo $this->getVueHtmlResource();
        }
    }
}