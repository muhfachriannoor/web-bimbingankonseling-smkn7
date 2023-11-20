<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function login_kelas($kelas)
	{
		$data = explode(" ", $kelas);
		return $data[0];
	}