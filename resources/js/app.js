require('./bootstrap');

window.Vue = require('vue');

Vue.component('empleados-component', require('./components/Empleados/EmpleadosComponent.vue').default);
Vue.component('formempleados-component', require('./components/Empleados/FormEmpleadosComponent.vue').default);

const app = new Vue({
    el: '#app',
});