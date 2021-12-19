<div>
    
    <script>
        var client = mqtt.connect('wss://eficienciadigital.ml:8094')
        client.subscribe("mqtt/demo")

        client.on("message", function (topic, payload) {
            alert([topic, payload].join(": "))
            client.end()
        })

        client.publish("mqtt/demo", "hello world!")
    </script>
</div>