<!-- Modal -->
<div class="modal fade" id="modal-print" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                {{-- <div id="modal-loader" class="spinner-border" style="display:none;" role="status">
                    <span class="sr-only">Loading...</span>
                </div> --}}
                <div class="d-flex justify-content-center">
                    <div id="modal-loader" class="spinner-border" role="status" style="display:none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <!-- content will be load here -->
                <div id="modal-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal-btn-print">Print</button>
            </div>
        </div>
    </div>
</div>
