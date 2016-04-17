<?php 

namespace App\CSVModel;

class Client implements CSVModelInterface
{

	protected $filePath;

	public function __construct()
	{
		$ds = DIRECTORY_SEPARATOR;
		$this->filePath = storage_path(). $ds . 'clients.csv';
		if(!file_exists($this->filePath))
		{
			file_put_contents($this->filePath, "");
		} 
	}

	public function headings()
	{
		return ['Fullname', 'Gender', 'Phone', 'Email', 'Address', 'Nationality', 'Date of Birth', 'Education', 'Prefered Mode of Contact'];
	}

	public function all()
	{
		$clients = [];
		$file = fopen($this->filePath, 'r');
		while(!feof($file))
		{
			$data = fgetcsv($file);
			if($data)
			{
				$clients[] = $data;
			}
		}
		fclose($file);
		return $clients;
	}

	public function insert(array $data)
	{
		$file = fopen($this->filePath, 'a');
		fputcsv($file, $data);
		fclose($file);
	}
}