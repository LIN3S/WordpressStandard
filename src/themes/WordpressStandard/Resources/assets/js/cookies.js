/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <bespina@lin3s.com>
 */

'use strict';

(function ($) {

  var $allLinks = $('a, button, .cookies__actions .button'),
    $window = $(window),
    scrollTop = 400;

  if (!localStorage.getItem('cookies')) {
    $('.cookies').addClass('cookies--visible');
  }

  function acceptCookies() {
    localStorage.setItem('cookies', true);
    $('.cookies').removeClass('cookies--visible');
  }

  $allLinks.click(function () {
    acceptCookies();
  });

  $window.on('scroll', function () {
    if (typeof window.requestAnimationFrame !== 'undefined') {
      if ($(this).scrollTop() > scrollTop) {
        window.requestAnimationFrame(acceptCookies);
      }
    } else {
      if ($(this).scrollTop() > scrollTop) {
        acceptCookies();
      }
    }
  });

}(jQuery));
