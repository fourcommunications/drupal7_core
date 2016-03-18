/**
 * @file
 * monkey.js
 */
$(function() {
  // If we have a Greyhead megamenu on the page, calculate the maximum height of
  // the drop-down mega menus and set a CSS class.
  if ($('.greyhead-megamenu').length) {
    var maxHeight = 0;

    $('.greyhead-megamenu .megamenu-container .row').each(function() {
      if ($(this).outerHeight() > maxHeight) {
        maxHeight = $(this).outerHeight();
      }
    });

    alert(maxHeight);

    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = 'div.greyhead-megamenu li:hover .megamenu-container { height: ' + maxHeight + 'px; }';
    document.body.appendChild(css);
  }
});
