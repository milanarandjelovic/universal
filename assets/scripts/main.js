import 'jquery';
import tether from 'tether';
import 'bootstrap';

import affix from './plugins/affix';
require('./plugins/jquery.infinitescroll');

import stickyHeader from './custom/sticky-header';
import primaryMenu from './custom/primary-menu';
import loadMorePosts from './custom/load-more-posts';
import relatedPostsSlider from './custom/related-posts-slider';

window.Tether = tether;
window.affix = affix;

// Page Pre-Loader
$(window).load(() => {
  $('.page-pre-loader div').delay(0).fadeOut();
  $('.page-pre-loader').delay(200).fadeOut('slow');
});

$(document).ready(() => {
  $('[data-toggle="tooltip"]').tooltip();

  stickyHeader();
  primaryMenu();
  loadMorePosts();
  relatedPostsSlider();
});
