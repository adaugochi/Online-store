@extends('layouts.admin')
@section('content-title', 'Product Categories')
@section('content-side')
    <button type="button" class="btn btn--primary" data-toggle="modal" data-target="#categoryModal">
        add category
    </button>
@endsection
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table id="list-category" class="table table-hover">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
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
                                                            <a href="#">
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

    @include('partials.modals.add-category')
@endsection

@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-category').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
