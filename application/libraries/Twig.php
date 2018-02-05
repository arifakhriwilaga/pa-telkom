<?php

class Twig
{

	private $twig;

	public function render($path, $filename, $vars = array(), $return = false)
	{
		$loader = new \Twig_Loader_Filesystem($path);
		$this->twig = new \Twig_Environment($loader);

		// extends twig function
		$this->extendFunctions();

		$result = $this->twig->render($filename, $vars);

		if ($result) {
			return $result;
		}

		echo $result;
	}

	public function extendFunctions()
	{
		$this->twig->addFunction(new Twig_SimpleFunction('function', array($this, 'exec_function')));
	}

	public function exec_function($function_name)
    {
        $args = func_get_args();
        array_shift($args);
        if (is_string($function_name)) {
            $function_name = trim($function_name);
        }
        return call_user_func_array($function_name, ($args));
    }
}