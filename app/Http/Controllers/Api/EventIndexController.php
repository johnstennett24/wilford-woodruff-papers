<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event = Event::query();

        $event->with([
            'media',
        ]);

        if ($request->has('date')) {
            $event = $event->where('start_at', $request->get('date'));
        }

        return response()->json($event->paginate($request->get('per_page', 100)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $event;
    }
}
