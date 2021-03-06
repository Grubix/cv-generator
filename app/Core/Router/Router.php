<?php 

namespace App\Core\Router;

use \App\Core\Http\Response;
use \App\Core\Controller;
use BadMethodCallException;

class Router {

    private RouteCollection $routes;

    private Route $route;

    private array $parameters;

    public function __construct(RouteCollection $routes) {
        $this->routes = $routes;
    }

    public function run($url) {
        if($this->matches($url)) {
            $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);

            if(!array_key_exists($requestMethod, $this->route->getMethods())) {
                http_response_code(404);
                exit;
            }

            $methodSettings = $this->route->getMethods()[$requestMethod];
            $controllerClass = $methodSettings['controller'];
            $controllerAction = $methodSettings['action'];

            $this->processController($controllerClass, $controllerAction);
        } else {
            http_response_code(404);
            exit;
        }
    }

    private function matches($url) {
        foreach($this->routes->getAll() as $route) {
            if($parameters = $route->matches($url)) {
                $this->route = $route;
                $this->parameters = array_filter($parameters, function($key) { 
                    return is_string($key);
                });

                return true;
            }
        }

        return false;
    }

    private function processController($class, $action) {
        if(class_exists($class, true)) {
            $controller = new $class();

            if(!($controller instanceof Controller)) {
                throw new \Exception('Controller must be an instance of \App\Core\Controller class');
            }

            $reflectionMethod = new \ReflectionMethod($controller, $action);
            $givenParameters = $this->parameters;
            $sortedParameters = array_map(function($param) use ($givenParameters) {
                $name = $param->getName();
                
                if(array_key_exists($name, $givenParameters)) {
                    return $givenParameters[$name];
                } else {
                    if($param->isOptional()) {
                        return $param->getDefaultValue();
                    } else {
                        throw new BadMethodCallException("Argument '$name' is mandatory");
                    }
                }
            }, $reflectionMethod->getParameters());

            $controller->before($action);
            $result = $reflectionMethod->invokeArgs($controller, $sortedParameters);

            if($result instanceof Response) {
                $result->send();
            }
        } else {
            throw new \Exception("Controller class '$class' does not exist");
        }
    }

    public function getRoutes() : RouteCollection {
        return $this->routes;
    }

    public function getRoute() : Route { 
        return $this->route;
    }
    
}