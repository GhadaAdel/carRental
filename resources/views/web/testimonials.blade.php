@extends('layouts.main')
@section('title','testimonials')
@section('content')
<div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        
    <div class="container">
      <div class="row align-items-end ">
        <div class="col-lg-5">

          <div class="intro">
            <h1><strong>Testimonials</strong></h1>
            <div class="custom-breadcrumbs"><a href="{{ route('index') }}">Home</a> <span class="mx-2">/</span> <strong>Testimonials</strong></div>
          </div>

        </div>
      </div>
    </div>
  </div>
@include('includes.testimonials')

@endsection