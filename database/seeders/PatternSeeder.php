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

        DB::table('auth_token')->insert([
            'user'=> 'system',
            'password' => bcrypt('z9Z2O^QcAD#u2eT9c&bw'),
            '_token' => '794f36dfa3d83918b758ae1634ff5cca99c32c8c3f898e87b1ba11580f712a45e6e6d8c3a11a1cb9ffb574c025bf065c845f16ce004eb91d87950ac9426a4ef7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('auth_token')->insert([
            'user'=> 'bi_agent',
            'password' => bcrypt('&Ql0W&^Ac9emR1lJqycy'),
            '_token' => '277bae7c29762a1e33f5d1bccf39715c35d7e009fd3d7b76d97ab3f7bd0b1cb0f140c0dc6f1f3c357601aacd834996a41659eeef047379d59ee3f45d7b16a88c',
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

    }
}
