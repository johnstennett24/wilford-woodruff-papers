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
        if ($request->has('marriage_year')) {
            $wife = Wife::query()->where('marriage_year', $request->get('marriage_year'));
        } else {
            $wife = Wife::query();
        }

        return $wife->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
