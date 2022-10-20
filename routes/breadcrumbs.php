<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('client.home'));
});

// Home > Category
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Category', route('client.category'));
// });


// Home > Category > [Category]
Breadcrumbs::for('category.listcomic', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');
    $trail->push($category->name, route('client.category.showListComic', ['category' => $category]));
});

// Home > Category > [Category] > [Comic]
Breadcrumbs::for('category.comic', function (BreadcrumbTrail $trail, Comic $comic) {
    $trail->parent('category.listcomic', $comic->category);
    $trail->push($comic->title, route('client.comic.detail', ['category' => $comic->category, 'comic' => $comic]));
});

// Home > Category > [Category] > [Comic] > Chapter Number
Breadcrumbs::for('category.comic.chapter', function (BreadcrumbTrail $trail, Chapter $chapter) {
    $trail->parent('category.comic', $chapter->comic);
    $trail->push($chapter->name, route('client.chapter.detail', ['category' => $chapter->comic->category, 'comic' => $chapter->comic, 'chapterNumber' => $chapter->chapter_number]));
});