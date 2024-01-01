<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Year;

class MovieController extends Controller
{
    public function create() {
        $years = Year::all();

        return view('/backend/movie_edit', compact('years'));
    }

    public function store(Request $request) {

        //画像ファイルを保存するディレクトリ名
        $dir = 'img';
        //モデルを変数に入れることでデータベースを操作するインスタンスを作成
        $movie = new Movie();

        // アップロードされたファイル名を取得
        $filename = $request->file('input_movie_img')->getClientOriginalName();

        //画像ファイルを保存するディレクトリはstorage/app/public/img/
        $request->file('input_movie_img')->storeAs('image', $filename, 'public');

        //データベースに追加
        //$image->実際に存在するテーブルの列名 = $file_name;
        //$image->実際に存在するテーブルの列名 = 'storage/app/public/' . $dir . '/' . $file_name;
        $post = Movie::create([
            'movie_title' => $request->input_movie_title,
            'about' => $request->input_movie_about,
            'auther' => $request->input_auther,
            'directer' => $request->input_directer,
            'screenwriter' => $request->input_screenwriter,
            'caracterdesign' => $request->input_CharacterDesign,
            'music' => $request->input_music,
            'company' => $request->input_company,
            'year_id' => $request->input_year,
            'movie_img' => $filename,
            'movie_img_path' => 'storage/app/public' . $dir . '/' . $filename,
        ]);

        return back();
    }
}
