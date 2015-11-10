/*
 * This file is part of the DWeek project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Gorka Laucirica <gorka@lin3s.com>
 */

'use strict';

(function ($) {
  if (!localStorage.getItem('cookies')) {
    $('.cookies').addClass('cookies--visible');
  }
  $('.cookies__actions .button').click(function () {
    localStorage.setItem('cookies', true);
    $('.cookies').removeClass('cookies--visible');
  })
}(jQuery));
