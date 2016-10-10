<?php

namespace App\Http\Controllers\Match;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Match Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles requests to fetch google spreadsheets. 
     |
     */
    
    /**
     * Get matches.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $response = \Match::list();
        Log::debug('Request Match::Controller.', $response);
        return response()->json($response, $response['error'] ? 400: 200);
    }
}
