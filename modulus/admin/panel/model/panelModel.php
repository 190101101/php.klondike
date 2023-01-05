<?php 

namespace modulus\admin\panel\model;
use core\model;
use \library\message;
use DomDocument;

class panelModel extends model
{
	public function panel($core = false)
	{
		if(!file_exists(getcwd().DV.$core)){
			redirect('panel/admin');
        }   

		$path = path($core);

		$scanner = scanner($core);

		$glob = $core == FALSE ? '*' : $core."/*";

		$root = glob('*', DIR);
	}

    public function __caller($arg)
    {
        if(!file_exists(CWD.DV.$arg)){
            redirect('/panel/admin');
        }   

        $glob = glob($arg.'/*', DIR);
        $return = $glob == false ? 'file' : 'dir';

        $view = false;
        if($return == 'dir')
        {
            $view = $this->directory($glob, $arg);
        }
        else
        {
            $view = $this->files($glob, $arg);
        }
        return $view;
    }


    public function directory($glob, $arg)
    {
        $data = glob($arg.'/*', DIR);
        return ['glob' => 'root', 'path' => $arg, 'data' => $data];
    }

    public function files($glob, $arg)
    {
        $glob = glob($arg.'/*', FILE);
        $data = scanner($arg);
        return ['glob' => 'core', 'path' => $arg, 'data' => $data];
    }

	public function panels($core = false)
	{
		if(!file_exists(getcwd().DV.$core)){
			redirect('panel/admin');
        }   

		$path = path($core);

		$scanner = scanner($core);

		$files = [];

		foreach($scanner as $file)
		{
			$files[] = $file;
		}

		 $glob = $core == FALSE ? '*' : $core."/*";


		 dd(glob($glob, DIR));


		return ['core' => $core, 'path' => $path, 'files' => $files];
	}
}
