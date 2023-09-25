<!DOCTYPE html>
<html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login e Cadastro no Laravel 10 - Página de Cadastro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </head>
   
   <style>

    .error{
        color:red;
        font-weight: 700;
        display: block;
        padding: 6px 0;
        font-size:14px;
    }
    .form-control.error{
        border-color:red;
        padding: .375rem .75rem;

    }
    input.invalid, textarea.invalid{
	border: 2px solid red;
    }

    input.valid, textarea.valid{
        border: 2px solid green;
    }

</style>

    <body class="antialiased"> 
    <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Login</h1>
                    </div>
                    <div class="card-body">
                    @if(session()->has('error'))
                        <p class="alert alert-danger">
                            {{session()->get('error')}}
                        </p>
                    @endif
                        <form id="loginvalidation" action="{{ route('auth') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="exemplo@gmail.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            
                            <div class="inline">
                            <button type="submit" class="btn btn-primary">Entrar</button>

                            <a class="btn btn-success" href="{{ route('register') }}" style="position: absolute; right: 16px;;" role="button">Cadastrar</a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/4.0.0/jquery.validate.unobtrusive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <script type="text/javascript" src="jquery.min.js">

        $('#email').on('input', function() {
            var input=$(this);
            var is_email=input.val();
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

    </script>


<script>

    $(document).ready(function() {
        $.validator.addMethod("strpassword", function(value, element, args) {
        return /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])/.test(value);
        }, 
      );
   });
   
$("#loginvalidation" ).validate({
        rules:{
            email:{
                required:true,
                email:true,
            },
            password:{
                required:true,
                minlength:8,
                strpassword:true,
            }
        },
        messages:{
            email:{
                required: "Este campo é obrigatório",
                email: "Informe um e-mail válido",
            },
            password:{
                required: "Este campo é obrigatório",
                minlength: "Informe ao menos 8 caracteres",
                strpassword: "A senha deve conter ao menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caractere especial",
            },
        },
        
    });
</script>