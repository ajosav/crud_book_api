<?php

namespace App\Models;

use App\Filters\Book\Order;
use App\Filters\Book\Title;
use App\Filters\Book\CreatedAt;
use App\Filters\Book\CreatedBy;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'author',
        'description',
        'bookable_id',
        'bookable_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }


    public function format() {
        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'creation_date' => $this->created_at->format('Y-m-d H:i:s'),
            'created_by' => $this->user->email
        ];
    }

    public static function getFilteredBooks() {
        return app(Pipeline::class)
                ->send(self::query())
                ->through([
                    CreatedAt::class,
                    Order::class,
                    CreatedBy::class,
                    Order::class,
                    Title::class
                ])
                ->thenReturn()
                ->get();
    }
}
