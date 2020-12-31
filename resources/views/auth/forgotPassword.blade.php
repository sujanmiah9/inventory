<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Inventory &amp; POS System</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="icon" href="{{asset('upload')}}/icon.png" type="image/x-icon"/>
    <link href="{{asset('asset')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('asset')}}/assets/css/main.css" rel="stylesheet" />
        <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('asset')}}/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="back">
    <div class="container shadow mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-orange">
                        <h4 style="font-size: 25px; font-weight:bold; color:#fff;">Forgot Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('send.mail')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address to send Mail">
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    {{-- <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> --}}
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset('asset')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('asset')}}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{asset('asset')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('asset')}}/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('asset')}}/assets/js/app.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    <script type="text/javascript">
        @if(Session::has('message'))
            var type ="{{Session::get('alert-type', 'info')}}"
            switch(type){
            case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
            case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
            case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
            case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
            }
        @endif
    </script>
</body>

</html>