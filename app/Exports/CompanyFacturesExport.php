<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class CompanyFacturesExport implements FromView
{
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        return view('excel.FacturesListExport', [
            'data' => $this->data ,
        ]);
    }
}
