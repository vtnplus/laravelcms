<?php
namespace Modules\Invoices\Models;
use Remios\Utils\Database\DBQuery;
class Invoices extends DBQuery{
	protected $table = 'invoices';
	public $timestamps = false;
	
	
}