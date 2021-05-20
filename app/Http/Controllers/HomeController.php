<?php

namespace App\Http\Controllers;

use \App\User;

class HomeController extends Controller
{
    protected $activeUsers = [];

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::loggedIn()->items()->with('users')->get();

        $numberOfUsedItems = 0;
        foreach ($items as $item) {
            if (isset($item->used_by)) {
                $numberOfUsedItems++;
            }
            $this->getUsername($item->users, $item->used_by);
            $this->getUsername($item->users, $item->waiting_user_id);
        }

        $products = $items
            ->sortBy('product.name', SORT_NATURAL | SORT_FLAG_CASE)
            ->groupBy('product.name');

        return view(
            'home',
            ['products' => $products, 'users' => $this->activeUsers, 'usedItems' => $numberOfUsedItems]
        );
    }

    /**
     * Get the username from an specified user id.
     *
     * @param object $itemUsers Array with IDs and usernames
     * @param int    $id        The user id to search for
     *
     * @return void
     */
    protected function getUsername(\Illuminate\Database\Eloquent\Collection $itemUsers, ?int $id)
    {
        if ($id && !isset($this->activeUsers[$id])) {
            $this->activeUsers[$id] = $this->findName($itemUsers, $id);
        }
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
}
