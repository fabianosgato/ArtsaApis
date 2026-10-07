<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysStore
 * 
 * @property int $store_id
 * @property string $code
 * @property int|null $parent_id
 * @property string $code_order
 * @property string $host
 * @property string $store_name
 * @property string $layout
 * @property string|null $type
 * @property bool|null $is_default
 * 
 * @property Collection|SalesOrder[] $sales_orders
 *
 * @package App\Models
 */
class SysStore extends Model
{
	protected $table = 'sys_store';
	protected $primaryKey = 'store_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'is_default' => 'bool'
	];

	protected $fillable = [
		'code',
		'parent_id',
		'code_order',
		'host',
		'store_name',
		'layout',
		'type',
		'is_default'
	];

	public function sales_orders()
	{
		return $this->hasMany(SalesOrder::class, 'store_id');
	}
}
