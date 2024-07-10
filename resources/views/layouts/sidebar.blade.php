<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ url('/') }}" class="b-brand">
                <h1 class="header-title">SiSurat</h1>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('index') }}">CRM</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('analytics') }}">Analytics</a></li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('reports-sales') }}">Sales Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('reports-leads') }}">Leads Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('reports-project') }}">Project Report</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('reports-timesheets') }}">Timesheets Report</a></li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-send"></i></span>
                        <span class="nxl-mtext">Applications</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-chat') }}">Chat</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-email') }}">Email</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-tasks') }}">Tasks</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-notes') }}">Notes</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-storage') }}">Storage</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="{{ url('apps-calendar') }}">Calendar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
