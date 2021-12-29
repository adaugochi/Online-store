@extends('layouts.portal')
@section('title', 'My Orders')
@section('header-breadcrumb')
    <li><a href="{{ route('customer.home') }}">Dashboard</a></li>
    <li class="active">Orders</li>
@endsection()
@section('content')
    <div class="container py-5">
        <div class="nk-block">
            <div class="card card-bordered card-preview">
                <div class="card-inner table-responsive">
                    <table id="list-order" class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Order Number</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>
                                <span class="status status-{{ $order->status }}">
                                    {{ \App\helpers\Statuses::STATUS[$order->status] }}
                                </span>
                                </td>
                                <td>${{ number_format($order->total_amount, 2) }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                   data-toggle="dropdown">
                                                    <x-bootstrap-icon name="three-dots-vertical"/>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="{{ route('customer.order', ['id' => $order->id]) }}">
                                                                <span>View Order</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-order').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
