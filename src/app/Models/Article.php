<?php

namespace App\Models;

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
}
