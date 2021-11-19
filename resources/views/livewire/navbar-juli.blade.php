 <!-- Navbar Edit to Laravel -->
 <nav class="navbar navbar-expand">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Account management -->
<ul class="navbar-nav">
    <li class="nav-item small-screens-sidebar-link">
        <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
    </li>

    <li class="nav-item nav-profile dropdown">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                <span>{{ Auth::user()->name }}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
            </a>
        @else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{url('backend/dashboard/assets/images/avatars/profile-image-1.png')}}" alt="profile image">
                <span>{{ Auth::user()->name }}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
            </a>
        @endif

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile<span class="badge badge-pill badge-info float-right">2</span></a>
            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a class="dropdown-item" href="{{ route('api-tokens.index') }}">API Tokens</a>
            @endif

            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>

            <!-- Authentication for logout-->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">{{ __('Log Out') }}</a>
            </form>

        </div>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
    </li>

    @if( (Route::current()->getName() == 'client.index') )
        <li class="nav-item">
            <a href="#" class="nav-link" data-container="body" data-toggle="popover" data-placement="top" data-content="Tips untuk menghapus, search dahulu nama client sampai posisi no.1, kemudian delete." >
                <i class="material-icons-outlined">notifications</i></a>
        </li>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
    </li>
    @endif
    
    <li class="nav-item">
        <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
    </li>
</ul>

<!-- Team Dropdown -->
@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <div class="collapse navbar-collapse" id="navbarNav">
    @for ($i = 0; $i < 60; $i++)
        &nbsp;
    @endfor
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->currentTeam->name }}
            </button>
            <div class="dropdown-menu">

                 <!-- Team Management -->
                <h6 class="dropdown-header">{{ __('Manage Team') }}</h6>

                <!-- Team Settings -->
                <a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                    {{ __('Team Settings') }}</a>

                <!-- Create New Team -->
                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <a class="dropdown-item" href="{{ route('teams.create') }}">{{ __('Create New Team') }}</a>
                @endcan


            </div>
        </div>
    </div>
@endif
    <div class="navbar-search">
         <p><b>@livewire('date-juli')</b></p>
    </div>  
</nav>
<!-- End Nabvar -->