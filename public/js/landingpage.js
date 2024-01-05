
        new Vue({
          el: '#app',
          data: {
            isScrolled: false,
            lastScrollPosition: 0,
          },
          mounted() {
            window.addEventListener('scroll', this.handleScroll);
          },
          destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
          },
          methods: {
            handleScroll() {
              const currentScrollPosition = window.scrollY;
    
              if (currentScrollPosition > this.lastScrollPosition) {
                this.isScrolled = true;
              } else {
                this.isScrolled = currentScrollPosition > 0;
              }
    
              this.lastScrollPosition = currentScrollPosition;
            },
          },
        });
