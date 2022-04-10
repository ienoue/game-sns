<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('rarity_id')->constrained();
            $table->string('image_path')->unique();
            $table->string('small_image_path')->unique();
            $table->unsignedInteger('attack');
            $table->timestamps();
        });

        $monsters = [
            [
                'name' => 'アラステア',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\alaster.png',
                'small_image_path' => '\images\monsters\small\alaster.png',
                'attack' => '1100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'アムドゥシアス',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\amdusias.png',
                'small_image_path' => '\images\monsters\small\amdusias.png',
                'attack' => '2200',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'トール',
                'rarity_id' => '4',
                'image_path' => '\images\monsters\regular\anger_thor.png',
                'small_image_path' => '\images\monsters\small\anger_thor.png',
                'attack' => '4500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'アザゼル',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\azazel.png',
                'small_image_path' => '\images\monsters\small\azazel.png',
                'attack' => '2400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'バフォメット',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\baphomet.png',
                'small_image_path' => '\images\monsters\small\baphomet.png',
                'attack' => '2600',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'サイクロプス',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\cyclops.png',
                'small_image_path' => '\images\monsters\small\cyclops.png',
                'attack' => '1300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'デス',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\death.png',
                'small_image_path' => '\images\monsters\small\death.png',
                'attack' => '2500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'デウムス',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\deumus.png',
                'small_image_path' => '\images\monsters\small\deumus.png',
                'attack' => '1800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '悪神',
                'rarity_id' => '3',
                'image_path' => '\images\monsters\regular\evil_god.png',
                'small_image_path' => '\images\monsters\small\evil_god.png',
                'attack' => '3600',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ミーミル',
                'rarity_id' => '3',
                'image_path' => '\images\monsters\regular\fountain_guardian.png',
                'small_image_path' => '\images\monsters\small\fountain_guardian.png',
                'attack' => '3100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'フリッグ',
                'rarity_id' => '4',
                'image_path' => '\images\monsters\regular\frigga.png',
                'small_image_path' => '\images\monsters\small\frigga.png',
                'attack' => '4100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ガネーシャ',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\ganesha.png',
                'small_image_path' => '\images\monsters\small\ganesha.png',
                'attack' => '2800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ジャイアント・ロック',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\giant_rock.png',
                'small_image_path' => '\images\monsters\small\giant_rock.png',
                'attack' => '1600',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ジャイアント・ウィンド',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\giant_wind.png',
                'small_image_path' => '\images\monsters\small\giant_wind.png',
                'attack' => '1800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ジャイアント',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\giant.png',
                'small_image_path' => '\images\monsters\small\giant.png',
                'attack' => '1400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'グルヴェイグ',
                'rarity_id' => '3',
                'image_path' => '\images\monsters\regular\gulweig.png',
                'small_image_path' => '\images\monsters\small\gulweig.png',
                'attack' => '3100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ハボリュム',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\haborym.png',
                'small_image_path' => '\images\monsters\small\haborym.png',
                'attack' => '1700',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ワーウルフ',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\jinro.png',
                'small_image_path' => '\images\monsters\small\jinro.png',
                'attack' => '1700',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ライトニング',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\lightning.png',
                'small_image_path' => '\images\monsters\small\lightning.png',
                'attack' => '2400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'マルファス',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\malphas.png',
                'small_image_path' => '\images\monsters\small\malphas.png',
                'attack' => '1900',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'オーク',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\orc.png',
                'small_image_path' => '\images\monsters\small\orc.png',
                'attack' => '1100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ラクタヴィージャ',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\ractabija.png',
                'small_image_path' => '\images\monsters\small\ractabija.png',
                'attack' => '2600',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'シトリー',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\sitri.png',
                'small_image_path' => '\images\monsters\small\sitri.png',
                'attack' => '2100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '黒魔女',
                'rarity_id' => '2',
                'image_path' => '\images\monsters\regular\witch.png',
                'small_image_path' => '\images\monsters\small\witch.png',
                'attack' => '2200',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'イエティ',
                'rarity_id' => '1',
                'image_path' => '\images\monsters\regular\yukiotoko.png',
                'small_image_path' => '\images\monsters\small\yukiotoko.png',
                'attack' => '1700',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('monsters')->insert($monsters);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monsters');
    }
}
