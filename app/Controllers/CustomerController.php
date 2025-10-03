<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $data = [
            'customers' => $model->findAll(),
            'title' => 'Customers', // Passed for page title
            'theme_mode' => session('theme_mode') ?? 'dark' // Corrected session access
        ];

        // NEW: Build breadcrumbs here (matching SettingsController pattern)
        $currentRoute = 'customers';  // Hardcoded for this page
        $breadcrumbs = $this->getHomeBreadcrumb($currentRoute);
        $breadcrumbs[] = ['name' => 'Customers', 'url' => null];  // Active last item
        $data['breadcrumbs'] = $breadcrumbs;  // Add to $data for passing to view

        // NEW: Merge global data (e.g., theme_mode from BaseController) into local $data
        $data = array_merge($this->data, $data);

        return view('customers/index', $data);
    }
}