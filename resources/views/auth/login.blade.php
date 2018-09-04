<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{url('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="{{url('css/vendor/sb-admin-2.css')}}" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-3">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inicios de sesión</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{ route('login') }}" method="post">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary text-center">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{url('vendor/metisMenu/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{url('js/sb-admin-2.js')}}"></script>

    </body>

</html>
