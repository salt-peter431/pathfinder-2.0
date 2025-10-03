<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel; // Assume you'll create this model in Step 3

class CustomersController extends BaseController
{
    public function index()
    {
        // Auth check (optional, per theme guide)
        if (!session()->get('user_id')) {
            return redirect()->to('/auth-login');
        }

        // Fetch data (placeholder; replace with real query in Step 3)
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll(); // Or whatever query you need

        // Set page title
        $data['title'] = 'Customers';

        // Prepare breadcrumbs (per breadcrumb guide)
        $currentRoute = 'customers'; // Or detect dynamically: $this->request->uri->getSegment(1);
        $breadcrumbs = $this->getHomeBreadcrumb($currentRoute);
        $breadcrumbs[] = ['name' => 'Customers', 'url' => site_url('customers')]; // 2nd level
        $data['breadcrumbs'] = $breadcrumbs;

        // Merge with global data (required for theme_mode)
        $data = array_merge($this->data, $data);

        return view('customers/customers', $data);
    }
}