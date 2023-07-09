<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\Event;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->name = 'Create';
        $event->save();
        
        $event2 = new Event();
        $event2->name = 'Edit';
        $event2->save();

        $table = new Table();
        $table->name = 'attachments';
        $table->save();

        $table_col1 = new Element();
        $table_col1->table_id = $table->id;
        $table_col1->name = 'file';
        $table_col1->save();

        $table2 = new Table();
        $table2->name = 'contracts';
        $table2->save();
        $table2_col1 = new Element();
        $table2_col2 = new Element();
        $table2_col3 = new Element();
        $table2_col4 = new Element();
        $table2_col1->table_id = $table2->id;
        $table2_col2->table_id = $table2->id;
        $table2_col3->table_id = $table2->id;
        $table2_col4->table_id = $table2->id;
        $table2_col1->name = 'number';
        $table2_col2->name = 'type';
        $table2_col3->name = 'start_date';
        $table2_col4->name = 'end_date';
        $table2_col1->save();
        $table2_col2->save();
        $table2_col3->save();
        $table2_col4->save();

        $table3 = new Table();
        $table3->name = 'enterprises';
        $table3->save();
        $table3_col1 = new Element();
        $table3_col2 = new Element();
        $table3_col3 = new Element();
        $table3_col1->table_id = $table3->id;
        $table3_col2->table_id = $table3->id;
        $table3_col3->table_id = $table3->id;
        $table3_col1->name = 'reeup';
        $table3_col2->name = 'name';
        $table3_col3->name = 'email';
        $table3_col1->save();
        $table3_col2->save();
        $table3_col3->save();

    }
}
