<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'    => $company_id,
            'address'       => 'Jose P. Varela 5714. Ciudad Autónoma de Buenos Aires. Argentina',
            'email'         => 'info@brovelli.com.ar',
            'phone1'        => '+541146445225|011-4644-5225',
            'phone2'        => '+541146423250|4642-3250',
            'logo_header'   => 'images/data/logo_header.svg',
        ]);
    }
}

