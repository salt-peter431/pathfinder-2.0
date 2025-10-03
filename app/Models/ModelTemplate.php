<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'cust_id';
    protected $allowedFields = ['cust_name', 'cust_tax', 'cust_type', 'cust_notes']; // Add more as needed
}