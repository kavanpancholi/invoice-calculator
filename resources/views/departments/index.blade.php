@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.departments.title')</h3>
    @can('department_create')
    <p>
        <a href="{{ route('departments.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($departments) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('department_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.departments.fields.name')</th>
                        <th>@lang('quickadmin.departments.fields.department-head-user')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($departments) > 0)
                        @foreach ($departments as $department)
                            <tr data-entry-id="{{ $department->id }}">
                                @can('department_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $department->name }}</td>
                                <td>{{ $department->department_head_user->name or '' }}</td>
                                <td>
                                    @can('department_view')
                                    <a href="{{ route('departments.show',[$department->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('department_edit')
                                    <a href="{{ route('departments.edit',[$department->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('department_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['departments.destroy', $department->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('department_delete')
            window.route_mass_crud_entries_destroy = '{{ route('departments.mass_destroy') }}';
        @endcan
    </script>
@endsection