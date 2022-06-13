<?php

use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(State::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();

            $table->index(['name', 'state_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_g_a_s');
    }
};
