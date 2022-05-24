import {domReady} from '@roots/sage/client';

import 'jquery';

/**
 * External Dependencies
 */
import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Our modules
import MobileMenu from "./modules/MobileMenu";
import TabItems from "./modules/TabItems";


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);


(() => {

  document.body.classList.remove('loading');
  const header = document.querySelector('.header');
  const cards = document.querySelectorAll('.cardComponent');
  const testimonials = document.querySelectorAll('.testimonials_listing')

  gsap.registerPlugin(ScrollTrigger);

  barba.use(barbaPrefetch);
  barba.hooks.afterLeave(({ next }) => {
    document.body.setAttribute(
      'class',
      next.html
        .match(/<body class="(.*?)"/g)[0]
        .replace('<body class="', '')
        .replace('"', ''),
    );
  });

  barba.hooks.beforeEnter(() => {
    if (history.scrollRestoration) {
      history.scrollRestoration = 'manual';
    }
  });

  let scrollX = 0
  let scrollY = 0

  barba.hooks.leave(() => {
    scrollX = barba.history.current.scroll.x;
    scrollY = barba.history.current.scroll.y;
  });

  testimonials.forEach(testimonial => {
    let cards = testimonial.querySelectorAll('li');
    let randomNum = Math.floor((Math.random() * cards.length));
    cards[randomNum].classList.add('hidden');
  })

  document.addEventListener("scroll", function() {
    if (window.scrollY > header.offsetHeight) {
      header.classList.add("active");
    } else {
      header.classList.remove("active");
    }
  });


  new MobileMenu()
  cards.forEach(card => {
    new TabItems(card)
  })

})();
