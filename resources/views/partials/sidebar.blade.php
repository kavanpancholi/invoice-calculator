@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                    <a href="{{ route('roles.index') }}">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">
                            @lang('quickadmin.roles.title')
                        </span>
                    </a>
                </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            @lang('quickadmin.users.title')
                        </span>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('user_profile')
                <li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.show', Auth::user()->id) }}">
                        <i class="fa fa-users"></i>
                        <span class="title">@lang('quickadmin.users.profile')</span>
                    </a>
                </li>
            @endcan
            @can('position_access')
            <li class="{{ $request->segment(1) == 'positions' ? 'active' : '' }}">
                <a href="{{ route('positions.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.positions.title')</span>
                </a>
            </li>
            @endcan
            
            @can('department_access')
            <li class="{{ $request->segment(1) == 'departments' ? 'active' : '' }}">
                <a href="{{ route('departments.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.departments.title')</span>
                </a>
            </li>
            @endcan
            
            @can('invoice_access')
            <li class="{{ $request->segment(1) == 'invoices' ? 'active' : '' }}">
                <a href="{{ route('invoices.index') }}">
                    <i class="fa fa-file"></i>
                    <span class="title">@lang('quickadmin.invoice.title')</span>
                </a>
            </li>
            @endcan
            

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}