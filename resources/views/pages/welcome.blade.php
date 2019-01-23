@extends('main')
@section('title', '| Homepage')


@section('content')


      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to My Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->

      <div class="row">
        @include('partials._sidebar')
        <div class="col-md-8">
          <div class="post">          
            @foreach ($posts as $post)
              @php
                $created_at = new DateTime($post->created_at);
                $time_zone = new DateTimeZone('Asia/Ho_Chi_Minh');
                $created_at->setTimezone($time_zone);
              @endphp

              <h3>{{$post->title}} <i><small>on {{$created_at->format('M j, Y')}}</small></i></h3> 
  
              {{-- strip_tags( $str, $option);
                    + $str là chuỗi cần loại bỏ các thẻ HTML và PHP.
                    + $option là các thẻ mà bạn muốn hàm strip_tags() không loại bỏ. Các thẻ này sẽ được giữ lại trong chuỗi trả về.
               --}}
              <p>{{ substr(strip_tags($post->body), 0, 300)}}{{strlen(strip_tags($post->body)) ? '...' : '' }}</p>
              <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            @endforeach
            
          </div>
          <hr>
        </div>

        
      </div>

      <div class="text-center">
          {!! $posts->links() !!}
      </div>
    <!-- end of .container -->
@endsection
