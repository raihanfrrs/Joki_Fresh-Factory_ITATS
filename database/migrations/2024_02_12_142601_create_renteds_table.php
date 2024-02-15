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
        Schema::create('renteds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Tenant::class);
            $table->foreignIdFor(WarehouseSubscription::class);
            $table->date('started_at');
            $table->date('ended_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renteds');
    }
};
