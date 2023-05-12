<?php //CREATEのコントローラー

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contacts;



class FormController extends Controller
{

    public function showContact() //入力画面(contact.blade.php)を表示
    {
        // インスタンス生成
        $model = new Contacts();
        $contacts = $model->getList();

        return view('contacts.contact', ['contacts' => $contacts]);
    }

    public function showConfirmForm(Request $request) //確認画面(confirm.blade.php)を表示
    {
        DB::beginTransaction();

        //バリデーション
        $request->validate([
            'name' => 'required | max:10',
            'kana' => 'required | max:10',
            'tell' => 'nullable | numeric',
            'email' => 'required | email',
            'body' => 'required',
        ]);

        // フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        return view('contacts.confirm', ['inputs' => $inputs]);
    }

    public function exeStore(Request $request){

        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if($action === 'submit') {

            // DBにデータを保存
            $contact = new Contacts();
            $contact->fill($input);
            $contact->save();

            return redirect()->route('complete');
            } else {
            return redirect()->route('contact')->withInput($input);
            }
    }

    public function showComplete()//完了画面(complete.blade.php)を表示
    {
        return view('contacts.complete');
    }

    //DB編集
    public function editData($id)
    {
        $post = Contacts::find($id);

        return view('contacts.edit')->with('post', $post);
    }

    //DB更新
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:10',
            'kana' => 'required | max:10',
            'tell' => 'nullable | numeric',
            'email' => 'required | email',
            'body' => 'required',
        ]);

        $post = Contacts::find($id);

        $post->name= $request->input('name');
        $post->kana = $request->input('kana');
        $post->tell = $request->input('tell');
        $post->email = $request->input('email');
        $post->body = $request->input('body');
        $post->save();

        return redirect(route('contact'))->with('success', '登録内容を更新しました');
    }

    //DB削除
    public function deleteData($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect(route('contact'))->with('success', '登録内容を削除しました');
    }



}