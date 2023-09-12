<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
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