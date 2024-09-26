<?php

namespace Core;

class Request
{
	public function method()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	public function getPath()
	{
		if ($_SERVER['REQUEST_URI']  === '/')  return '/';

		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	}
}