<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;

class ClientsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $client = Client::select('dealer_code', 'dealer_group', 'full_name', 'birth_place',
        'birth_date','gender', 'education', 'marital_status', 'honda_id', 'id_card_number', 'email_user', 'phone_number', 'user_position_start_date')
        ->get();
        
        return $client;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '5B5B5B'],
                        ],
                    ],
                ];                
                $cellRange = 'A1:AQ1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray)->getFont()->setSize(14);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'Dealer Code', 
            'Dealer Group', 
            'Full Name', 
            'Birth Place',
            'Birth Date',
            'Gender', 
            'Education', 
            'Marital Status', 
            'Honda ID', 
            'NIK', 
            'Email',
            'Phone Number', 
            'User Position Start Date'
        ];
    }
}