<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function index() {
        $data = Business::all();
        $roles = Role::all();
        $tasks = Task::all();



   

        $currentDate = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $last7Days = Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY);
        $expiredData = [];
        $newData = [];
        $newData7 = [];
        $expiredData7 = [];
        
        for ($i = 0; $i < 7; $i++) {
            $formattedDate = $currentDate->format('F j'); 
            $formatted7Date = $last7Days->format('F j'); 

            $expiredAccount = Business::whereDate('expired_date', $currentDate->toDateString())->count();
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
          
         
        ]);
    }
}
