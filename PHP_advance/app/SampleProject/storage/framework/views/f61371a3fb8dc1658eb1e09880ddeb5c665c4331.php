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
            <?php echo Form::open(['route' => 'confirm', 'method' => 'POST']); ?>

                <?php echo e(csrf_field()); ?>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">氏名：</p>
                    <div class="col-sm-8">
                        <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php if($errors->has('name')): ?>
                <p class="alert alert-danger"><?php echo e($errors->first('name')); ?></p>
                <input type="hidden" name="name" value="<?php echo e(old('name')); ?>">
                <?php endif; ?>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ：</p>
                    <div class="col-sm-8">
                        <?php echo e(Form::text('kana', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php if($errors->has('kana')): ?>
                <p class="alert alert-danger"><?php echo e($errors->first('kana')); ?></p>
                <?php endif; ?>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号：</p>
                    <div class="col-sm-8">
                        <?php echo e(Form::text('tell', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php if($errors->has('tell')): ?>
                <p class="alert alert-danger"><?php echo e($errors->first('name')); ?></p>
                <?php endif; ?>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス：</p>
                    <div class="col-sm-8">
                        <?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php if($errors->has('email')): ?>
                <p class="alert alert-danger"><?php echo e($errors->first('email')); ?></p>
                <?php endif; ?>


                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容：</p>
                    <div class="col-sm-8">
                        <?php echo e(Form::textarea('body', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php if($errors->has('body')): ?>
                <p class="alert alert-danger"><?php echo e($errors->first('body')); ?></p>
                <?php endif; ?>

                <div class="text-center">
                    <?php echo e(Form::submit('送信', ['class' => 'btn btn-primary'])); ?>

                </div>
            <?php echo Form::close(); ?>

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
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($contact->id); ?></td>
                  <td><?php echo e($contact->name); ?></td>
                  <td><?php echo e($contact->kana); ?></td>
                  <td><?php echo e($contact->tell); ?></td>
                  <td><?php echo e($contact->email); ?></td>
                  <td><?php echo e($contact->body); ?></td>
                  <td><?php echo e($contact->created_at); ?></td>
                  <td><?php echo e($contact->updated_at); ?></td>
                  <td>
                  <td>
                    <a href="<?php echo e(route('edit', ['id'=>$contact->id])); ?>"><button>編集</button></a>
                  </td>
                  <td>
                    
                    <form action="<?php echo e(route('destroy', ['id'=>$contact->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <input type="submit" value="削除"  onclick='return confirm("本当に削除しますか？");'>
                    </form>
                  </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
    </div>
</body>
</html><?php /**PATH /var/www/workspace/SampleProject/resources/views/contacts/contact.blade.php ENDPATH**/ ?>