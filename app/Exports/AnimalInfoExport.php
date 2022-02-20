<?php

namespace App\Exports;

use App\Models\AnimalInfo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
class AnimalInfoExport implements FromView
{
    public function __construct($farm, $farmOrComId, $community_id)
    {
        $this->farm = $farm;
        $this->farmOrComId = $farmOrComId;
        $this->community_id = $community_id;
    }
    public function view(): View
    {
        if (auth()->user()->is == 1) {
            if ($this->community_id != null || $this->community_id != 0) {
                return view('admin.animal_info.excel', [
                    'animalInfos' => AnimalInfo::where($this->farm,'=',$this->farmOrComId)->whereCommunity_id($this->community_id)->get()
                ]);
            }else{
                return view('admin.animal_info.excel', [
                    'animalInfos' => AnimalInfo::where($this->farm,'=',$this->farmOrComId)->get()
                ]);
            }
        } else {
            return view('admin.animal_info.excel', [
                'animalInfos' => AnimalInfo::where('user_id', auth()->user()->id)->get()
            ]);
        }
    }
}
