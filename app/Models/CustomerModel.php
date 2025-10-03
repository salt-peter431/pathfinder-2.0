<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'cust_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'cust_name',
        'cust_tax',
        'cust_type',
        'cust_notes'
    ];
    protected $useTimestamps = false; // We'll manage created/updated manually if needed
    protected $dateFormat = 'datetime';
    protected $createdField = 'cust_created';
    protected $updatedField = 'cust_updated';
}