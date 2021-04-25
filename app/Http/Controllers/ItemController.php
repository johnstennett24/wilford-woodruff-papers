<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Page;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::whereNull('item_id')
                        ->with('type')
                        ->whereEnabled(1);

        if($request->has('type')){
            $items = $items->where('type_id', $request->get('type'));
        }

        if($request->has('sort')){
            $sort = explode(":", $request->get('sort'));
            $direction = ($sort[1] == 'desc'? 'DESC' : 'ASC');
            switch($sort[0]){
                case 'title':
                    $items = $items->orderBy('name', $direction);
                    break;
                default:
                    $items = $items->orderBy('added_to_collection_at', $direction);
            }
        }else{
            $items = $items->orderBy('added_to_collection_at', 'DESC');
        }

        return view('public.documents.index', [
            'types' => Type::whereNull('type_id')
                                ->withCount(['items' => function(Builder $query){
                                    $query->where('enabled', 1);
                                }])->get(),
            'items' => $items->paginate(25),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $pages = Page::where('parent_item_id', $item->id)
                        ->ordered();

        return view('public.documents.show', [
            'item' => $item,
            'pages' => $pages->paginate(20),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
