import 'jquery';
import tether from 'tether';
import 'bootstrap';
import affix from './plugins/affix';

import stickyHeader from './sticky-header';
import primaryMenu from './primary-menu';

window.Tether = tether;
window.affix = affix;


// Page Pre-Loader
$(window).load(() => {
  $('.page-pre-loader div').delay(0).fadeOut();
  $('.page-pre-loader').delay(200).fadeOut('slow');
});

$(document).ready(() => {
  stickyHeader();
  primaryMenu();
});
