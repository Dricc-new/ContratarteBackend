<?php

namespace Database\Seeders;

use App\Models\AttachmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new AttachmentType();
        $type->name = 'Doc. Original';
        $type->folder = 'original';
        $type->save();
    
        $type2 = new AttachmentType();
        $type2->name = 'Ficha Tecnica';
        $type2->folder = 'datasheet';
        $type2->save();

        $type3 = new AttachmentType();
        $type3->name = 'Suplemento';
        $type3->folder = 'supplement';
        $type3->save();
    
        $type4 = new AttachmentType();
        $type4->name = 'Actualizacion';
        $type4->folder = 'upgrade';
        $type4->save();

    }
}
