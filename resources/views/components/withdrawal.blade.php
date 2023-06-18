<form action="{{ route("withdrawal.amount") }}" method="post">
    @csrf
    <div class="modal fade" id="withdrawal_model" tabindex="-1" aria-labelledby="withdrawalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawalLabel">Withdraw Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-section-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="course-main-tabs">
                                    <div class="new-section mt-10">
                                        <div class="form_group">
                                            <label class="label25">Amount*</label>
                                            <input class="form_input_1" type="number" name="amount" id="amount" placeholder="Amount here" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="js_submit_lecture main-btn">Withdraw</button>
                </div>
            </div>
        </div>
    </div>
</form>

