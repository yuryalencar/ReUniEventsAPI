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

    /**
     * @param $category
     * @return EventResourceCollection
     */
    public function percategory($category): EventResourceCollection
    {
        return new EventResourceCollection(Event::orderBy('date', 'asc')->where('category', '=', $category)->get());
    }

    /**
     * @param $partialName
     * @return EventResourceCollection
     */
    public function byName($partialName): EventResourceCollection
    {
        return new EventResourceCollection(Event::where('name', 'like', '%' . $partialName . '%')->paginate());
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
