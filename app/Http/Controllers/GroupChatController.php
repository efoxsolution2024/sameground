<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupChatController extends Controller
{
    public function create(Request $request)
    {
        // Your logic to create a group chat
        // Example:
        $groupName = $request->input('group_name');
        $avatar = $request->file('avatar');


        // Redirect or return a response
        return redirect()->back()->with('success', 'Group chat created successfully.');
    }
}
