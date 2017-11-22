<?php

namespace App\Http\Controllers\Frontend\User;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;

use Illuminate\Http\Request;
use Datatables;
use DB;

class PageController extends Controller
{
    public function fetchData()
    {
        $results_array = file_get_contents("https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName=BTC-ETH&tickInterval=oneMin");
        
     $json = json_decode($results_array);
     return response()->json($json->stats);
    }
    
    

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $users = DB::table('users')
            ->select(['id', 'first_name', 'last_name', 'email', 'updated_at']);
        
        
        
        return Datatables::of(User::query())->make(true);
    }
}
