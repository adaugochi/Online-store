@extends('layouts.admin')
@section('content-title', 'Customers')

@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="table-responsive-md">
                <table class="table table-striped">
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
                        <tr>
                            <td>1</td>
                            <td>example@yahoo.com</td>
                            <td>John Paul</td>
                            <td>08109030683</td>
                            <td>
                                <span class="status status-verified">
                                    Verified
                                </span>
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
                                                        <a target="_blank" href="#">
                                                            <i class="icon bi bi-eye"></i>
                                                            <span>View</span>
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
