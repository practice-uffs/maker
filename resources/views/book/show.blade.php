@extends('layouts.base')
@section('content')
    <div class="flex justify-center">
        <embed class="pt-5" src="{{ $book->pdf_path }}" width="800px" height="900px" />
    </div>
@endsection
