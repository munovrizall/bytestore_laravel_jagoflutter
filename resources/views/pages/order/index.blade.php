@extends('layouts.app')

@section('title', 'Orders')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Order</h1>
            <div class="section-header-button">
                <a href="{{ route('order.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Order</a></div>
                <div class="breadcrumb-item">All Order</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
            <h2 class="section-title">Order</h2>
            <p class="section-lead">
                You can manage all Users, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <select class="form-control selectric">
                                    <option>Action For Selected</option>
                                    <option>Move to Draft</option>
                                    <option>Move to Pending</option>
                                    <option>Delete Pemanently</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <form method="GET" action="{{ route('order.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="transaction">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>Transaction Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Shipping Name</th>
                                        <th>Shipping Resi</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($orders as $order)
                                    <tr>

                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->total_cost }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->shipping_service }}</td>
                                        <td>{{ $order->shipping_resi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('order.edit', $order->id) }}' class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                            <div class="float-right">
                                {{ $orders->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush