<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ - 確認</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">確認画面</h1>
        <div class="container">
            <?php echo Form::open(['route' => 'store', 'method' => 'POST']); ?>

                <?php echo e(csrf_field()); ?>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">氏名：</p>
                    <div class="col-sm-8">
                    <?php echo e($inputs['name']); ?>

                    </div>
                </div>
                <input type="hidden" name="name" value="<?php echo e($inputs['name']); ?>">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ：</p>
                    <div class="col-sm-8">
                    <?php echo e($inputs['kana']); ?>

                    </div>
                </div>
                <input type="hidden" name="kana" value="<?php echo e($inputs['kana']); ?>">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号：</p>
                    <div class="col-sm-8">
                    <?php echo e($inputs['tell']); ?>

                    </div>
                </div>
                <input type="hidden" name="tell" value="<?php echo e($inputs['tell']); ?>">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス：</p>
                    <div class="col-sm-8">
                    <?php echo e($inputs['email']); ?>

                    </div>
                </div>
                <input type="hidden" name="email" value="<?php echo e($inputs['email']); ?>">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容：</p>
                    <div class="col-sm-8">
                    <?php echo e($inputs['body']); ?>

                    </div>
                </div>
                <input type="hidden" name="body" value="<?php echo e($inputs['body']); ?>">

                <div class="text-center">
                    <button name="action" type="submit" value="return" class="btn btn-dark">入力画面に戻る</button>
                    <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</body>
</html><?php /**PATH /var/www/workspace/SampleProject/resources/views/contacts/confirm.blade.php ENDPATH**/ ?>