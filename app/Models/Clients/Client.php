<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable. // вага, зріст, ціль, обї'єм
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone_number',
        'email',
        'sex',
        'birth_date',
        'weight',
        'height',
        // 'size',
        'info',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    protected $dates = [
        'birth_date',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "$this->last_name $this->first_name $this->middle_name"
        );
    }
}
