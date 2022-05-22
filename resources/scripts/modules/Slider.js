import { gsap } from "gsap";
import { Draggable } from "gsap/Draggable";
gsap.registerPlugin(Draggable);

class Slider{
  // 1. describe and create/initiate our object
  constructor() {
    this.slideDelay = 1.5;
    this.slideDuration = 0.3;
    this.snapX;

    this.slides = document.querySelectorAll(".slide");
    this.prevButton = document.querySelector("#prevButton");
    this.nextButton = document.querySelector("#nextButton");
    this.progressWrap = gsap.utils.wrap(0, 1);

    this.numSlides = this.slides.length;

    gsap.set(this.slides, {
      xPercent: i => i * 100
    });

    this.wrap = gsap.utils.wrap(-100, (this.numSlides - 1) * 100);
    this.timer = gsap.delayedCall(this.slideDelay, this.autoPlay);

    this.animation = gsap.to(this.slides, {
      xPercent: "+=" + (this.numSlides * 100),
      duration: 1,
      ease: "none",
      paused: true,
      repeat: -1,
      modifiers: {
        xPercent: this.wrap
      }
    });

    this.proxy = document.createElement("div");
    this.slideAnimation = gsap.to({}, {});
    this.slideWidth = 0;
    this.wrapWidth = 0;
    this.resize();
    this.events()

    this.draggable = new Draggable(this.proxy, {
      trigger: ".slides-container",
      inertia: true,
      onPress: this.updateDraggable,
      onDrag: this.updateProgress,
      onThrowUpdate: this.updateProgress,
      snap: {
        x: this.snapX
      }
    });




  }

  // 2. events
  events(){window.addEventListener("resize", this.resize);
    this.nextButton.addEventListener('click', this.animateSlides(-1).bind(this))
    this.prevButton.addEventListener("click", this.animateSlides(1).bind(this))
  }

  // 3. methods (function, action...)
  updateDraggable(){
    this.timer.restart(true);
    this.slideAnimation.kill();
    this.update();
  }

  animateSlides(direction){

    this.timer.restart(true);
    this.slideAnimation.kill();

    this.x = this.snapX(gsap.getProperty(this.proxy, "x") + direction * this.slideWidth);

    this.slideAnimation = gsap.to(this.proxy, {
      x: this.x,
      duration: this.slideDuration,
      onUpdate: this.updateProgress
    });
  }

  autoPlay() {
    if (this.draggable.isPressed || this.draggable.isDragging || this.draggable.isThrowing) {
      this.timer.restart(true);
    } else {
      this.animateSlides(-1);
    }
  }

  updateProgress() {
    this.animation.progress(this.progressWrap(gsap.getProperty(this.proxy, "x") / this.wrapWidth));
  }

  resize() {

    this.norm = (gsap.getProperty(this.proxy, "x") / this.wrapWidth) || 0;

    this.slideWidth = this.slides[0].offsetWidth;
    this.wrapWidth = this.slideWidth * this.numSlides;
    this.snapX = gsap.utils.snap(this.slideWidth);

    gsap.set(this.proxy, {
      x: this.norm * this.wrapWidth
    });

    this.animateSlides(0);
    this.slideAnimation.progress(1);
  }

}

export default Slider
