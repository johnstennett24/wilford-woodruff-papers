<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
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
        $documents = Document::query();

        if ($request->has('name')) {
            $documents = $documents->whereRelation('name', function (Builder $query) use ($request) {
                $query->where('name' == $request);
            });
        }
        if ($request->has('date_start') && $request->has('date_end')) {
            $documents = $documents->whereRelation('date', function (Builder $query) use ($request) {
                $query->whereDate('date', '>=', $request->get('date_start'))
                    ->whereDate('date', '<=', $request->get('date_end'));
            });
        } else {
            if ($request->has('date_start')) {
                $documents = $documents->whereRelation('date', function (Builder $query) use ($request) {
                    $query->whereDate('date', '>=', $request->get('date_start'));
                });
            }

            if ($request->has('date_end')) {
                $documents = $documents->whereRelation('date', function (Builder $query) use ($request) {
                    $query->whereDate('date', '<=', $request->get('date_end'));
                });
            }
        }

        if ($request->has('date')) {
            $documents = $documents->whereRelation('dates', function (Builder $query) use ($request) {
                $query->whereDate('date', $request->get('date'));
            });
        }
        if ($request->has('types')) {
            $documents = $documents->whereRelation('item.type', function (Builder $query) use ($request) {
                $query->whereIn('name', $request->get('types'));
            }
            );
        }

        return response()->json($documents->paginate($request->get('per_page', 100)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return $document;
    }
}
