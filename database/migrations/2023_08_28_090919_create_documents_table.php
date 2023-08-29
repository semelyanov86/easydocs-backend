<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->dateTime('date_valid')->nullable();
            $table->unsignedBigInteger('folder_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->integer('sequence')->default(1);
            $table->string('state');
            $table->bigInteger('seedms_id')->nullable();
            $table->string('public_link')->nullable();
            $table->integer('version')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id', 'user_fk_4494823')->references('id')->on('users');
            $table->foreign('group_id', 'group_fk_444824')->references('id')->on('groups');
            $table->foreign('folder_id', 'folder_fk_444835')->references('id')->on('folders');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
