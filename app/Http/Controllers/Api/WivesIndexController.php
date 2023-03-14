<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wife;
use Illuminate\Http\Request;

class WivesIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wives = Wife::query();
        if ($request->has('marriage_year')) {
            $wives = $wives->where('marriage_year');
        }
        if ($request->has('divorce')) {
            $wives = $wives->where('divorce');
        }
        if ($request->has('name')) {
            $wives = $wives->where('name');
        }

        return response()->json($wives->paginate($request->get('per_page', 100)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wife $wife)
    {
        return $wife;
    }
}