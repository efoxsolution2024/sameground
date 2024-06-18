<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller
{

    public function index() {
        $data = Business::all();
        $roles = Role::all();
        $tasks = Task::all();


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
    
        $users = User::where('id', '!=', auth()->id())->get();
    
        $dateToday = Carbon::today();
        $dateAccount = Business::whereDate('created_at', $dateToday)->count();
        $dayOfWeek = $dateToday->format('D');
        
    
        // To match the expire date
        $expiredTodayCount = 0;
        $expiredTodayData = [];
    
        foreach ($data as $business) {
            $createdAt = $business->created_at;
            $date = new Carbon($createdAt);
    
            // Determine the expiration date based on the duration
            switch ($business->duration) {
                case '1 Year':
                    $expirationDate = $date->addYear();
                    break;
                case '2 Years':
                    $expirationDate = $date->addYears(2);
                    break;
                case '3 Years':
                    $expirationDate = $date->addYears(3);
                    break;
                case '4 Years':
                    $expirationDate = $date->addYears(4);
                    break;
                case '5 Years':
                    $expirationDate = $date->addYears(5);
                    break;
                case '6 Years':
                    $expirationDate = $date->addYears(6);
                    break;
                case '7 Years':
                    $expirationDate = $date->addYears(7);
                    break;
                case '8 Years':
                    $expirationDate = $date->addYears(8);
                    break;
                case '9 Years':
                    $expirationDate = $date->addYears(9);
                    break;
                case '10 Years':
                    $expirationDate = $date->addYears(10);
                    break;
                default:
                    $expirationDate = null;
                    break;
            }
    
            // Check if the expiration date is today
            if ($expirationDate && $expirationDate->isSameDay($dateToday)) {
                $expiredTodayCount++;      
                $expiredTodayData[] = $business;          
            }
        }
    
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
            'dateAccount' => $dateAccount,
            'dayOfWeek' => $dayOfWeek,
            'expiredTodayCount' => $expiredTodayCount,
            'expiredTodayData' => $expiredTodayData,
            'wrBLP' => $wrBLP,
            'roles' => $roles,
            'tasks' => $tasks,
        ]);
    }
}
