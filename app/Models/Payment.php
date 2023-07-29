<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTypeOptionAttribute()
    {
        $lists = [
            1 => ['name' => 'クレジットカード', 'icon' => 'fa-2x fa-solid fa-credit-card'],
            2 => ['name' => '現金払い', 'icon' => 'fa-2x fa-solid fa-coins'],
            3 => ['name' => '銀行振込', 'icon' => 'fa-2x fa-solid fa-building-columns'],
            4 => ['name' => '電子マネー', 'icon' => 'fa-2x fa-solid fa-mobile-screen-button'],
            5 => ['name' => 'その他', 'icon' => 'fa-2x fa-solid fa-circle-question'],
        ];

        return $lists[$this->type];
    }

    public function getCategoryNameAttribute()
    {
        return Category::find($this->category_id)->name;
    }
}
