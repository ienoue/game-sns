<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedInteger('weight');
            $table->unsignedInteger('rarity_rank');
            $table->timestamps();
        });

        $rarities = [
            [
                'name' => 'N',
                'weight' => '40',
                'rarity_rank' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'R',
                'weight' => '30',
                'rarity_rank' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SR',
                'weight' => '20',
                'rarity_rank' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SSR',
                'weight' => '10',
                'rarity_rank' => '4',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('rarities')->insert($rarities);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rarities');
    }
}
