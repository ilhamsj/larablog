@extends('layouts.user')

@section('title_page', $item->title)

@section('header_content')
<div class="post-heading row justify-content-center align-items-center" style="min-height: 100vh">
  <div class="col">
      <h1>{{$item->title}}</h1>
      <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
      <span class="meta">Posted by
        <a href="#">Start Bootstrap</a>
        on {{ $item->created_at->format('F d, Y')}}</span>
  </div>
</div>
@endsection

@section('content')
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>
            {{ $item->content }}
          </p>
        </div>
      </div>
    </div>
  </article>
@endsection