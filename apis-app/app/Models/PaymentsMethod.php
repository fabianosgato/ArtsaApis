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
 * @property int $payment_method_id
 * @property string $payment_name
 * @property string $payment_account_id
 * @property string $payment_key
 * @property string $payment_secret
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class PaymentsMethod extends Model
{
	protected $table = 'payments_methods';
	protected $primaryKey = 'payment_method_id';

	protected $casts = [
		'status' => 'bool'
	];

	protected $hidden = [
		'payment_secret'
	];

	protected $fillable = [
		'payment_name',
		'payment_account_id',
		'payment_key',
		'payment_secret',
		'status'
	];
}
