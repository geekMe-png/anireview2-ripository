@extends('layouts.app')

@section('header-text')
<p>こちらは<span class="text-red-600">作品登録ページ</span>です</p>
@endsection

@section('content')
<form action="{{ route('movie_edit.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <label for="input_movie_title">作品タイトル</label>
        <input type="text" id="input_movie_title" name="input_movie_title">
    </fieldset>

    <fieldset>
        <label for="input_movie_about">概要</label>
        <textarea name="input_movie_about" id="input_movie_about" cols="30" rows="10"></textarea>
    </fieldset>

    <fieldset>
        <label for="input_movie_img">イメージ画像</label>
        <input type="file" id="input_movie_img" name="input_movie_img">
    </fieldset>

    <fieldset>
        <label for="input_auther">原作</label>
        <input type="text" id="input_auther" name="input_auther">
    </fieldset>

    <fieldset>
        <label for="input_directer">監督</label>
        <input type="text" id="input_directer" name="input_directer">
    </fieldset>

    <fieldset>
        <label for="input_screenwriter">シリーズ構成・脚本</label>
        <input type="text" id="input_screenwriter" name="input_screenwriter">
    </fieldset>

    <fieldset>
        <label for="input_CharacterDesign">キャラクターデザイン</label>
        <input type="text" id="input_CharacterDesign" name="input_CharacterDesign">
    </fieldset>

    <fieldset>
        <label for="input_music">音楽</label>
        <input type="text" id="input_music" name="input_music">
    </fieldset>

    <fieldset>
        <label for="input_company">制作会社</label>
        <input type="text" id="input_company" name="input_company">
    </fieldset>

    <fieldset>
        <label for="input_period">放送年代</label>
        <div><select name="input_year" id="input_year" class="font-normal"></div>
            @foreach($years as $year)
                <option value="{{$year->id}}">{{$year->year}}</option>
            @endforeach
            </select>
    </fieldset>
    
    <input type="submit" value="作成">
</form>
@endsection
