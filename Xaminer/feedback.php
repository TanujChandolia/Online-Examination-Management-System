
<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Feedback Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                <label for="name"><strong>Name:</strong></label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="name" id="name1" value="option1" checked>
                  <label class="form-check-label" for="name">
                    <?php
                       echo $_SESSION['name'];
                    ?>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="name" id="name2" value="option2">
                  <label class="form-check-label" for="name">
                      Anonymous
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="message"><strong>Feedback Message:</strong></label>
                <textarea class="form-control" id="message" rows="6"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit Feedback</button>
      </div>
    </div>
  </div>
</div>