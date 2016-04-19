Overview
-
This is simple application for indexing and adding clients detail using **Laravel framework**. It uses CSV to store data.
[![Code Climate](https://codeclimate.com/github/alnugen/introcept_task/badges/gpa.svg)](https://codeclimate.com/github/alnugen/introcept_task)

Code Snippet
-
```php
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
```
