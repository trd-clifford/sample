
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * 
 * AgGrid
 * 
 */
import 'ag-grid/dist/styles/ag-grid.css';
import 'ag-grid/dist/styles/ag-theme-balham.css';


/**
 * 
 * ElementUI
 * 
 */
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ja'
Vue.use(ElementUI, {locale});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('global-menu', require('./components/GlobalMenu.vue'));

// contetns
Vue.component('main-content', require('./components/MainContent.vue'));
Vue.component('main-content_github-analytics', require('./components/main_contents/GithubAnalytics.vue'));
Vue.component('main-content_options', require('./components/main_contents/Options.vue'));
Vue.component('main-content_remind', require('./components/main_contents/Remind.vue'));
Vue.component('main-content_settings', require('./components/main_contents/Settings.vue'));
Vue.component('main-content_time-line', require('./components/main_contents/TimeLine.vue'));
Vue.component('main-content_warning', require('./components/main_contents/Warning.vue'));

// functions
Vue.component('function-remind_list', require('./components/functions/RemindList.vue'));
Vue.component('function-github_ana_search', require('./components/functions/GithubAnaSearch.vue'));
Vue.component('function-github_ana_table', require('./components/functions/GithubAnaTable.vue'));
Vue.component('function-update_setting', require('./components/functions/UpdateSetting.vue'));


var Hub = new Vue();
const app = new Vue({
	el: '#app',
	data : function() {
		return { 
			"hub" : Hub
		}
	}
});