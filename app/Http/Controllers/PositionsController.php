<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePositionsRequest;
use App\Http\Requests\UpdatePositionsRequest;

class PositionsController extends Controller
{

    /**
     * Display a listing of Position.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('position_access')) {
            return abort(401);
        }
        $positions = Position::all();

        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating new Position.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('position_create')) {
            return abort(401);
        }
        return view('positions.create');
    }

    /**
     * Store a newly created Position in storage.
     *
     * @param  \App\Http\Requests\StorePositionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePositionsRequest $request)
    {
        if (! Gate::allows('position_create')) {
            return abort(401);
        }
        $position = Position::create($request->all());

        return redirect()->route('positions.index');
    }


    /**
     * Show the form for editing Position.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('position_edit')) {
            return abort(401);
        }
        $position = Position::findOrFail($id);

        return view('positions.edit', compact('position'));
    }

    /**
     * Update Position in storage.
     *
     * @param  \App\Http\Requests\UpdatePositionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionsRequest $request, $id)
    {
        if (! Gate::allows('position_edit')) {
            return abort(401);
        }
        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('positions.index');
    }


    /**
     * Display Position.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('position_view')) {
            return abort(401);
        }
        $position = Position::findOrFail($id);

        return view('positions.show', compact('position'));
    }


    /**
     * Remove Position from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('position_delete')) {
            return abort(401);
        }
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index');
    }

    /**
     * Delete all selected Position at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('position_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Position::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
