
import Vue from "vue";
import Application from "./components/application";

const app = new Vue({
    el: '#app',
    components: {Application},
    template: `<div><Application/></div>`
});

export default app;