<?php namespace App\Controllers;

class ComponentController extends BaseController
{
	public function index()
	{
		//index method
	}

	public function show_ui_alerts(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Alerts']),
			'page_title' => view('partials/page-title', ['title' => 'Alerts', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-alerts', $data);
	}

	public function show_ui_buttons(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Buttons']),
			'page_title' => view('partials/page-title', ['title' => 'Buttons', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-buttons', $data);
	}

	public function show_ui_cards(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Cards']),
			'page_title' => view('partials/page-title', ['title' => 'Cards', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-cards', $data);
	}

	public function show_ui_carousel(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Carousel']),
			'page_title' => view('partials/page-title', ['title' => 'Carousel', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-carousel', $data);
	}

	public function show_ui_dropdowns(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dropdowns']),
			'page_title' => view('partials/page-title', ['title' => 'Dropdowns', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-dropdowns', $data);
	}

	public function show_ui_grid(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Grid']),
			'page_title' => view('partials/page-title', ['title' => 'Grid', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-grid', $data);
	}

	public function show_ui_images(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Images']),
			'page_title' => view('partials/page-title', ['title' => 'Images', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-images', $data);
	}

	public function show_ui_lightbox(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Lightbox']),
			'page_title' => view('partials/page-title', ['title' => 'Lightbox', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-lightbox', $data);
	}

	public function show_ui_modals(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Modals']),
			'page_title' => view('partials/page-title', ['title' => 'Modals', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-modals', $data);
	}

	public function show_ui_offcanvas(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Offcanvas']),
			'page_title' => view('partials/page-title', ['title' => 'Offcanvas', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-offcanvas', $data);
	}

	public function show_ui_rangeslider(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Range Slider']),
			'page_title' => view('partials/page-title', ['title' => 'Range Sliders', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-rangeslider', $data);
	}

	public function show_ui_session_timeout(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Session Timeout']),
			'page_title' => view('partials/page-title', ['title' => 'Session Timeout', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-session-timeout', $data);
	}

	public function show_ui_progressbars(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Progress Bar']),
			'page_title' => view('partials/page-title', ['title' => 'Progress Bars', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-progressbars', $data);
	}

	public function show_ui_placeholders(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Placeholders']),
			'page_title' => view('partials/page-title', ['title' => 'Placeholders', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-placeholders', $data);
	}

	public function show_ui_toasts(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Toasts']),
			'page_title' => view('partials/page-title', ['title' => 'Toasts', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-toasts', $data);
	}

	public function show_ui_sweet_alert(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'SweetAlert 2']),
			'page_title' => view('partials/page-title', ['title' => 'SweetAlert 2', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-sweet-alert', $data);
	}

	public function show_ui_tabs_accordions(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Tabs & Accordions']),
			'page_title' => view('partials/page-title', ['title' => 'Tabs & Accordions', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-tabs-accordions', $data);
	}

	public function show_ui_typography(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Typography']),
			'page_title' => view('partials/page-title', ['title' => 'Typography', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-typography', $data);
	}

	public function show_ui_video(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Video']),
			'page_title' => view('partials/page-title', ['title' => 'Video', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-video', $data);
	}

	public function show_ui_general(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'General UI']),
			'page_title' => view('partials/page-title', ['title' => 'General', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-general', $data);
	}

	public function show_ui_colors(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Colors']),
			'page_title' => view('partials/page-title', ['title' => 'Colors', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-colors', $data);
	}

	public function show_ui_rating(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Rating']),
			'page_title' => view('partials/page-title', ['title' => 'Rating', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-rating', $data);
	}

	public function show_ui_notifications(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Notifications']),
			'page_title' => view('partials/page-title', ['title' => 'Notifications', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-notifications', $data);
	}

	public function show_ui_utilities(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Utilities']),
			'page_title' => view('partials/page-title', ['title' => 'Utilities', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-utilities', $data);
	}

	public function show_ui_image_cropper(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Image Cropper']),
			'page_title' => view('partials/page-title', ['title' => 'Image Cropper', 'pagetitle' => 'UI Elements'])
		];
		return view('ui-image-cropper', $data);
	}

	public function show_form_elements(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Elements']),
			'page_title' => view('partials/page-title', ['title' => 'Form Elements', 'pagetitle' => 'Forms'])
		];
		return view('form-elements', $data);
	}

	public function show_form_layouts(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Layouts']),
			'page_title' => view('partials/page-title', ['title' => 'Form Layouts', 'pagetitle' => 'Forms'])
		];
		return view('form-layouts', $data);
	}

	public function show_form_validation(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Validation']),
			'page_title' => view('partials/page-title', ['title' => 'Form Validation', 'pagetitle' => 'Forms'])
		];
		return view('form-validation', $data);
	}

	public function show_form_advanced(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Advanced']),
			'page_title' => view('partials/page-title', ['title' => 'Form Advanced', 'pagetitle' => 'Forms'])
		];
		return view('form-advanced', $data);
	}

	public function show_form_editors(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Editors']),
			'page_title' => view('partials/page-title', ['title' => 'Form Editors', 'pagetitle' => 'Forms'])
		];
		return view('form-editors', $data);
	}

	public function show_form_uploads(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form File Upload']),
			'page_title' => view('partials/page-title', ['title' => 'Form File Upload', 'pagetitle' => 'Forms'])
		];
		return view('form-uploads', $data);
	}

	public function show_form_xeditable(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Xeditable']),
			'page_title' => view('partials/page-title', ['title' => 'Form Xeditable', 'pagetitle' => 'Forms'])
		];
		return view('form-xeditable', $data);
	}
	
	public function show_form_repeater(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Repeater']),
			'page_title' => view('partials/page-title', ['title' => 'Form Repeater', 'pagetitle' => 'Forms'])
		];
		return view('form-repeater', $data);
	}

	public function show_form_wizard(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Wizard']),
			'page_title' => view('partials/page-title', ['title' => 'Form Wizard', 'pagetitle' => 'Forms'])
		];
		return view('form-wizard', $data);
	}

	public function show_form_mask(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Form Mask']),
			'page_title' => view('partials/page-title', ['title' => 'Form Mask', 'pagetitle' => 'Forms'])
		];
		return view('form-mask', $data);
	}

	public function show_tables_basic(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Basic Table']),
			'page_title' => view('partials/page-title', ['title' => 'Basic Tables', 'pagetitle' => 'Tables'])
		];
		return view('tables-basic', $data);
	}

	public function show_tables_datatable(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Data Table']),
			'page_title' => view('partials/page-title', ['title' => 'Data Tables', 'pagetitle' => 'Tables'])
		];
		return view('tables-datatable', $data);
	}

	public function show_tables_responsive(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Responsive Table']),
			'page_title' => view('partials/page-title', ['title' => 'Responsive Tables', 'pagetitle' => 'Tables'])
		];
		return view('tables-responsive', $data);
	}

	public function show_tables_editable(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Editable Table']),
			'page_title' => view('partials/page-title', ['title' => 'Editable Tables', 'pagetitle' => 'Tables'])
		];
		return view('tables-editable', $data);
	}

	public function show_charts_apex(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Apex Chart']),
			'page_title' => view('partials/page-title', ['title' => 'Apex Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-apex', $data);
	}

	public function show_charts_echart(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'EChart']),
			'page_title' => view('partials/page-title', ['title' => 'ECharts', 'pagetitle' => 'Charts'])
		];
		return view('charts-echart', $data);
	}

	public function show_charts_chartjs(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Chartjs']),
			'page_title' => view('partials/page-title', ['title' => 'Chartjs Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-chartjs', $data);
	}

	public function show_charts_flot(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Flot Chart']),
			'page_title' => view('partials/page-title', ['title' => 'Flot Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-flot', $data);
	}

	public function show_charts_knob(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Jquery Knob Chart']),
			'page_title' => view('partials/page-title', ['title' => 'Jquery Knob Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-knob', $data);
	}

	public function show_charts_sparkline(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Sparkline Chart']),
			'page_title' => view('partials/page-title', ['title' => 'Sparkline Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-sparkline', $data);
	}

	public function show_charts_tui(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Toast UI Chart']),
			'page_title' => view('partials/page-title', ['title' => 'Toast UI Charts', 'pagetitle' => 'Charts'])
		];
		return view('charts-tui', $data);
	}

	public function show_icons_boxicons(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Boxicons']),
			'page_title' => view('partials/page-title', ['title' => 'Boxicons', 'pagetitle' => 'Icons'])
		];
		return view('icons-boxicons', $data);
	}

	public function show_icons_materialdesign(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Material Design']),
			'page_title' => view('partials/page-title', ['title' => 'MDI', 'pagetitle' => 'Icons'])
		];
		return view('icons-materialdesign', $data);
	}

	public function show_icons_dripicons(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dripicons']),
			'page_title' => view('partials/page-title', ['title' => 'Dripicons', 'pagetitle' => 'Icons'])
		];
		return view('icons-dripicons', $data);
	}

	public function show_icons_fontawesome(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Font Awesome']),
			'page_title' => view('partials/page-title', ['title' => 'Font Awesome', 'pagetitle' => 'Icons'])
		];
		return view('icons-fontawesome', $data);
	}

	public function show_maps_google(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Google Maps']),
			'page_title' => view('partials/page-title', ['title' => 'Google Maps', 'pagetitle' => 'Maps'])
		];
		return view('maps-google', $data);
	}

	public function show_maps_vector(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Vector Maps']),
			'page_title' => view('partials/page-title', ['title' => 'Vector Maps', 'pagetitle' => 'Maps'])
		];
		return view('maps-vector', $data);
	}

	public function show_maps_leaflet(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Leaflet']),
			'page_title' => view('partials/page-title', ['title' => 'Leaflet', 'pagetitle' => 'Maps'])
		];
		return view('maps-leaflet', $data);
	}

	//--------------------------------------------------------------------

}
