<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIklanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iklan', function(Blueprint $table)
		{
			$table->integer('id_iklan')->unsigned()->primary();
			$table->integer('id_penjual')->unsigned()->index('pemilik_iklan');
			$table->string('kategori_iklan', 32);
			$table->string('judul_iklan', 128);
			$table->text('konten_iklan', 65535);
			$table->integer('harga');
			$table->boolean('terjual')->default(1);
			$table->boolean('verified')->default(0);
			$table->string('foto1')->nullable();
			$table->string('foto2')->nullable();
			$table->string('foto3')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('iklan');
	}

}
