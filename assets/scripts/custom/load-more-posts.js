const loadMorePosts = () => {
  jQuery('.universal__posts-container-infinite-scroll').each(function () {
    var g = jQuery(this);

    // Infinite scroll
    jQuery(g).infinitescroll({
      animate: true,
      behavior: 'local',
      navSelector: '.universal__infinite-scroll-trigger',
      nextSelector: 'li.page-item a.universal__pagination-next',
      itemSelector: 'article.post',
      loading: {
        finishedMsg: '<div class="universal__loading-container-finished-message">No more posts</div>',
        msgText: '<div class="universal__loading-container"><div class="universal__loading-msg">Loading Posts</div></div>',
      },
      maxPage: g.data('pages') ? g.data('pages') : void 0,
    }, function (data, options) {
      if (options.maxPage === options.state.currPage) {
        jQuery('.universal__load-more-button').hide();
      }
      // For isotope
    });

    // Infinite scroll load more button
    if (jQuery(g).hasClass('universal__posts-container-load-more') && jQuery(g).infinitescroll("unbind")) {
      jQuery('.universal__load-more-button').click(function (e) {
        e.preventDefault();
        jQuery(g).infinitescroll('retrieve');
      });
    }
  });
};

export default loadMorePosts;
