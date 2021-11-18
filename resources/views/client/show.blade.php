<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} - Client Info</title>
        @livewire('assets-juli')
    </head>
    <body class="app-profile">
        
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>

        <div class="connect-container align-content-stretch d-flex flex-wrap">
            @livewire('sidebar-juli')
            <div class="page-container">
                <div class="page-header">
                    @livewire('navbar-juli')
                </div>
                <div class="page-content">

                    <!-- <div class="page-info">

                    </div>
                    <div class="main-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <p class="page-desc"><b>Data User - {{$client->full_name}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="main-wrapper">
                        <div class="profile-header">
                            <div class="row">
                                <div class="col">
                                    <div class="profile-img">
                                        <img src="{{ Storage::url('public/client/photos/user_selfie/').$client->user_selfie }}" style="border-radius: 50%;">
                                    </div>
                                    <div class="profile-name">
                                        <h3>{{ $client->dealer_group }} - {{ $client->full_name }}</h3>
                                        <span>{{ $client->user_position }}</span>
                                    </div>
                                    <div class="profile-menu">
                                        <ul>
                                            <!-- <li>
                                                <a href="#">Feed</a>
                                            </li>
                                            <li>
                                                <a href="#">About</a>
                                            </li>
                                            <li>
                                                <a href="#">Friends</a>
                                            </li> -->
                                        </ul>
                                        <div class="profile-status">
                                            <i class="active-now"></i> Active now
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="post">
                                                <div class="post-header">
                                                    <img src="{{url('backend/dashboard/assets/images/avatars/profile-image-3.jpg')}}">
                                                    <div class="post-info">
                                                        <span class="post-author">Riley Beach</span><br>
                                                        <span class="post-date">3hrs</span>
                                                    </div>
                                                    <div class="post-header-actions">
                                                        <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>Proin eu fringilla dui. Pellentesque mattis lobortis mauris eu tincidunt. Maecenas hendrerit faucibus dolor, in commodo lectus mattis ac.</p>
                                                    <img src="{{url('backend/dashboard/assets/images/post-1.jpg')}}" class="post-image" alt="">
                                                </div>
                                                <div class="post-actions">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <a href="#" class="like-btn"><i class="far fa-heart"></i>Like</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="far fa-comment"></i>Comment</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-share"></i>Share</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="post-comments">
                                                    <div class="post-comm">
                                                        <img src="{{url('backend/dashboard/assets/images/avatars/profile-image-2.png')}}" class="comment-img">
                                                        <div class="comment-container">
                                                            <span class="comment-author">
                                                                Sonny Rosas
                                                                <small class="comment-date">5min</small>
                                                            </span>
                                                        </div>
                                                        <span class="comment-text">
                                                            Mauris ultrices convallis massa, nec facilisis enim interdum ac.
                                                        </span>
                                                    </div>
                                                    <div class="post-comm">
                                                        <img src="{{url('backend/dashboard/assets/images/avatars/profile-image.png')}}" class="comment-img">
                                                        <div class="comment-container">
                                                            <span class="comment-author">
                                                                Jacob Lee
                                                                <small class="comment-date">27min</small>
                                                            </span>
                                                        </div>
                                                        <span class="comment-text">
                                                            Cras tincidunt quam nisl, vitae aliquet enim pharetra at. Nunc varius bibendum turpis, vitae ultrices tortor facilisis ac.
                                                        </span>
                                                    </div>
                                                    <div class="new-comment">
                                                        <form action="javascript: void(0)">
                                                            <div class="input-group">
                                                                <input type="text" name="comment" class="form-control search-input" placeholder="Type something...">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-secondary" type="button" id="button-addon1">Comment</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">Edit Employee</h5> -->
                                            <ul class="list-unstyled profile-about-list">
                                            <li>
                                                <a href="{{ route('client.index') }}" target="_blank" class="btn btn-block btn-outline-info m-t-lg">List Karyawan</a>
                                                <a href="{{ route('client.edit',$client->id) }}" class="btn btn-block btn-outline-primary m-t-lg">Edit Data</a>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Employee Info</h5>
                                            <ul class="list-unstyled profile-about-list">
                                                <li><i class="material-icons">work_outline</i><span>Posisi: {{ $client->user_position }}</span></li>
                                                <li><i class="material-icons">event</i><span>Tanggal Join: {{ $client->user_position_start_date->toDateString() }}</span></li>
                                                <li><i class="material-icons">supervisor_account</i><span>Supervisor: {{ $client->user_supervisor }}</a></span></li>
                                                <li><i class="material-icons">manage_accounts</i><span>Koordinator: {{ $client->user_coordinator }}</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Contact Info</h5>
                                            <ul class="list-unstyled profile-about-list">
                                                <li><i class="material-icons">mail_outline</i><span>{{ $client->email_user }}</span></li>
                                                <li><i class="material-icons">home</i><span>Tinggal di <a href="#">{{ $client->home_city }}, {{ $client->home_province }}</a></span></li>
                                                <li><i class="material-icons">local_phone</i><span>{{ $client->phone_number }}</span></li>
                                                <li><i class="fab fa-facebook-square"></i><span>{{ $client->facebook_id }}</span></li>
                                                <li><i class="fab fa-instagram"></i><span>{{ $client->instagram_id }}</span></li>
                                                <li><i class="fab fa-twitter"></i><span>{{ $client->twitter_id }}</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Personal Info</h5>
                                            <!-- <p>Quisque vel tellus sit amet quam efficitur sagittis. Fusce aliquam pulvinar suscipit.</p> -->
                                            <ul class="list-unstyled profile-about-list">
                                                @if( $client->gender == "Laki-Laki" )
                                                    <li><i class="material-icons">male</i><span>Pria</span></li>
                                                @else
                                                <li><i class="material-icons">female</i><span>Wanita</span></li>
                                                @endif

                                                @if( $client->marital_status == "Menikah" )
                                                    <li><i class="material-icons">family_restroom</i><span>Menikah</span></li>
                                                @else
                                                <li><i class="material-icons">person_outline</i><span>Belum menikah</span></li>
                                                @endif

                                                <li><i class="material-icons">school</i><span>{{ $client->education }}</span></li>
                                                <li><i class="material-icons">my_location</i><span>Lahir di {{ $client->birth_place }} </span></li>
                                                <li><i class="fas fa-map-marker-alt"></i><span>{{$client->home_address}}, {{$client->home_province}}, {{$client->home_city}},
                                                {{$client->home_districts}}, {{$client->home_village}}, {{$client->home_postal_code}}</span></li>
                                                </span></li>
                                                <li>
                                                    <a href="tel:{{ $client->phone_number }}" target="_blank" class="btn btn-block btn-primary m-t-lg">Telepon</a>
                                                    <a href="mailto:{{ $client->email_user }}" target="_blank" class="btn btn-block btn-secondary m-t-lg">Email</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                @livewire('footer-juli')
            </div>
        </div>
        <div class="mailbox-compose-overlay"></div>
        <div class="mailbox-item-overlay"></div>
        @livewire('script-client-juli')
    </body>
</html>