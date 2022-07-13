<?php

namespace TheMoiza\MvcCore\Core;

class View{

	static function load(string $view, array $vars = []) :string{

		$view = file_get_contents('../App/Views/'.$view.'.html');

		$subs = [];
		foreach($vars as $var => $string){
			$subs['{$'.$var.'}'] = $string;
		}

		$view = str_replace(array_keys($subs), array_values($subs), $view);

		return $view;
	}
}