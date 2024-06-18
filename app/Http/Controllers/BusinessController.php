<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class BusinessController extends Controller
{
 

    public function index(Request $request) {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $status = $request->get('status');
    
            $data = Business::query();
    
            if ($query != '') {
                $data->where(function($q) use ($query) {
                    $q->where('website', 'like', '%' . $query . '%')
                      ->orWhere('author_name', 'like', '%' . $query . '%');
                });
            }
    
            $status = $_GET['status'] ?? ''; // Assume you are getting the status from a GET request

            if ($status !== null && $status !== '') {
                // Check if status is priority and handle it separately
                if ($status === 'priority') {
                    $data->where('priority', 1);
                } else if ($status === 'active' || $status === 'inactive') {
                    $isActive = ($status === 'active') ? 1 : 0;
                    $data->where('is_active', $isActive);
                } else {
                    $data->where(function ($query) use ($status) {
                        $query->where('business', $status)
                              ->orWhere('wp_version', $status)
                              ->orWhere('duration', $status);
                    });
                }      
            }
    
            $data = $data->orderBy('id', 'desc')->get();
            return response()->json($data);
        }

        $data = Business::all();
    
        // For non-Ajax requests, return view or redirect
        return view('navigation.business.index', [
            'data' => $data,
        ]);
    }
    

 
    public function create(){
        return view('navigation.business.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'website' => ['required', 'min:5'],
            'author_name' => ['required', 'min:5'],
            'business' => ['required', 'min:5'],
            'themes' => ['required', 'min:5'],
            'wp_version' => 'required',
            'admin_login_link' => ['required', 'min:8'],
            'duration' => ['required'],
            'admin_username' => 'required',
            'admin_password' => 'required',
            'auth_login_link' => 'required',
            'auth_username' => 'required',
            'auth_password' => 'required',
            'database_name' => 'required',
            'database_username' => 'required',
            'database_password' => 'required',
            'is_active' => 'sometimes',
            'priority' => 'sometimes',        
        ]);
    
        // Convert is_active and priority to integer
        $validate['is_active'] = $request->has('is_active') ? 1 : 0;
        $validate['priority'] = $request->has('priority') ? 1 : 0;
    
        // Calculate expired_date based on duration
        $time = Carbon::now(); // Use current time as an example
        $date = new Carbon($time);
    
        switch ($validate['duration']) {
            case '1 Year':
                $expired = $date->addYear()->format('Y-m-d');
                break;
            case '2 Years':
                $expired = $date->addYears(2)->format('Y-m-d');
                break;
            // Add cases for other durations as needed
            default:
                $expired = null;
                break;
        }
    
        // Add expired_date to $validate array
        $validate['expired_date'] = $expired;
    
        // Hash database_password
        $validate['database_password'] = Hash::make($request->database_password);
    
        // Create new Business record
        Business::create($validate);
    
        return redirect('all_business')->with('message', 'Business added successfully.');
    }

    public function edit(Request $request, $id){
        $businesses = Business::findOrFail($id);
        return view('navigation.business.edit', compact('businesses'));
    }

    public function update(Request $request, $id) {
        $business = Business::findOrFail($id);

        $business->update($request->all());
        return redirect('all_business')->with('message', 'Business updated Successfully');
    }

    public function destroy(Request $request, $id){
        $business = Business::findOrFail($id);

        $business->delete();

        return redirect('all_business')->with('message', 'Business deleted Successfully');

    }
    

    public function search(Request $request) 
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('businesses')
                    ->where('email', 'like', '%'.$query.'%')
                    ->orWhere('business', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
                    
            } else {
                $data = DB::table('businesses')
                    ->orderBy('id', 'desc')
                    ->get();
            }
        
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $response = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            return response()->json($response);
        }
    
    
        public function show(Request $request, $id) {
            $business = Business::findOrFail($id);    
        
            $time = $business->created_at;
            $date = new \Carbon\Carbon($time);
        
            switch ($business->duration) {
                case '1 Year':
                    $expired = $date->addYear()->format('Y-m-d');
                    break;
                case '2 Years':
                    $expired = $date->addYears(2)->format('Y-m-d');
                    break;
                case '3 Years':
                    $expired = $date->addYears(3)->format('Y-m-d');
                    break;
                case '4 Years':
                    $expired = $date->addYears(4)->format('Y-m-d');
                    break;
                case '5 Years':
                    $expired = $date->addYears(5)->format('Y-m-d');
                    break;
                case '6 Years':
                    $expired = $date->addYears(6)->format('Y-m-d');
                    break;
                case '7 Years':
                    $expired = $date->addYears(7)->format('Y-m-d');
                    break;
                case '8 Years':
                    $expired = $date->addYears(8)->format('Y-m-d');
                    break;
                case '9 Years':
                    $expired = $date->addYears(9)->format('Y-m-d');
                    break;
                case '10 Years':
                    $expired = $date->addYears(10)->format('Y-m-d');
                    break;
                default:
                    $expired = null;
                    break;
            }
        
            // Log the calculated expiration date and duration for debugging
            \Log::info('Business ID: ' . $business->id . ', Duration: ' . $business->duration . ', Expired Date: ' . $expired);
        
            // Save the calculated expiration date to the database
            $business->expired_date = $expired;
            $business->save();
        
            return view('navigation.business.data', compact('business', 'expired'));
        }

}
