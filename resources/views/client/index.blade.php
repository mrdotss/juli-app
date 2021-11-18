<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} - Client Info</title>
        @livewire('assets-juli')
        <link href="{{url('backend/dashboard/assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet"> 
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
                                    <p class="page-desc"><b>List Data Karyawan</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                            <a href="{{ route('client.create') }}" class="btn btn-outline-primary m-b-md">Add Data</a>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Client Info</h5>
                                        @if (session('success'))
                                            <div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
                                                <strong>{{ session('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <br>
                                        @endif
                                        <table id="zero-conf" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <!-- <th>Phone</th> -->
                                                    <th>Join At</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(Auth::user())
                                                    @foreach ($clients as $client)
                                                        @if ($client->user_id == Auth::id())
                                                            <tr>
                                                            <td><img src="{{ Storage::url('public/client/photos/user_selfie/').$client->user_selfie }}" class="rounded" style="width: 65px"></td>
                                                                <td>{{ $client->full_name }}</td>
                                                                <td>{{ $client->user_position }}</td>
                                                                <td>{{ $client->user_position_start_date->toDateString()}}</td>
                                                                <td>
                                                                    
                                                                    <a href="{{ route('client.show',$client->id) }}" class="btn btn-outline-info"><i class="far fa-eye"></i></a>
                                                                    <a href="{{ route('client.edit',$client->id) }}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                                                    <!-- <button href="javascript:void(0);" onclick=
                                                                    "
                                                                    if (confirm('Hapus data {{ $client->full_name }}?')) {
                                                                        document.getElementById('delete-employee').submit();
                                                                    }
                                                                    " type="button" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>

                                                                    <form id="delete-employee" method="POST" action="{{ route('client.destroy', $client->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form> -->

                                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>

                                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">

                                                                                <!-- Header -->
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <i class="material-icons">close</i>
                                                                                    </button>
                                                                                </div>

                                                                                <!-- Body -->
                                                                                <div class="modal-body">
                                                                                    Yakin ingin menghapus data ini?<br>
                                                                                    {{ $client->full_name }}
                                                                                </div>
                                                                                
                                                                                <!-- Footer -->
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                                    <button href="javascript:void(0);" onclick="document.getElementById('delete-employee').submit();" 
                                                                                        type="button" class="btn btn-outline-danger">Hapus</button>
                                                                                        <form id="delete-employee" method="POST" action="{{ route('client.destroy', $client->id) }}">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                        </form>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Group</th>
                                                    <th>Start date</th>
                                                    <th><center>Action</center></th>                                        
                                                </tr>
                                            </tfoot>
                                        </table>
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
        @livewire('script-client-juli-show')
    </body>
</html>