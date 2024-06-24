<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function index() {
        $data = Business::all();
        $roles = Role::all();
        $tasks = Task::all();
   

        $currentDate = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $today = Carbon::now();
        $last7Days = Carbon::now()->subWeek()->startOfWeek(Carbon::SUNDAY);
        $expiredData = [];
        $newData = [];
        $newData7 = [];
        $expiredData7 = [];
        
        for ($i = 0; $i < 7; $i++) {
            $formattedDate = $currentDate->format('F j'); 
            $formatted7Date = $last7Days->format('F j'); 

            $expiredAccount = Business::whereDate('expired_date', $currentDate->toDateString())->count();
            $expiredAccountToday = Business::whereDate('expired_date', $today->toDateString())->get();
            $newAccount = Business::whereDate('created_at', $currentDate->toDateString())->count();  
           
            $expiredAccount7 = Business::whereDate('expired_date', $last7Days->toDateString())->count();
            $newAccount7 = Business::whereDate('created_at', $last7Days->toDateString())->count();  

            $expiredData[] = [
                'x' => $formattedDate,
                'y' => $expiredAccount,
            ];           
      
            
            $expiredData7[] = [
                'x' => $formatted7Date,
                'y' => $expiredAccount7,
            ];  
            

            $newData[] = [
                'x' => $formattedDate,
                'y' => $newAccount,
            ];    
            $newData7[] = [
                'x' => $formatted7Date,
                'y' => $newAccount7,
            ];   
            
            $currentDate->addDay();
            $last7Days->addDay();
        }    

        // second Graph
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
    
        foreach ($expiredDatas as $expiredDatass) {
            $dataExpiredAccounts[$expiredDatass->month - 1] = $expiredDatass->count; 
        }
    
    
        for ($i = 1; $i <= 6; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            array_push($labels, $month);
        }
    
        $totalAll = array_sum($dataNewAccounts) + array_sum($dataExpiredAccounts);
    
        $newAccounts = [
            'data' => array_values($dataNewAccounts) 
        ];
    
        $expiredAccountmonth = [
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
    
                foreach ($expiredDatasNext as $expiredDatas) {
                    $dataExpiredAccountsNext[$expiredDatas->month - 7] = $expiredDatas->count; 
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
    

       
     
        $dataCount = $data->count();
        $activeCount = $data->where('is_active', true)->count();
        $inactiveCount = $data->where('is_active', false)->count();
        $writersCount = $data->where('business', 'Writer\'s Republic')->count();
        $newlinkCount = $data->where('business', 'NewLink Media')->count();
        $miltonCount = $data->where('business', 'Milton & Hugo')->count();
        $efoxCount = $data->where('themes', 'EFOX Themes')->count();
        $diviCount = $data->where('themes', 'D.I.V.I')->count();
        $sixteenCount = $data->where('themes', 'Twenty Sixteen Themes')->count();
        $wVersion = $data->where('wp_version', '6.5.3')->count();
        $wrBLP = $data->where('business', "Writer's Republic (BLP)")->count();

        // Role
        $tasks = Auth::user()->tasks()->with('user')->get();
    
        $users = User::where('id', '!=', auth()->id())->get();  
       
        return view('dashboard', [
            'data' => $data,
            'activeCount' => $activeCount,
            'inactiveCount' => $inactiveCount,
            'dataCount' => $dataCount,
            'writersCount' => $writersCount,
            'newlinkCount' => $newlinkCount,
            'miltonCount' => $miltonCount,
            'efoxCount' => $efoxCount,
            'diviCount' => $diviCount,
            'sixteenCount' => $sixteenCount,
            'wVersion' => $wVersion,
            'users' => $users,
            'wrBLP' => $wrBLP,
            'roles' => $roles,
            'tasks' => $tasks,        
            'expiredData' => $expiredData,
            'expiredAccount' => $expiredAccount,
            'newData' => $newData,
            'newData7' => $newData7,
            'expiredData7' => $expiredData7,    
            'labels' => $labels,
            'labelsNext' => $labelsNext,
            'expiredLists' => $expiredLists,
            'newAccounts' => $newAccounts,
            'expiredAccountmonth' => $expiredAccountmonth,
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
            'expiredAccountToday' => $expiredAccountToday,         
         
        ]);
    }
}
