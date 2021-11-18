<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">Connect</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
                @if( Route::current()->getName() == 'dashboard' )
                    <li class="active-page">
                        <a href="{{ route('dashboard') }}" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                    </li>
                @endif
                
                <li>
                    <a href="#"><i class="material-icons-outlined">inbox</i>Mailbox</a>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}"><i class="material-icons-outlined">account_circle</i>Profile</a>
                </li>
                <li>
                    <a href="#"><i class="material-icons">cloud_queue</i>File Manager</a>
                </li>
                <li>
                    <a href="#"><i class="material-icons-outlined">calendar_today</i>Calendar</a>
                </li>
                @if( (Route::current()->getName() == 'client.index') || (Route::current()->getName() == 'client.show') || (Route::current()->getName() == 'client.edit') )
                    <li class="active-page">
                        <a href="{{ route('client.index') }}"><i class="material-icons">supervised_user_circle</i>Client Info</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('client.index') }}"><i class="material-icons">supervised_user_circle</i>Client Info</a>
                    </li>
                @endif
                <li class="sidebar-title">
        </ul>
    </div>
</div>