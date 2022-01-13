@extends('layouts.admin')
@section('content-title', "Orders")

@section('content')
    @if(sizeof($orders) > 0)
        <div class="nk-block">
            <div class="card card-bordered card-preview">
                <div class="card-inner table-responsive">
                    <table id="list-order" class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Customer Name</th>
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
                                <td>{{ $order->user->name }}</td>
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
                                                            <a href="{{ route('admin.order', ['id' => $order->id]) }}">
                                                                <span>View Order</span>
                                                            </a>
                                                        </li>
                                                        @if($order->status === \App\helpers\Statuses::AWAITING_SHIPMENT)
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                               onclick="markAsShipped({{ $order->id }})">
                                                                <span>Mark as Shipped</span>
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @if($order->status !== \App\helpers\Statuses::DELIVERED)
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                               onclick="markAsDelivered({{ $order->id }})">
                                                                <span>Mark as Delivered</span>
                                                            </a>
                                                        </li>
                                                        @endif
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
    @else
        <div class="empty-state">
            <i class="bi bi-cart-check empty-state__icon icon-grey"></i>
            <p class="empty-state__description mt-2">No order has been made yet.</p>
        </div>
    @endif

    @include('partials.modals.confirm-status-modal', ['route' => route('admin.order.status')])
@endsection
@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-order').DataTable();
            } );
        })(jQuery)

        function confirmAction(id, status) {
            $('#confirmModal').modal('show');
            $('#id').val(id);
            $('#status').val(status)
        }

        function markAsShipped(id) {
            confirmAction(id, 'shipped')
        }

        function markAsDelivered(id) {
            confirmAction(id, 'delivered')
        }
    </script>
@endsection
