<?php

namespace App\Http\Controllers\Api;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Events;

class EventFactory //extends Controller
{
    public static function build($event, $request)
    {
        // Formatting received $event to controller name
        // example:
        // new_order => NewOrderController
        $controller = str_replace('_', '', ucwords($event, '_')) . 'Controller';
        // without this class_exists() check would fail
        $controller = __NAMESPACE__.'\Events\\'.$controller;
        if (class_exists($controller)) {
            $cont = new $controller;
            return $cont($request, $event);
        } else {
            return response()->json(['status' => 'error', 'message' => 'incorrect event ' . $event]);
        }
    }
}
