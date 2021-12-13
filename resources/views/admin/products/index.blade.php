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
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $key+1 }}</td>--}}
{{--                            <td>{{ $category->name }}</td>--}}
{{--                            <td>--}}
{{--                                <span class="status status-{{ \App\helpers\Statuses::STATUS[$category->is_active] }}">--}}
{{--                                    {{ \App\helpers\Statuses::STATUS[$category->is_active] }}--}}
{{--                                </span>--}}
{{--                            </td>--}}
{{--                            <td>{{ $category->created_at }}</td>--}}
{{--                            <td>{{ $category->updated_at }}</td>--}}
{{--                            <td class="nk-tb-col nk-tb-col-tools">--}}
{{--                                <ul class="nk-tb-actions gx-1">--}}
{{--                                    <li>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"--}}
{{--                                               data-toggle="dropdown">--}}
{{--                                                <x-bootstrap-icon name="three-dots-vertical"/>--}}
{{--                                            </a>--}}

{{--                                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                <ul class="link-list-opt no-bdr">--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0);"--}}
{{--                                                           onclick="editCategory({{ $category }})">--}}
{{--                                                            <span>Edit</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    @if($category->is_active === 1)--}}
{{--                                                        <li>--}}
{{--                                                            <a href="javascript:void(0);"--}}
{{--                                                               onclick="deactivateCategory({{ $category->id }})">--}}
{{--                                                                <span>Deactivate</span>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @else--}}
{{--                                                        <li>--}}
{{--                                                            <a href="javascript:void(0);"--}}
{{--                                                               onclick="activateCategory({{ $category->id }})">--}}
{{--                                                                <span>Activate</span>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endif--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
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
                $('#list-product').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
