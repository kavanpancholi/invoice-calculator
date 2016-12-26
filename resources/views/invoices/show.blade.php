@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.invoice.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.user')</th>
                            <td>{{ $invoice->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.per-week-pay')</th>
                            <td>{{ $invoice->per_week_pay }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.from-date')</th>
                            <td>{{ $invoice->from_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.to-date')</th>
                            <td>{{ $invoice->to_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.no-of-weeks')</th>
                            <td>{{ $invoice->no_of_weeks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.holidays-after-limit')</th>
                            <td>{{ $invoice->holidays_after_limit }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.subtotal')</th>
                            <td>{{ $invoice->subtotal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.remaining')</th>
                            <td>{{ $invoice->remaining }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.bonus')</th>
                            <td>{{ $invoice->bonus }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.total-amount')</th>
                            <td>{{ $invoice->total_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.invoice.fields.paypal-email')</th>
                            <td>{{ $invoice->paypal_email }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>
            @can('invoice_access')
                <a href="{{ route('invoices.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
            @endcan
            @can('user_invoice')
                <a href="{{ route('invoices.user_invoice') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
            @endcan
        </div>
    </div>
@stop