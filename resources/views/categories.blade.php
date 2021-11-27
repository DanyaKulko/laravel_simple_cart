@extends('layouts.default_layout')


@section('main_content')
    @foreach($categories as $category)
        <li>{{ $category->category_name }} => <a href="{{ route('categories') }}/{{ $category->url }}">Посилання</a></li>
    @endforeach
@endsection


