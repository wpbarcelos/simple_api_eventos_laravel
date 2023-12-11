<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Invite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        $event->load('invites');
        return $event;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'name'=> 'required',
            'phone'=> 'required',
            'email'=>'required|email',
            'personal_document'=>'required|unique:invites,personal_document'
        ]);
        $event->invites()->create($data);

        return response('',Response::HTTP_CREATED)->send();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invite $invite)
    {
        $invite->delete();

        return response(['message'=>'Invite foi excluído.'],Response::HTTP_ACCEPTED);
    }
}
