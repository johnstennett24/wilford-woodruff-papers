<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PageIndexController extends Controller
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
            $pages = $pages->whereRelation('taggedDates', function (Builder $query) use ($request) {
                $query->whereDate('date', $request->get('date'));
            });
        }
        if ($request->has('date_start') && $request->has('date_end')) {
            $pages = $pages->whereRelation('taggedDates', function (Builder $query) use ($request) {
                $query->whereDate('date', '>=', $request->get('date_start'))
                ->whereDate('date', '<=', $request->get('date_end'));
            });
        } else {
            if ($request->has('date_start')) {
                $pages = $pages->whereRelation('taggedDates', function (Builder $query) use ($request) {
                    $query->whereDate('date', '>=', $request->get('date_start'));
                });
            }

            if ($request->has('date_end')) {
                $pages = $pages->whereRelation('taggedDates', function (Builder $query) use ($request) {
                    $query->whereDate('date', '<=', $request->get('date_end'));
                });
            }
        }
        if ($request->has('types')) {
            $pages = $pages->whereRelation('item.type', function (Builder $query) use ($request) {
                $query->whereIn('name', $request->get('types'));
            }
            );
        }

        return response()->json($pages->paginate($request->get('per_page', 100)));
    }

    public function show(Page $page)
    {
        return $page;
    }
}
