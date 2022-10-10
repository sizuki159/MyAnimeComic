@php
$path = 'comics/' . $chapter->comic_id . '/chapters/' . $chapter->chapter_number . '/';
@endphp
@foreach ($chapter->source as $source)
<img src="{{asset($path .  $source)}}" alt="">
<br>
@endforeach