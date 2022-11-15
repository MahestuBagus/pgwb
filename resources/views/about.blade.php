@extends('parent')
@section('title', 'About')
@section('content')

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>About Me</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet praesentium quaerat porro incidunt iusto eos nulla voluptate quis ex aperiam.</p>
          </div>
          <div class="col-md-4">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, ut laboriosam? Explicabo neque maiores, ullam sequi fuga veniam, nam quas nihil, quidem repellat minima eligendi.</p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#c7c7c7"
          fill-opacity="1"
          d="M0,96L48,117.3C96,139,192,181,288,213.3C384,245,480,267,576,245.3C672,224,768,160,864,154.7C960,149,1056,203,1152,197.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir About -->

    @endsection
