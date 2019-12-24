<div class="col-6 col-sm-3 mb-4">
  @if (env('APP_ENV') == 'local')
  <img style="cursor: pointer" class="img-fluid rounded" href="holder.js/1366x768?auto=yes&random=yes&textmode=exact" data-src="holder.js/800x600?auto=yes&random=yes&textmode=exact" alt="" srcset="">
  @else
  <img style="cursor: pointer" class="img-fluid rounded" href="{{ secure_url($item->file) }}" src="{{ secure_url($item->file) }}" alt="" srcset="">
  @endif
</div>