<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" />
      <title>SCADA</title>
      <style>
         body{
         font-size: 30px;
         float:left; 
         }
         .div {
         background-color:yellow;
         outline-style:solid;
         padding:10px;
         }
         .mieszkanie{
         height:480px;
         width:640px;
         }
         .kociol{
         height:480px;
         width:200px;
         }
         .blue{
         height: 50px;
         width: 200px;
         }
         .red {
         height: 80px;
         width: 200px;
         }
         .all {
         display: flex; 
         }
         .sypialnia{
         position:absolute;
         top:100px; 
         left:50px;
         height: 245px;
         width:245px;
         }
         .lazienka{
         position:absolute;
         top:355px; 
         left:50px;
         height: 125px;
         width:125px;
         }
         .dzienny{
         position:absolute;
         top:12px; 
         left:300px;
         min-height: 280px;
         min-width:320px;
         }
         .smarthome > img {
         max-height: 100px;
         max-width: 100px;
         display: flex;
         }
         .smarthome {
         height:200px; 
         }
      </style>
   </head>
   <body>
      <div class="all">
         <img class="mieszkanie" src="mieszkanie.jpeg" alt="Układ mieszkania"/>
         <div class="temp">
            <div class="sypialnia" id="sypialnia"></div>
            <div class="lazienka" id="lazienka"></div>
            <div class="dzienny" id="dzienny"></div>
         </div>
         <div class="div" id="x3" style="position:absolute; top:150px; left:450px;">
         </div>
         <div class="div" id="x4" style="position:absolute; top:220px; left:150px;">
         </div>
         <div class="div" id="x5" style="position:absolute; top:400px; left:100px;">
         </div>
         <div class="strzalki">
            <img class="red" style="position:absolute; top:100px; left:650px;" src="red.png" alt="Red"/>
            <div class="div" id="x1" style="position:absolute; top:160px; left:750px;">
            </div>
            <br>
            <br>
            <br>
            <img class="blue" style="position:absolute; top:400px; left:650px;" src="blue.png" alt="Blue"/>
            <div class="div" id="x2" style="position:absolute; top:460px; left:750px;">
            </div>
            <div id="imgx" style="position:absolute; top:50px; left:1250px;">
            </div>
         </div>
         <div class="smarthome" style="position:absolute; left:1050px;">
            <x-gif id="ac" src="AC.gif"></x-gif>
            <img id="movement" style="padding-left:50px;"/> 
            <img id="co" style="padding-left:35px;"/>
            <img id="heating" src="heating.png" style="padding-left:35px;"/>
            <x-gif id="alarm" src="alarm.gif"></x-gif>
         </div>
         <img class="kociol" style="position:absolute; left:850px;" src="kociol.png" alt="Kociol"/>
      </div>
   </body>
   <script>
      if ('registerElement' in document
        && 'createShadowRoot' in HTMLElement.prototype
        && 'import' in document.createElement('link')
        && 'content' in document.createElement('template')) {
        // We're using a browser with native WC support!
      } else {
        document.write('<script src="https:\/\/cdnjs.cloudflare.com/ajax/libs/polymer/0.3.4/platform.js"><\/script>')
      }
   </script>
   <link rel="import" href="xgif/dist/x-gif.html">
   <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script>
      var evtSource = new EventSource('csv_from_db.php'); 
      evtSource.onmessage = function(e)
      { 
      var data = e.data;
      data = data.split("\t"); x1.innerHTML = data[0]; x2.innerHTML = data[1];x3.innerHTML = data[2]; x4.innerHTML = data[3]; x5.innerHTML = data[4];
        //Zmiana koloru salonu
         if(data[2] < 10)document.getElementById("dzienny").style.backgroundColor="rgb(0,191,255,.3)";
         if(data[2] >= 10 && data[2] < 20)document.getElementById("dzienny").style.backgroundColor="rgba(51, 170, 51, .3)";
         if(data[2] >= 20 && data[2] < 25)document.getElementById("dzienny").style.backgroundColor="rgb(0,0,0,.0)";
         if(data[2] >= 25 && data[2] < 30)document.getElementById("dzienny").style.backgroundColor="rgb(255,165,0,.3)";
         if(data[2] >= 30)document.getElementById("dzienny").style.backgroundColor="rgb(255,0,0,.3)";
        //Zmiana koloru sypialni
        if(data[3] < 10)document.getElementById("sypialnia").style.backgroundColor="rgb(0,191,255,.3)";
      	if(data[3] >= 10 && data[3] < 20)document.getElementById("sypialnia").style.backgroundColor="rgba(51, 170, 51, .3)";
         if(data[3] >= 20 && data[3] < 25)document.getElementById("sypialnia").style.backgroundColor="rgb(0,0,0,.0)";
         if(data[3] >= 25 && data[3] < 30)document.getElementById("sypialnia").style.backgroundColor="rgb(255,165,0,.3)";
         if(data[3] >= 30)document.getElementById("sypialnia").style.backgroundColor="rgb(255,0,0,.3)";
        //Zmiana koloru lazienki
         if(data[4] < 10)document.getElementById("lazienka").style.backgroundColor="rgb(0,191,255,.4)";
      	 if(data[4] >= 10 && data[4] < 20)document.getElementById("lazienka").style.backgroundColor="rgba(51, 170, 51, .4)";
         if(data[4] >= 20 && data[4] < 25)document.getElementById("lazienka").style.backgroundColor="rgb(0,0,0,.0)";
         if(data[4] >= 25 && data[4] < 30)document.getElementById("lazienka").style.backgroundColor="rgb(255,165,0,.4)";
         if(data[4] >= 30 )document.getElementById("lazienka").style.backgroundColor="rgb(255,0,0,.4)";
        //AC
         if(data[5] == 0) document.getElementById('ac').setAttribute('speed', '0');
         if(data[5] == 1) document.getElementById('ac').setAttribute('speed', '1');
        if(data[5] == 2) document.getElementById('ac').setAttribute('speed', '5');
        //Movement
           if(data[6] == 0) document.getElementById("movement").src="movement_off.png";
         if(data[6] == 1) document.getElementById("movement").src="movement_on.png";
        //CO2
         if(data[7] == 0) document.getElementById("co").src="co.png";
         if(data[7] == 1) document.getElementById("co").src="co.gif";
          //Heating
         if(data[8] == 0) document.getElementById("heating").style.filter = 'grayscale(1)';
         if(data[8] == 1) document.getElementById("heating").style.filter = 'grayscale(0)';
        //Alarm
         if(data[9] == 0) document.getElementById('alarm').setAttribute('speed', '0');
         if(data[9] == 1) document.getElementById('alarm').setAttribute('speed', '1'); 
        var evtSource = new EventSource('wykres3.php'); evtSource.onmessage = function(e)
      {
      //Wykres
        const base = "data:image/png;base64,"+e.data;
        var image = new Image();
      image.src = base;
      imgx.innerHTML = '<image src="'+image.src+'"/>';
      };
      evtSource.onerror = function() { evtSource.close(); console.log('Done!'); };
      };
      evtSource.onerror = function() { evtSource.close(); console.log('Done!'); };
   </script>
</html>