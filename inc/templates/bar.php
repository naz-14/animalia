<div class="bar-wrapper">
  <div class="logo-wrapper">
    <h1 class="logo">Animalia</h1>
  </div>
  <div class="search-form__wrapper">
    <form action="./animal.php" method="GET" class="search-form">
      <div class="search-form__input-wrapper">
        <input type="text" name="animal" id="search" class="search-form__input" placeholder="Buscar" autocomplete="off">
      </div>
      <div class="search-form__button-wrapper">
        <button type="submit" class="search-submit" id="searchSubmitBtn">-></button>
      </div>
    </form>
  </div>
  <nav class="navegation">
    <ul class="navegation__ul">
      <li class="close-btn"><a href="#" class="close-menu-btn"><img src="img/close-btn.svg" alt="close button" class="cross"></a></li>
      <li class="navegation__li menu">
        <a href="animales.html" class="navegation__link">Clasificación</a>
        <ul class="submenu">
          <li class="submenu__li"><a href="clasificacion.php?clasificacion=estructura" class="submenu__link">Segun su estructura</a></li>
          <li class="submenu__li"><a href="clasificacion.php?clasificacion=domesticos" class="submenu__link">Domésticos</a></li>
          <li class="submenu__li"><a href="clasificacion.php?clasificacion=salvajes" class="submenu__link">Salvajes</a></li>
        </ul>
      </li>
      <li class="navegation__li menu"><a href="noticias.php" class="navegation__link">noticias</a></li>
      <li class="navegation__li menu"><a href="documentales.php" class="navegation__link">documentales</a></li>
    </ul>
  </nav>
  <div class="icons">
    <button class="hamburger-btn">
      <img src="img/hamburger-animalia.svg" alt="hamburger menu" class="hamburger">
    </button>
  </div>
</div>