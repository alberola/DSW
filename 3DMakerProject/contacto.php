
    <?php include 'php/header.php'?>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="mb-5 mt-5 mx-5" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                      <h5><label for="correo" class="form-label">Email</label></h5>
                      <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                      <h5><label for="asunto" class="form-label">Asunto</label></h5>
                        <input type="text" class="form-control" id="asunto" name="asunto" autocomplete="off" required>
                      </div>
                    <div class="mb-3">
                        <h5><label for="descripcion" class="form-label">Descripción</label></h5>
                        <textarea class="form-control" name="mensaje" placeholder="Coméntanos tu propuesta aquí..." id="floatingTextarea2" style="height: 200px" autocomplete="off" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Enviar</button>
                  </form>
            </div>
        </div>
    </div>

    <hr>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){


      function limpiar($data){
        $data = trim($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
      }

      $destinatario = 'alejandroalberola140495@gmail.com';

      $asunto = limpiar($_POST['asunto']);
      $email = limpiar($_POST['email']);
      $mensaje = limpiar($_POST['mensaje']);
      $header = "Mensaje enviado desde la página de 3DMakerProject";

      $contenido = "Email: ". $email."\nMensaje: ". $mensaje."\n\n".$header;

      mail($destinatario, $asunto, $contenido);

      echo "<script>
              Swal.fire({
                icon: 'sucess',
                title: 'Correo enviado correctamente!',
                confirmButtonColor: '#2b2b2a', 
            })
            </script>";
      echo "<script>
            setTimeout(function () {
                window.location.href = 'contacto.php'; 
            }, 2000);
        </script>";

    }
    include 'php/footer.php';
    ?>