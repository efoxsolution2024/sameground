<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Business;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
{

    $currentYear = Carbon::now()->year;
    $currentMonth = Carbon::now()->month;

    $expiredLists = DB::table('businesses')
                        ->select('expired_date', 'website')
                        ->whereYear('expired_date', $currentYear)
                        ->whereMonth('expired_date', $currentMonth)
                        ->get();

    $accountDatas = Business::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', '<=', 6)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();   
  
    $expiredDatas = Business::selectRaw('MONTH(expired_date) as month, COUNT(*) as count')
                        ->whereYear('expired_date', $currentYear)
                        ->whereMonth('expired_date', '<=', 6)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();
                        
    $labels = [];
    $dataNewAccounts = array_fill(0, 6, 0); 
    $dataExpiredAccounts = array_fill(0, 6, 0); 
    $color = ['#42f54e', '#f2072e'];

    foreach ($accountDatas as $accountData) {
        $dataNewAccounts[$accountData->month - 1] = $accountData->count; 
    }

    foreach ($expiredDatas as $expiredData) {
        $dataExpiredAccounts[$expiredData->month - 1] = $expiredData->count;
    }

    for ($i = 1; $i <= 6; $i++) {
        $month = date('F', mktime(0, 0, 0, $i, 1));
        array_push($labels, $month);
    }  

    $newAccounts = [
        'data' => array_values($dataNewAccounts) 
    ];

    $expiredAccount = [
        'data' => array_values($dataExpiredAccounts) 
    ];

    return view('navigation.index', [
        'labels' => $labels,
        'expiredLists' => $expiredLists,
        'newAccounts' => $newAccounts,
        'expiredAccount' => $expiredAccount,
        'firstquarterNew' => array_sum($dataNewAccounts),
        'firstquarterExpired' => array_sum($dataExpiredAccounts),
    ]);
}

}
