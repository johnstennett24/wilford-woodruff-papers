<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Nova\Topic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TopicIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topic = Subject::query()->whereHas('category', function (Builder $query) use ($request) {
            $query->where('name', $request);
        });

        return response()->json($topic->paginate($request->get('per_page', 100)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return $topic;
    }
}
