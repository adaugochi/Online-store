<!-- modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-body-md" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-between m-3">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <x-bootstrap-icon name="x-lg"/>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.save.product-category') }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="" id="categoryId" readonly>
                        <x-input name="name" placeholder="Enter category name" id="categoryName"></x-input>

                        <div class="col-12">
                            <button type="submit" class="btn btn--primary">
                                submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
