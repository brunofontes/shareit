<?php

namespace App\Http\Controllers;

use \App\User;

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
     * Check if the user_id alreay exists on $users array.
     *
     * @param array $users   The array with users
     * @param int   $user_id The user_id to try to find on array
     *
     * @return boolean
     */
    public function isNewUser($users, $user_id)
    {
        return ($user_id && !isset($users[$user_id]));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];
        $items = User::loggedIn()->items()->with('users')->get();

        foreach ($items as $item) {
            if ($this->isNewUser($users, $item->used_by)) {
                $users[$item->used_by] = $this->findName($item->users, $item->used_by);
            }

            if ($this->isNewUser($users, $item->waiting_user_id)) {
                $users[$item->waiting_user_id] = $this->findName($item->users, $item->waiting_user_id);
            }
        }

        $products = $items->sortBy('product.name', SORT_NATURAL | SORT_FLAG_CASE)->groupBy('product.name');
        return view('home', compact('products', 'users'));
    }
}
