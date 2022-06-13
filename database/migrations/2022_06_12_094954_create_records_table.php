<?php

use App\Models\LGA;
use App\Models\PaymentMode;
use App\Models\Principal;
use App\Models\Quarter;
use App\Models\Type;
use App\Models\UnitPrice;
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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Principal::class)->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->string('start');
            $table->string('to');
            $table->string('no_of_pillars');
            $table->string('plan_no')->nullable();
            $table->string('location');
            $table->foreignId('lga_id')->constrained('lgas')->restrictOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignIdFor(UnitPrice::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignIdFor(PaymentMode::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignIdFor(Quarter::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignIdFor(Type::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
