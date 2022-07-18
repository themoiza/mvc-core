<?php

namespace TheMoiza\MvcCore\Core;

class View{

	static function load(string $layout, string $view, array $vars = []) :string{

		$layout = file_get_contents('../App/Views/'.$layout.'.html');

		$view = file_get_contents('../App/Views/'.$view.'.html');

		$subs = [];
		foreach($vars as $var => $string){
			$subs['{$'.$var.'}'] = $string;
		}

		$view = str_replace(array_keys($subs), array_values($subs), $view);

		$result = str_replace('{body}', $view, $layout);

		return $result;
	}
}