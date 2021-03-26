<?php include 'inc/templates/header.php'?>

<?php 
  $qualificationSelected= $_GET['clasificacion'];
  $str = file_get_contents('data/qualifications.json');
  $data = json_decode($str);
  $data_section = $data->$qualificationSelected;
  if ($qualificationSelected === 'estructura') {
?>
<style>
  .card-image:nth-child(1) {
    object-position: top center;
  }
  @media (min-width: 768px) {
    .qualification__card:nth-child(8) {
      grid-column: span 2;
    }
  }
  @media (min-width: 1280px) {
    .qualification__card:nth-child(8) {
      grid-column: auto;
    }
  }
</style>
<?php }?>
<header class="bar">
  <div class="content">
    <?php include_once 'inc/templates/bar.php'?>
  </div>
</header>
<main class="site-qualification">
  <div class="qualification content">
    <h1 class="qualification__title title"><?php echo $data_section->title; ?></h1>
    <p class="qualifiaction__second-text"><?php echo $data_section->second_text; ?></p>
    <div class="content-wrapper">
      <?php foreach ($data_section->content as $content) {
        if ($content->type==='big-image') {?>
          <div class="qualification__big-image-wrapper">
            <img src="<?php echo $content->image?>" alt="<?php echo $content->alt?>">
          </div>
      <?php }elseif ($content->type === 'big-text') {?>
        <div class="big-text">
          <div class="qualification__big-text-wrapper">
            <p class="qualification__big-text card-text"> <?php echo $content->text?> </p>
          </div>
        </div>
      <?php } else {?>
          <div class="qualification__card">
            <a <?php if ($content->link != "") {
              echo "href= " . "animal.php?" . $content->link;
            }?> class="qualification__card-link">
              <div class="qualification__card-text-wrapper">
                <h1 class="card-title content-subtitle"><?php echo $content->title?></h1>
                <p class="card-text content-text"><?php echo $content->text?></p>
              </div>
              <?php if ($content->image) {?>
                <div class="qualification__card-image-wrapper">
                  <img src="<?php echo $content->image?>" alt="<?php echo $content->title?>" class="card-image">
                </div>
              <?php } ?>
            </a>
          </div>
      <?php }
          }?>

    </div>
  </div>
</main>


<?php include 'inc/templates/footer.php'?>