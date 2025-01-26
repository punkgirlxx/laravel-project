<?php
/*  KB - 26-01-2025
    Record table create
    comes with the fields of title, category, body and is draft
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('body');
            $table->boolean('is_draft')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
