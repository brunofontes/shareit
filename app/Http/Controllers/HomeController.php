<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a name from a specific id in a array
     * 
     * @param array $array The array of objects with ID and Names
     * @param int   $id    The ID of the user
     * 
     * @return string The username of the specified id
     */
    protected function findName($array, $id)
    {
        foreach ($array as $object) {
            if ($object->id == $id) {
                return $object->name;
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];
        $items = User::find(\Auth::id())->items()->with('users')->get();

        foreach ($items as $item) {
            if ($item->used_by && !isset($users[$item->used_by])) {
                $users[$item->used_by] = $this->findName($item->users, $item->used_by);
            }

            if ($item->waiting_user_id && !isset($users[$item->waiting_user_id])) {
                $users[$item->waiting_user_id] = $this->findName($item, $item->waiting_user_id);
            }
        }
        return view('home', compact('items', 'users'));
    }
}
