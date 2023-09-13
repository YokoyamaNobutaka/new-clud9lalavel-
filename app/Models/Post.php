<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*use Illuminate\Database\Eloquent\SoftDeletes;とuse SoftDeletes;入力後
　発行されるSQLがUPDATE文になり、deleted_atに実行日時が設定される。
　論理削除が有効になっているモデルでは、deleted_atに値が設定されると以降は削除扱いとなり、検索等で引っかからないようになる。*/
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    /*use Illuminate\Database\Eloquent\SoftDeletes;とuse SoftDeletes;入力後
　　　発行されるSQLがUPDATE文になり、deleted_atに実行日時が設定される。
　　　論理削除が有効になっているモデルでは、deleted_atに値が設定されると以降は削除扱いとなり、検索等で引っかからないようになる。*/
    
    protected $fillable = [
    'title',
    'body',
    ];
    
    /*大量データになった場合の取得したデータの最大数を指定する*/
    public function getPaginateByLimit(int $limit_count = 5)
    {               
        /*limit($limit_count)で指定した数を取得する*/
        /*orderBy('updated_at'アップデート順, 'DESC'降順)で指定した数を取得する*/
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);

    }
}

?>