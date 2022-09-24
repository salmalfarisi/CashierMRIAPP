<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('render_file'))
{
	function render_file($srcfile)
	{
		$CI = &get_instance();
        $CI->load->view('layout/jslibrary');
		if($srcfile != [])
		{
			foreach($srcfile as $data)
			{
				$CI->load->view($data);
			}
		}
		$CI->load->view('layout/footer');
    }
}

if (! function_exists('check_permission'))
{
	function check_permission($array = [])
	{
		$CI = &get_instance();
		$level = $CI->session->userdata('level_id');
		if($level == null)
		{
			return redirect('Account/Index');
		}
		else
		{
			if($array != [] and !in_array($level, $array))
			{
				return redirect('Account/Index');
			}
		}
	}
}