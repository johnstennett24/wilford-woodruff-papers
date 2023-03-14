<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DocumentIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::query();

        $pages->with([
            'dates',
            'people',
            'places',
            'media',
        ]);

        if ($request->has('date')) {
            $pages = $pages->whereRelation('dates', function (Builder $query) use ($request) {
                $query->whereDate('date', $request->get('date'));
            });
        }
        if ($request->has('types')) {
            $pages = $pages->whereRelation('item.type', function (Builder $query) use ($request) {
                $query->whereIn('name', $request->get('types'));
            }
            );
        }

        return response()->json($pages->paginate($request->get('per_page', 100)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return $page;
    }
}
