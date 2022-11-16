<div class="anime__details__episodes">
    <div class="section-title">
        <h5>List Chapters</h5>
    </div>
    @foreach ($comic->chapters as $comicChapter)
        @if ($comicChapter->chapter_number == $chapterNumber)
        <a
            style="background: white; color: black;"
            href="{{ route('client.chapter.detail', ['category' => $comic->category, 'comic' => $comic, 'chapterNumber' => $comicChapter->chapter_number]) }}">{{ $comicChapter->name }}
        </a>
        @else
        <a
            href="{{ route('client.chapter.detail', ['category' => $comic->category, 'comic' => $comic, 'chapterNumber' => $comicChapter->chapter_number]) }}">{{ $comicChapter->name }}
        </a>
        @endif
    @endforeach
</div>
