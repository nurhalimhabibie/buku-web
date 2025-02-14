@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $book->title }}</h1>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->publish_year }}</p>
    <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection