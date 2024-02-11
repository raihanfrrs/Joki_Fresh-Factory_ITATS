<?php

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
        Schema::table('tenant_subscriptions', function (Blueprint $table) {
            $table->foreign(['tenant_id'], 'tenant_subscriptions_ibfk_1')->references(['id'])->on('tenants')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['subscription_id'], 'tenant_subscriptions_ibfk_2')->references(['id'])->on('subscriptions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenant_subscriptions', function (Blueprint $table) {
            $table->dropForeign('tenant_subscriptions_ibfk_1');
            $table->dropForeign('tenant_subscriptions_ibfk_2');
        });
    }
};
