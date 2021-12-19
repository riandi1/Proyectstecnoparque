<div>
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control" placeholder="" id=" nombre" wire:model="nombre">
        @error('nombre')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Mensaje</label>
        <input type="text" class="form-control" placeholder="" id=" mensaje" wire:model="mensaje">
        @error('mensaje')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <button class="btn btn-primary" wire:click="enviarMensaje">Enviar</button>

    <div class="alert alert-success collapse" role="alert" id="avisoSuccess">
        se ha enviado
    </div>

    <script>
        // Esto lo recibimos en JS cuando lo emite el componente
        // El evento "enviadoOK"
        $( document ).ready(function() {
            window.livewire.on('MensajoEnviado', function () {
                $("#avisoSuccess").fadeIn("slow");                
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);                                
            });
        });
    </script>
</div>
