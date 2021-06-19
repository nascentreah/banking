<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;

class Loanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $loan = new Loan();
        $loan->user_id = 1;
        $loan->amount = 6000;
        $loan->status = 0;
        $loan->reference_id = '678889987554';
        $loan->details = 'testing the module';
        $loan->save();
    }
}
