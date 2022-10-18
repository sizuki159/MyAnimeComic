<div class="anime__details__episodes">
    <div class="section-title">
        <h5>List Chapters</h5>
    </div>
    @foreach ($comic->chapters as $comicChapter)
        <a
            href="{{ route('client.chapter.detail', ['category' => $comic->category, 'comic' => $comic, 'chapterNumber' => $comicChapter->chapter_number]) }}">{{ $comicChapter->name }}</a>
    @endforeach
</div>
