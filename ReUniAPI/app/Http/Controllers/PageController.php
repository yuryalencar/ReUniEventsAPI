<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Resources\PageResource;
use App\Http\Resources\PageResourceCollection;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Page;
use App\Person;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @return PageResourceCollection
     */
    public function index(): PageResourceCollection
    {
        return new PageResourceCollection(Page::all());
    }

    /**
     * @param Page $page
     * @return PageResource
     */
    public function show(Page $page): PageResource
    {
        return new PageResource($page);
    }

    /**
     * @param $partialName
     * @return PageResourceCollection
     */
    public function byName($partialName): PageResourceCollection
    {
        return new PageResourceCollection(Page::where('slug_of_the_page', 'like', '%' . $partialName . '%')->paginate());
    }

    /**
     * @param $fullPersonName
     * @return PageResourceCollection
     */
    public function byPersonName($fullPersonName): PageResourceCollection
    {
        return new PageResourceCollection(Person::where('name', 'like', '%' . $fullPersonName . '%')->first()->pages()->paginate());
    }

    /**
     * @param $idPage
     * @return PersonResource
     */
    public function mainThePage($idPage): PersonResource
    {
        return new PersonResource(Page::findOrFail($idPage)->person);
    }

    /**
     * @param $idPerson
     * @return PageResourceCollection
     */
    public function bySpecificPerson($idPerson): PageResourceCollection
    {
        return new PageResourceCollection(Person::find($idPerson)->pages()->paginate());
    }

    /**
     * @param $amount
     * @return PageResourceCollection
     */
    public function perpage($amount): PageResourceCollection
    {
        return new PageResourceCollection(Page::paginate($amount));
    }

    /**
     * @param PageRequest $request
     * @return PageResource
     */
    public function store(PageRequest $request): PageResource
    {
        $page = Page::create($request->all());

        return new PageResource($page);
    }

    /**
     * @param Page $page
     * @param PageRequest $request
     * @return PageResource
     */
    public function update(Page $page, PageRequest $request): PageResource
    {
        $page->update($request->all());

        return new PageResource($page);
    }


    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json();
    }

}
