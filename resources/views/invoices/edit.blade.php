@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.invoice.title')</h3>
    
    {!! Form::model($invoice, ['method' => 'PUT', 'route' => ['invoices.update', $invoice->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'User id', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('per_week_pay', 'Per week Pay*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('from_date', 'From date*', ['class' => 'control-label']) !!}
                    {!! Form::text('from_date', old('from_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('from_date'))
                        <p class="help-block">
                            {{ $errors->first('from_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('to_date', 'To date*', ['class' => 'control-label']) !!}
                    {!! Form::text('to_date', old('to_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('to_date'))
                        <p class="help-block">
                            {{ $errors->first('to_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('no_of_weeks', 'No of Weeks*', ['class' => 'control-label']) !!}
                    {!! Form::number('no_of_weeks', old('no_of_weeks'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('no_of_weeks'))
                        <p class="help-block">
                            {{ $errors->first('no_of_weeks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('holidays_after_limit', 'Holidays After Limit*', ['class' => 'control-label']) !!}
                    {!! Form::number('holidays_after_limit', old('holidays_after_limit'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('holidays_after_limit'))
                        <p class="help-block">
                            {{ $errors->first('holidays_after_limit') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subtotal', 'Subtotal*', ['class' => 'control-label']) !!}
                    {!! Form::number('subtotal', old('subtotal'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subtotal'))
                        <p class="help-block">
                            {{ $errors->first('subtotal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('remaining', 'Remaining*', ['class' => 'control-label']) !!}
                    {!! Form::number('remaining', old('remaining'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('remaining'))
                        <p class="help-block">
                            {{ $errors->first('remaining') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bonus', 'Bonus*', ['class' => 'control-label']) !!}
                    {!! Form::number('bonus', old('bonus'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bonus'))
                        <p class="help-block">
                            {{ $errors->first('bonus') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_amount', 'Total Amount*', ['class' => 'control-label']) !!}
                    {!! Form::number('total_amount', old('total_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_amount'))
                        <p class="help-block">
                            {{ $errors->first('total_amount') }}
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

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
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