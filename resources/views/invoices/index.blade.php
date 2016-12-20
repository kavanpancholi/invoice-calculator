@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.invoice.title')</h3>
    @can('invoice_create')
    <p>
        <a href="{{ route('invoices.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('invoice_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.invoice.fields.user')</th>
                        <th>@lang('quickadmin.invoice.fields.per-week-pay')</th>
                        <th>@lang('quickadmin.invoice.fields.from-date')</th>
                        <th>@lang('quickadmin.invoice.fields.to-date')</th>
                        <th>@lang('quickadmin.invoice.fields.last-invoice-at')</th>
                        <th>@lang('quickadmin.invoice.fields.no-of-weeks')</th>
                        <th>@lang('quickadmin.invoice.fields.total-amount')</th>
                        <th>@lang('quickadmin.invoice.fields.paypal-email')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($invoices) > 0)
                        @foreach ($invoices as $invoice)
                            <tr data-entry-id="{{ $invoice->id }}">
                                @can('invoice_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $invoice->user->name or '' }}</td>
                                <td>{{ $invoice->per_week_pay }}</td>
                                <td>{{ $invoice->from_date }}</td>
                                <td>{{ $invoice->to_date }}</td>
                                <td>{{ $invoice->last_invoice_at }}</td>
                                <td>{{ $invoice->no_of_weeks }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td>{{ $invoice->paypal_email }}</td>
                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('invoice_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('invoice_delete')
            window.route_mass_crud_entries_destroy = '{{ route('invoices.mass_destroy') }}';
        @endcan
    </script>
@endsection