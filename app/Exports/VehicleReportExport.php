<?php
/**
 * Created by PhpStorm.
 * User: xxhp
 * Date: 03/07/2018
 * Time: 11:50 PM
 */

namespace App\Exports;

use App\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleReportExport implements FromCollection
{
	private $data;
	public function __construct($data) {
		$this->data = $data;
	}
	
    
	public function collection() {
        return $this->data;
    }
	
	/*
	public function view():View {
		return view('report.xml', ['data'=>$this->data]);
	}
	*/
}