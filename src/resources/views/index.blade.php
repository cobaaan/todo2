<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Todo</title>
</head>
<body>
    <header class="header">
        <h1 class="header__ttl">Todo</h1>
    </header>
    
    <div class="message">
        @if(session('message'))
        <div class="message__success">{{ session('message') }}</div>
        @endif
        @if($errors->has('content'))
        <div class="message__error">{{ $errors->first('content') }}</div>
        @endif
    </div>
    
    <div>
        <h2 class="create__ttl">新規作成</h2><br>
        <form class="create" action="/create" method="post">
            @csrf
            <input class="create__input" type="text" name="keyword">
            <select class="create__select" name="category_id" value="カテゴリ">
                @foreach($categories as $category)
                <option name="category_id" value="{{ $category['id'] }}">{{ $category->name }}</option>
                @endforeach
            </select>
           
            <button class="create__button">作成</button>
        </form>
    </div>
    
    <div>
        <h2 class="search__ttl">Todo検索</h2><br>
        <form class="search" action="/search" method="post">
            @csrf
            <input class="search__input" type="text" name="content">
            <select class="create__select" name="category_id" value="">
                <option value="">カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="search__button">検索</button>
        </form>
    </div>
    
    <div class="list">
        <table class="list__table">
            <tr class="list__raw">
                <th class="list__head">Todo</th>
                <th class="list__head">Category</th>
            </tr>
            
            @foreach($todos as $todo)
            <tr class="list__content">
                <td class="list__input">
                    <form class="list__flex" action="/update" method="post">
                        @csrf
                        @method('patch')
                        <input class="list__text" type="text" name="content" value="{{ $todo->content }}">
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <p class="list__category">{{ $todo['category']['name'] }}</p>
                        <button class="button__update">更新</button>
                    </form>
                </td>
            </td>
            
            <td class="list__delete">
                <form action="/delete" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $todo->id }}">
                    <button class="button__delete">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
</div>
</body>
</html>