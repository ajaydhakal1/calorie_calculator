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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('age');
            $table->string('gender');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('activity_level');
            $table->decimal('maintenance_calories', 8, 2);
            $table->decimal('minimal_weight_loss', 8, 2);
            $table->decimal('balanced_weight_loss', 8, 2);
            $table->decimal('extreme_weight_loss', 8, 2);
            $table->decimal('minimal_weight_gain', 8, 2);
            $table->decimal('balanced_weight_gain', 8, 2);
            $table->decimal('extreme_weight_gain', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
