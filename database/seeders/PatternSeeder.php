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

        DB::table('status')->insert([
            'name' => "Ativo",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('status')->insert([
            'name' => "Inativo",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('status')->insert([
            'name' => "Pendente",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('occupations')->insert([
            'status_id' => 1,
            'occupation' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('companys')->insert([
            'status_id' => 1,
            'company' => 'Age',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sectors')->insert([
            'status_id' => 1,
            'sector' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('privileges')->insert([
            'status_id' => 1,
            'privilege' => '1',
            'name' => 'Padrão',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'status_id' => 1,
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

        DB::table('forms')->insert([
            'status_id' => 1,
            'name' => 'Instalação',
            'description' => 'Descrição aleatórioa',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms')->insert([
            'status_id' => 2,
            'name' => 'Mudança de ponto',
            'description' => 'Descrição aleatórioa',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms')->insert([
            'status_id' => 3,
            'name' => 'MDU',
            'description' => 'Descrição aleatórioa',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms_questions')->insert([
            'status_id' => 1,
            'question' => 'Tipo',
            'force' => 1,
            'type' => 'radio',
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Instalação',
            'form_id' => 1,
            'question_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Reagendamento - Instalação',
            'form_id' => 1,
            'question_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_questions')->insert([
            'status_id' => 1,
            'question' => 'Empresa responsável pela venda',
            'force' => 1,
            'type' => 'radio',
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Age',
            'form_id' => 1,
            'question_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'WT',
            'form_id' => 1,
            'question_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Não se aplica',
            'form_id' => 1,
            'question_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_questions')->insert([
            'status_id' => 1,
            'question' => 'Data',
            'force' => 1,
            'type' => 'date',
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => '',
            'form_id' => 1,
            'question_id' => 3,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_questions')->insert([
            'status_id' => 1,
            'question' => 'Nome do cliente',
            'force' => 1,
            'type' => 'text',
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => '',
            'form_id' => 1,
            'question_id' => 4,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms_questions')->insert([
            'status_id' => 1,
            'question' => 'Cidades',
            'force' => 1,
            'type' => 'radio',
            'form_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Samambaia',
            'form_id' => 1,
            'question_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Recanto das Emas',
            'form_id' => 1,
            'question_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('forms_answers')->insert([
            'status_id' => 1,
            'answer' => 'Riacho Fundo II',
            'form_id' => 1,
            'question_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
