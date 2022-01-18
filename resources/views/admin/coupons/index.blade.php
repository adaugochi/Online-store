@extends('layouts.admin')
@section('content-title', 'Coupons')

@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner table-responsive">
                <table id="list-coupons" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="field-name">S/N</th>
                        <th class="field-name">Coupon Code</th>
                        <th class="field-name">Coupon Type</th>
                        <th class="field-name">Amount</th>
                        <th class="field-name">Status</th>
                        <th class="field-name">Created At</th>
                        <th class="field-name">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>MAC29480</td>
                        <td>General</td>
                        <td>300</td>
                        <td>
                            <span class="status status-verified">Unused</span>
                        </td>
                        <td>12th Jan, 2022</td>
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
                                                    <a target="_blank" href="#">
                                                        <i class="icon bi bi-pen"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="#">
                                                        <i class="icon bi bi-check"></i>
                                                        <span>Activate</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="#">
                                                        <i class="icon bi bi-check"></i>
                                                        <span>Deactivate</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
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
                $('#list-coupons').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
