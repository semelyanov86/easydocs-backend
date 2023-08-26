<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->integer('sequence');
            $table->boolean('is_private')->default(false);
            $table->softDeletes();
            $table->timestamps();
            $table->nestedSet();

            $table->foreign('user_id', 'user_fk_3394823')->references('id')->on('users');
            $table->foreign('group_id', 'group_fk_3394824')->references('id')->on('groups');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
