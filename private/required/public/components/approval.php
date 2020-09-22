
<div class="modal fade" id="approval" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?php base_url();?>teacher/include/tokens.php" method="POST">                                   
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to process?
      </div>
      <input type="hidden" value="<?php echo $token;?>" name="token">
      <input type="hidden" value="<?php echo $row['student_id'];?>" name="student" >

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Do'nt agree</button>
        <button class="button-primary" data-toggle="modal" data-target="#approval" type="submit" name="token_update">Agree</button>
                                                                           
        </form>
      </div>
    </div>
  </div>
</div>