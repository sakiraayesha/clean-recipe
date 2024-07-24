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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->integer('prep_time');
            $table->enum('prep_time_unit', ['mins', 'hours'])->default('mins');
            $table->integer('cook_time');
            $table->enum('cook_time_unit', ['mins', 'hours'])->default('mins');
            $table->integer('total_time');
            $table->integer('servings');
            $table->string('cuisine');
            $table->string('category');
            $table->string('image');
            $table->boolean('pinned')->default(false);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
