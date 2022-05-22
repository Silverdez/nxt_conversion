class TabItems {
  constructor(element) {
    this.element = element;

    this.init = this.init.bind(this);

    if (this.element) {
      this.main = element.querySelector('.payment__card-bottom');
      this.tabs = element.querySelectorAll('.payment__card-bottom .buttons .btn');
      this.item = element.querySelectorAll('.payment__card-bottom .sections .section');

      this.init();
    }
  }

  // 2. events
  // events(){
  //   this.tabs.addEventListener('click',this.navMethods.bind(this))
  // }
  //
  // // 3. methods (function, action...)
  // navMethods(){
  //   // this.navMenu.classList.toggle('test')
  //   if (!this.navEnd){
  //     this.tl.play()
  //   } else{
  //     this.tl.reverse()
  //     this.navEnd = false
  //   }
  // }

  init() {
    // this.main.style.minHeight = this.item[0].offsetHeight + 'px';
    this.tabs[0].classList.add('tabs__title--active');
    this.item[0].classList.add('tabs__content--active');

    this.tabs.forEach((element, index) => {
      element.addEventListener('click', () => {
        this.tabs.forEach(element =>
          element.classList.remove('tabs__title--active')
        );

        this.item.forEach(element =>
          element.classList.remove('tabs__content--active')
        );

        this.tabs[index].classList.add('tabs__title--active');
        this.item[index].classList.add('tabs__content--active');

        // this.main.style.minHeight = this.item[index].offsetHeight + 'px';
      });
    });
  }
}

export default TabItems;
