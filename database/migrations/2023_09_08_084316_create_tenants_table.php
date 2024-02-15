<?php

use App\Models\User;
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
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('name');
            $table->string('identity_number')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('pob');
            $table->date('dob');
            $table->enum('gender', ['male', 'female']);
            $table->longText('address');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('rank', ['starter', 'paid'])->default('starter');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
