<?php

namespace App\Http\Controllers;

use App\Models\Post;
/*use宣言は外部にあるクラスを
PostController内にインポートできる。*/

/*この場合、App\Models内データベースに
のPostクラスをインポートしている。*/
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    //インポートしたPostをインスタンス化して$postとして使用。
    {
        //dd($post);
        //var_dump($post);
       // exit();
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
        //return view('posts.index')でview のposts.indexを返す。
        
        /*with(['posts' => $post->get()])は
        ViewにController内で取得した変数を渡している
        blade内で使う変数'posts'と設定。青いpostsは外部で使う設定
        'posts'の中身にgetを使い、インスタンス化した$postを代入。
        ＝＞に騙されないで
        ['posts'青postsがviewで使う変数名 => $post->get()黄色postsがmodelでとっきたもの]*/
    }
     public function show(post $post)
    {
        return view('posts.show')->with(['post'=> $post]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        /*viwのcreate.blade.phpのpost[~]のみ取得して格納*/
        $post->fill($input)->save();
         /*フレームワーク内部でMySQLへのINSERT文が実行され、DBへデータが追加されます。*/
        return redirect('/posts/' . $post->id);
        /*今回保存したpostのIDを含んだURLにリダイレクト*/
    }
     public function edit(post $post)
    {
        return view('posts.edit')->with(['post'=> $post]);
    }
    public function update(PostRequest $request, Post $post)
       /*PostRequestを変数$requestPost postモデルを変数$post */
    {
        $input_post = $request['post'];
        /*viwのcreate.blade.phpのpost[~]のみ取得して格納*/
        $post->fill($input_post)->save();
       /*フレームワーク内部でMySQLへのINSERT文が実行され、DBへデータが追加されます。fill save で差分があった場合は保存*/
        return redirect('/posts/' . $post->id);
        /*今回保存したpostのIDを含んだURLにリダイレクト*/
    }
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
}
?>