<?php

namespace App\Exports;use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;

class AssistancesExport implements FromCollection,WithTitle,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $columns;

    public function __construct($columns){
        $this->columns = $columns;
    }

    //titulo de la hoja de excel
    public function title(): string{
        return 'Assistance';
    }

    public function headings(): array{
        return $this->columns;
    }


    public function collection(){
        $assitance = \App\C_assistances::select($this->columns)->orderBy('id','DESC')->get();
        return $assitance;
        
    }
}
