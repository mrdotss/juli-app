<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }} - Dashboard</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <div class="page-options">
                            <a href="#" class="btn btn-secondary">Settings</a>
                            <a href="#" class="btn btn-primary">Upgrade</a>
                        </div>
                    </div>
                    <div class="main-wrapper">
                        <div class="row stats-row">
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                    <div class="stats-info">
                                            <h5 class="card-title">$3,089.67<span class="stats-change stats-change-danger">-8%</span></h5>
                                            <p class="stats-text">Total revenue for last  20 days</p>
                                        </div>
                                        <div class="stats-icon change-danger">
                                            <i class="material-icons">trending_down</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                        <div class="stats-info">
                                            <h5 class="card-title">168,047<span class="stats-change stats-change-success">+16%</span></h5>
                                            <p class="stats-text">Unique visitors in current period</p>
                                        </div>
                                        <div class="stats-icon change-success">
                                            <i class="material-icons">trending_up</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-transparent stats-card">
                                    <div class="card-body">
                                        <div class="stats-info">
                                            <h5 class="card-title">47,350<span class="stats-change stats-change-success">+12%</span></h5>
                                            <p class="stats-text">Total investments in this month</p>
                                        </div>
                                        <div class="stats-icon change-success">
                                            <i class="material-icons">trending_up</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card savings-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Savings<span class="card-title-helper">30 Days</span></h5>
                                        <div class="savings-stats">
                                            <h5>$4,502.00</h5>
                                            <span>Total savings for last month</span>
                                        </div>
                                        <div id="sparkline-chart-1"></div>
                                    </div>
                                </div>
                                <div class="card top-products">
                                    <div class="card-body">
                                        <h5 class="card-title">Popular Products<span class="card-title-helper">Today</span></h5>
                                        <div class="top-products-list">
                                            <div class="product-item">
                                                <h5>Alpha - File Hosting Service</h5>
                                                <span>4,037 downloads</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div>
                                            <div class="product-item">
                                                <h5>Lime - Task Managment Dashboard</h5>
                                                <span>1,876 downloads</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div>
                                            <div class="product-item">
                                                <h5>Space - Meetup Hosting App</h5>
                                                <span>1,252 downloads</span>
                                                <i class="material-icons product-item-status product-item-danger">arrow_downward</i>
                                            </div>
                                            <div class="product-item">
                                                <h5>Meteor - Messaging App</h5>
                                                <span>938 downloads</span>
                                                <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Visitors</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Reports</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Investments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="visitors-stats">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="visitors-stats-info">
                                                        <p>Total visitors in the current period:</p>
                                                        <h5>77,871</h5>
                                                        <span>6-26 Apr</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="visitors-stats-info">
                                                        <p>Unique visitors in the current period and ratio:</p>
                                                        <h5>58,403</h5>
                                                        <span>6-26 Apr</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div id="chart-visitors"></div>
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
        @livewire('script-juli')
    </body>
</html>