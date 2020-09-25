@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex">{{ __('Import Sales File') }}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('import') }}" method="POST" name="importform" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Upload File</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 pt-4">
            <div class="card">
                <div class="card-header">{{ __('Sales Records') }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Date</th>
                                        <th>Order Priority</th>
                                        <th>Units Sold</th>
                                        <th>Unit Price</th>
                                        <th>Total Cost</th>
                                        <th>Total Revenue</th>
                                        <th>Item Type</th>
                                    </tr>
                                </thead>

                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->order_date }}</td>
                                        <td>{{ $sale->order_priority }}</td>
                                        <td>{{ $sale->units_sold }}</td>
                                        <td>{{ number_format($sale->unit_price) }}</td>
                                        <td>{{ number_format($sale->total_cost) }}</td>
                                        <td>{{ number_format($sale->total_revenue) }}</td>
                                        <td>{{ $sale->item_type }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
