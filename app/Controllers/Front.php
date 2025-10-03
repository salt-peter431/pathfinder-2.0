<?php namespace App\Controllers;

class Front extends BaseController
{	
	public function index()
{
    // Local data
    $title = '| Pathfinder 2.0';  // For <head> meta
    $page_title = 'Dashboard';  // For page header/breadcrumb

    // Pre-render title-meta partial (matches AuthController pattern)
    $title_meta = view('partials/title-meta', ['title' => $title]);

    $data = [
        'title_meta' => $title_meta,
        'title' => $title,  // If view needs raw $title
        'page_title' => $page_title  // NEW: For page-title partial
        // Add any other local data from your original index()
    ];

    // Merge global data (e.g., theme_mode from BaseController) into local $data
    $data = array_merge($this->data, $data);

    // Return the view with merged data
    return view('Front/index', $data);
}

	public function show_dashboard_saas()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Saas Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Saas', 'pagetitle' => 'Dashboards'])
		];
		return view('Front/dashboard-saas', $data);
	}

	public function show_dashboard_crypto()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Crypto Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Crypto', 'pagetitle' => 'Dashboards'])
		];
		return view('Front/dashboard-crypto', $data);
	}

	public function show_dashboard_blog()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Blog Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Blog', 'pagetitle' => 'Dashboards'])
		];
		return view('Front/dashboard-blog', $data);
	}
	public function show_dashboard_job()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Job Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Job', 'pagetitle' => 'Dashboards'])
		];
		return view('Front/dashboard-job', $data);
	}


	public function show_layouts_horizontal()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Layout']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Layout', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-horizontal', $data);
	}

	public function show_layouts_vertical()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Vertical Layout']),
			'page_title' => view('partials/page-title', ['title' => 'Vertical Layout', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-vertical', $data);
	}

	public function show_layouts_light_sidebar()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Light Sidebar']),
			'page_title' => view('partials/page-title', ['title' => 'Light Sidebar', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-light-sidebar', $data);
	}

	public function show_layouts_compact_sidebar()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Compact Sidebar']),
			'page_title' => view('partials/page-title', ['title' => 'Compact Sidebar', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-compact-sidebar', $data);
	}

	public function show_layouts_icon_sidebar()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Icon Sidebar']),
			'page_title' => view('partials/page-title', ['title' => 'Icon Sidebar', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-icon-sidebar', $data);
	}

	public function show_layouts_boxed()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Boxed Width']),
			'page_title' => view('partials/page-title', ['title' => 'Boxed Width', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-boxed', $data);
	}

	public function show_layouts_preloader()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Preloader Layout']),
			'page_title' => view('partials/page-title', ['title' => 'Preloader', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-preloader', $data);
	}

	public function show_layouts_colored_sidebar()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Colored Sidebar']),
			'page_title' => view('partials/page-title', ['title' => 'Colored Sidebar', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-colored-sidebar', $data);
	}

	public function show_layouts_scrollable()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Scrollable']),
			'page_title' => view('partials/page-title', ['title' => 'Scrollable', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-scrollable', $data);
	}
	
	public function show_layouts_hori_topbar_light()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Topbar Light']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Topbar Light', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-hori-topbar-light', $data);
	}

	public function show_layouts_hori_boxed_width()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Boxed Width']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Boxed Width', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-hori-boxed-width', $data);
	}

	public function show_layouts_hori_preloader()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Preloader Layout']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Preloader Layout', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-hori-preloader', $data);
	}

	public function show_layouts_hori_colored_header()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Topbar Colored']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Topbar Colored', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-hori-colored-header', $data);
	}

	public function show_layouts_hori_scrollable()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal Scrollable Layout']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal Scrollable Layout', 'pagetitle' => 'Layouts'])
		];
		return view('Front/layouts-hori-scrollable', $data);
	}

	//--------------------------------------------------------------------

}
