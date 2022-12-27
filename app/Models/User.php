<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sale;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

	protected $table = 'users';

	protected $fillable = [
		'number_id',
		'name',
		'last_name',
		'email',
		'password',
	];

	protected $appends = ['full_name'];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'updated_at' => 'datetime:Y-m-d',
	];

	// --- Accessors ---
	public function getFullNameAttribute()
	{
		return "{$this->name} {$this->last_name}";
	}

	// --- Mutators ---
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	// --- Relation models ---
	public function CustomerSales()
	{
		return $this->hasMany(Sale::class, 'customer_user_id', 'id');
	}
}
