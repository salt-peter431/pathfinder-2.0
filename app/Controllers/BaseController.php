<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    // NEW: Declare view data array for global vars like theme_mode
    protected $data = [];

    // NEW: Declare model properties for theme loading
    protected $userSettingsModel;
    protected $userModel;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $language->setLocale($session->lang);

        // NEW: Load models for theme fetching
        $this->userSettingsModel = new \App\Models\UserSettingsModel();
        $this->userModel = new \App\Models\UserModel();

        // NEW: Global: Load theme_mode if user logged in
        $userId = session()->get('id');
        $themeMode = 'dark'; // Default
        if ($userId) {
            $user = $this->userModel->find($userId);
            if ($user) {
                $settings = $this->userSettingsModel->getUserSettings($userId);
                $themeMode = $settings['theme_mode'] ?? 'dark';
            }
        }
        // Pass to all views (child controllers can access via $this->data)
        $this->data['theme_mode'] = $themeMode;
    }
}