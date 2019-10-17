<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResourceCollection;
use Illuminate\Http\Request;
use App\Event;
use App\Http\Resources\EventResource;

class EventController extends Controller
{

    /**
     * @return EventResourceCollection
     */
    public function index(): EventResourceCollection
    {
        return new EventResourceCollection(Event::orderBy('date', 'asc')->get());
    }

    /**
     * @param $amount
     * @return EventResourceCollection
     */
    public function perpage($amount): EventResourceCollection
    {
        return new EventResourceCollection(Event::orderBy('date', 'asc')->paginate($amount));
    }

    public function percategory($category): EventResourceCollection
    {
        return new EventResourceCollection(Event::orderBy('date', 'asc')->where('category', '=', $category)->get());
    }

    /**
     * @param Event $event
     * @return EventResource
     */
    public function show(Event $event): EventResource
    {
        return new EventResource($event);
    }
}
