@extends('layouts.Backend')

@section('content')
<p>本当に消去してもよろしいですか？</p>
<form action="">
    <label for=""><input type="radio" name="movie_delete">はい</label>
    <label for=""><input type="radio" name="movie_delete">いいえ</label>
</form>
@endsection