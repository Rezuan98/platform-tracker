<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('platform_infos', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY defined here (do NOT add later)

            // one-to-one FK to platforms (unique to enforce 1:1)
            $table->foreignId('platform_id')
                  ->constrained('platforms')
                  ->cascadeOnDelete()
                  ->unique();

            // Excel columns (without "Platform Name")
            $table->string('editor_lead')->nullable();
            $table->string('platform_type')->nullable();
            $table->text('platform_usp')->nullable();
            $table->text('available_performance_metrics')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('subscribers')->nullable();
            $table->string('political_affiliation')->nullable();
            $table->text('recent_changes_in_management_ownership')->nullable();
            $table->string('contact_person_for_unilever')->nullable();
            $table->text('primary_audience_demographics')->nullable();
            $table->text('ad_format_availability')->nullable();
            $table->text('historical_performance_highlights')->nullable();
            $table->text('platform_reach_geography')->nullable();
            $table->text('notes_remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('platform_infos');
    }
};
