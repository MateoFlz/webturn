window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: process.env.MIX_APP_URL + ':6001',
    forceTLS: true,

});

let channel = window.Echo.channel('user-channel');
    channel.listen('.UserEvent', function(data)
    {
        console.log(data);
});

let channel2 = window.Echo.channel('channel-turn');
        channel2.listen('.EventTurn', function(data)
        {

            let valuemodulo = document.getElementById("idmodulo").value;
            let templete = "";
            if(data.turno.length > 0){
                data.turno.forEach((elemt) => {
                    templete += `
                    <div class="border d-flex align-items-start rounded" style="margin: 10px;">
                        <div class="col-md-10 mibackgroun border rounded" style="margin: 5px; cursor:pointer">
                            <span class="text-left"><strong>Nombre:</strong>${elemt.name}</span><br>
                            <span class="text-left"><strong>Cedula:</strong>${elemt.cedula}</span>
                        </div>
                        <div class="col-md-2">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">
                                <i class="material-icons">settings</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#" onclick="document.getElementById('formllamar${elemt.id}').submit();">Llamar cliente</a>
                                <form id="formllamar${elemt.id}" action="http://127.0.0.1:8000/atencion/${elemt.id}" method="post">
                                    <input type="hidden" name="_token" value="8U23CFUqMiAbnS4xIzscavM77tQpXU5Q0RvxvUDD">
                                    <input type="hidden" name="llamado" value="1">
                                    <input type="hidden" name="modulo" value="`+valuemodulo+`">
                                </form>
                                <a class="dropdown-item" href="clientes/${elemt.idclient}/editar">Editar</a>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $("#listurn").html(templete);
            }else{

            }
            //$("#listurn").html(templete);
        });

let channel3 = window.Echo.channel('channel-list');
    channel3.listen('.EventList', function(data)
    {
        let templete = "";
            if(data.list.data.length > 0){
                data.list.data.forEach((elemt) => {
                    templete += `
                    <div class="col-md-12">
                        <div class="alert shadow bg-light border">
                            <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="col-md-3 badge badge-success">
                                    <h1><strong>${elemt.namemodulo}</strong></h1>
                                </div>
                                <div class="col-md-9">
                                    <h2><strong>${elemt.namecliente}</strong></h2>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>`;
                    console.log(data.list.data[0].namecliente);
                    console.log(elemt.namecliente);
                    if( data.list.data[0].namecliente == elemt.namecliente){
                        speechSynthesis.speak(new SpeechSynthesisUtterance(elemt.namecliente));
                        speechSynthesis.speak(new SpeechSynthesisUtterance("MODULO"));
                        speechSynthesis.speak(new SpeechSynthesisUtterance(elemt.namemodulo));
                    }
                });
                $("#listturnos").html(templete);
            }else{

            }

    });

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
