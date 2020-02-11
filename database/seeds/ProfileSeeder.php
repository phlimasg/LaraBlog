<?php

use App\Model\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'title' => 'user',
            'description' => 'Usuário visitante do sistema'
        ]);
        Profile::create([
            'title' => 'editor',
            'description' => 'Usuário com permissões de postagem'
        ]);
        Profile::create([
            'title' => 'admin',
            'description' => 'Usuário com todas as permissões do sistema'
        ]);
    }
}
