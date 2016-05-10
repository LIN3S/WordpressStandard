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

  var
    allLinks = 'a, button, .cookies__actions .button',
    $cookies = $('.cookies'),
    $window = $(window),
    scrollTop = 400;

  function setCookie(name, value, expirationDays) {
    var
      date = new Date(),
      expires = 'expires=';

    date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    expires += date.toGMTString();
    document.cookie = name + '=' + value + '; ' + expires;
  }

  function getCookie(name) {
    var cookies = document.cookie.split(';');

    name = name + '=';

    for (var i = 0, length = cookies.length; i < length; i++) {
      var cookie = cookies[i];

      while (cookie.charAt(0) == ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) == 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }

    return false;
  }

  function acceptCookies() {
    setCookie('username', Math.floor((Math.random() * 100000000) + 1), 30);
    $cookies.removeClass('cookies--visible');
  }

  function scrollingAcceptCookies() {
    if ($window.scrollTop() > scrollTop) {
      acceptCookies();
    }
  }

  $window.on('scroll', function () {
    if (typeof window.requestAnimationFrame !== 'undefined') {
      window.requestAnimationFrame(scrollingAcceptCookies);
    } else {
      scrollingAcceptCookies();
    }
  });

  $(document).ready(function () {
    if (!getCookie('username')) {
      $cookies.addClass('cookies--visible');
    }

    $(document).on('click', allLinks, function () {
      acceptCookies();
    });
  });

}(jQuery));
