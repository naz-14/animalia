<?php 
$str = file_get_contents('data/news.json');
$data = json_decode($str);
?>
<?php include_once 'inc/templates/header.php'?>
<header class="bar">
  <div class="content">
    <?php include_once 'inc/templates/bar.php'?>
  </div>
</header>

<main class="news">
  <div class="news-wrapper content">
    <h1 class="news-title title">Noticias</h1>
    <p class="news-second-text">recientes:</p>
    <div class="news-content">
      <?php foreach ($data->news as $new) { ?>
        <div class="new-wrapper">
          <a href="noticia.php?noticia=<?php echo $new->link?>" class="new-link">
            <div class="new-image-wrapper">
              <picture>
                <source srcset="<?php echo $new->preview_webp?>" type="image/webp">
                <img src="<?php echo $new->preview ?>" alt="new-preview" class="new-image">
              </picture>
            </div>
            <div class="new-text-wrapper">
              <h2 class="new-title subtitle"><?php echo $new->title?></h2>
              <p class="text"><?php echo $new->description?></p>
            </div>
          </a>
        </div>
      <?php }?>
    </div>
  </div>
</main>



<?php include_once 'inc/templates/footer.php'?>
