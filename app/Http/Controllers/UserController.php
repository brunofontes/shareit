<?php

namespace App\Http\Controllers;

use \Lang;
use \App\User;
use \App\Item;
use \App\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'item_id' => 'required']);
        
        $userArray = User::where('email', request('email'))->get();
        
        if (count($userArray) == 0) {
            return back()->withErrors(
                Lang::getFromJson("The e-mail address is not registered yet.")
            );
        }
        
        $item = Item::findOrFail(request('item_id'));
        if ($item->product->user_id == \Auth::id()) {
            User::findOrFail($userArray[0]->id)
                ->items()
                ->syncWithoutDetaching([request('item_id')]);
        } else {
            return back()->withErrors(
                Lang::getFromJson(
                    "You cannot add a user to a product that is not yourse."
                )
            );
        }
        return back();
    }

    /**
     * Delete the specified attachment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->validate($request, ['user_id' => 'required', 'item_id' => 'required']);
        
        $item = Item::findOrFail(request('item_id'));

        if ($item->product->user_id == \Auth::id()) {
            $returnItem = User::findOrFail(request('user_id'))
                ->items()
                ->findOrFail(request('item_id'));
            $returnItem->used_by = null;
            $returnItem->save();
            User::findOrFail(request('user_id'))
                ->items()
                ->detach([request('item_id')]);
        } else {
            return back()->withErrors(
                Lang::getFromJson(
                    "You cannot remove a user from a product that is not yourse."
                )
            );
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
