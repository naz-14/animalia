const bar = document.querySelector('.bar'),
      closeBtnWrapper = document.querySelector('.close-btn'),
      closeBtn = document.querySelector('.close-menu-btn'),
      hamburgerButton = document.querySelector('.hamburger-btn'),
      navegation = document.querySelector('.navegation');
      searchForm = document.querySelector('.search-form')
let barHeight = bar.clientHeight;


closeBtnWrapperHeight()

window.addEventListener('resize', windowResize);

searchForm.addEventListener('submit', validation);
hamburgerButton.addEventListener('click', showNavMenu);
navegation.addEventListener('click', clickInsideNavegation)

function windowResize () {
  getBarHeight();
  closeBtnWrapperHeight();
}

function getBarHeight() {
  barHeight = bar.clientHeight;
}

function closeBtnWrapperHeight() {
  closeBtnWrapper.style.height = barHeight + "px";
}

function showNavMenu(e) {
  e.preventDefault();
  navegation.classList.add("show");
  closeBtn.addEventListener('click', closeNavMenu);
}

function closeNavMenu(e) {
  if (e) {
    e.preventDefault();
  }
  navegation.classList.remove('show');
  document.querySelectorAll('.submenu').forEach((submenu)=> {
    submenu.classList.remove("show");
  });
  document.querySelectorAll('.navegation__link').forEach((link)=> {
    link.classList.remove("text-left");
  })
  closeBtn.removeEventListener('click',closeNavMenu);
}

function clickInsideNavegation(e) {
  if (e.target.classList.contains('navegation__link')) {
    e.preventDefault();
    menuClick(e.target);
  }
}
function menuClick(menuClicked) {
  if (menuClicked.nextElementSibling) {
    const submenu = menuClicked.nextElementSibling;
    submenu.classList.toggle('show');
    menuClicked.classList.toggle('text-left');
  } else {
    window.location.href = menuClicked.href;
  }
}
function validation(e) {
  e.preventDefault();
  const search = document.querySelector('#search').value.trim();
  if (search !== '') {
    searchForm.submit();
    return
  }
}