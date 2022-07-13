<?php

namespace Core;

class Router{

	public static $currentURI;

	public static $routes = [];

	static function init(){

		self::$currentURI = '/';

		$REQUEST_URI = explode('?', $_SERVER['REQUEST_URI'] ?? '/');
		$REQUEST_URI = $REQUEST_URI[0] ?? '/';

		if(isset($REQUEST_URI) and !empty($REQUEST_URI)){

			self::$currentURI = $REQUEST_URI;
		}

		foreach(self::$routes as $route => $params){

			if(self::$currentURI == $route){

				$className = $params['class'];
				$action = $params['action'];

				// SECURITY
				$className = str_replace('../', '', $className);
				$action = str_replace('../', '', $action);

				$class = new $className;
				$class->$action();

				break;
			}
		}
	}

	static function get($uri, $class, $action){

		// SECURITY
		$uri = str_replace('../', '', $uri);

		self::$routes[$uri] = [
			'class' => $class,
			'action' => $action
		];
	}

	static function post($uri, $class, $action){

		// SECURITY
		$uri = str_replace('../', '', $uri);

		self::$routes[$uri] = [
			'class' => $class,
			'action' => $action
		];
	}
}