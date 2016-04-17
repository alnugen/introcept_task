<?php 

namespace App\CSVModel;

interface CSVModelInterface
{
	public function all();

	public function headings();

	public function insert(array $data);
}