<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('webinar_id')->unsigned()->length(20);
            $table->enum('type', ['Student', 'Faculty/Staff', 'Research Scholar', 'Academia/Industry'])->nullable()->default(null);
            $table->string('name', 200)->nullable()->default(null);
            $table->string('email', 200)->nullable()->default(null);
            $table->string('phone', 20)->nullable()->default(null);
            $table->string('organization', 200)->nullable()->default(null);
            $table->string('faculty_designation', 200)->nullable()->default(null);
            $table->string('qualification', 200)->nullable()->default(null);
            $table->string('department_name', 200)->nullable()->default(null);
            $table->string('address', 200)->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamp('deleted_at')->nullable()->default(null);
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
        Schema::dropIfExists('students');
    }
}
