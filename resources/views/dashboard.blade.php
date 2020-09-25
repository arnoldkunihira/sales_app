@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex">{{ __('Sales Dashboard Statistics') }}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('import') }}">{{ __('CSV File Upload') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="collapse show" id="collapseSearchCard">
                    <div class="card-body">
                        <p class="text-gray-900">The Sales Filter/Search Options</p>
                        <form id="">
                            <div class="card card-body bg-light">
                                <div class="row text-gray-800">
                                    <div class="form-group filter-input ml-2 mr-2">
                                        <label>Date From</label>
                                        <input class="date form-control" type="text">
                                    </div>
                                    <div class="form-group filter-input mr-2">
                                        <label>Date To</label>
                                        <input class="date form-control" type="text">
                                    </div>
                                    <div class="form-group mt-2 pl-1">
                                        <button type="submit" class="btn btn-success mt-4 mb-4">
                                            <i class="fas fa-filter fa-sm text-white"></i>Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-gray-900">The Sales dashboard displays statistics about International Sales Firm</p>

                    <div class="row">
                        <!-- Total Profit Made Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Sales Profit Made
                                            </div>
                                            <hr>
                                            <div class="text-md-left font-weight-normal text-gray-800 mb-2">
                                                Total Profit Made: UGX <b>{{ number_format($stats['total_profit_made']) }}</b>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profitable Items Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sales Profitable Items</div>
                                            <hr>
                                            <div class="text-md-left font-weight-normal text-gray-900 mb-2">
                                                First Item: <b>{{ $stats['profitable_items'][1]->item_type }}</b>
                                            </div>
                                            <div class="text-md-left font-weight-normal text-gray-900 mb-2">
                                                Second Item: <b>{{ $stats['profitable_items'][2]->item_type }}</b>
                                            </div>
                                            <div class="text-md-left font-weight-normal text-gray-900 mb-2">
                                                Third Item: <b>{{ $stats['profitable_items'][3]->item_type }}</b>
                                            </div>
                                            <div class="text-md-left font-weight-normal text-gray-900 mb-2">
                                                Fourth Item: <b>{{ $stats['profitable_items'][4]->item_type }}</b>
                                            </div>
                                            <div class="text-md-left font-weight-normal text-gray-900 mb-2">
                                                Fifth Item: <b>{{ $stats['profitable_items'][5]->item_type }}</b>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
