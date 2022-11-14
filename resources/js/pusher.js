import 'https://js.pusher.com/7.2/pusher.min.js';
    var pusher = new Pusher('93b3e504421787295454', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('touchedItem');
    channel.bind('RefreshPage', function(data) {
        window.location.reload();
        console.log(JSON.stringify(data));
    });
