<?php 

namespace App\Http\Traits;

trait Time 
{
    public function show(Request $request, $id) {
        $business = Business::findOrFail($id);    

        $time = $business->created_at;
        $date = new \Carbon\Carbon($time);

        if ($business->duration === '1 Year') {
            $result = $date->addYear()->format('F j, Y');
        } elseif ($business->duration === '2 Years') {
            $result = $date->addYears(2)->format('F j, Y');
        } elseif ($business->duration === '3 Years') {
            $result = $date->addYears(3)->format('F j, Y');
        } elseif ($business->duration === '4 Years') {
            $result = $date->addYears(4)->format('F j, Y');
        } elseif ($business->duration === '5 Years') {
            $result = $date->addYears(5)->format('F j, Y');
        } elseif ($business->duration === '6 Years') {
            $result = $date->addYears(6)->format('F j, Y');
        } elseif ($business->duration === '7 Years') {
            $result = $date->addYears(7)->format('F j, Y');
        } elseif ($business->duration === '8 Years') {
            $result = $date->addYears(8)->format('F j, Y');
        } elseif ($business->duration === '9 Years') {
            $result = $date->addYears(9)->format('F j, Y');
        } elseif ($business->duration === '10 Years') {
            $result = $date->addYears(10)->format('F j, Y');
        }
    }
}