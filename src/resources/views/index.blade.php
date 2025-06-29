<!DOCTYPE html>
<html lang="ja">

@extends('layouts.app')

@section('content')
<div class="admin-container">
    <form method="GET" action="{{ route('admin.index') }}">
        <input type="text" name="full_name" placeholder="名前" value="{{ request('full_name') }}">
        <input type="text" name="email" placeholder="メール" value="{{ request('email') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="created_at" value="{{ request('created_at') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}">リセット</a>
    </form>

    <form method="GET" action="{{ route('admin.export') }}">
        <input type="hidden" name="full_name" value="{{ request('full_name') }}">
        <input type="hidden" name="email" value="{{ request('email') }}">
        <input type="hidden" name="gender" value="{{ request('gender') }}">
        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
        <input type="hidden" name="created_at" value="{{ request('created_at') }}">
        <button type="submit">エクスポート</button>
    </form>

    {{-- 一覧表示 --}}
    <table>
        <thead>
            <tr>
                <th>ID</th><th>名前</th><th>性別</th><th>メール</th><th>種類</th><th>日付</th><th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->fullName }}</td>
                <td>{{ $contact->gender_label }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                <td><button class="detail-button" data-id="{{ $contact->id }}">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->appends(request()->query())->links() }}
</div>

@endsection
</html>
