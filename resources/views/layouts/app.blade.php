<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


        

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

        <!-- Styles -->

        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

        <style>
            html, body {
                background-color: #fff;
                color:  black;
                font-family: 'Raleway', sans-serif;
                font-weight: 400;       
                height: 100vh;
                margin: 0;
            }       
            .full-height {
                height: 100vh;
            }
            .flex-center {       
                align-items: center;
                display: flex;
                justify-content: center;       
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;       
            }
            .content {       
                text-align: center;
            }
            .title {
                color: #636b6f;
                font-size: 54px;
                font-weight: 300;
            }
            .links > a {
                padding: 0 25px;       
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            label, input, textarea, button {
                color: black;
                font-weight: 600;
            }
            h3 {
                font-weight: 600;
            }
        </style>
        
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="container">

               @yield('content')

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <!-- Scripts -->

        <script>
            $('.js-example-basic-multiple').select2({
                placeholder: "Choose a tag",
                tags: true

            });
        </script>
    </body>
</html>
