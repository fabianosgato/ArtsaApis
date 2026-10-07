<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportSysLog
 * 
 * @property int $entity_id
 * @property string $system_name
 * @property string|null $module
 * @property string|null $type
 * @property string|null $log
 * @property Carbon $created
 *
 * @package App\Models
 */
class ReportSysLog extends Model
{
	protected $table = 'report_sys_logs';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime'
	];

	protected $fillable = [
		'system_name',
		'module',
		'type',
		'log',
		'created'
	];
}
