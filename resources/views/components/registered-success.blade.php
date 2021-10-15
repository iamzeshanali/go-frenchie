
    <div id="success" class="modal fade show" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h3 class="modal-title gf-red">Registered Successfully.</h3>
                    <button type="button" onclick="closeSuccessModal()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {{ \Session::get('error') }}
                    </div>
                @endif
                @csrf
                <div class="modal-body">
                    <p>You have been registered successfully. Your listing has been saved. Login to see all Favourite listings.</p>
                </div>


            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function (){
        if($('#success').hasClass("show")){
            $('#success').modal('show');
        }
    });

    function closeSuccessModal(){
        $('#success').modal('hide');
    }
</script>
