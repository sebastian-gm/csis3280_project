@section('title', "Brainy Wallet")

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <style>
        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
            color: #333;
            text-shadow: none;
            /* Prevent inheritance from `body` */
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /*
 * Base structure
 */

        body {
            background-image: url("{{ asset('/img/home.jpg') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
            box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        }

        .cover-container {
            max-width: 42em;
        }


        /*
 * Header
 */

        .nav-masthead .nav-link {
            color: rgba(255, 255, 255, .5);
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }
    </style>



</head>

<body class="d-flex h-100 text-center text-bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">@yield('title')</h3>

            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="{{ route('register') }}">Create an account</a>
                <a class="nav-link fw-bold py-1 px-0" href="{{ route('login') }}">Sign In</a>
                <a class="nav-link fw-bold py-1 px-0 active" href="\about">About</a>
                
            </nav>
        </div>
    </header>

    <main class="px-3">
        <h2>Brainy Wallet, the new era of expense management</h1>
        <p class="lead">This is a project developed by Pamela Lemus and Sebastian Gonzalez where we apply all the concepts seen throughout the web scripting course for the fall semester of 2022. 
        Therefore, we incorporate models, views and controllers. In addition, we added CRUD functions for both the user and the administrator.
        </p>

        <div class="row">
            <div class="col">
                <h3>Third-Party Integration</h3>
                <p class="lead">This project used an external currency exchange API. Although Laravel itself has the tool to perform this task, it was decided to use an external one to learn how to do it in different ways.
                The URL where all the data was obtained can be found at the following link:
                </p>
                <a href="https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/cad.json">Currency-api</a>
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>GitHub</h3>
                <img src="https://miro.medium.com/max/720/0*LqBi2dONH28oTKVX.webp" alt="GitHub logo">
                <p class="lead">This project was developed through the GitHub platform. Both team members contributed equally by working on their respective branches and then merging into the main branch.
                We can find the repository of this project at the following link:
                </p>
                <a href="https://github.com/sebastian-gm/csis3280_project">CSIS-3280 Brainy Wallet Project</a>
                
            </div>
        </div>
    </main>


    <footer class="mt-auto text-white-50">
        <p> &copy; 2022 Brainy Wallet Technologies Inc. All rights reserved.</p>
    </footer>
</div>



</body>

</html>



