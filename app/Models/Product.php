<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
		'description',
		'sku',
		'slug',
        'price',
        'shopId',
        'price',
        'short_description',
		'status',
		'weight',
		'height',
		'depth',
		'status',
		'width',
		'user_id',
		'type'
    ];  
    public const DRAFT = 0;
	public const ACTIVE = 1;
	public const INACTIVE = 2;

    public const STATUSES = [
		self::DRAFT => 'draft',
		self::ACTIVE => 'active',
		self::INACTIVE => 'inactive',
	];
	public const SIMPLE = 'simple';
	public const CONFIGURABLE = 'configurable';
	public const TYPES = [
		self::SIMPLE => 'Simple',
		self::CONFIGURABLE => 'Configurable',
	];

	public static function active(){
		Product::where('status',1)->get();
	}
    
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
   public function productInventory()
	{
		return $this->hasOne('App\Models\ProductInventory');
	}

	/**
	 * Define relationship with the Category
	 *
	 * @return void
	 */
	public function categories()
	{
		return $this->belongsToMany('App\Models\Category', 'product_categories');
	}

	/**
	 * Define relationship with the Variants
	 *
	 * @return void
	 */
	public function variants()
	{
		return $this->hasMany('App\Models\Product', 'id')->orderBy('price', 'ASC');
	}

	/**
	 * Define relationship with the Parent
	 *
	 * @return void
	 */
	public function parent()
	{
		return $this->belongsTo('App\Models\Product', 'id');
	}

	/**
	 * Define relationship with the ProductAttributeValue
	 *
	 * @return void
	 */
	public function productAttributeValues()
	{
		return $this->hasMany('App\Models\ProductAttributeValue', 'parent_product_id');
	}

	/**
	 * Define relationship with the ProductImage
	 *
	 * @return void
	 */
	public function productImages()
	{
		return $this->hasMany('App\Models\ProductImage')->orderBy('id', 'DESC');
	}

	/**
	 * Define relationship with the OrderItem
	 *
	 * @return void
	 */
	public function orderItems()
	{
		return $this->hasMany('App\Models\OrderItem');
	}

	/**
	 * Define relationship with the Shipment
	 *
	 * @return void
	 */
	public static function statuses()
	{
		return self::STATUSES;
	}

	/**
	 * Get status label
	 *
	 * @return string
	 */
	public function statusLabel()
	{
		$statuses = $this->statuses();

		return isset($this->status) ? $statuses[$this->status] : null;
	}

	/**
	 * Get product types
	 *
	 * @return array
	 */
	public static function types()
	{
		return self::TYPES;
	}

	/**
	 * Scope active product
	 *
	 * @param Eloquent $query query builder
	 *
	 * @return Eloquent
	 */
	public function scopeActive($query)
	{
		return $query->where('status', 1)
			->where('id', null);
	}

	/**
	 * Scope popular products
	 *
	 * @param Eloquent $query query builder
	 * @param int      $limit limit
	 *
	 * @return Eloquent
	 */
	public function scopePopular($query, $limit = 10)
	{
		$month = now()->format('m');

		return $query->selectRaw('products.*, COUNT(order_items.id) as total_sold')
			->join('order_items', 'order_items.product_id', '=', 'products.id')
			->join('orders', 'order_items.order_id', '=', 'orders.id')
			->whereRaw(
				'orders.status = :order_satus AND MONTH(orders.order_date) = :month',
				[
					'order_status' => Order::COMPLETED,
					'month' => $month
				]
			)
			->groupBy('products.id')
			->orderByRaw('total_sold DESC')
			->limit($limit);
	}

	/**
	 * Get price label
	 *
	 * @return string
	 */
	public function priceLabel()
	{
		return ($this->variants->count() > 0) ? $this->variants->first()->price : $this->price;
	}

	/**
	 * Is configurable product
	 *
	 * @return boolean
	 */
	public function configurable()
	{
		return $this->type == 'configurable';
	}

	/**
	 * Is simple product
	 *
	 * @return boolean
	 */
	public function simple()
	{
		return $this->type == 'simple';
	}
}
