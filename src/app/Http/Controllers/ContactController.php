<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest; // フォームリクエストを使う場合

class ContactController extends Controller
{
    // 入力フォームの表示
    public function index()
    {
        return view('index');
    }

    // 確認画面への表示
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('confirm', compact('inputs'));
    }

    // データの保存
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
        return redirect('/thanks');
    }

    // サンクスページの表示
    public function thanks()
    {
        return view('thanks');
    }
}