<?php include 'inc/templates/header.php'?>

<?php 
  $animalSelected= strtolower($_GET['animal']);
  $str = file_get_contents('data/animal.json');
  $data = json_decode($str);
  $data_section = $data->$animalSelected;
  if ($data_section === NULL) {
    header('Location:./notFound.php');
  }
  $documentalStr = file_get_contents('data/documental.json');
  $documentalData = json_decode($documentalStr);
  $documentales = $documentalData->documentales;
?>

<header class="bar">
  <div class="content">
    <?php include_once 'inc/templates/bar.php'?>
  </div>
</header>
<main class="animal-main">
  <div class="animal-main__wrapper content">
    <h1 class="animal-main__title"><?php echo $data_section->title; ?></h1>
    <p class="animal-main__second-text"><?php echo $data_section->second_text; ?></p>
    <div class="animal-main__content-wrapper">
      <?php foreach ($data_section->content as $content) { ?>
        <?php switch ($content->type) {
          case 'bigcard': ?>
            <div class="bigcard__wrapper section">
              <img class= "bigcard__image"src="<?php echo $content->image; ?>" alt="">
              <h1 class="bigcard__title subtitle"><?php echo $content->title; ?></h1>
              <p class="bigcard__text text"><?php echo $content->text; ?><br><br></p>
              <p class="bigcard__text_two text"><?php echo $content->text; ?></p>
            </div>
            <?php break;
          case 'two_columns': ?>
            <div class="animal-main__two-columns-wrapper section">
              <div class="animal-main__two-columns-left">
                <?php foreach ($content->left as $element) { 
                  switch ($element->content) {
                    case 'image': ?>
                      <div class="animal-main__two-columns-image-wrapper">
                        <img src="<?php echo $element->image; ?>" alt="" class="animal-main__two-columns-image">
                        <?php if ($element->image_text) { ?>
                          <p class="animal-main__two-columns-image-text text"><?php echo $element->image_text; ?></p>
                        <?php } ?>
                      </div>
                      <?php break;
                    case 'text_card': ?>
                      <div class="animal-main__two-columns-text-card">
                        <h2 class="animal-main__two-columns-title subtitle"><?php echo $element->title;?></h2>
                        <p class="animal-main__two-columns-text text"><?php echo $element->text; ?></p>
                      </div>
                      <?php break;
                    default:
                      # code...
                      break;
                  }?>
                  
                <?php } ?>
              </div>
              <div class="animal-main__two-columns-right">
                <?php foreach ($content->right as $element) { 
                  switch ($element->content) {
                    case 'image': ?>
                      <div class="animal-main__two-columns-image-wrapper">
                        <img src="<?php echo $element->image; ?>" alt="" class="animal-main__two-columns-image">
                        <?php if ($element->image_text) { ?>
                          <p class="animal-main__two-columns-image-text"><?php echo $element->image_text; ?></p>
                        <?php } ?>
                      </div>
                      <?php break;
                    case 'text_card': ?>
                      <div class="animal-main__two-columns-text-card">
                        <h2 class="animal-main__two-columns-title subtitle"><?php echo $element->title;?></h2>
                        <p class="animal-main__two-columns-text text"><?php echo $element->text; ?></p>
                      </div>
                      <?php break;
                    default:
                      # code...
                      break;
                  }?>
                  
                <?php } ?>
              </div>
            </div>
          <?php default:
            # code...
            break;
        }?>
      <?php } ?>
    </div>
      <?php
        function animalDocumentals($documentalObj)
        {
          global $animalSelected;
          if (in_array($animalSelected, $documentalObj->animal)) {
            return $documentalObj;
          }
        }
        $documentals = array_filter($documentales,"animalDocumentals");
        if (count($documentals) > 0) { 
      ?>
        <div class="animal-main__documentals">
          <h2 class="subtitle">Documentales relacionados:</h2>
          <div class="animal-main__documentals-wrapper">
            <?php foreach ($documentals as $documental) { ?>
              <div class="documental-card-wrapper <?php if (count($documentals) < 2){echo "span2";}?>">
                <a href="<?php echo $documental->link;?>" class="documental-card-link">
                  <img src="<?php echo $documental->image;?>" alt="" class="documental-card-image">
                  <div class="documental-card__text-wrapper">
                    <h2 class="documental-card-title subtitle"><?php echo $documental->title;?></h2>
                    <p class="documental-card-description documental-text"><?php echo $documental->info;?></p>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php
        }
      ?>
  </div>
</main>

<?php include 'inc/templates/footer.php'?>