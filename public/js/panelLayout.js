new Vue({
    el: '#panelLayout',
    data:
        {
            isCollapse: true
        },
    methods:
        {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
});
