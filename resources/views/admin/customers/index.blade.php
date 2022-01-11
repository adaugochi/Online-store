@extends('layouts.admin')
@section('content-title', 'Customers')

@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table id="list-customer" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="field-name">S/N</th>
                            <th class="field-name">Email</th>
                            <th class="field-name">Full Name</th>
                            <th class="field-name">Phone Number</th>
                            <th class="field-name">Status</th>
                            <th class="field-name">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->international_number }}</td>
                            <td>
                                @if($customer->verified_at)
                                    <span class="status status-verified">
                                        Verified
                                    </span>
                                @else
                                    <span class="status status-unverified">
                                        Unverified
                                    </span>
                                @endif
                            </td>
                            <td>
                                <ul class=" gx-1">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle nk-quick-nav-icon btn-trigger"
                                               data-toggle="dropdown">
                                                <i class="icon bi bi-three-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a target="_blank"
                                                           href="{{ route('admin.customer.orders', ['id' => $customer->id]) }}">
                                                            <i class="icon bi bi-cart-check"></i>
                                                            <span>My Orders</span>
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
@endsection

@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-customer').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
