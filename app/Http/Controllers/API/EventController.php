<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request()->get('perPage');
        return Event::simplePaginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:200|unique:events',
            'description' => 'required',
            'start_at' => 'required|date',
            'price' => 'required|min:0|numeric',
            'image' => 'required|image:png,jpeg'
        ]);

        $imageName = str($request->name)->slug() . '.' . $request->file('image')->getClientOriginalExtension();

        $image = request()->file('image')->storeAs('events', $imageName);

        $event = new Event();
        $event->fill($data);
        $event->image = $image;
        $event->save();

        return response('', Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|max:200|unique:events,name,' . $event->id,
            'description' => 'required',
            'start_at' => 'required|date',
            'price' => 'required|min:0|numeric',
            'image' => 'image:png,jpeg'
        ]);

        $event->fill($data);
        $event->save();

        return response('', Response::HTTP_ACCEPTED);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response('', Response::HTTP_OK);
    }

    public function uploadImage(Request $request, Event $event)
    {
        $request->validate([
            'image' => ['required', 'image:png,jpeg,jpg']
        ]);

        $filename = str($event->name)->slug() . '.' . $request->file('image')->getClientOriginalExtension();

        if (!empty($event->image)) {
            Storage::delete($event->image);
        }

        $event->image = request()->file('image')->storeAs('events', $filename);

        $event->save();

        return response('', Response::HTTP_OK);

    }

}
