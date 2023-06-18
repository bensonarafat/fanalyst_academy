<form action="{{ route("new.message") }}" method="post">
    @csrf
    <div class="modal vd_mdl fade" id="startMessage" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lectureModalLabel">Start Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="ui search focus lbel25 mt-30">
                            <label>Message*</label>
                            <div class="ui form swdh30">
                                <div class="field">
                                    <textarea rows="3" name="message" class="" required id="message" placeholder="Message here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="receiver_id" value="{{ $id }}">
                    <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="main-btn">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</form>
