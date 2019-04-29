
new Vue({
    el: '#searchWS',
    data:
        {
        activeIndex: '',
            input3: '',
            select: ''

    },

    methods : {

        handleSelect(key, keyPath) {
            self.activeIndex = key ;
        }

    }
  });
