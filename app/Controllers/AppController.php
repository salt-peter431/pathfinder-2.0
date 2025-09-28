<?php namespace App\Controllers;

class AppController extends BaseController
{
	public function index()
	{
		//index method
	}

	public function show_calendar(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'TUI_Calendar']),
			'page_title' => view('partials/page-title', ['title' => 'TUI_Calendar', 'pagetitle' => 'Calendars'])
		];
		return view('calendar', $data);
	}

	public function show_fullcalendar(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Full_Calendar']),
			'page_title' => view('partials/page-title', ['title' => 'Full_Calendar', 'pagetitle' => 'Calendars'])
		];
		return view('calendar-full', $data);
	}

	public function show_chat(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Chat']),
			'page_title' => view('partials/page-title', ['title' => 'Chat', 'pagetitle' => 'Skote'])
		];
		return view('chat', $data);
	}

	public function show_apps_filemanager(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'File Manager']),
			'page_title' => view('partials/page-title', ['title' => 'File Manager', 'pagetitle' => 'Apps'])
		];
		return view('apps-filemanager', $data);
	}

	public function show_ecommerce_products(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Products']),
			'page_title' => view('partials/page-title', ['title' => 'Products', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-products', $data);
	}

	public function show_ecommerce_product_detail(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Product Detail']),
			'page_title' => view('partials/page-title', ['title' => 'Product Detail', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-product-detail', $data);
	}

	public function show_ecommerce_orders(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Orders']),
			'page_title' => view('partials/page-title', ['title' => 'Orders', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-orders', $data);
	}

	public function show_ecommerce_customers(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Customers']),
			'page_title' => view('partials/page-title', ['title' => 'Customers', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-customers', $data);
	}

	public function show_ecommerce_cart(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Cart']),
			'page_title' => view('partials/page-title', ['title' => 'Cart', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-cart', $data);
	}

	public function show_ecommerce_checkout(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Checkout']),
			'page_title' => view('partials/page-title', ['title' => 'Checkout', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-checkout', $data);
	}

	public function show_ecommerce_shops(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Shops']),
			'page_title' => view('partials/page-title', ['title' => 'Shops', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-shops', $data);
	}

	public function show_ecommerce_add_product(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Add Product']),
			'page_title' => view('partials/page-title', ['title' => 'Add Product', 'pagetitle' => 'Ecommerce'])
		];
		return view('ecommerce-add-product', $data);
	}

	public function show_crypto_wallet(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Wallet']),
			'page_title' => view('partials/page-title', ['title' => 'Wallet', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-wallet', $data);
	}

	public function show_crypto_buy_sell(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Buy/Sell']),
			'page_title' => view('partials/page-title', ['title' => 'Buy/Sell', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-buy-sell', $data);
	}

	public function show_crypto_exchange(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Exchange']),
			'page_title' => view('partials/page-title', ['title' => 'Exchange', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-exchange', $data);
	}

	public function show_crypto_lending(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Lending']),
			'page_title' => view('partials/page-title', ['title' => 'Lending', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-lending', $data);
	}

	public function show_crypto_orders(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Orders']),
			'page_title' => view('partials/page-title', ['title' => 'Orders', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-orders', $data);
	}

	public function show_crypto_kyc_application(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'KYC Application']),
			'page_title' => view('partials/page-title', ['title' => 'KYC Application', 'pagetitle' => 'Crypto'])
		];
		return view('crypto-kyc-application', $data);
	}

	public function show_crypto_ico_landing(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'ICO Landing'])
		];
		return view('crypto-ico-landing', $data);
	}

	public function show_email_inbox(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Inbox']),
			'page_title' => view('partials/page-title', ['title' => 'Inbox', 'pagetitle' => 'Email'])
		];
		return view('email-inbox', $data);
	}

	public function show_email_read(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Read Email']),
			'page_title' => view('partials/page-title', ['title' => 'Read Email', 'pagetitle' => 'Email'])
		];
		return view('email-read', $data);
	}

	public function show_email_template_basic(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Basic Action Email Template']),
			'page_title' => view('partials/page-title', ['title' => 'Basic Action', 'pagetitle' => 'Email Template'])
		];
		return view('email-template-basic', $data);
	}

	public function show_email_template_alert(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Alert Email Template']),
			'page_title' => view('partials/page-title', ['title' => 'Alert Email', 'pagetitle' => 'Email Template'])
		];
		return view('email-template-alert', $data);
	}

	public function show_email_template_billing(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Billing Email Template']),
			'page_title' => view('partials/page-title', ['title' => 'Billing Email', 'pagetitle' => 'Email Template'])
		];
		return view('email-template-billing', $data);
	}

	public function show_invoices_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Invoice List']),
			'page_title' => view('partials/page-title', ['title' => 'Invoice List', 'pagetitle' => 'Invoices'])
		];
		return view('invoices-list', $data);
	}

	public function show_invoices_detail(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Invoice Detail']),
			'page_title' => view('partials/page-title', ['title' => 'Invoice Detail', 'pagetitle' => 'Invoices'])
		];
		return view('invoices-detail', $data);
	}

	public function show_projects_grid(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Projects Grid']),
			'page_title' => view('partials/page-title', ['title' => 'Projects Grid', 'pagetitle' => 'Projects'])
		];
		return view('projects-grid', $data);
	}

	public function show_projects_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Projects List']),
			'page_title' => view('partials/page-title', ['title' => 'Projects List', 'pagetitle' => 'Projects'])
		];
		return view('projects-list', $data);
	}

	public function show_projects_overview(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Projects Overview']),
			'page_title' => view('partials/page-title', ['title' => 'Projects Overview', 'pagetitle' => 'Projects'])
		];
		return view('projects-overview', $data);
	}

	public function show_projects_create(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Create New Project']),
			'page_title' => view('partials/page-title', ['title' => 'Create New', 'pagetitle' => 'Projects'])
		];
		return view('projects-create', $data);
	}

	public function show_tasks_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Task List']),
			'page_title' => view('partials/page-title', ['title' => 'Task List', 'pagetitle' => 'Tasks'])
		];
		return view('tasks-list', $data);
	}

	public function show_tasks_kanban(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Kanban Board']),
			'page_title' => view('partials/page-title', ['title' => 'Kanban Board', 'pagetitle' => 'Tasks'])
		];
		return view('tasks-kanban', $data);
	}

	public function show_tasks_create(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Create Task']),
			'page_title' => view('partials/page-title', ['title' => 'Create Task', 'pagetitle' => 'Tasks'])
		];
		return view('tasks-create', $data);
	}

	public function show_contacts_grid(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Contact User Grid']),
			'page_title' => view('partials/page-title', ['title' => 'Users Grid', 'pagetitle' => 'Contacts'])
		];
		return view('contacts-grid', $data);
	}

	public function show_contacts_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Contact User List']),
			'page_title' => view('partials/page-title', ['title' => 'Users List', 'pagetitle' => 'Contacts'])
		];
		return view('contacts-list', $data);
	}

	public function show_contacts_profile(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Profile', 'pagetitle' => 'Contacts'])
		];
		return view('contacts-profile', $data);
	}

	public function show_blog_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Blog List']),
			'page_title' => view('partials/page-title', ['title' => 'Blog List', 'pagetitle' => 'Blog'])
		];
		return view('blog-list', $data);
	}

	public function show_blog_grid(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Blog Grid']),
			'page_title' => view('partials/page-title', ['title' => 'Blog Grid', 'pagetitle' => 'Blog'])
		];
		return view('blog-grid', $data);
	}

	public function show_blog_details(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Blog Details']),
			'page_title' => view('partials/page-title', ['title' => 'Blog Details', 'pagetitle' => 'Blog'])
		];
		return view('blog-details', $data);
	}

	public function show_job_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Job List']),
			'page_title' => view('partials/page-title', ['title' => 'Job List', 'pagetitle' => 'Job List'])
		];
		return view('job-list', $data);
	}
	public function show_job_grid(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Job Grid']),
			'page_title' => view('partials/page-title', ['title' => 'Job Grid', 'pagetitle' => 'Job Grid'])
		];
		return view('job-grid', $data);
	}
	public function show_job_apply(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Apply Job']),
			'page_title' => view('partials/page-title', ['title' => 'Apply Job', 'pagetitle' => 'Apply Job'])
		];
		return view('job-apply', $data);
	}
	public function show_job_details(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Job Details']),
			'page_title' => view('partials/page-title', ['title' => 'Job Details', 'pagetitle' => 'Job Details'])
		];
		return view('job-details', $data);
	}
	public function show_job_categories(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Job Categories']),
			'page_title' => view('partials/page-title', ['title' => 'Job Categories', 'pagetitle' => 'Job Categories'])
		];
		return view('job-categories', $data);
	}
	public function show_candidate_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'List']),
			'page_title' => view('partials/page-title', ['title' => 'List', 'pagetitle' => 'List'])
		];
		return view('candidate-list', $data);
	}
	public function show_candidate_overview(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Overview']),
			'page_title' => view('partials/page-title', ['title' => 'Overview', 'pagetitle' => 'Overview'])
		];
		return view('candidate-overview', $data);
	}


	//--------------------------------------------------------------------

}
