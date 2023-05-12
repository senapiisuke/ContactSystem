<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Contacts extends Model
{
     // Primary Key
     public $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;

     protected $fillable = [
         'name',
         'kana',
         'tell',
         'email',
         'body',
     ];

     public function getList() {
        // contactsテーブルからデータを取得
        $contacts = DB::table('contacts')->get();

        return $contacts;
     }


    //IDから一件のデータを取得する
    public function selectDataFindById($id)
    {
        // 「SELECT id, name, email WHERE id = ?」を発行する
        $query = $this->select([
            'name',
            'kana',
            'tell',
            'email',
            'body'
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }

    //IDで指定したユーザを更新する
    public function updateDataFindById($contact)
    {
        return $this->where([
            'id' => $contact['id']
        ])->update([
            'name' => $contact['name'],
            'kana' => $contact['kana'],
            'tell' => $contact['tell'],
            'email' => $contact['email'],
            'body' => $contact['body'],
        ]);
    }



}