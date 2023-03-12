<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
</head>
<body>
  <div id="tab"></div>
  <div id="imgx"></div>


  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    var evtSource = new EventSource('wykres3.php');
    evtSource.onmessage = function(e) {
      $.ajax({
  url: 'test.php',
  success: function(data) {
    var table = data;
    document.getElementById("tab").innerHTML = table;
  }
});


      var base = "data:image/png;base64," + e.data;
      var image = new Image();
      image.src = base;
      document.getElementById("imgx").innerHTML = '<image src="' + image.src + '"/>';
    };
  </script>
</body>
</html>
