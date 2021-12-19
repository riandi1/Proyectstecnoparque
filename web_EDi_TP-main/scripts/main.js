
//******************************
//****** PROCESOS  *************
//******************************

// vectores para almaenar los ids de los elemenos del DOM que se desean manipular
const arrayListTimesOn =   ["#listTimesL1_On"  , "#listTimesL2_On"   , "#listTimesL3_On"   , "#listTimesL4_On"   , "#listTimesL5_On"   , "#listTimesL6_On"   , "#listTimesL7_On"   , "#listTimesL8_On"];
const arrayListTimesOff =  ["#listTimesL1_Off" , "#listTimesL2_Off"  , "#listTimesL3_Off"  , "#listTimesL4_Off"  , "#listTimesL5_Off"  , "#listTimesL6_Off"  , "#listTimesL7_Off"  , "#listTimesL8_Off"];
const arrayOnOffSwitces = ["#switchLamp1" , "#switchLamp2" , "#switchLamp3" , "#switchLamp4" , "#switchLamp5" , "#switchLamp6" , "#switchLamp7" , "#switchLamp8"];

// variables para almacenar las horas de on y off en segundos
let timeL1_On_num=undefined;
let timeL2_On_num=undefined;
let timeL3_On_num=undefined;
let timeL4_On_num=undefined;
let timeL5_On_num=undefined;
let timeL6_On_num=undefined;
let timeL7_On_num=undefined;
let timeL8_On_num=undefined;
let timeL1_Off_num=undefined;
let timeL2_Off_num=undefined;
let timeL3_Off_num=undefined;
let timeL4_Off_num=undefined;
let timeL5_Off_num=undefined;
let timeL6_Off_num=undefined;
let timeL7_Off_num=undefined;
let timeL8_Off_num=undefined;

// ***********************************************************************
// Variables de control de los elementos del DOM mediante querySelectors *
// ***********************************************************************

// Selectores de tiempos de encendido
const
[listTimesL1_On , listTimesL2_On , listTimesL3_On , listTimesL4_On , listTimesL5_On , listTimesL6_On , listTimesL7_On , listTimesL8_On] =
arrayListTimesOn.map(param => document.querySelector(param));

// Selectores de tiempos de apagado
const
[listTimesL1_Off , listTimesL2_Off , listTimesL3_Off , listTimesL4_Off , listTimesL5_Off , listTimesL6_Off , listTimesL7_Off , listTimesL8_Off] =
arrayListTimesOff.map(param => document.querySelector(param));

//selectores de suiches de encendido y apagado inmediato
const
[switchLamp1 , switchLamp2 , switchLamp3 , switchLamp4 , switchLamp5 , switchLamp6 , switchLamp7 , switchLamp8] =
arrayOnOffSwitces.map(param => document.querySelector(param));

// seletor boton enviar
const botonEnviar = document.querySelector("#botonEnviarId");   //botón de enviar
// debugger;

// **************************************************************************************
// Listeners para establecer los eventos a capturar y los callback a los cuales apuntar *
// **************************************************************************************

// cambios en los selectores de tiempos de encendido
listTimesL1_On.addEventListener('change', function(){callBackListValue(listTimesL1_On.value , "timeL1_On" )});
listTimesL2_On.addEventListener('change', function(){callBackListValue(listTimesL2_On.value , "timeL2_On" )});
listTimesL3_On.addEventListener('change', function(){callBackListValue(listTimesL3_On.value , "timeL3_On" )});
listTimesL4_On.addEventListener('change', function(){callBackListValue(listTimesL4_On.value , "timeL4_On" )});
listTimesL5_On.addEventListener('change', function(){callBackListValue(listTimesL5_On.value , "timeL5_On" )});
listTimesL6_On.addEventListener('change', function(){callBackListValue(listTimesL6_On.value , "timeL6_On" )});
listTimesL7_On.addEventListener('change', function(){callBackListValue(listTimesL7_On.value , "timeL7_On" )});
listTimesL8_On.addEventListener('change', function(){callBackListValue(listTimesL8_On.value , "timeL8_On" )});

// cambios en los selectores de tiempos de apagado
listTimesL1_Off.addEventListener('change', function(){callBackListValue(listTimesL1_Off.value , "timeL1_Off" )});
listTimesL2_Off.addEventListener('change', function(){callBackListValue(listTimesL2_Off.value , "timeL2_Off" )});
listTimesL3_Off.addEventListener('change', function(){callBackListValue(listTimesL3_Off.value , "timeL3_Off" )});
listTimesL4_Off.addEventListener('change', function(){callBackListValue(listTimesL4_Off.value , "timeL4_Off" )});
listTimesL5_Off.addEventListener('change', function(){callBackListValue(listTimesL5_Off.value , "timeL5_Off" )});
listTimesL6_Off.addEventListener('change', function(){callBackListValue(listTimesL6_Off.value , "timeL6_Off" )});
listTimesL7_Off.addEventListener('change', function(){callBackListValue(listTimesL7_Off.value , "timeL7_Off" )});
listTimesL8_Off.addEventListener('change', function(){callBackListValue(listTimesL8_Off.value , "timeL8_Off" )});

// suiches on/off
switchLamp1.addEventListener('change',function(){callBackSendSwitches(1)});
switchLamp2.addEventListener('change',function(){callBackSendSwitches(2)});
switchLamp3.addEventListener('change',function(){callBackSendSwitches(3)});
switchLamp4.addEventListener('change',function(){callBackSendSwitches(4)});
switchLamp5.addEventListener('change',function(){callBackSendSwitches(5)});
switchLamp6.addEventListener('change',function(){callBackSendSwitches(6)});
switchLamp7.addEventListener('change',function(){callBackSendSwitches(7)});
switchLamp8.addEventListener('change',function(){callBackSendSwitches(8)});

// click en el botón enviar
botonEnviar.addEventListener('click',function(){callBackEnviar()});

//***************************************************************
// funciones callBack para los eventos de los elementos del DOM *
//***************************************************************

// guardar en variables separadas las horas en minutos seleccionadas por el usuario en cada selector*
// el comando eval en este caso permite reducir considerablemente tamaño de esta función
function callBackListValue(minutesValue,selectedTimesList)
{
  const segsValue = minutesValue*60;                  //se convierte valor de minutos a segundos
  eval(selectedTimesList + "_num" + "=" + segsValue);  //los valores de cada selector ya en segundos se guardan en variables con nombres construidos dinámicamente
  console.log(segsValue);
}
//
// Enviar en un solo vector el estado on o off de todos los suiches
function callBackSendSwitches(lamp)
{
  const iSw = document.querySelector(`#switchLamp${lamp}+i`);
  const lblSw = document.querySelector(`#labelSwLamp${lamp}`);

  iSw.style.setProperty('--colorOff','grey');
  lblSw.style.backgroundColor = 'grey';

  eval(`switchLamp${lamp.toString()}.disabled=true`); //switchLamp1.disabled = true;
  const statusLamp = eval(`switchLamp${lamp.toString()}.checked`); //const statusLamp = switchLamp1.checked
  console.log(`Lampara ${lamp} ${statusLamp}`);
  client.publish(`lamp${lamp}`, statusLamp.toString(), (error) => {       //si encendido, envía un mensaje de on
    console.log(error || 'Mensaje enviado!!!')
  });
}

// enviar horas on/off al broker (si falta uno por setear no las envía)
function callBackEnviar()
{
  console.log("El botón enviar ha sido presionado");
  //las horas de on y off en unidades de minutos se montan sobre un vector antes de enviarlos al server
  const timesToSend =
  [
    horaCol(),
    timeL1_On_num,
    timeL1_Off_num,
    timeL2_On_num,
    timeL2_Off_num,
    timeL3_On_num,
    timeL3_Off_num,
    timeL4_On_num,
    timeL4_Off_num,
    timeL5_On_num,
    timeL5_Off_num,
    timeL6_On_num,
    timeL6_Off_num,
    timeL7_On_num,
    timeL7_Off_num,
    timeL8_On_num,
    timeL8_Off_num
  ]
  //verifica si al menos un elemento aún no es númerico, lo que indicara que faltan horas por setear
  // retorna un false o true luego de la comprobación
  const vectorIncompleto = timesToSend.some(element=>{
    return element=== undefined;
  });
  //si aún faltan horas por setear se muestra un mensaje de alerta, sino se envían los datos al servidor
  if (vectorIncompleto){
    alert("Aún faltan horas por setear");
  }else {
    //se convierte todo el vector montado antes a una única variable tipo String usando <;> como separador
    let timesToSendString="{";    //caracter inicial de trama
    timesToSend.forEach(number=>{
      timesToSendString = timesToSendString + number.toString() + ";"
    })
    timesToSendString=timesToSendString.substring(0,timesToSendString.length-1); //remoción del último  <;>
    timesToSendString=timesToSendString +"}";  //caracter final de trama
    // timesToSendString.shift();
    // publish(topic, payload, options/callback)
    console.log(timesToSendString);
    client.publish('hoursOnOff', timesToSendString, (error) => {       //si encendido, envía un mensaje de on
      console.log(error || 'Mensaje enviado!!!')
      })
    alert("Programación enviada al equipo")
  }
}

// ***********
// Funciones *
// ***********

//Generar la hora local de Colombia para enviar al dispositivo desde el front
function horaCol()
{
  const todayLocalMachine = new Date();     //Objeto fecha y hora según máquina donde se ejecute
  const timeStringCol = todayLocalMachine.toLocaleString("en-US", {timeZone: "America/Bogota"}); //devuleve string de la zona horaria especificada
  const todayColombia = new Date(timeStringCol);         //"artilugio" para obtener el objeto Date pero para Colombia

  const horaCol    = todayColombia.getHours();
  const minutosCol = todayColombia.getMinutes();
  const segundosCol= todayColombia.getSeconds();

  const segTotalDiaCol = (horaCol*3600) + (minutosCol*60) + segundosCol;

  return segTotalDiaCol;
  // let annioCol   = todayColombia.getFullYear();
  // let mesCol     = todayColombia.getMonth() + 1;
  // let diaCol     = todayColombia.getDate();
  // let horaCol    = todayColombia.getHours();
  // let minutosCol = todayColombia.getMinutes();
  // let segundosCol= todayColombia.getSeconds();
}

//función para imprimir por pantalla los valores recibidos desde el broker
function update_values(temp1, temp2, volts){
  $("#display_temp1").html(temp1);
  $("#display_temp2").html(temp2);
  $("#display_volt").html(volts);
}

//Función para desfragmentar la trama recibida, pues los tres valores llegaron
// en un solo topico separados por comas
// message es un objeto, toString lo convierte en una cadena con el mensaje explícito
function process_msg(topic, message){
  // ej: "10,11,12"
  if (topic == "values"){
    var msg = message.toString();
    var sp = msg.split(",");
    var temp1 = sp[0];
    var temp2 = sp[1];
    var volts = sp[2];
    update_values(temp1,temp2,volts);
  }
}

function process_led1(){
  if ($('#input_led1').is(":checked")){
    console.log("Encendido");
    // publish(topic, payload, options/callback)
    client.publish('led1', 'on', (error) => {       //si encendido, envía un mensaje de on
      console.log(error || 'Mensaje enviado!!!')
    })
  }else{
    console.log("Apagado");
    // publish(topic, payload, options/callback)
    client.publish('led1', 'off', (error) => {    //si apagado, envía un mensaje de off
      console.log(error || 'Mensaje enviado!!!')
    })
  }
}

function process_led2(){
  if ($('#input_led2').is(":checked")){
    console.log("Encendido");
    // publish(topic, payload, options/callback)
    client.publish('led2', 'on', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }else{
    console.log("Apagado");
    // publish(topic, payload, options/callback)
    client.publish('led2', 'off', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }
}

//******************************
//****** CONEXION  *************
//******************************


// connect options
const options = {
      connectTimeout: 4000,

      // Authentication
      clientId: 'iotmc2',
      username: 'userEmqx',
      password: 'passEmqx',

      keepalive: 60,
      clean: true,
}

var connected = false;

// WebSocket connect url
const WebSocket_URL = 'wss://eficienciadigital.ml:8094/mqtt'
// const WebSocket_URL = 'ws://eficienciadigital.ml:8093/mqtt'
// wss y 8094 CON certificado SSL
// ws y 8093 SIN certificado SSL
// const WebSocket_URL = 'ws://18.230.169.102:8093/mqtt'


const client = mqtt.connect(WebSocket_URL, options)


client.on('connect', () =>
{
    console.log('Mqtt conectado por WS! Exito!')
    client.subscribe('values', { qos: 0 }, (error) =>
    {
      if (!error)
      {
        console.log('Suscripción values exitosa!')
      }
      else
      {
        console.log('Suscripción values fallida!')
      }
    })

    client.subscribe('confirm', { qos: 0 }, (error) =>
    {
      if (!error)
      {
        console.log('Suscripción confirm exitosa!')
      }
      else
      {
        console.log('Suscripción confirm fallida!')
      }
    })
    // client.publish(topic, payload, options/callback)
    client.publish('fabrica', 'esto es un verdadero éxito', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
})

//message es un objeto, toString lo convierte en una cadena con el mensaje explícito
client.on('message', (topic, message) => {
  console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString())
  if (topic === 'confirm')
  {
    console.log("Entré al if del topico confirm !!!!!!!!!!!!!!");
    confirmation(message)
  }
  process_msg(topic, message); //llama a la función que procesa lo recibido.
})

client.on('reconnect', (error) => {
    console.log('Error al reconectar', error)
})

client.on('error', (error) => {
    console.log('Error de conexión:', error)
})

// connect options
const options = {
  connectTimeout: 4000,

  // Authentication
  clientId: 'iotmc2',
  username: 'userEmqx',
  password: 'passEmqx',

  keepalive: 60,
  clean: true,
}

var connected = false;

// WebSocket connect url
const WebSocket_URL = 'wss://eficienciadigital.ml:8094/mqtt'
// const WebSocket_URL = 'ws://eficienciadigital.ml:8093/mqtt'
// wss y 8094 CON certificado SSL
// ws y 8093 SIN certificado SSL
// const WebSocket_URL = 'ws://18.230.169.102:8093/mqtt'
