@extends('layouts.admin')
@section('content-title', 'Manage Delivery Fee')
@section('content-side')
    <button type="button" class="btn btn--primary" data-toggle="modal" data-target="#feeModal">
        add delivery fee
    </button>
@endsection
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner table-responsive">
                <table id="list-fee" class="table table-hover">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Country</th>
                        <th>Fee Charged</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fees as $key => $fee)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $fee->country }}</td>
                            <td>${{ number_format($fee->amount, 2) }}</td>
                            <td>{{ $fee->created_at }}</td>
                            <td>{{ $fee->updated_at }}</td>
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
                                                        <a href="javascript:void(0);"
                                                           onclick="editFee({{ $fee }})">
                                                            <span>Edit</span>
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

    @include('partials.modals.add-delivery-fee-modal')
@endsection

@section('script')
    <script src="/js/countries.js"></script>
    <script>
        populateCountries("country");

        (function ($) {
            $(document).ready(function() {
                $('#list-fee').DataTable();
            } );
        })(jQuery)

        function editFee(obj) {
            $('#feeModal').modal('show');
            $('#feeId').val(obj.id);
            $('#country').val(obj.country);
            $('#amount').val(obj.amount);
        }
    </script>
@endsection
