<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('sleep_snore_half')->nullable();
            $table->boolean('sleep_snore_always')->nullable();
            $table->boolean('sleep_snore_heavily')->nullable();
            $table->boolean('sleep_breath_loudly')->nullable();
            $table->boolean('sleep_breath_difficulty')->nullable();
            $table->boolean('sleep_breath_pause')->nullable();
            $table->boolean('breath_mouth_open')->nullable();
            $table->boolean('morning_dry_mouth')->nullable();
            $table->boolean('wet_bed')->nullable();
            $table->boolean('wake_not_rested')->nullable();
            $table->boolean('day_drowsiness')->nullable();
            $table->boolean('teacher_drowsiness')->nullable();
            $table->boolean('morning_wake_difficulty')->nullable();
            $table->boolean('morning_headache')->nullable();
            $table->boolean('stopped_growing')->nullable();
            $table->boolean('overweight')->nullable();
            $table->boolean('not_listening')->nullable();
            $table->boolean('organising_tasks_difficulty')->nullable();
            $table->boolean('easily_distracted')->nullable();
            $table->boolean('agitate_when_sit')->nullable();
            $table->boolean('hyperkinetic')->nullable();
            $table->boolean('interrupts_others')->nullable();
            $table->timestamp('checked_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
