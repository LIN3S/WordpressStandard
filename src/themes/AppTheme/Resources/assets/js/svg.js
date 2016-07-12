/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Beñat Espiña <bespina@lin3s.com>
 */

'use strict';

if (SVGElement && SVGElement.prototype) {
  SVGElement.prototype.hasClass = function (className) {
    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(this.getAttribute('class'));
  };

  SVGElement.prototype.addClass = function (className) {
    if (!this.hasClass(className)) {
      this.setAttribute('class', this.getAttribute('class') + ' ' + className);
    }
  };

  SVGElement.prototype.removeClass = function (className) {
    var removedClass = this.getAttribute('class').replace(new RegExp('(\\s|^)' + className + '(\\s|$)', 'g'), '$2');
    if (this.hasClass(className)) {
      this.setAttribute('class', removedClass);
    }
  };

  SVGElement.prototype.toggleClass = function (className) {
    if (this.hasClass(className)) {
      this.removeClass(className);
    } else {
      this.addClass(className);
    }
  };
}
