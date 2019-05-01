
new Vue({
    el: '#searchWS',
    data:
        {
        activeIndex: '',
            input3: '',
            select: '' ,
            seen : ''

    },
    mounted: function () {
        var self = this;
        self.getSeen();
    },

    methods : {

        handleSelect(key, keyPath) {
            self.activeIndex = key ;
        },
        getSeen: function () {
            var self = this;
            var id = document.getElementById('idele').value;
            axios.get('/seen/'+id)
                .then(function (response) {
                    console.log(response.data);
                    self.seen = response.data;

                })
                .catch(function (error) {
                    console.log(error);
                });
        },


    }
  });
