<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::all());
    }

    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @param $partialName
     * @return PersonResourceCollection
     */
    public function byName($partialName): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::where('name', 'like', '%' . $partialName . '%')->paginate());
    }

    /**
     * @param $amount
     * @return PersonResourceCollection
     */
    public function perpage($amount): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate($amount));
    }

    /**
     * @param PersonRequest $request
     * @return PersonResource
     */
    public function store(PersonRequest $request): PersonResource
    {
        $person = Person::create($request->all());

        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @param PersonRequest $request
     * @return PersonResource
     */
    public function update(Person $person, PersonRequest $request): PersonResource
    {
        $person->update($request->all());

        return new PersonResource($person);
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json();
    }
}
