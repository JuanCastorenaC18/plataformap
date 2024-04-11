<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                       
                <!-------------      image     ------------->
                
                <!---<img src="img/PRI-logo-blanco.png" alt="">-->
                <div class="text">
                    <a href="/">
                        <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                    </a>
                    <p>"TODOS UNIDOS POR UN MISMO PROYECTO"</p>
                    <x-application-logo2 class="w-5 h-5 fill-current text-gray-300" />
                </div>
                
            </div>
            <div class="col-md-6 right">
                
                <div class="input-box">
                   
                    <header style="color: gray;">
                    <img src="img/logo2.png" alt="">
                    <h3 style="color: gray;">Redes de <strong>Sectores y Organizaciones</strong></h3>
                    <p style="color: gray;">Partido Revolucionario Institucional <strong style="color: red;">COAHUILA</strong></p>
                    </header>
                   <div class="input-field">
                        <input type="text" class="input" id="email" required="" autocomplete="off">
                        <label for="email">Usuario</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" class="input" id="pass" required="">
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        <button type="button" class="btn btn-outline-danger btn-block"><i class="fa-right-to-bracket"></i> ENTRAR</button>
                   </div> 
                   <div class="signin">
                    <span>Already have an account? <a href="#">Log in here</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>