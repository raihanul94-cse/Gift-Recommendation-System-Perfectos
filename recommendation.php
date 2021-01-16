<?php include 'includes/header.php'; ?>
<div class="alert alert-primary" role="alert">
  <marquee behavior="scroll" direction="left">Winter flash sell...Buy now and get 20% off</marquee>
</div>
<div class="container">
  <div class="d-flex p-2 bd-highlight">
  <div class="card-deck">
    <div class="row" id="recommendation-item">
    	<?php include 'backend/getrecommendation.php'; ?>
  </div>   
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>