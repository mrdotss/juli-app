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
        $client = Client::where('user_id', Auth::id())->get();
        
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
            '#',
            'User ID',
            'Dealer Code',
            'Dealer Group',
            'Full Name',
            'Birth Place',
            'birth Date',
            'Gender',
            'Religion',
            'Education',
            'Marital Status',
            'Honda ID',
            
            'id_card Number',
            'id_card Address',
            'id_card Province',
            'id_card City',
            'id_card Districts',
            'id_card Village',
            'id_card Postal_code',
            'id_card Picture',

            'Home Address',
            'Home Province',
            'Home City',
            'Home Districts',
            'Home Village',
            'Home Postal_code',

            'Email',
            'Facebook',
            'Instagram',
            'Twitter',
            'Telephone Number',
            'Phone Number',
            'Relatives Phone Number',
            'Hobby 1',
            'Hobby 2',
            'Hobby 3',
            'Supervisor',
            'Coordinator', 
            'Position',
            'Position Start Date',
            'Selfie',
            'Created at',
            'Updated at'
        ];
    }
}