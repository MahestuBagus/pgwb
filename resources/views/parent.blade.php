<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

  <style>
    .jumbotron {
      padding-top: 6rem;
      background-color: #c7c7c7;
    }

    #projects {
      background-color: #c7c7c7;
    }

    section {
      padding-top: 5rem;
    }
  </style>
  <title>@yield('title')</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #5e5e5e">
    <div class="container">
      <a class="navbar-brand" href="#">Mahestu Bagus Senaru P</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project">Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!--Content-->
  @yield('content')

  <!--Akhir Content-->



  <!-- Footer -->
  <footer class="text-white text-center pb-4" style="background-color: #5e5e5e">
    <p>Created by <a href="https://www.instagram.com/mahestubaguss_/" class="text-white fw-bold">Nadhira Shafa B.P</a></p>
  </footer>
  <!-- Akhir Footer -->

</body>

</html>