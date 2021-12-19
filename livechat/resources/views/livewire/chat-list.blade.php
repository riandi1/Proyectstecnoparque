<div>
    <h3 class="mt-3">Lista de mensajes</h3>

    @foreach ($mensajes as $mensaje)
    <div>
                    
        @if($mensaje["recibido"])
            <div class="alert alert-warning" style="margin-right: 50px;">
                <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
            </div>
        @else
            <div class="alert alert-success" style="margin-left: 50px;">
                <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
            </div>
        @endif
        
    </div>     
    @endforeach

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('592a73cfc91385a04905', {
            cluster: 'us2',
            
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            //    alert(JSON.stringify(data));
            window.livewire.emit('MensajoRecibido',data);
        });

        setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);
    </script>

</div>
