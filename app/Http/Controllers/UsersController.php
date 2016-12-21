<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    public function __construct() {

    }
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $relations = [
            'roles' => Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'positions' => Position::get()->pluck('name', 'id')->prepend('Please select', ''),
            'departments' => Department::get()->pluck('name', 'id')->prepend('Please select', ''),
            'departments' => Department::get()->pluck('name', 'id')->prepend('Please select', ''),
            'ref_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'reporting_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'supervisor_user' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('users.create', $relations);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $user = User::create($request->all());

        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $relations = [
            'roles' => Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'positions' => Position::get()->pluck('name', 'id')->prepend('Please select', ''),
            'departments' => Department::get()->pluck('name', 'id')->prepend('Please select', ''),
            'ref_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'reporting_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'supervisor_user' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $user = User::findOrFail($id);

        return view('users.edit', compact('user') + $relations);
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('user_view')) {
            if(Auth::user()->id!=1 && Auth::user()->id!=$id){
                return abort(401);
            }
        }
        else{
            return abort(401);
        }
        $relations = [
            'roles' => Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'positions' => Position::get()->pluck('name', 'id')->prepend('Please select', ''),
            'departments' => Department::get()->pluck('name', 'id')->prepend('Please select', ''),
            'ref_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'reporting_users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'supervisor_user' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $user = User::findOrFail($id);

        return view('users.show', compact('user') + $relations);
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}