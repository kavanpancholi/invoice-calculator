<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreInvoicesRequest;
use App\Http\Requests\UpdateInvoicesRequest;

class InvoicesController extends Controller
{

    /**
     * Display a listing of Invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('invoice_access')) {
            return abort(401);
        }
        $invoices = Invoice::get();

        return view('invoices.index', compact('invoices'));
    }

    public function userInvoice()
    {
        if (! Gate::allows('user_invoice')) {
            return abort(401);
        }
        $invoices = Invoice::where('user_id', Auth::user()->id)->get();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating new Invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('invoice_create')) {
            return abort(401);
        }
        $relations = [
            'users' => User::ofType('employee')->get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('invoices.create', $relations);
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @param  \App\Http\Requests\StoreInvoicesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoicesRequest $request)
    {
        if (! Gate::allows('invoice_create')) {
            return abort(401);
        }
        $invoice = Invoice::create($request->all());

        return redirect()->route('invoices.index');
    }


    /**
     * Show the form for editing Invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('invoice_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $invoice = Invoice::findOrFail($id);

        return view('invoices.edit', compact('invoice') + $relations);
    }

    /**
     * Update Invoice in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoicesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoicesRequest $request, $id)
    {
        if (! Gate::allows('invoice_edit')) {
            return abort(401);
        }
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index');
    }


    /**
     * Display Invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('invoice_view')) {
            return abort(401);
        }
        $relations = [
            'users' => User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $invoice = Invoice::findOrFail($id);

        return view('invoices.show', compact('invoice') + $relations);
    }


    /**
     * Remove Invoice from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('invoice_delete')) {
            return abort(401);
        }
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    /**
     * Delete all selected Invoice at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('invoice_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Invoice::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
