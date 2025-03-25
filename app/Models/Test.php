<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Test extends Model
{
    protected $fillable = [
        "title",
        "user_id",
    ];

//    protected $guarded = [
//        "id",
//        "created_at",
//        "updated_at",
//    ];

//    protected $table = "not_found";
//    protected $primaryKey = "st_id";
//    protected $keyType = 'string';

    public $timestamps = false;
    public $incrementing = true;

//    protected $dispatchesEvents = [
//        "created" =>
//    ]

//    protected $casts = [
//        "user_id" => "integer",
//        "active" => "boolean",
//    ];

//    protected $with = ['user'];

    protected function casts(): array
    {
        return [
            "user_id" => "integer",
            "active" => "boolean",
        ];
    }

    protected function getFullNameAttribute(): string
    {
        return "{$this->surname} {$this->name} {$this->patronymic}";
    }

    protected function getShortNameAttribute(): string
    {
        $name = Str::substr($this->name, 0, 1);
        $patronymic = Str::substr($this->patronymic, 0, 1);
        return "{$this->surname} {$name}. {$patronymic}.";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
