import {domReady} from '@roots/sage/client';

import 'jquery';

/**
 * External Dependencies
 */
import barba from '@barba/core';
import barbaPrefetch from '@barba/prefetch';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Glide ,{ Controls } from '@glidejs/glide'

// Our modules
import MobileMenu from "./modules/MobileMenu";
import Slider from "./modules/Slider";
import TabItems from "./modules/TabItems";


// import Transitions from './transitions';

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

  // barba.init({
  //   timeout: 15000,
  //   debug: true,
  //   transitions: [{
  //     name: 'default-transition',
  //     // BEFORE
  //     before: () => {},
  //     // before,
  //     beforeLeave: () => {},
  //     leave: (data) => {
  //       return gsap.to(data.current.container, {
  //         opacity: 0
  //       });
  //     },
  //     beforeEnter: () => {
  //       // then later in the code...
  //       window.scrollTo(scrollX, scrollY);
  //     },
  //     enter:(data) => {
  //       return gsap.from(data.next.container, {
  //         opacity: 0
  //       });
  //     },
  //     afterEnter: () => {},
  //     after: () => { }
  //   }]
  // });

  testimonials.forEach(testimonial => {
    let cards = testimonial.querySelectorAll('li');
    let randomNum = Math.floor((Math.random() * cards.length));
    cards[randomNum].classList.add('hidden');

    // gsap.to(cards[randomNum], {
    //   opacity: 0,
    //   duration: 0.65,
    //   onComplete: args => {
    //
    //   }
    // })
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
