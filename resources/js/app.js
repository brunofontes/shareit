
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import moment from "moment";

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

function updateTime() {
    var dates = document.getElementsByClassName("takenItemDate");
    for (let i = 0; i < dates.length; i++) {
        let time = dates.item(i).innerText;
        let fromNow = moment(time).fromNow();
        let id = "itemPassedTime_" + dates.item(i).id;
        document.getElementById(id).innerText = fromNow;
    }
}
updateTime();
setInterval(updateTime, 1 * 60 * 1000);


function setFaviconNumber(number) {
    var canvas = document.createElement('canvas'),
        ctx,
        img = document.createElement('img'),
        link = document.getElementById('favicon').cloneNode(true);

    if (canvas.getContext) {
      canvas.height = canvas.width = 48; // set the size
      ctx = canvas.getContext('2d');
      img.onload = function () { // once the image has loaded
        ctx.drawImage(this, 0, 0);
        ctx.font = 'bold 35px "helvetica", sans-serif';
        ctx.fillStyle = '#ffff66';
        ctx.fillText(number, 3, 25);
        link.href = canvas.toDataURL('image/png');
        document.body.appendChild(link);
      };
      img.src = 'favicon.png';
    }
};

usedItems = document.getElementById("usedItems").innerText;
setFaviconNumber(usedItems);

/**
 * Source:
 * https://www.designcise.com/web/tutorial/how-to-detect-if-the-browser-tab-is-active-or-not-using-javascript
 */
document.addEventListener('visibilitychange', function (event) {
    if (document.hidden) {
        console.log('not visible');
    } else {
        updateTime();
    }
});


