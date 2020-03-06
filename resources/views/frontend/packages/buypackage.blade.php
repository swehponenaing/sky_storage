
<div class="modal fade" id="buy_package" tabindex="-1" role="dialog" aria-labelledby="buy_package" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="buy_package">💫Buying Storage Amount💫</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">


        Choose Payment Type 💸💵💳<br>

        <i class="fa fa-cc-paypal" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-visa" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-cc-mastercard" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <i class="fa fa-credit-card" style="color: blue;font-size: 30px;padding: 5px;" onclick="document.getElementById('form').style.display='block';"></i>

        <br>


        <form style="display: none;" id="form">

          <div class="form-group">
            <label for="account" class="col-form-label">Account:</label>
            <input type="text" class="form-control" id="account">
            <button class="btn btn-secondary" onclick="showMain()">Payment</button>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@section('script')
<script type="text/javascript">
  $('#buy_package').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
@endsection