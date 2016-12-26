@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'control-label']) !!}
                    {!! Form::text('date_of_birth', old('date_of_birth'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_of_birth'))
                        <p class="help-block">
                            {{ $errors->first('date_of_birth') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('position_id', 'Position*', ['class' => 'control-label']) !!}
                    {!! Form::select('position_id', $positions, old('position_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('position_id'))
                        <p class="help-block">
                            {{ $errors->first('position_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_id', 'Department*', ['class' => 'control-label']) !!}
                    {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department_id'))
                        <p class="help-block">
                            {{ $errors->first('department_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ref_user_id', 'Reference', ['class' => 'control-label']) !!}
                    {!! Form::select('ref_user_id', $ref_users, old('ref_user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ref_user_id'))
                        <p class="help-block">
                            {{ $errors->first('ref_user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reporting_user_id', 'Reporting Manager', ['class' => 'control-label']) !!}
                    {!! Form::select('reporting_user_id', $reporting_users, old('reporting_user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reporting_user_id'))
                        <p class="help-block">
                            {{ $errors->first('reporting_user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('supervisor_user_id', 'Supervisor', ['class' => 'control-label']) !!}
                    {!! Form::select('supervisor_user_id', $supervisor_user, old('supervisor_user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('supervisor_user_id'))
                        <p class="help-block">
                            {{ $errors->first('supervisor_user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('last_company_name', 'Last Company Name', ['class' => 'control-label']) !!}
                    {!! Form::text('last_company_name', old('last_company_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_company_name'))
                        <p class="help-block">
                            {{ $errors->first('last_company_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('last_company_position', 'Last Company Position', ['class' => 'control-label']) !!}
                    {!! Form::text('last_company_position', old('last_company_position'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_company_position'))
                        <p class="help-block">
                            {{ $errors->first('last_company_position') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('joining_date', 'Joining Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('joining_date', old('joining_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('joining_date'))
                        <p class="help-block">
                            {{ $errors->first('joining_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ending_date', 'Ending Date', ['class' => 'control-label']) !!}
                    {!! Form::text('ending_date', old('ending_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ending_date'))
                        <p class="help-block">
                            {{ $errors->first('ending_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('per_month_pay', 'Per Month Pay*', ['class' => 'control-label']) !!}
                    {!! Form::text('per_month_pay', old('per_month_pay'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('per_month_pay'))
                        <p class="help-block">
                            {{ $errors->first('per_month_pay') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('per_week_pay', 'Per Week Pay*', ['class' => 'control-label']) !!}
                    {!! Form::text('per_week_pay', old('per_week_pay'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('per_week_pay'))
                        <p class="help-block">
                            {{ $errors->first('per_week_pay') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('expected_day_of_invoice', 'Expected Day of Invoice*', ['class' => 'control-label']) !!}
                    {!! Form::number('expected_day_of_invoice', old('expected_day_of_invoice'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('expected_day_of_invoice'))
                        <p class="help-block">
                            {{ $errors->first('expected_day_of_invoice') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('paypal_email', 'Paypal Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('paypal_email', old('paypal_email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('paypal_email'))
                        <p class="help-block">
                            {{ $errors->first('paypal_email') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            changeMonth: true,
            changeYear: true,
            yearRange: "c-80:c"
        });
    </script>

@stop