<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentsMethod
 * 
 * @property int $payment_id
 * @property string $payment_name
 * @property string $payment_key
 * @property string $payment_secret
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class PaymentsMethod extends Model
{
	protected $table = 'payments_methods';
	protected $primaryKey = 'payment_id';

	protected $hidden = [
		'payment_secret'
	];

	protected $fillable = [
		'payment_name',
		'payment_key',
		'payment_secret'
	];
}
