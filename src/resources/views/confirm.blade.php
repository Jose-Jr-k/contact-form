<!DOCTYPE html>
<html lang="ja">

@extends('layouts.app')

@section('content')
<form action="/thanks" method="POST">
    @csrf

    <p>お名前：{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</p>
    <p>性別：
        @if ($inputs['gender'] == 1) 男性
        @elseif ($inputs['gender'] == 2) 女性
        @else その他
        @endif
    </p>
    <p>メールアドレス：{{ $inputs['email'] }}</p>
    <p>電話番号：{{ $inputs['tel'] }}</p>
    <p>住所：{{ $inputs['address'] }}</p>
    <p>建物名：{{ $inputs['building'] }}</p>
    <p>お問い合わせの種類：{{ $category_name }}</p>
    <p>お問い合わせ内容：{{ $inputs['detail'] }}</p>

    {{-- hiddenでデータを渡す --}}
    @foreach($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <button type="submit">送信</button>
</form>

<a href="{{ route('form.index') }}">修正する</a>
@endsection
</html>
