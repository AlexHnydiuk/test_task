<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Plain\NewOrder;

class NewOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate(request(), ['order' => 'bail|required|integer|digits_between:1,7']);
        \Mail::to(env('MAIL_FOR_NOTIFICATIONS'))->send(new NewOrder($request->order));
        return response()->json(['status' => 'ok', 'message' => 'order added']);
    }
}
