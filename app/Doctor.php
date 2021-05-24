<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
class Doctor extends Model
{
    

    protected $table = 'doctors';


    protected $fillable=[
        'user_id','sector_id','location_id',
        'qualification','phone','fees','birth_date',
        'blood_group','sex','is_emergency_support','is_featured',
        'is_active','is_band','about','image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Get all The user which of relationship of user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $date = new DateTime($model->birth_date);
            $model->birth_date = $date->format('Y-m-d');
        });

        static::updating(function($model){
        });
    }
}
