<!-- modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-body-sm" role="document">
        <div class="modal-content">
            <div class="d-flex align-items-end m-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <x-bootstrap-icon name="x-lg"/>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $route }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" id="id" readonly>
                        <input type="hidden" name="status" id="status" readonly>
                        <div class="col-12">
                            <p>Are you sure?</p>
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
