<?php
namespace Modules\Invoices\Models;
use Remios\Utils\Database\DBQuery;
class Invoices_items extends DBQuery{
	protected $table = 'invoices_items';
	public $timestamps = false;
	
	
}