
import Vue from "vue";
import Application from "./components/application";


document.addEventListener("DOMContentLoaded", function(event) { 
    const app = new Vue({
        el: '#pomot-app',
        components: {Application},
        template: `<div><Application/></div>`
    });
});
