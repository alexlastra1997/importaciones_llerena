<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->decimal('shipping_cost', 8, 2);
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->dropColumn('shipping_cost');
        });
    }
};