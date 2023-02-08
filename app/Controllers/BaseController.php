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
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        date_default_timezone_set("Asia/Jakarta");
        
        $this->session = session();
        if ($this->session->has('id_user')) {
            $this->id_user = $this->session->get('id_user');
        }

        $this->userModel = new \App\Models\UserModel();
        $this->BidangModel = new \App\Models\BidangModel();
        $this->MagangModel = new \App\Models\MagangModel();
        $this->AbsensiModel = new \App\Models\AbsensiModel();
        $this->TugasModel = new \App\Models\TugasModel();
        $this->LogModel = new \App\Models\LogModel();
        $this->KriteriaModel = new \App\Models\KriteriaModel();
        $this->NilaiModel = new \App\Models\NilaiModel();
        $this->SertifikatModel = new \App\Models\SertifikatModel();
    }
}
