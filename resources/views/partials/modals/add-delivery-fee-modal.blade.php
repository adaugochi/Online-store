<!-- modal -->
<div class="modal fade" id="feeModal" tabindex="-1" role="dialog" aria-labelledby="feeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-body-md" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-between m-3">
                <h5 class="modal-title">Add Delivery Fee Per Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <x-bootstrap-icon name="x-lg"/>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.save.delivery-fee') }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="" id="feeId" readonly>
                        <div class="col-12">
                            <div class="form-input">
                                <select class="select" name="country" id="country">
                                </select>
                                @include('partials.error', ['fieldName' => 'country'])
                            </div>
                        </div>
                        <x-input name="amount" placeholder="Enter Amount charge *" type="number" column="col-12" id="amount"/>
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
