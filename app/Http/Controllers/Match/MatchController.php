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
     * Get all matches.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $response = \Spreadsheet::get();
        Log::debug('Request Match::Controller.', $response);
        return response()->json($response, $response['error'] ? 400: 200);
    }
    
    /**
     * Show single match.
     *
     * @return Response
     */
    public function show(Request $request)
    {
        $response = \Spreadsheet::list();
        Log::debug('Request Match::Controller.', $response);
        return response()->json($response, $response['error'] ? 400: 200);
    }
}
