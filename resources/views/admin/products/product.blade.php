@extends('layouts.admin')
@section('content-title', 'Product')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="contact-from-wrapper section-space--mt_30">
                    <form action="{{ route('admin.product.save') }}" method="post" id="productForm">
                        @csrf
                        <div class="contact-page-form">
                            <div class="row">
                                <x-input name="name"
                                         placeholder="Product Name *"
                                         value="{{ old('name') }}"
                                         column="col-md-6"/>
                                <x-input name="quantity"
                                         type="number"
                                         placeholder="Product Quantity *"
                                         value="{{old('quantity')}}"
                                         column="col-md-6 pl-2"/>
                                <x-input name="unit_price"
                                         placeholder="Product Unit Price *"
                                         value="{{ old('unit_price') }}"
                                         type="number"
                                         column="col-md-6 pl-2"></x-input>
                                <x-input name="discount"
                                         type="number"
                                         placeholder="Product Discount *"
                                         value="{{old('discount') ?? 0}}"
                                         column="col-md-6 pl-2"></x-input>
                                <div class="col-12">
                                    <div class="form-input">
                                        <select name="category_id">
                                            <option value="">Select the category the product belongs to *</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input">
                                        <select data-search="on" id="size" name="size[]"
                                                class="form-select" multiple="multiple"
                                                data-placeholder="Select the sizes available *">
                                            @foreach(\App\Models\Product::$sizes as $key => $size)
                                                <option value="{{ $key }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input">
                                        <div class="form-control-wrap">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Upload image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input">
                                        <textarea placeholder="Briefly describe the product *"
                                            name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-submit-btn">
                                <button class="btn btn--black btn-block" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
