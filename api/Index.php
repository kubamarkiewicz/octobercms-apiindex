<?php namespace KubaMarkiewicz\ApiIndex\Api;

use Illuminate\Routing\Controller;
use Input;
use DB;
use Route;
use View;

class Index extends Controller
{   

    public function index()
    {
        $currentRoute = Route::getCurrentRoute()->uri();

        $data = [
            'routes' => []
        ];

        $urlPrefix = Route::getCurrentRoute()->uri();
        $routes = Route::getRoutes();
		foreach ($routes as $route) {
			if ((strpos($route->uri(), $urlPrefix) === 0) && ($route->uri() != $currentRoute)) {
                $data['routes'][] = [
                    'method' => str_pad($route->methods[0], 4),
                    'url'    => url('/').'/'.$route->uri()
                ];
			}
		}

        return View::make('kubamarkiewicz.apiindex::api.index', $data);
    }

}