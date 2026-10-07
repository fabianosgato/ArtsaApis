<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MeliAuthToken
 * 
 * @property int $token_id
 * @property string $user_identifier
 * @property string $access_token
 * @property string $refresh_token
 * @property Carbon $expires_at
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class MeliAuthToken extends Model
{
	protected $table = 'meli_auth_tokens';
	protected $primaryKey = 'token_id';
	public $timestamps = false;

	protected $casts = [
		'expires_at' => 'datetime'
	];

	protected $hidden = [
		'access_token',
		'refresh_token'
	];

	protected $fillable = [
		'user_identifier',
		'access_token',
		'refresh_token',
		'expires_at'
	];
}
