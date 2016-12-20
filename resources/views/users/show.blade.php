@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.dateofbirth')</th>
                            <td>{{ $user->date_of_birth or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.position')</th>
                            <td>{{ $user->position->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.department')</th>
                            <td>{{ $user->department->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.ref-user-id')</th>
                            <td>{{ $user->ref_user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.reporting-user-id')</th>
                            <td>{{ $user->reporting_user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.supervisor-user-id')</th>
                            <td>{{ $user->supervisor_user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.last-company-name')</th>
                            <td>{{ $user->last_company_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.last-company-position')</th>
                            <td>{{ $user->last_company_position }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.joining-date')</th>
                            <td>{{ $user->joining_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.ending-date')</th>
                            <td>{{ $user->ending_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.per-month-pay')</th>
                            <td>{{ $user->per_month_pay }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.per-week-pay')</th>
                            <td>{{ $user->per_week_pay }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.paypal-email')</th>
                            <td>{{ $user->paypal_email }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop