<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreDepartmentsRequest;
use App\Http\Requests\UpdateDepartmentsRequest;

class DepartmentsController extends Controller
{

    /**
     * Display a listing of Department.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('department_access')) {
            return abort(401);
        }
        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating new Department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('department_create')) {
            return abort(401);
        }
        $relations = [
            'department_head_users' => User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('departments.create', $relations);
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentsRequest $request)
    {
        if (! Gate::allows('department_create')) {
            return abort(401);
        }
        $department = Department::create($request->all());

        return redirect()->route('departments.index');
    }


    /**
     * Show the form for editing Department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('department_edit')) {
            return abort(401);
        }
        $relations = [
            'department_head_users' => User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department') + $relations);
    }

    /**
     * Update Department in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentsRequest $request, $id)
    {
        if (! Gate::allows('department_edit')) {
            return abort(401);
        }
        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index');
    }


    /**
     * Display Department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('department_view')) {
            return abort(401);
        }
        $relations = [
            'department_head_users' => User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $department = Department::findOrFail($id);

        return view('departments.show', compact('department') + $relations);
    }


    /**
     * Remove Department from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('department_delete')) {
            return abort(401);
        }
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index');
    }

    /**
     * Delete all selected Department at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('department_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Department::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
