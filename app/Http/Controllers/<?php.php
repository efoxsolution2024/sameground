<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Business;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class TestContoller extends Controller
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
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

    $expiredDatas = Business::selectRaw('MONTH(expired_date) as month, COUNT(*) as count')
                    ->whereYear('expired_date', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

    $labels = [];
    $dataNewAccounts = [];
    $dataExpiredAccounts = [];
    $color = ['#42f54e', '#f2072e'];


    $dataNewAccounts = array_fill(1, 12, 0);
    $dataExpiredAccounts = array_fill(1, 12, 0);
   
    foreach ($accountDatas as $accountData) {
        $dataNewAccounts[$accountData->month] = $accountData->count;
    }

    foreach ($expiredDatas as $expiredData) {
        $dataExpiredAccounts[$expiredData->month] = $expiredData->count;
    }  
    
    // Populate labels array
    for ($i = 1; $i <= 12; $i++) {
        $month = date('F', mktime(0, 0, 0, $i, 1));
        array_push($labels, $month);
    }

    // Prepare datasets for chart
    $datasets = [
        [
            'label' => 'New Accounts',
            'data' => array_values($dataNewAccounts), // Convert associative array to indexed array
            'backgroundColor' => $color[0],
        ],
        [
            'label' => 'Expired Accounts',
            'data' => array_values($dataExpiredAccounts), // Convert associative array to indexed array
            'backgroundColor' => $color[1],
        ]
    ];

    return view('navigation.index', [
        'labels' => $labels,
        'datasets' => $datasets,
        'expiredLists' => $expiredLists,
    ]);
}

}
