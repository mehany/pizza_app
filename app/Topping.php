<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table = 'toppings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    // Listener __belongs_to_many__ Album
    public function pizzas()
    {
        return $this->belongsToMany('App\Pizza');
    }

}
