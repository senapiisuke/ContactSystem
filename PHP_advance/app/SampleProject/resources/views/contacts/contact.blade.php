<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問合せ - 入力</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">入力画面</h1>
        <div class="container">
            {!! Form::open(['route' => 'confirm', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">氏名：</p>
                    <div class="col-sm-8">
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                <input type="hidden" name="name" value="{{ old('name') }}">
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ：</p>
                    <div class="col-sm-8">
                        {{ Form::text('kana', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('kana'))
                <p class="alert alert-danger">{{ $errors->first('kana') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号：</p>
                    <div class="col-sm-8">
                        {{ Form::text('tell', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('tell'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス：</p>
                    <div class="col-sm-8">
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('email'))
                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                @endif


                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容：</p>
                    <div class="col-sm-8">
                        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('body'))
                <p class="alert alert-danger">{{ $errors->first('body') }}</p>
                @endif

                <div class="text-center">
                    {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="container">
          <!-- ここに一覧表示を作る -->
          <table border="1">
            <thead>
              <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>フリガナ</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>お問合せ内容</th>
                <th>登録日時</th>
                <th>更新日時</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
              <tr>
                  <td>{{ $contact->id }}</td>
                  <td>{{ $contact->name }}</td>
                  <td>{{ $contact->kana }}</td>
                  <td>{{ $contact->tell }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->body }}</td>
                  <td>{{ $contact->created_at }}</td>
                  <td>{{ $contact->updated_at }}</td>
                  <td>
                  <td>
                    <a href="{{ route('edit', ['id'=>$contact->id]) }}"><button>編集</button></a>
                  </td>
                  <td>
                    {{-- 削除ボタン --}}
                    <form action="{{ route('destroy', ['id'=>$contact->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除"  onclick='return confirm("本当に削除しますか？");'>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
</body>
</html>