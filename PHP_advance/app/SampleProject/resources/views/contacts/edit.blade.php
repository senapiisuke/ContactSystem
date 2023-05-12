<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ - 編集</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">編集画面</h1>
        <div class="container">
        <form action="{{ route('update', ['id'=>$post->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">氏名：</p>
                    <div class="col-sm-8">
                    <input type="text" name="name" value="{{old('name') ?? $post->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ：</p>
                    <div class="col-sm-8">
                    <input type="text" name="kana" value="{{old('kana') ?? $post->kana}}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号：</p>
                    <div class="col-sm-8">
                    <input type="text" name="tell" value="{{old('tell') ?? $post->tell}}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス：</p>
                    <div class="col-sm-8">
                    <input type="text" name="email" value="{{old('email') ?? $post->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容：</p>
                    <div class="col-sm-8">
                    <input type="textarea" name="body" value="{{old('body') ?? $post->body}}">
                    </div>
                </div>

                <div class="text-center">
                    <h5>上記の内容でよろしいですか？</h5>
                </div>

                <div class="text-center">
                    <input type="submit" value="更新" class="btn btn-primary">
                    <input type="reset" value="キャンセル" class="btn btn-secondary" onclick='window.history.back(-1);'>
                </div>

        </form>
        </div>
    </div>
</body>
</html>