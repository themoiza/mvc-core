<?php

namespace TheMoiza\MvcCore\Core;

class Response{

	static function send(string $content, int $code = 200){

		http_response_code($code);

		echo $content;
	}

	static function json(array $array = [], int $code = 200){

		http_response_code($code);

		header('Content-Type: application/json;charset=utf-8');

		echo utf8_encode(json_encode($array));
	}
}