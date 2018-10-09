<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $event)
    {
        switch ($event) {
            case 'new_order':
                $answer = new NewOrderController;
                return $answer($request);
                break;
            
            default:
                return response()->json(['status' => 'error', 'message' => 'incorrect event']);
                break;
        }
    }
}