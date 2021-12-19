// Este script permite insertar las 48 horas posibles de la lista desplegagle.
// desde las 0:00 hasta las 24:00 en intervalos de 30 horas.
// Esta inserción se hace unando js para evitar perder legilidad del html Principal
// con largos fragmentos de html que pueden ser generados e ijectados automáticamente

let hourTemplate = "<option value=\"undefined\">--:--</option>\n"; //primer elemento de la plantilla
let hour=0;
let minutes=0;

// ciclo para generar toda la plantilla completa de lista desplegable a partir de las horas del día
// la hora del día es entregada en minutos totales y va en intervalos de 30 minutos
for (let totalMinutes = 0; totalMinutes <= 1440; totalMinutes=totalMinutes+30)
{
  hour = Math.trunc(totalMinutes/60);   //cálculo de la hora
  minutes = (totalMinutes%60)===0?"00":(totalMinutes%60); //cálculo de los mínutos
  //if para generar un salto de línea en cada option menos en el último
  if (totalMinutes===1440)
  {
    hourTemplate = hourTemplate + `<option value=${totalMinutes}>${hour}:${minutes}</option>`;
  }
  else
  {
    hourTemplate = hourTemplate + `<option value=${totalMinutes}>${hour}:${minutes}</option>\n`;
  }
}


// se capturan todos los nodos (por eso el All) con clase "insertClass"
// si se usa querySelector en lugar de querySelectorAll solo traerá el primer nodo encontrado, y los siguientes serán ignorados.
const nodoInsertion =  document.querySelectorAll(".insert-hours-list");

console.log(nodoInsertion.length);

// ciclo for para insertar la plantilla en todos los nodos con la clase especificada antes
for(let nodos=0; nodos<nodoInsertion.length ; nodos++)
{
  nodoInsertion[nodos].innerHTML = hourTemplate;
}
