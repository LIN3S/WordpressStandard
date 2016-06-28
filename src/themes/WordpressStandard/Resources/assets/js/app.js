/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */

'use strict';

(function () {

  if ('addEventListener' in document) {
    document.addEventListener('DOMContentLoaded', function () {
      FastClick.attach(document.body);
      svg4everybody();
    }, false);
  }

  BenGorCookies('.bengor-cookies', {
    links: 'a, button, .bengor-cookies__actions, .bengor-cookies__button',
    maxPageYOffset: 500,
    GTMId: 'undefined'
  });

})();
