<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator1";
        $administrator->name = "Site Administrator1";
        $administrator->email = "administrator@larashop.test";
        $administrator->roles = json_encode(['ADMIN']);
        $administrator->password = \Hash::make('larashop');
        $administrator->phone = '085246821992';
        $administrator->avatar = 'saat-ini-tidak-ada-file.png';
        $administrator->address = 'Samarinda, Kaltim';

        $administrator->save();

        $this->command->info('User Admin berhasil diinsert');
    }
}
