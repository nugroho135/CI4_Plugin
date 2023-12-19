<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    // Virtual Account
	public function virtualAccount()
	{
		$this->load->view('virtualAccount');
	}

	public function createToken()
	{

		
		// return view('requestToken');
		return view('requestToken');
		// $this->load->view('requestToken');
	}


	public function tos()
	{	
    echo "Halaman Term of Service";
	}

    public function inquiryVA()
	{
		$this->load->view('inquiryVA');
	}

}
