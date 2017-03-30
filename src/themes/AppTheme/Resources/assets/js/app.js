/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-present LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */

'use strict';

(function () {

  document.addEventListener('DOMContentLoaded', function () {

    FastClick.attach(document.body);

    svg4everybody();

    new BenGorCookies({
      triggers: 'html',
      maxPageYOffset: 500,
      plugins: [
        new BenGorCookiesPlugins.GoogleTagManager('GTM-XXXXX')
      ]
    });

  }, false);

}());
