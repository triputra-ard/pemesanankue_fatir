<div  id="finish-<?php echo $view['id_pengiriman']; ?>" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm animated--grow-in" role="document">
        <div class="modal-content">
          <div class="modal-body bg-success">
            <h4 class="text-lg text-white text-center">Apa pesanan anda sudah tiba ?</h4>
            <br>
            <center>
            <form class="" action="control/script.transaction" method="post">
              <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
              <input type="text" hidden name="delivery" value="<?php echo encrypt($view['id_pengiriman']); ?>">
              <button type="submit" name="done" class="btn btn-primary" > Ya </button>
            </form>
            <button class="btn btn-dark btn-outline" type="button" data-dismiss="modal">Tutup </button>
          </center>
          </div>
        </div>
    </div>
</div>
