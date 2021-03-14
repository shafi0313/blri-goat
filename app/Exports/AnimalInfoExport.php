<?php

namespace App\Exports;

use App\Models\AnimalInfo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

// class AnimalInfoExport implements FromCollection, WithHeadings
// {
//     public function headings():array{
//         return [
//             'Animal Tag',
//             'Type',
//             'Sire',
//             'Dam',
//             'Color',
//             'Sex',
//             'Birth Weight',
//             'Litter Size',
//             'Generation',
//             'Paity',
//             'Dam Milk',
//             'Date of Birth',
//             'Season Date of Birth',
//             'Death Date',
//             'Remark',
//         ];
//     }
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return collect(AnimalInfo::getAnimalInfo());
//     }
// }

class AnimalInfoExport implements FromView
{
    public function view(): View
    {
        return view('admin.animal_info.export', [
            'animalInfos' => AnimalInfo::all()
        ]);
    }
}
