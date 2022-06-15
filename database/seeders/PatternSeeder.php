<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert([
            'active' => 1,
            'occupation' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('companys')->insert([
            'active' => 1,
            'company' => 'Age',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sectors')->insert([
            'active' => 1,
            'sector' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('privileges')->insert([
            'active' => 1,
            'privilege' => '1',
            'name' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'active' => 1,
            'first_name' => 'Carlos',
            'last_name' => 'Neto',
            'email' => 'a@a',
            'password' => '1',
            'sector_id' => 1,
            'occupation_id' => 1,
            'company_id' => 1,
            'privilege_id' => 1,
            'image' => 'padrao.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('icons')->insert([
            'active' => 1,
            'icon' => 'home-location-alt',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms')->insert([
            'active' => 1,
            'name' => 'Instalação',
            'icon_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms_questions')->insert([
            'active' => 1,
            'question' => 'Tipo',
            'force' => 0,
            'type_input' => 1,
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'active' => 1,
            'answer' => 'Instalação',
            'form_id' => 1,
            'question_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'active' => 1,
            'answer' => 'Reagendamento - Instalação',
            'form_id' => 1,
            'question_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
    }
}
