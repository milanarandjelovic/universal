const primaryMenu = () => {
  let screenMd = window.matchMedia("min-width: 992px");

  if (screenMd) {
    $('ul#universal-primary-menu li.dropdown').hover(
      function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      },
      function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      }
    );
  }
};

export default primaryMenu;
