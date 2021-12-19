// let x = document.querySelector('#botonTest');
// let x = document.querySelector('#switchLamp1+i'); //elento i despues de un elemento con id='switchLamp1' hijos del mismo padre
// let y = document.querySelector('#labelSwLamp1');
// x.style.setProperty('--colorOff','blue');
// y.style.backgroundColor = 'pink'

// **************************************************************************
// Función para procesar el mensaje de confirmación on/off que envía el ESP *
// **************************************************************************

function confirmation(message)
{
  const splited = spliterMsg(message);
  const lamp = splited[0];
  const stsLamp = splited[1];
  console.log(splited);

  const iSw = document.querySelector(`#switchLamp${lamp}+i`);
  const lblSw = document.querySelector(`#labelSwLamp${lamp}`);
  // si llega confirmación de algún tipo desde dispositivo rehabilita botón
  if (stsLamp === 'on' || stsLamp === 'off')
  {
    const sw = document.querySelector(`#switchLamp${lamp}`);
    sw.disabled = false
  }
  if (stsLamp === 'on')
  {
    lblSw.style.backgroundColor = 'red';
  }
  else
  {
    iSw.style.setProperty('--colorOff','black');
  }
}

// ************************************************************************
// Función para segmentar los datos que vienen empaquetados en el mensaje *
// ************************************************************************
function spliterMsg(message)
{
    const msg = message.toString();
    let sp = msg.split(",");
    for (i=0;i<sp.length;i++)
    {
      sp[i] = sp[i].trim();
    }
    return sp;
}
