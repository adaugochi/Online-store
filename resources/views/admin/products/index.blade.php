@extends('layouts.admin')
@section('content-title', 'List of Products')
@section('content-side')
    <a href="{{ route('admin.product') }}" class="btn btn--primary">
        add product
    </a>
@endsection
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table id="list-product" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price  }}</td>
                            <td>
                                <span class="status status-{{ \App\helpers\Statuses::STATUS[$product->is_active] }}">
                                    {{ \App\helpers\Statuses::STATUS[$product->is_active] }}
                                </span>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->created_at }}</td>
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
                                                        <a href="{{ route('admin.product', ['id' => $product->id]) }}">
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    @if($product->is_active === 1)
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                               onclick="deactivateProduct({{ $product->id }})">
                                                                <span>Deactivate</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                               onclick="activateProduct({{ $product->id }})">
                                                                <span>Activate</span>
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

    @include('partials.modals.confirm-status-modal', ['route' => route('admin.product.update-status')])
@endsection
@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-product').DataTable();
            } );
        })(jQuery)

        function confirmAction(id, status) {
            $('#confirmModal').modal('show');
            $('#id').val(id);
            $('#status').val(status)
        }

        function deactivateProduct(id) {
            confirmAction(id, 'inactive')
        }

        function activateProduct(id) {
            confirmAction(id, 'active')
        }
    </script>
@endsection
