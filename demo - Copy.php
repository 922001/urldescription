<div class="row">
  <div class="col-4">col-4</div>
  <div class="col-8">col-8</div>
</div>
<div class="row">
  <div class="col-sm-4" style="background-color:peachpuff;">Question
            <?php echo $question['question_number']; ?> <hr><?php echo $question['text']; ?>
        </div>
  <div class="col-sm-8" style="background-color:lavenderblush;"><div class="alert alert-info">Question
            <?php echo $question['question_number']; ?> of
            <?php echo $total; ?>
        </div>