import 'jquery';
import tether from 'tether';

window.Tether = tether;
import 'bootstrap';

// Page Pre-Loader
$(window).load(() => {
  $('.page-pre-loader div').delay(0).fadeOut();
  $('.page-pre-loader').delay(200).fadeOut('slow');
});
