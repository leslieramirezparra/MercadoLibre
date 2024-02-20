<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {

			$table->id();
            $table->bigInteger('customer_user_id')->unsigned();
            // $table->bigInteger('owner_user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->date('date_out');
            $table->date('date_in')->nullable;
            $table->enum('status', ['DISPONIBLE', 'AGOTADO'])->default('DISPONIBLE');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
