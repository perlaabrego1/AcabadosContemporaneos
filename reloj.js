(function(){
    var actualizarHora = function(){
      var fecha = new Date(),
          hora = fecha.getHours(),
          minutos = fecha.getMinutes(),
          segundos = fecha.getSeconds(),
          diaSemana = fecha.getDay(),
          dia = fecha.getDate(),
          mes = fecha.getMonth(),
          anio = fecha.getFullYear(),
          ampm;
      
      var pHoras = document.getElementById('hora'),
          pSegundos = document.getElementById('segundos'),
          pMinutos = document.getElementById('minutos'),
          pAMPM = document.getElementById('ampm'),
          pDiaSemana = document.getElementById('diaSemana'),
          pDia = document.getElementById('dia'),
          pMes = document.getElementById('mes'),
          pAnio = document.getElementById('anio');
      var semana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
      pDiaSemana.textContent=semana[diaSemana];
      
      pDia.textContent=dia;

      var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
      pMes.textContent = meses[mes];

      pAnio.textContent =anio;

      if (hora >= 12)
      {
          hora = hora - 12;
          ampm = 'PM';
      }
      else{
          ampm = 'AM';
      }

      if (hora == 0)
      {
          hora = 12;
      };
      pHoras.textContent = hora;
      pAMPM.textContent = ampm;

      if (minutos < 10) { minutos = "0" + minutos};

      if (segundos < 10) { segundos = "0" + segundos};

      pMinutos.textContent =minutos;
      pSegundos.textContent=segundos;

  };
  actualizarHora();
  var intervalo = setInterval (actualizarHora, 1000);
}())