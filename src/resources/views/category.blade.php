<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <title>Category</title>
</head>
<body>
    <header class="header">
        <div class="header__ttl">
            <a href="{{ route('/index') }}">Todo</a>
        </div>
        <div class="header__category">
            <a href="{{ route('/category') }}">カテゴリ一覧</a>
        </div>
    </header>
    
    <div>
        @if(session('message'))
        <p class="message message__green">{{ session('message') }}</p>
        @endif
        @if($errors->has('name'))
        <p class="message message__red">{{ $errors->first('name') }}</p>
        @endif
    </div>
    
    <div class="wrapper">
        <form class="create" action="/category/create" method="post">
            @csrf
            <input class="create__input" type="text" name="name">
            <button class="create__button">作成</button>
        </form>
    </div>
    
    <div class="wrapper">
        <table class="list">
            <tr>
                <th class="list__ttl">category</th>
            </tr>

            @foreach ($categories as $category)
            <tr>
                <td class="list__content">
                    <form class="list__content--left" action="/category/update" method="post">
                        @csrf
                        @method('patch')
                        <input class="list__content--input" type="text" name="name" value="{{ $category['name'] }}">
                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                        <button class="list__content--update list__button">更新</button>
                    </form>
                    <form action="/category/delete" method="post">
                        @csrf
                        @method('delete')
                        <div>
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="list__content--delete list__button">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</body>
</html>