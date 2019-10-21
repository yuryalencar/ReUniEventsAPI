<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::all());
    }

    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }


    public function byName($name): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::where('name', '=', $name)->get());
    }

    /**
     * @param $amount
     * @return PersonResourceCollection
     */
    public function perpage($amount): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate($amount));
    }
}
