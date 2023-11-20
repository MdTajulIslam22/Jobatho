<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    use HasFactory;

    #i don't need this because i have used "unguard" model in appServiceProvider
    //protected $fillable = ['title', 'company', 'location', 'website', 'email','tags', 'description'];


    protected $table = 'jobatho_listings';

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };
        if ($filters['search'] ?? false) {
            $query->where('tags', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        };
    }


    //relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
