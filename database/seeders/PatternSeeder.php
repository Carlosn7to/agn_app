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

        DB::table('hash_apis')->insert([
            'status_id' => 1,
            'hash' => 'd41d8cd98f00b204e9800998ecf8427e',
            'user'=> 'system',
            'password' => bcrypt('jF7s3o1oecRka2&ru^ovt'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('hash_apis')->insert([
            'status_id' => 1,
            'hash' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
            'user'=> 'bi_agent',
            'password' => bcrypt('&Ql0W&^Ac9emR1lJqycy'),
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
