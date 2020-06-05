<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Cloudflare\API\Auth\APIToken;
use \Cloudflare\API\Adapter\Guzzle;
use \Cloudflare\API\Endpoints\DNS as CFDNS;

class Dns extends CI_Controller {
    
    private $CFDNS;

    public function __construct(){
        parent::__construct();
    }

    private function __load_cf(){
        $this->config->load('cloudflare', TRUE);
        $token = new APIToken($this->config->item('token', 'cloudflare'));
        $adapter = new Guzzle($token);
        $this->CFDNS = new CFDNS($adapter);
    }

    public function index(){
        $this->load->library('twig');
        $data = ['dev' => ENVIRONMENT === "development", 'nocachestr' => bin2hex($this->security->get_random_bytes(4)) ];
        
        $this->twig->display('dns/create', $data);
        //print_r($this->CFDNS->listRecords($this->config->item('zone', 'cloudflare')));
    }

}