<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ClientFacturesExport implements FromView
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
        // if (!is_array($this->data)) {
        //     $this->data = [];
        // }
        return view('excel.ClientFactures', [
            'data' => $this->data,
        ]);
    }
}
