@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.positions.title')</h3>
    @can('position_create')
    <p>
        <a href="{{ route('positions.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($positions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('position_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.positions.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($positions) > 0)
                        @foreach ($positions as $position)
                            <tr data-entry-id="{{ $position->id }}">
                                @can('position_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $position->name }}</td>
                                <td>
                                    @can('position_view')
                                    <a href="{{ route('positions.show',[$position->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('position_edit')
                                    <a href="{{ route('positions.edit',[$position->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('position_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['positions.destroy', $position->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('position_delete')
            window.route_mass_crud_entries_destroy = '{{ route('positions.mass_destroy') }}';
        @endcan
    </script>
@endsection