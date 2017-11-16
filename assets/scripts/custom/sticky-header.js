const stickyHeader = () => {
  if ($('body').hasClass('sticky-header')) {
    let topBarHeight = $('#header-top-bar').innerHeight();
    let header = $('#header');
    let headerWrapper = $('#header-wrapper');
    let headerHeight = header.innerHeight();
    let outerHeight = headerHeight + topBarHeight;

    header.affix({
      offset: {
        top: outerHeight,
      },
    });

    headerWrapper.on('affix.bs.affix', () => {
      let navHeight = header.outerHeight(true);
      $('.top-wrapper').css('padding-top', navHeight);
    });

    headerWrapper.on('affix-top.bs.affix', () => {
      $('.top-wrapper').css('padding-top', 0);
    });
  }
};

export default stickyHeader;
