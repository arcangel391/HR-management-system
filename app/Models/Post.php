<?php

namespace App\Models;
use App\Traits\HasCan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasCan;
    protected $fillable = [
        'title',
        'content',
        
    ];

    protected $guards = [];

       /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
      
        'can',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value){
        return now()->parse($value)->format('d F Y, H:i:s');
    }
    public function getUpdatedAtAttribute($value){
        return now()->parse($value)->diffForHumans();
    }
}
