<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <style>
            html, body {
                background-color: #fff;
                color:  black;
                font-family: 'Raleway', sans-serif;
                font-weight: 600;
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
                <div class="content">
                    <div class="title m-b-md">
                        Add Article
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                       <form action="" method="POST" accept-charset="utf-8">
                             <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Article text</label>
                                <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Content"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                    </div>
                    <div class="col-md-6">


                        @forelse ($articles as $article)
                            <article>

                                <h3> {{ $article->title }} </h3>
                                <p>  {{ $article->body }} </p>
                                <p>  {{ $article->published_at }}</p>

                                <a href="  {{action ('IndexController@show', [$article->id])}}  " class="btn btn-info">Show all</a>

                            </article>
                        @empty
                            <h3>No articles</h3>
                        @endforelse
                        <hr>
                    </div>
                </div>

            </div>


        </div>
    </body>
</html>
