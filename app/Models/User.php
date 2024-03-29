<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Image;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'adminID',
        'password',
        'admin_location',
        'super_admin',
    ];
    protected $casts = [
        'super_admin' => 'boolean', // Cast to boolean if it's stored as boolean in the database
    ];  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    public function branchAdminDisplay() {
        if ($this->super_admin) {
            // If the user is a super admin, return all images
            return Image::query();
        } else {
            // If the user is not a super admin, return images based on the admin location
            return $this->hasMany(Image::class, 'location', 'admin_location');
        }  
    }

}
