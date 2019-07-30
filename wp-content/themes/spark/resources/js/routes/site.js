
import TweenMax from "gsap/TweenMax";


export default {
  init() {

    // Adjust background sizes to fit

    function setBackgroundSize() {
      let vpSize = document.documentElement.clientWidth,
          wSize = window.innerWidth,
          bgSize = (vpSize / wSize * 100) + 'vw';

      $('.background-frosted, ul.background-switcher li').css('background-size', bgSize);
    }

    setBackgroundSize();


    // Adjust background sizes to fit on resize

    var resizeTimer;

    $(window).on('resize', function (e) {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        setBackgroundSize();

      }, 250);
    });



    //
    // Custom Cursor
    //

    const {Back} = window;

    if($('.ft-masonry').length > 0){

      this.masonry_cursor = document.querySelector(".masonry-cursor");
      this.masonry_cursorIconCenter = document.querySelector(".masonry-cursor__icon_center");
      this.masonry_cursorBox = this.masonry_cursor.getBoundingClientRect();
      this.masonry_easing = Back.easeOut.config(1.7);
      this.masonry_animationDuration = 0.3;
      this.masonry_cursorSide = null; // will be "left" or "right"
      this.masonry_cursorInsideSwiper = false;
      this.masonry_rotate = 0;

      TweenMax.to(this.masonry_cursorIconCenter, 0, {
        rotation: -45,
        opacity: 0,
        scale: 0.5
      });


      document.addEventListener("mousemove", e => {
        this.masonry_clientX = e.clientX;
        this.masonry_clientY = e.clientY;
      });

      const rendered = () => {
        TweenMax.set(this.masonry_cursor, {
          x: this.masonry_clientX,
          y: this.masonry_clientY
        });
        requestAnimationFrame(rendered);
      };
      requestAnimationFrame(rendered);


      // mouseenter
      const onMasonryMouseEnter = e => {
        this.masonry_rotate = 0;
        this.masonry_swiperBox = e.target.getBoundingClientRect();

        if (!this.masonry_clientX) this.masonry_clientX = e.clientX;
        if (!this.masonry_clientY) this.masonry_clientY = e.clientY;

        TweenMax.to(this.masonry_cursorIconCenter, this.masonry_animationDuration, {
          rotation: -180,
          scale: 1,
          opacity: 1,
          ease: this.masonry_easing
        });

      };

      // mouseLeave
      const onMasonryMouseLeave = e => {
        this.masonry_rotate = 0;
        this.masonry_swiperBox = e.target.getBoundingClientRect();

        TweenMax.to(this.masonry_cursorIconCenter, this.masonry_animationDuration, {
          rotation: 0,
          opacity: 0,
          scale: 0.3
        });

        this.masonry_cursorSide = null;
        this.masonry_cursorInsideSwiper = false;
      };

      const masonryContainer = document.querySelector(".ft-masonry");
      masonryContainer.addEventListener("mouseenter", onMasonryMouseEnter);
      masonryContainer.addEventListener("mouseleave", onMasonryMouseLeave);

    }

    if($('.ft-slider').length > 0){


      this.cursor = document.querySelector(".ft-slider .arrow-cursor");
      this.cursorIcon = document.querySelector(".ft-slider .arrow-cursor__icon");
      this.cursorIconCenter = document.querySelector(".ft-slider .arrow-cursor__icon_center");
      this.cursorBox = this.cursor.getBoundingClientRect();
      this.easing = Back.easeOut.config(1.7);
      this.animationDuration = 0.3;
      this.cursorSide = null; // will be "left" or "right"
      this.cursorInsideSwiper = false;

      // initial cursor styling
      TweenMax.to(this.cursorIcon, 0, {
        rotation: -45,
        opacity: 0,
        scale: 0.5
      });

      TweenMax.to(this.cursorIconCenter, 0, {
        rotation: -45,
        opacity: 0,
        scale: 0.5
      });

      document.addEventListener("mousemove", e => {
        this.clientX = e.clientX;
        this.clientY = e.clientY;
      });

      const render = () => {
        TweenMax.set(this.cursor, {
          x: this.clientX,
          y: this.clientY
        });
        requestAnimationFrame(render);
      };
      requestAnimationFrame(render);

      // mouseenter
      const onSwiperMouseEnter = e => {
        this.swiperBox = e.target.getBoundingClientRect();

        if (!this.clientX) this.clientX = e.clientX;
        if (!this.clientY) this.clientY = e.clientY;

        let startRotation;
        if (this.clientY < this.swiperBox.top + this.swiperBox.height / 2) {
          startRotation = -45;
        } else {
          startRotation = this.clientX > window.innerWidth / 2 ? -90 : 90;
        }
        TweenMax.set(this.cursorIcon, {
          rotation: startRotation
        });

        this.cursorSide = this.clientX > window.innerWidth / 2 ? "right" : "left";

        if ((this.clientX > window.innerWidth / 3) && (this.clientX < (window.innerWidth / 3 * 2))) {


          TweenMax.to(this.cursorIconCenter, this.animationDuration, {
            rotation: -180,
            scale: 1,
            opacity: 1,
            ease: this.easing
          });
        } else {

          TweenMax.to(this.cursorIcon, this.animationDuration, {
            rotation: this.cursorSide === "right" ? -180 : 0,
            scale: 1,
            opacity: 1,
            ease: this.easing
          });
        }
      };

      // mouseLeave
      const onSwiperMouseLeave = e => {
        this.swiperBox = e.target.getBoundingClientRect();

        let outRotation = 0;
        if (this.clientY < this.swiperBox.top + this.swiperBox.height / 2) {
          outRotation = this.cursorSide === "right" ?  -45: -135;
        } else {
          outRotation = this.cursorSide === "right" ? -315 :135 ;
        }

        TweenMax.to(this.cursorIcon, this.animationDuration, {
          rotation: outRotation,
          opacity: 0,
          scale: 0.3
        });

        TweenMax.to(this.cursorIconCenter, this.animationDuration, {
          rotation: outRotation,
          opacity: 0,
          scale: 0.3
        });

        this.cursorSide = null;
        this.cursorInsideSwiper = false;
      };

      const onLeftSwiperSides = () => {
        if (this.cursorInsideSwiper) {

          this.cursorSide = "right" ;
          TweenMax.to(this.cursorIconCenter, this.animationDuration, {
            rotation:  0,
            ease: this.easing,
            opacity: 0,
            scale: 0.3
          });

          TweenMax.to(this.cursorIcon, this.animationDuration, {
            rotation: this.cursorSide === "right" ? 0 : -180,
            ease: this.easing,
            opacity: 1,
            scale: 1
          });

        }

        if (!this.cursorInsideSwiper) {
          this.cursorInsideSwiper = true;
        }
      };
      const onRightSwiperSides = () => {
        if (this.cursorInsideSwiper) {

          this.cursorSide = "left" ;

          TweenMax.to(this.cursorIconCenter, this.animationDuration, {
            rotation:  0,
            ease: this.easing,
            opacity: 0,
            scale: 0.3
          });

          TweenMax.to(this.cursorIcon, this.animationDuration, {
            rotation: this.cursorSide === "right" ? 0 : -180,
            ease: this.easing,
            opacity: 1,
            scale: 1
          });

        }

        if (!this.cursorInsideSwiper) {
          this.cursorInsideSwiper = true;
        }
      };
      // move cursor to middle inside the Swiper
      const onMiddleSwiperSides = () => {

        if (this.cursorInsideSwiper) {

          TweenMax.to(this.cursorIcon, this.animationDuration, {
            rotation: this.cursorSide === "right" ? 90 : -90,
            ease: this.easing,
            opacity: 0,
            scale: 0.3
          });

          TweenMax.to(this.cursorIconCenter, this.animationDuration, {
            rotation:  -180,
            ease: this.easing,
            opacity: 1,
            scale: 1
          });

        }

        if (!this.cursorInsideSwiper) {
          this.cursorInsideSwiper = true;
        }
      };

      const swiperContainer = document.querySelector(".ft-slider");
      swiperContainer.addEventListener("mouseenter", onSwiperMouseEnter);
      swiperContainer.addEventListener("mouseleave", onSwiperMouseLeave);

      const swiperButtonPrev = document.querySelector(".ft-slider .ft-prev");
      const swiperButtonCurrent = document.querySelector(".ft-slider .uk-slider-items");
      const swiperButtonNext = document.querySelector(".ft-slider .ft-next");
      swiperButtonPrev.addEventListener("mouseenter", onLeftSwiperSides);
      swiperButtonNext.addEventListener("mouseenter", onRightSwiperSides);
      swiperButtonCurrent.addEventListener("mouseenter", onMiddleSwiperSides);
    }

  }

};

