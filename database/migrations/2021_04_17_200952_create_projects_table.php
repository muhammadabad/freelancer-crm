<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id')->index('projects_client_id_foreign');
            $table->string('project_name');
            $table->date('started_date');
            $table->date('delivery_date');
            $table->double('budget', 15, 2);
            $table->integer('no_of_developers');
            $table->string('plan_report_url')->nullable();
            $table->enum('status', ['pending', 'under_working', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
