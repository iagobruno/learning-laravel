import EchoClient from 'laravel-echo'
window.Pusher = require('pusher-js')

const Echo = new EchoClient({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
    encryption: true
})


const logs = document.querySelector('#logs')

function appendLog(text) {
    const li = document.createElement('li')
    li.classList.add('log')
    li.innerText = text
    logs.append(li)
}

Echo.channel('logs').listen('LogEvent', (event) => {
    console.log('ws event', event)
    appendLog(event.message)
})

document.getElementById('bttn')
    .addEventListener('click', () => {
        const msg = document.getElementById('log-msg').value
        fetch(`/websocket/dispatch?text=${msg}`)
    })
