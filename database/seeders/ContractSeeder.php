<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Contract;
use App\Models\Enterprise;
use App\Models\Type;
use Illuminate\Database\Seeder;


class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $type = new Type();
        $type->name = 'Carga';
        $type->save();
        
        $type2 = new Type();
        $type2->name = 'Pasaje';
        $type2->save();
        
        $type3 = new Type();
        $type3->name = 'Servicios Tecnicos';
        $type3->save();
        
        $type4 = new Type();
        $type4->name = 'Servicios Tecnicos de Remotorizacion';
        $type4->save();
        
        //dev
        Enterprise::factory(50)->has(
            Contract::factory()->count(4)->sequence(
                ['type_id' => 1],
                ['type_id' => 2],
                ['type_id' => 3],
                ['type_id' => 4],
                )->has(Attachment::factory()->count(2)->sequence(
                    ['attachmenttype_id' => 1 ], 
                    ['attachmenttype_id' => 2 ],
        )))
        ->create();
        
    }
}
