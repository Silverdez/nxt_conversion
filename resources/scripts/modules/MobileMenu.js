import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
gsap.registerPlugin(ScrollToPlugin);

class MobileMenu {
  // 1. describe and create/initiate our object
  constructor() {
    this.toggleBtn = document.querySelector('.header_menu-toggle');
    this.navMenu = document.querySelector('.header_main-nav');
    this.navEnd = false;
    this.events();

    this.tl = gsap.timeline({paused: true});

    this.tl.to(this.navMenu, {
      // xPercent: -100,
      // left: '-100%',
      opacity: 1,
      display: "block",
      duration: 0.65,
      onComplete: args => {
        this.navEnd = true
      }
    })
  }

  // 2. events
  events(){
    this.toggleBtn.addEventListener('click',this.navMethods.bind(this))
  }

  // 3. methods (function, action...)
  navMethods(){
    // this.navMenu.classList.toggle('test')
    if (!this.navEnd){
      this.tl.play()
    } else{
      this.tl.reverse()
      this.navEnd = false
    }
  }
}

export default MobileMenu;
