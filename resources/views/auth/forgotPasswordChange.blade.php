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

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-light cardB">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('forgot.changePassword')}}">
                            @csrf
                            <input type="hidden" value="{{$token}}" name="token">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                    @error('new_password')
                                        <span class="span_star_message">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label for="password">New Confirm Password</label>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
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