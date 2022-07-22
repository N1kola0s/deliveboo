/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import App from './views/App';
import router from './router';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
});


function valthis() {
    let checkBoxes = document.querySelectorAll('btn-check');
    let psw1 = document.getElementById('password')
    let psw2 = document.getElementById('password-confirm')
    console.log(checkBoxes)
    let isChecked = false;

    for (let i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked) {
            isChecked = true;
            break; //don't need to continue the loop once a checkbox was found
        }
    }

    if (!isChecked) {
        /* alert('At least one checkbox is NOT checked!'); */
        document.getElementById("errors_type").innerHTML = "Seleziona almeno una categoria";
        if (psw1 != psw2) {
            document.getElementById('password').innerHTML = '';
            document.getElementById('password-confirm').innerHTML = '';
            document.getElementById("errors_password").innerHTML = "Le password devono essere uguali";
        }
        event.preventDefault();
        return false;
    }

    return true;
}