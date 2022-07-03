<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['first_name', 'last_name', 'email', 'date_of_birth'];

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    protected $appends = [
        'date_of_birth_form',
        'date_of_birth_long'
    ];

    /**
     * Related phone numbers
     *
     * @return HasMany
     */
    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(PhoneNumber::class);
    }

    /**
     * Related addresses
     *
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return mixed
     */
    public function getDateOfBirthFormAttribute(): mixed
    {
        if(!empty($this->date_of_birth)) {
            return $this->date_of_birth->format('Y-m-d');
        } else {
            return '';
        }
    }

    public function getDateOfBirthLongAttribute()
    {
        if(!empty($this->date_of_birth)) {
            return $this->date_of_birth->format('jS M, Y');
        } else {
            return '';
        }
    }
}
