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


    $newAccountNames = Business::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', '<=', 6)
        ->orderBy('created_at')
        ->paginate(12);

  

    $expiredAccountNames = Business::whereYear('expired_date', $currentYear)
                        ->whereMonth('expired_date', '<=', 6)
                        ->orderBy('expired_date')
                        ->paginate(12);
       

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

    $totalAll = array_sum($dataNewAccounts) + array_sum($dataExpiredAccounts);

    $newAccounts = [
        'data' => array_values($dataNewAccounts) 
    ];

    $expiredAccount = [
        'data' => array_values($dataExpiredAccounts) 
    ];



    //Next Month
            $accountDatasNext = Business::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', '>=', 7)
                ->groupBy('month')
                ->orderBy('month')
                ->get();


            $expiredDatasNext = Business::selectRaw('MONTH(expired_date) as month, COUNT(*) as count')
                ->whereYear('expired_date', $currentYear)
                ->whereMonth('expired_date', '>=', 7)
                ->groupBy('month')
                ->orderBy('month')
                ->get();


            $newAccountNamesNext = Business::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', '>=', 7)
                ->orderBy('created_at')
                ->paginate(12);



            $expiredAccountNamesNext = Business::whereYear('expired_date', $currentYear)
                                ->whereMonth('expired_date', '>=', 7)
                                ->orderBy('expired_date')
                                ->paginate(12);
            

            $labelsNext = [];
            $dataNewAccountsNext = array_fill(0, 6, 0); 
            $dataExpiredAccountsNext = array_fill(0, 6, 0); 
            $color = ['#42f54e', '#f2072e'];


            foreach ($accountDatasNext as $accountData) {
                $dataNewAccountsNext[$accountData->month - 7] = $accountData->count; 
            }

            foreach ($expiredDatasNext as $expiredData) {
                $dataExpiredAccountsNext[$expiredData->month - 7] = $expiredData->count; 
            }


            for ($i = 7; $i <= 12; $i++) {
                $month = date('F', mktime(0, 0, 0, $i, 1));
                array_push($labelsNext, $month);
            }

            $totalAllNext = array_sum($dataNewAccountsNext) + array_sum($dataExpiredAccountsNext);

            $newAccountsNext = [
                'data' => array_values($dataNewAccountsNext) 
            ];

            $expiredAccountNext = [
                'data' => array_values($dataExpiredAccountsNext) 
            ];

       


    return view('navigation.index', [
        'labels' => $labels,
        'labelsNext' => $labelsNext,
        'expiredLists' => $expiredLists,
        'newAccounts' => $newAccounts,
        'expiredAccount' => $expiredAccount,
        'firstquarterNew' => array_sum($dataNewAccounts),
        'firstquarterNewNext' => array_sum($dataNewAccountsNext),
        'firstquarterExpiredNext' => array_sum($dataExpiredAccountsNext),
        'firstquarterExpired' => array_sum($dataExpiredAccounts),
        'newAccountNames' => $newAccountNames,
        'expiredAccountNames' => $expiredAccountNames,
        'totalAll' => $totalAll,
        'totalAllNext' => $totalAllNext,
        'newAccountsNext' => $newAccountsNext,
        'expiredAccountNext' => $expiredAccountNext,
    ]);

}

}
