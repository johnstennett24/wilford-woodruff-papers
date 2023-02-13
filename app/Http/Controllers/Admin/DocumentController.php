<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Page;
use App\Models\Value;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.documents.index');
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
        $item = new Item();

        $item->fill($request->only([
            'name',
            'type_id',
            'pcf_unique_id_prefix',
            'manual_page_count',
        ]));

        $item->save();

        $properties = collect($request->all())->filter(function ($value, $key) {
            return str($key)->startsWith('property_');
        });

        foreach ($properties as $key => $value) {
            if (str($value)->trim()->isNotEmpty()) {
                Value::updateOrCreate([
                    'item_id' => $item->id,
                    'property_id' => str($key)->afterLast('_')->toString(),
                ], [
                    'value' => $value,
                ]);
            } elseif (str($key)->afterLast('_')->isNotEmpty()) {
                Value::query()
                    ->where('item_id', $item->id)
                    ->where('property_id', str($key)->afterLast('_')->toString())
                    ->delete();
            }
        }

        $request->session()->flash('success', 'Document created successfully!');

        return redirect()->route('admin.dashboard.document.edit', ['item' => $item->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        /*$item->load(['actions' => function($query){
            return $query->whereNotNull('actions.completed_at');
        }], ['actions.assignee' => function($query){
            return $query->whereNotNull('actions.completed_at');
        }], ['actions.finisher' => function($query){
            return $query->whereNotNull('actions.completed_at');
        }], 'activities');*/

        $item->load(['actions.assignee', 'actions.finisher', 'activities']);

        return view('admin.dashboard.documents.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $item->load([
            'values',
        ]);

        $item->loadCount([
            'pages',
        ]);

        return view('admin.dashboard.documents.edit', [
            'item' => $item,
        ]);
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
        $item->fill($request->only([
            'name',
            'manual_page_count',
        ]));

        $item->save();

        $properties = collect($request->all())->filter(function ($value, $key) {
            return str($key)->startsWith('property_');
        });

        foreach ($properties as $key => $value) {
            if (str($value)->trim()->isNotEmpty()) {
                Value::updateOrCreate([
                    'item_id' => $item->id,
                    'property_id' => str($key)->afterLast('_')->toString(),
                ], [
                    'value' => $value,
                ]);
            } elseif (str($key)->afterLast('_')->isNotEmpty()) {
                Value::query()
                    ->where('item_id', $item->id)
                    ->where('property_id', str($key)->afterLast('_')->toString())
                    ->delete();
            }
        }

        $request->session()->flash('success', 'Document updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
