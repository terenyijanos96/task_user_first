<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            //automatikusan BigInt, autoincrement, primary key
            $table->id();
            $table->string('title', 50)->unique();
            $table->longText('description',255);
            $table->date('end_date')->default('2022-05-21');
            //létre is hozza a user_id nevű oszlopot, és beállítja a kapcsolatot
            $table->foreignId('user_id')->references('id')->on('users');
            //alapból nyitott (true)
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Task::create(['title' => 'adatbázis', 'description'=> 'Tervezd meg az adatbázist!', 'end_date'=>'2022-11-22', 'user_id'=> 1, 'status' => false]);
        Task::create(['title' => 'programozás', 'description'=> 'Írd meg a végpontokat!', 'user_id'=> 1]);
        Task::create(['title' => 'webprogramozás', 'description'=> 'Tervezd meg a kinézetet!', 'user_id'=> 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
