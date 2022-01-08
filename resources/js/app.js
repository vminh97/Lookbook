
import Vue from 'vue'
import App from './Main/Main'
import router from './router'
import store from './store'
import Axios from 'axios'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.config.productionTip = false;

Vue.use(ElementUI);
Vue.use(store);
Vue.use(Axios);
new Vue({
  router,
  el: '#app',
  render: h => h(App),
})

