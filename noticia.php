<?php 
$newSelected = $_GET['noticia'];
$str = file_get_contents('data/news.json');
$data = json_decode($str);
$new = $data->$newSelected;
?>
<?php include_once 'inc/templates/header.php';
?>
<header class="bar">
  <div class="content">
    <?php include_once 'inc/templates/bar.php'?>
  </div>
</header>
<main class="noticia">
  <div class="noticia-wrapper content">
    <h2 class="noticia-title title">Noticias</h2>
    <p class="noticia-second-text">reciantes:</p>
    <div class="noticia-wrapper-content">
      <div class="noticia-image-wrapper">
        <img src="<?php echo $new->image;?>" alt="">
      </div>
      <div class="noticia-text-wrapper">
        <h2 class="noticia-subtitle subtitle"><?php echo $new->title;?></h2>
        <p class="noticia-text text">
          <?php echo $new->info;?>
        </p>
      </div>
    </div>
  </div>
</main>

<?php include_once 'inc/templates/footer.php'?>