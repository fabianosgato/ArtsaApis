<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportOrder
 * 
 * @property int $report_order_id
 * @property int $order_id
 * @property string $order_status
 * @property string $description
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class ReportOrder extends Model
{
	protected $table = 'report_orders';
	protected $primaryKey = 'report_order_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'order_status',
		'description'
	];
}
