<?php

use App\Enums\AccountStatus;
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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string("name", 255);
            $table->string("email", 255);
            $table->string("password", 255);
            $table->enum("status", AccountStatus::values())
                ->default(AccountStatus::INACTIVE->value);
            $table->foreignUuid("company_uuid")
                ->constrained('companies', 'uuid')
                ->onDelete('cascade');
            $table->string("created_by")->nullable();
            $table->string("created_type")->nullable();
            $table->string("updated_by")->nullable();
            $table->string("updated_type")->nullable();
            $table->string("deleted_by")->nullable();
            $table->string("deleted_type")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
