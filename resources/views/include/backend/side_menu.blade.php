<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">


    <div class="aside-logo flex-column-auto" id="kt_aside_logo" style="background-color: #DA6343;">

        <a href={{ route('dashboard') }}>
            <h1>RL King</h1>
        </a>

        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15.6343 11.4343L11.45 7.25C11.0358 6.83579 11.0358 6.16421 11.45 5.75C11.8642 5.33579 12.5358 5.33579 12.95 5.75L18.4929 11.2929C18.8834 11.6834 18.8834 12.3166 18.4929 12.7071L12.95 18.25C12.5358 18.6642 11.8642 18.6642 11.45 18.25C11.0358 17.8358 11.0358 17.1642 11.45 16.75L15.6343 12.5657C15.9467 12.2533 15.9467 11.7467 15.6343 11.4343Z" fill="black">
                    </path>
                </svg>
            </span>
        </div>
    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0" style="height: 320px;">

            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                @role('Super Admin|Admin')
                <div class="menu-item {{ (request()->is('*dashboard*')) ? 'show hover' : '' }}">
                    <a class="menu-link " href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item {{ (request()->is('*roles*')) ? 'show hover' : '' }}">
                    <a class="menu-link" href="{{ route('role.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Role List</span>
                    </a>
                </div>
                
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('*users*')) ? 'show hover' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                           <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div kt-hidden-height="118" class="menu-sub menu-sub-accordion menu-active-bg page_speed_613444025" style="display: {{(request()->is('*user*')) ? 'block':'none'}}; overflow: hidden;">
                        
                        <div class="menu-item {{ (request()->is('*user*')) ? 'show hover' : '' }}">
                            <a class="menu-link" href="{{ route('user.index')}}" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User</span>
                            </a>
                        </div>

                        <div class="menu-item menu-accordion {{ (request()->is('*users*')) ? 'show hover' : '' }}">
                            <a class="menu-link" href="{{ route('coin-agency-users-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Coin Agency User</span>
                            </a>
                        </div>
                        
                        <div class="menu-item menu-accordion {{ (request()->is('*users*')) ? 'show hover' : '' }}">
                            <a class="menu-link" href="{{ route('host-agency-users-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Host Agency User</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="menu-item {{ (request()->is('*currency*')) ? 'show hover' : '' }}">
                    <a class="menu-link" href="{{ route('currency-list')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Currency List</span>
                    </a>
                </div>

                @endrole

                @role('Coin Agency')
                <div class="menu-item {{ (request()->is('*dashboard*')) ? 'show hover' : '' }}">
                    <a class="menu-link " href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item {{ (request()->is('*coin-agency-recharge-list*')) ? 'show hover' : '' }}">
                    <a class="menu-link " href="{{ route('coin-agency-recharge-list') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Recharge</span>
                    </a>
                </div>

                <div class="menu-item {{ (request()->is('*coin-agency-coin-send-list*')) ? 'show hover' : '' }}">
                    <a class="menu-link " href="{{ route('coin-agency-coin-send-list') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/dasboard.svg">
                            </span>
                        </span>
                        <span class="menu-title">Coin Send</span>
                    </a>
                </div>
                <!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('*master_report_usage*')) ? 'show hover' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                           <span class="svg-icon svg-icon-2">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/monthly_report.svg">
                            </span>
                        </span>
                        <span class="menu-title">Master Report(Usage)</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div kt-hidden-height="118" class="menu-sub menu-sub-accordion menu-active-bg page_speed_613444025" style="display: {{(request()->is('*master_report_usage*')) ? 'block':'none'}}; overflow: hidden;">
                        <div class="menu-item {{ (request()->is('*sms*')) ? 'show hover' : '' }}">
                            <a class="menu-link" href="" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sms Master Report</span>
                            </a>
                        </div>
                        <div class="menu-item menu-accordion {{ (request()->is('*voice*')) ? 'show hover' : '' }}">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Voice Master Report</span>
                            </a>
                        </div>
                    </div>
                </div> -->
                @endrole
               

            </div>
        </div>
    </div>
</div>