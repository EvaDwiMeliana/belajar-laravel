@extends('layouts.template')

@section('judul')
Home
@endsection

@section('hero')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">You Are Never Too Old To Learn</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">Temukan Tempat Belajarmu dan Segera Raih Mimpimu</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>BUAT AKUN</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="{{asset('tema/img/hero-img.png')}}" class="img-fluid" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->

@endsection
