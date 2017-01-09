<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    protected $table = 'pizzas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    /**
     * The toppings that belong to the pizza.
     */
    public function toppings()
    {
        return $this->belongsToMany('App\Topping');
    }



}
