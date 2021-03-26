<?php 
  $str = file_get_contents('data/documental.json');
  $data = json_decode($str);
  $documentals = $data->documentales;
?>
<?php include 'inc/templates/header.php';?>
<header class="bar">
  <div class="content">
    <?php include 'inc/templates/bar.php';?>
  </div>
</header>
<main class="documentals-main">
  <div class="documentals-main-wrapper content">
    <h1 class="documentals-title title">Documentales</h1>
    <p class="documentals-second-text">animales:</p>
    <div class="documentals-wrapper">
      <?php foreach ($documentals as $documental) { ?>
        <div class="documental-card-wrapper">
          <a href="<?php echo $documental->link;?>" class="documental-card-link">
            <img src="<?php echo $documental->image;?>" alt="" class="documental-card-image">
            <div class="documental-card__text-wrapper">
              <h2 class="documental-card-title subtitle"><?php echo $documental->title;?></h2>
              <p class="documental-card-description text"><?php echo $documental->info;?></p>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</main>
<?php include 'inc/templates/footer.php';?>
