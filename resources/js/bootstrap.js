/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

//obtener el token por el name="csrf-token"
let token = document.head.querySelector('meta[name="csrf-token"]');
token = $(token).attr("content");
