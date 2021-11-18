<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewire('assets-profile-juli')
    </head>
    <body class="app-profile">
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
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
                    <div class="main-wrapper">
                        <div class="profile-header">
                            <div class="row">
                                <div submit="updateProfileInformation">
                                    
                                    <div name="form">

                                        <!-- Profile Photo -->
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <div class="col" x-data="{photoName: null, photoPreview: null}">

                                            <!-- Current Profile Photo -->
                                            <div class="profile-img" x-show="! photoPreview">
                                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                            </div>
                                            
                                            <!-- New Profile Photo Preview -->
                                            <div class="profile-img" x-show="photoPreview">
                                                <span
                                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                </span> 
                                            </div>


                                            <div class="profile-name">
                                                <h3>{{ Auth::user()->name }}</h3>
                                                <br>

                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Manage Photo Profile
                                                </button>
            
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Photo</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <button type="button" x-on:click.prevent="$refs.photo.click()" class="btn btn-outline-secondary">
                                                                    {{ __('Select A New Photo') }}
                                                                    <input type="file" class="hidden"
                                                                            wire:model="photo"
                                                                            x-ref="photo"
                                                                            x-on:change="
                                                                                photoName = $refs.photo.files[0].name;
                                                                                const reader = new FileReader();
                                                                                reader.onload = (e) => {
                                                                                    photoPreview = e.target.result;
                                                                                };
                                                                                reader.readAsDataURL($refs.photo.files[0]);"/>
                                                                    <x-jet-label for="photo" value="{{ __('Photo') }}" />
                                                                </button>


                                                                
                                                            </div>
                                            @endif
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                <div name="actions">
                                                                    <!-- Short time messange "Saved." -->
                                                                    <div on="saved">
                                                                        {{ __('Saved.') }}
                                                                    </div>
                                                            
                                                                    <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                                                                        {{ __('Save') }}</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <span>Pelajar</span> -->
                                            </div>
                                            
                                            <div class="profile-menu">
                                                <ul>
                                                    <li>
                                                        <a href="#">About</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Photos</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Videos</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Music</a>
                                                    </li>
                                                </ul>
                                                <div class="profile-status">
                                                    <i class="active-now"></i> Active now
                                                </div>
                                                
                                            </div>
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
                                                    <img src="assets/images/avatars/profile-image-3.jpg">
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
                                                    <img src="assets/images/post-1.jpg" class="post-image" alt="">
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
                                                        <img src="assets/images/avatars/profile-image-2.png" class="comment-img">
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
                                                        <img src="assets/images/avatars/profile-image.png" class="comment-img">
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
                                            <h5 class="card-title">About</h5>
                                            <p>Quisque vel tellus sit amet quam efficitur sagittis. Fusce aliquam pulvinar suscipit.</p>
                                            <ul class="list-unstyled profile-about-list">
                                                <li><i class="material-icons">school</i><span>Studied Mechanical Engineering at <a href="#">Carnegie Mellon University</a></span></li>
                                                <li><i class="material-icons">work</i><span>Former manager at <a href="#">Stacks</a></span></li>
                                                <li><i class="material-icons">my_location</i><span>From <a href="#">Boston, Massachusetts</a></span></li>
                                                <li><i class="material-icons">rss_feed</i><span>Followed by 716 people</span></li>
                                                <li>
                                                    <button class="btn btn-block btn-primary m-t-lg">Follow</button>
                                                    <button class="btn btn-block btn-secondary m-t-lg">Message</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Contact Info</h5>
                                            <ul class="list-unstyled profile-about-list">
                                                <li><i class="material-icons">mail_outline</i><span>jay.morton@gmail.com</span></li>
                                                <li><i class="material-icons">home</i><span>Lives in <a href="#">San Francisco, CA</a></span></li>
                                                <li><i class="material-icons">local_phone</i><span>+1 (678) 290 1680</span></li>
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
        @livewire('script-profile-juli')
    @endif
    </body>
</html>