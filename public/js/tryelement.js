
new Vue({
    el: '#app',
    data:
        {
        activeIndex: ''

    },

    methods : {

        handleSelect(key, keyPath) {
            self.activeIndex = key ;
        }

    }
  });
