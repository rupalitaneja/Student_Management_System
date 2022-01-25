<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            
            $table->string('Sid');
            // $table->primary('Sid');
            $table->string('name', 100)->nullable();
            // $table->string('email')->unique();
            $table->biginteger('number', 50)->nullable();
            $table->string('birth');
            $table->string('class');
            $table->text('address', 100);
            $table->string('course_id');
            $table->string('mentor');
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
