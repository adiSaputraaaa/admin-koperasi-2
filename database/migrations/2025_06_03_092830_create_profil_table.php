<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->nullable()->onDelete('cascade');
            $table->foreignId('cooperatives_id')->constrained('cooperatives')->nullable()->onDelete('cascade');
            $table->string('full_name');
            $table->string('gender');
            $table->string('address');
            $table->string('url_photo_profil')->nullable();
            $table->string('phone', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_date_place')->nullable();
            $table->string('diploma')->nullable();
            $table->string('nik', 16)->unique()->nullable();
            $table->string('url_file_ktp')->nullable();
            $table->string('kk', 16)->unique()->nullable();
            $table->string('url_file_kk')->nullable();
            $table->decimal('salary', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
