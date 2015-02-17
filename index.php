<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>The Magic Mushroom</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
   <link href="css/bootstrap-responsive.css" rel="stylesheet">
   <link href="css/bootstrap-lightbox.min.css" rel="stylesheet">
   <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/redmond/jquery-ui.css" rel="stylesheet" />
   
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    <style type="text/css">
      body {
        padding-top: 80px;
        padding-bottom: 5px;
        background-color: #f5f5f5;
      }

      html, body {
        height: 100%;
      }
      
      #wrap {
        min-height: 100%;
      }
      
      #main {
        overflow:auto;
        padding-bottom:20px; /* this needs to be bigger than footer height*/
      }
      
      .footer {
        position: relative;
        margin-top: -20px; /* negative value of footer height */
        height: 20px;
        clear:both;
        padding-top:20px;
        padding-left: 40px;
      } 
    </style>
 </head>
 <body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/youtube.js"></script>
  <script type="text/javascript">
   function autorun()
   {
      m = $("#magic-m");
      
      m.mouseenter(function (el) {
        var w = rnd(40, $(document).width()-80-m.width());
        var h = rnd(40, $(document).height()-80-m.height());
          
        $(this).tooltip('disable');
                                                       
        $(this).parent().animate({"top": h, "left": w});
      });
      
      setTimeout(function() {
        m.attr("title", "Hey!");
        m.tooltip("show");
        
        setTimeout(function() {
          m.tooltip("hide");
          
          setTimeout(function() {
            m.attr("data-original-title", "I'm the Magick Mushroom");
            m.tooltip("show");
            
            setTimeout(function() {
              m.tooltip("hide");
              
              setTimeout(function() {
                m.attr("data-original-title", "Move your cursor over me and catch me!");
                m.tooltip("show");
              }, 300);
            }, 1500);
          }, 300);
        }, 800);
      }, 300);
      
      $("#ftr").tooltip("show");
      
      $("a.youtube").YouTubePopup({autoplay: 1, hideTitleBar: true, width: "800", 'clickOutsideClose': false});
   }
   if (document.addEventListener) document.addEventListener("DOMContentLoaded", autorun, false);
   else if (document.attachEvent) document.attachEvent("onreadystatechange", autorun);
   else window.onload = autorun;
   
   function rnd (min, max) {
     return Math.floor(Math.random() * max) + min;
   }
  </script>
  
  <div id="wrap">
  <div id="main" class="container clear-top">

      <div style="width: 12em; position: absolute; top:20%; left: 10%">
        <img id="magic-m" data-toggle="tooltip" data-placement="top" src="http://www.clker.com/cliparts/Z/K/S/d/g/Z/happy-mushroom.svg" style="width: 100%" />
      </div>
    </div> <!-- /container -->
  </div>

  <?php
      $db = mysql_connect('localhost:/var/run/mysql/mysql.sock', '--------', '-----');
      if (!$db) die('connection error '.mysql_error());
      if (!mysql_select_db('xszabo04', $db)) die('database not available '.mysql_error());
      
      $row = mysql_query("SELECT NOW() as date");
      $data = mysql_fetch_object($row);
  ?>
    <footer class="footer">
      <span id="ftr" data-toggle="tooltip" data-placement="top" title="I've used PHP &amp; MySQL here"><?php echo substr($data->date, 0, 4)." &copy; Magick Mushroom"?></span>
      |
      <a class="youtube" href="http://www.youtube.com/watch?v=hGlyFc79BUE">Click here to watch some cool mushroom video!</a>
    </footer>
 </body>
</html>