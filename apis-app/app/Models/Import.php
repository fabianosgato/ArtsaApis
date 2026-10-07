<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Import
 * 
 * @property int $id
 * @property int $user_user_id
 * @property Carbon|null $completed_at
 * @property string $file_name
 * @property string $file_path
 * @property string $importer
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property SysUser $sys_user
 *
 * @package App\Models
 */
class Import extends Model
{
	protected $table = 'imports';

	protected $casts = [
		'user_user_id' => 'int',
		'completed_at' => 'datetime',
		'processed_rows' => 'int',
		'total_rows' => 'int',
		'successful_rows' => 'int'
	];

	protected $fillable = [
		'user_user_id',
		'completed_at',
		'file_name',
		'file_path',
		'importer',
		'processed_rows',
		'total_rows',
		'successful_rows'
	];

	public function sys_user()
	{
		return $this->belongsTo(SysUser::class, 'user_user_id');
	}
}
