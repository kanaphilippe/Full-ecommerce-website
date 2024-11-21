<?php

namespace App\Exports;

use App\Models\NewsletterSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class subscribersExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // For Exporting subscribers Email
        // return NewsletterSubscriber::all();
        // For Exporting subscribers Email,id and created_at
        $subscribersData = NewsletterSubscriber::select('id', 'email', 'created_at')->where('status', 1)->orderBy('id', 'Desc')->get();
        return $subscribersData;
    }

    public function headings(): array{
        return ['Id','Email','Registered On'];
    }
}
