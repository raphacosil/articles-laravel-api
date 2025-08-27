<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $primaryKey = 'article_id';

    protected $fillable = [
        'sender_id',
        'title',
        'content',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function sender()
    {
        return $this->belongsTo(Customer::class, 'sender_id', 'customer_id');
    }

    public function key_words()
    {
        return $this->hasMany(KeyWord::class, 'sender_id', 'customer_id');
    }
}
