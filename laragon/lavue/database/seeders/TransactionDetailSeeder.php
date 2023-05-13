<?php

namespace Database\Seeders;

use App\Models\TransactionDetails;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i <20; $i++){
            $transactiondetail = new TransactionDetails;

            $transactiondetail->transaction_id = rand(1,20);
            $transactiondetail->book_id = rand(1,20);
            $transactiondetail->qty = rand(1,5);

            $transactiondetail->save();
        }
    }
}
