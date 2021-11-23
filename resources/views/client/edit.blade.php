<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} - Client Info</title>
        @livewire('assets-juli')
    </head>
    <body>
        
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
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Client Info</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <p class="page-desc"><b>Tambah Data Karyawan</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                            <a href="{{ route('client.index') }}" class="btn btn-outline-primary m-b-md">List Karyawan</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{ route('client.show',$client->id) }}" class="btn btn-outline-info m-b-md">Show Profile</a>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Client Info</h5>
                                        <form method="POST" action="{{ url('/user/client', $client->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <i class="material-icons">business</i>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">    
                                                    <label for="dealer_code">Dealer Code</label>
                                                    <input class="form-control" type="text" id="dealer_code" name="dealer_code" placeholder="03483" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="dealer_group" class="required">Group</label>
                                                    <select id="dealer_group" name="dealer_group" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>
                                                        <option {{ $client->dealer_group == 'H1' ? 'selected' : ''}}>H1</option>
                                                        <option {{ $client->dealer_group == 'H2' ? 'selected' : ''}}>H2</option>
                                                        <option {{ $client->dealer_group == 'H3' ? 'selected' : ''}}>H3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                            <i class="material-icons">perm_identity</i>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="full_name" class="required">Full Name</label>
                                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="" value="{{ $client->full_name }}" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="gender" class="required">Gender</label>
                                                    <select id="gender" name ="gender" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>
                                                        <option {{ $client->gender == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                                        <option {{ $client->gender == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="birth_place" class="required">Tempat lahir</label>
                                                    <input type="text" maxlength="15" class="form-control" id="birth_place" name="birth_place" placeholder="" value="{{ $client->birth_place }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="birth_date" class="required">Tanggal lahir</label>
                                                    <input type="date" class="form-control" id="datepicker" name="birth_date" placeholder="" value="{{ $client->birth_date->toDateString() }}"  required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="religion" class="required">Agama</label>
                                                    <select id="religion" name ="religion" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>
                                                        <option {{ $client->religion == "Muslim" ? 'selected' : ''}}>Muslim</option>
                                                        <option {{ $client->religion == "Kristen" ? 'selected' : ''}}>Kristen</option>
                                                        <option {{ $client->religion == "Katolik" ? 'selected' : ''}}>Katolik</option>
                                                        <option {{ $client->religion == "Hindu" ? 'selected' : ''}}>Hindu</option>
                                                        <option {{ $client->religion == "Buddha" ? 'selected' : ''}}>Buddha</option>
                                                        <option {{ $client->religion == "Konghucu" ? 'selected' : ''}}>Konghucu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="education" class="required">Pendidikan</label>
                                                    <select id="education" name ="education" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>
                                                        <option {{ $client->education == "SD" ? 'selected' : ''}}>SD</option>
                                                        <option {{ $client->education == "SMP" ? 'selected' : ''}}>SMP</option>
                                                        <option {{ $client->education == "SMA" ? 'selected' : ''}}>SMA</option>
                                                        <option {{ $client->education == "Sarjana/Diploma" ? 'selected' : ''}}>Sarjana/Diploma</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="marital_status" class="required">Status</label>
                                                    <select id="marital_status" name ="marital_status" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>\
                                                        <option {{ $client->marital_status == "Menikah" ? 'selected' : ''}}>Menikah</option>
                                                        <option {{ $client->marital_status == "Belum Menikah" ? 'selected' : ''}}>Belum Menikah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="honda_id" class="required">Kode Motor</label>
                                                    <input type="text" class="form-control" id="honda_id" name="honda_id" placeholder="" value="{{ $client->honda_id }}" required>
                                                </div>
                                            </div>

                                            <br><br>
                                            <i class="material-icons">recent_actors</i>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="id_card_number" class="required">NIK</label>
                                                    <input type="text" maxlength="16" class="form-control" id="id_card_number" name="id_card_number" placeholder="" value="{{ $client->id_card_number }}" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="id_card_address" class="required">Alamat KTP</label>
                                                    <input type="text" maxlength="45" class="form-control" id="id_card_address" name="id_card_address" placeholder="" value="{{ $client->id_card_address }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_card_province" class="required">Provinsi</label>
                                                    <select id="id_card_province" name ="id_card_province" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected">Pilih...</option>
                                                        @foreach ($provinces as $key => $value )
                                                            @if( $key == $client->id_card_province )
                                                                <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                                                @continue
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="id_card_city" class="required">Kota</label>
                                                    <select id="id_card_city" name="id_card_city" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected" value="">Pilih...</option>
                                                        @foreach ($cities as $key => $value )
                                                            @if( $key == $client->id_card_city )
                                                                <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                                                @continue
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="id_card_districts" class="required">Kecamatan</label>
                                                    <select id="id_card_districts" name ="id_card_districts" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected" value="">Pilih...</option>
                                                        @foreach ($districts as $key => $value )
                                                            @if( $key == $client->id_card_districts )
                                                                <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                                                @continue
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="id_card_village" class="required">Kelurahan</label>
                                                    <select id="id_card_village" name ="id_card_village" class="form-control custom-select" required>
                                                        <option disabled="disabled" selected="selected" value="">Pilih...</option>
                                                        @foreach ($villages as $key => $value )
                                                            @if( $key == $client->id_card_village )
                                                                <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                                                @continue
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="id_card_postal_code" class="required">Kode POS</label>
                                                    <input value="{{ $client->id_card_postal_code }}"  type="text" maxlength="5" class="form-control" id="id_card_postal_code" name="id_card_postal_code" placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="id_card_picture" class="required">Foto KTP</label>
                                                    <br>
                                                    <input type="file" id="file" accept="image/*" style="display:none;" name="id_card_picture" />
                                                    <button type="button" class="btn btn-outline-info" onclick="thisFileUpload();">Upload</button>
                                                </div>

                                                <div class="form-group col-md-4">
                                                <label for="id_card_picture_current">Current KTP</label>
                                                    <div class="card bg-dark text-white">
                                                        <img src="{{ Storage::disk('s3')->url('client/photos/id_card/').$client->id_card_picture }}" class="card-img" alt="...">
                                                    </div>
                                                </div>
                                            </div>

                                            <i class="material-icons">house</i>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="home_address" class="required">Alamat sekarang</label>
                                                    <input value="{{ $client->home_address }}" type="text" maxlength="60" class="form-control" id="home_address" name="home_address" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="home_province" class="required">Provinsi</label>
                                                    <input value="{{ $client->home_province }}" type="text" maxlength="20" class="form-control" id="home_province" name="home_province" placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                <label for="home_city" class="required">Kota</label>
                                                    <input value="{{ $client->home_city }}" type="text" maxlength="20" class="form-control" id="home_city" name="home_city" placeholder="" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label for="home_districts" class="required">Kecamatan</label>
                                                    <input value="{{ $client->home_districts }}" type="text" maxlength="20" class="form-control" id="home_districts" name="home_districts" placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                <label for="home_village" class="required">Kelurahan</label>
                                                    <input value="{{ $client->home_village }}" type="text" maxlength="20" class="form-control" id="home_village" name="home_village" placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="home_postal_code" class="required">Kode POS</label>
                                                    <input value="{{ $client->home_postal_code }}" type="text" maxlength="5" class="form-control" id="home_postal_code" name="home_postal_code" placeholder="" required>
                                                </div>
                                            </div>

                                            <br><br>
                                            <!-- <i class="material-icons">contact_mail</i> -->
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <label for="email_user" class="required"><i class="far fa-envelope"></i>&nbsp;&nbsp;Email</label>
                                                    <input value="{{ $client->email_user }}" type="email" maxlength="30" class="form-control" id="email_user" name="email_user" placeholder="" required>
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="facebook_id"><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;Facebook</label>
                                                    <input value="{{ $client->facebook_id }}" type="text" maxlength="30" class="form-control" id="facebook_id" name="facebook_id">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                <label for="instagram_id"><i class="fab fa-instagram"></i>&nbsp;&nbsp;Instagram</label>
                                                    <input value="{{ $client->instagram_id }}" type="text" maxlength="30" class="form-control" id="instagram_id" name="instagram_id">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="twitter_id"><i class="fab fa-twitter"></i>&nbsp;&nbsp;Twitter</label>
                                                    <input value="{{ $client->twitter_id }}" type="text" maxlength="30" class="form-control" id="twitter_id" name="twitter_id">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <label for="telph_number">Telepon Rumah</label>
                                                    <input value="{{ $client->telph_number }}" type="text" maxlength="15" class="form-control" id="telph_number" name="telph_number">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="phone_number" class="required">No. HP</label>
                                                    <input value="{{ $client->phone_number }}" type="text" maxlength="15" class="form-control" id="phone_number" name="phone_number" required>
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                <label for="relatives_phone_number">No. HP Kerabat</label>
                                                    <input value="{{ $client->relatives_phone_number }}" type="text" maxlength="15" class="form-control" id="relatives_phone_number" name="relatives_phone_number">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="user_hobby_1">Hobi-1</label>
                                                    <input value="{{ $client->user_hobby_1 }}" type="text" maxlength="20" class="form-control" id="user_hobby_1" name="user_hobby_1">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <label for="user_hobby_2">Hobi-2</label>
                                                    <input value="{{ $client->user_hobby_2 }}" type="text" maxlength="20" class="form-control" id="user_hobby_2" name="user_hobby_2">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="user_hobby_3">Hobi-3</label>
                                                    <input value="{{ $client->user_hobby_3 }}" type="text" maxlength="20" class="form-control" id="user_hobby_3" name="user_hobby_3">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                <label for="user_supervisor">Supervisor</label>
                                                    <input value="{{ $client->user_supervisor }}" type="text" maxlength="30" class="form-control" id="user_supervisor" name="user_supervisor">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="user_coordinator">Koordinator</label>
                                                    <input value="{{ $client->user_coordinator }}" type="text" maxlength="30" class="form-control" id="user_coordinator" name="user_coordinator">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <label  for="user_position">Posisi</label>
                                                    <input value="{{ $client->user_position }}" type="text" maxlength="20" class="form-control" id="user_position" name="user_position">
                                                </div>

                                                <div class="form-group col-md-3">
                                                <label for="user_position_start_date" class="required">Tanggal Mulai</label>
                                                    <input value="{{ $client->user_position_start_date->toDateString()}}" type="date" class="form-control" id="datepicker" name="user_position_start_date" required>
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                <label for="user_selfie" class="required">Foto Selfie</label>
                                                    <input type="file" class="form-control" id="user_selfie" name="user_selfie">
                                                    <!-- <br>
                                                    <input type="file" id="selfie" accept="image/*" style="display:none;" name="user_selfie" />
                                                    <button type="button" class="btn btn-outline-info" onclick="thisFileUpload();">Upload</button> -->
                                                </div>

                                                <div class="form-group col-md-4">
                                                <label for="user_selfie">Current Selfie</label>
                                                    <div class="card bg-dark text-white">
                                                        <img src="{{ Storage::disk('s3')->url('client/photos/user_selfie/').$client->user_selfie }}" class="card-img" alt="...">
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <button type="submit" class="btn btn-primary">Update data</button>
                                        </form>
                                        <br>
                                        @if ($errors->any())
                                            <div class="alert alert-danger outline-alert col-md-4" role="alert">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <br>
                                        @if (session('success'))
                                            <div class="alert alert-success outline-alert col-md-4" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
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