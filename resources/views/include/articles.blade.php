  <div class="col-12 col-sm-6 mb-4">
    @if (env('APP_ENV') == 'local')
    <img class="img-fluid rounded" data-src="holder.js/800x600?auto=yes&random=yes&textmode=exact" alt="" srcset="">
    @else
    <img class="img-fluid rounded" src="{{ $item->cover }}" alt="" srcset="">
    @endif
  </div>
  <div class="col-12 col-sm-6 mb-4">
    <p>
      <h3>
        @if (URL::current() == route('user.pengumuman.index'))
          <a href="{{ route('user.pengumuman.show', $item->slug) }}">{{ Str::title($item->title) }}</a>
        @else
          <a href="{{ route('user.artikel.show', $item->slug) }}">{{ Str::title($item->title) }}</a>
        @endif
      </h3>
      <span style="font-size: medium">
        <i class="fas fa-calendar-alt"></i>
        {{ $item->created_at->format('d M Y') }}

        <i class="fa fa-comments ml-2" aria-hidden="true"></i>
        {{ count($item->Review)}}
        Komentar

        <i class="fa fa-tag ml-2"></i>
        <a href="" class=""> {{ $item->category}}</a>
      </span>
    </p>
    {!! strip_tags(Str::limit($item->content, 100)) !!}
  </div>
  <div class="w-100"></div>