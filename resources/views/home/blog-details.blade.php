@extends('layout')

@section('content')
  <div class="page-section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb bg-transparent py-0 mb-5">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item"><a href="blog">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
          </nav>
        </div>
      </div> <!-- .row -->

      <div class="row">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-thumb">
              <img src="../assets/img/blog/{{ $post->image }}" alt="">
            </div>
            <div class="post-meta">
              <div class="post-author">
                <span class="text-grey">By</span> <a href="#">{{ $post->author->name }}</a>  
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#">{{ $post->date }}</a>
              </div>
              <span class="divider">|</span>
              <div>
                @foreach($post->categories as $category)
                <a href="#">{{ $category->name }}@if(!$loop->last), @endif</a>
                @endforeach 
              </div>
              <span class="divider">|</span>
              <div class="post-comment-count">
                <a href="#">{{ $post->comments }} Comments</a>
              </div>
            </div>
            <h2 class="post-title h1">{{ $post->title }}</h2>
            <div class="post-content">
              <p>{{ $post->content }}</p>
            </div>
            <div class="post-tags">
              @foreach($post->tags as $tag)
                <a href="#" class="tag-link">{{ $tag->name }}</a>
              @endforeach
            </div>
          </article> <!-- .blog-details -->

          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="#" class="">
              <div class="form-row form-group">
                <div class="col-md-6">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="col-md-6">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website">
              </div>
  
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="msg" id="message" cols="30" rows="8" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary">
              </div>
  
            </form>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Search</h3>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
            </div>
            <div class="sidebar-block">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="categories">
                @foreach($categories as $category)
                  <li><a href="#">{{ $category->name }} <span>{{ 1 + $loop->index * 10 }}</span></a></li>
                @endforeach
              </ul>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Recent Blog</h3>
              @foreach($posts as $post)
              <div class="blog-item">
                <a class="post-thumb" href="">
                  <img src="../assets/img/blog/{{ $post->image }}" alt="">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="#">{{ $post->title }}</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> {{ $post->date }}</a>
                    <a href="#"><span class="mai-person"></span> {{ $post->author->name }}</a>
                    <a href="#"><span class="mai-chatbubbles"></span> {{ $post->comments }}</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Tag Cloud</h3>
              <div class="tagcloud">
                @foreach($tags as $tag)
                  <a href="#" class="tag-cloud-link">{{ $tag->name }}</a>
                @endforeach
              </div>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>
        </div> 
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection