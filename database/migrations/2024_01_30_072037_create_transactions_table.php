<?php

use App\Models\Tenant;
use App\Models\WarehouseSubscription;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(WarehouseSubscription::class);
            $table->foreignIdFor(Tenant::class);
            $table->bigInteger('grand_total');
            $table->enum('status', ['PENDING', 'COMPLETED', 'DECLINED'])->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
