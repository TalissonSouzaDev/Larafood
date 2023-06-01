<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('css/site.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-danger fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#template">Talisson Souza</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="#template">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#plano">Planos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contato</a>
              </li>
            </ul>
            <div class="d-flex">
           <a href="{{route('login')}}" class="btn btn-danger">Entrar</a>
           
          </div>
        </div>
      </nav>


        <section id="template">
            @yield('template')

        </section>

        <section id="plano">
            <h1>Planos</h1>
            @yield('plano')
         

        </section>

        <footer>
           <section id="footer">
            <nav class="navbar navbar-expand-sm navbar-light footer">


                <div class="">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#"><i class="fab fa-whatsapp"></i></a>
                    </li>

                    <li class="nav-item">
                        <h5>&copy; Talisson Souza</h5>
                      </li>
  

                 
                  </ul>
                </div>



                <div class="formulario">
                   
                    <form action="">
                        <h1>Contato</h1>
                        <div class="form-group">
                          <label for="email" class="form-label">Email:</label>
                          <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" autocomplete="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd" class="form-label">Telefone:</label>
                          <input type="tel" class="form-control"  placeholder="Telefone" name="Telefone" autocomplete="tel">
                        </div>
                
                        <div class="form-group">
                        <label for="description">Descrição:</label>
                        <textarea class="form-control" rows="10"  name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger" style="width: 100%">Enviar</button>
                      </form>
                  </div>
              </nav>

           </section>

        </footer>
   


    
</body>
</html>