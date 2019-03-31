ELEMENT.locale(ELEMENT.lang.en);
Vue.use(DataTables);
Vue.use(DataTables.DataTablesServer);
var clients = new Vue({
        el: '#test',
        data: {
            dismissSecs: 10,
        dismissCountDown: 0,
        showDismissibleAlert: false
        }, 
        methods: {
            countDownChanged(dismissCountDown) {
              this.dismissCountDown = dismissCountDown
            },
            showAlert() {
              this.dismissCountDown = this.dismissSecs
            }
          }}) 
