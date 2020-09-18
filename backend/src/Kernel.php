<?php


namespace App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Config\FileLocator;


class Kernel
{
    const CONFIG_DIR = '/config/';
    const ROUTES_FILENAME = 'routes.yaml';

    /**
     * @var RouteCollection
     */
    private $routes;

    public function __construct()
    {
        $this->getRoutes();
    }

    private function getRoutes()
    {
        $fileLocator = new FileLocator(getenv('PROJECT_DIR') . self::CONFIG_DIR);
        $yamlLoader = new YamlFileLoader($fileLocator);
        $this->routes = $yamlLoader->load(self::ROUTES_FILENAME);

        if(!$this->routes) {
            throw new \Exception('Не удалось загрузить маршруты, проверь файл' . self::CONFIG_DIR . self::ROUTES_FILENAME);
        }
    }

    public function execute()
    {
        $request = Request::createFromGlobals();

        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);
        $route = $matcher->match($request->getPathInfo());

        // Принимает $_POST, определяет uri, определяет метод(method) и направляет в соотвествующий метод.
        // Соответствие методов и исполняемых классов - в yaml.
    }
}