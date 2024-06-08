import './bootstrap'; 
import 'bootstrap'; 
import $ from 'jquery'; 
import '@popperjs/core'; 
import 'boxicons/css/boxicons.min.css'; 
import toastr from 'toastr'; 
import 'toastr/build/toastr.min.css'; 


window.$ = window.jQuery = $;
window.toastr = toastr;


toastr.options = {
    "newestOnTop": true,
    "closeButton": true,
    "closeDuration": 3000
};
