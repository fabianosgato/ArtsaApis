<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerEntity
 * 
 * @property int $customer_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string|null $vat_number
 * @property string|null $date_of_birth
 * @property string|null $customer_passwd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|CustomerAddressEntity[] $customer_address_entities
 * @property Collection|SalesOrderAddress[] $sales_order_addresses
 * @property Collection|SalesOrderCustomer[] $sales_order_customers
 * @property Collection|SalesOrderQuoteCustomer[] $sales_order_quote_customers
 *
 * @package App\Models
 */
class CustomerEntity extends Model
{
	protected $table = 'customer_entity';
	protected $primaryKey = 'customer_id';

	protected $fillable = [
		'customer_name',
		'customer_email',
		'vat_number',
		'date_of_birth',
		'customer_passwd'
	];

	public function customer_address_entities()
	{
		return $this->hasMany(CustomerAddressEntity::class, 'customer_id');
	}

	public function sales_order_addresses()
	{
		return $this->hasMany(SalesOrderAddress::class, 'customer_id');
	}

	public function sales_order_customers()
	{
		return $this->hasMany(SalesOrderCustomer::class, 'customer_id');
	}

	public function sales_order_quote_customers()
	{
		return $this->hasMany(SalesOrderQuoteCustomer::class, 'customer_id');
	}
}
