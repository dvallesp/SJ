<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Josep Sanjuan</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/comun.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <!--HEADER-->
      <div class="header">
        <nav class="navbar navbar-default" id="barra-de-navegacion" role="navigation">
          <img src="../images/sanjuan.png" id="logo" class="navbar-left" alt="Josep Sanjuan" />
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="index.html">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyectos <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="">3</a></li>
                    <li class="divider"></li>
                    <li><a href="#">4</a></li>
                    <li class="divider"></li>
                    <li><a href="#">5</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Colecciones <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="galeria.html">1 (prueba)</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="divider"></li>
                    <li><a href="#">4</a></li>
                    <li class="divider"></li>
                    <li><a href="#">5</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Blog</a></li>
                <li class="active"><a href="contacta.php">Contacta</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </div><!-- /.header -->

      <ol class="breadcrumb">
        <li><a href="./index.html">Inicio</a></li>
        <li class="active">Contacta</li>
      </ol>

      <?php
  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Bústia de missatges – Josepsanjuan.com'; 
    $to = 'davidvallesperez@gmail.com'; 
    $subject = 'Missatge a Josepsanjuan.com ';
    
    $body ="De: $name\n E-Mail: $email\n Missatge:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Por favor, introduce tu nombre.';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Por favor, introduce una dirección e-mail válida';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Por favor, introduce un mensaje';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
      $errHuman = 'No has superado el filtro anti-spam. Por favor, vuelve a intentarlo.';
    }
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">¡Gracias! Te responderé lo antes posible.</div>';
  } else {
    $result='<div class="alert alert-danger">Disculpa, ha habido algún error al enviar tu mensaje. Por favor, vuelve a intentarlo</div>';
  }
}
  }
?>
      <div class="container"> <!-- /.container del form -->
        <h3>Escríbeme</h3>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="form"><!--formulario-->
            <form class="form-horizontal" role="form" method="post" action="contacta.php">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre y apellidos" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                      <?php echo "<p class='text-danger'>$errName</p>";?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                      <?php echo "<p class='text-danger'>$errEmail</p>";?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="message" class="col-sm-2 control-label">Mensaje</label>
                  <div class="col-sm-10">
                      <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                      <?php echo "<p class='text-danger'>$errMessage</p>";?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="human" name="human" placeholder="Tu respuesta">
                      <?php echo "<p class='text-danger'>$errHuman</p>";?>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                      <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                      <?php echo $result; ?>    
                  </div>
              </div>
          </form> 
          </div><!-- /.formulario-->
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
           <ul>
             <li>Tel: +34....</li>
             <li>Mail: ...</li>
             <li>Dirección: ...</li>
           </ul>
          </div>
        </div>
      </div> <!-- /.container del form -->



      <!--FOOTER-->
      <div class="footer" id="footer">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col-izq">
          <a href="#"><img src="../images/flags/spanish.png" alt="Spanish" /></a>
          <a href="#"><img src="../images/flags/catalan.png" alt="Catalan" /></a>
          <a href="#"><img src="../images/flags/russian.png" alt="Russian" /></a>
          <a href="#"><img src="../images/flags/english.png" alt="English" /></a>
          <a href="#"><img src="../images/flags/arab.png" alt="Arab" /></a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col-cen">
          <p>
            <a href="#"><img src="../images/social/facebook.png" alt="Facebook" /></a>
            <a href="#"><img src="../images/social/googleplus.png" alt="Google Plus" /></a>
            <a href="#"><img src="../images/social/twitter.png" alt="Twitter" /></a>
            <a href="#"><img src="../images/social/flickr.png" alt="Flickr" /></a>
            <a href="#"><img src="../images/social/pinterest.png" alt="Pinterest" /></a>
            <a href="#"><img src="../images/social/youtube.png" alt="Youtube" /></a>
            <a href="#"><img src="../images/social/tumblr.png" alt="Tumblr" /></a>
          </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="footer-col-der">
          <p>© Josep Sanjuan 2014-<script language="JavaScript" type="text/javascript">
              now = new Date
              theYear=now.getYear()
              if (theYear < 1900)
              theYear=theYear+1900
              document.write(theYear)
            </script>
          </p>
        </div>
      </div><!-- /.footer-->
    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>