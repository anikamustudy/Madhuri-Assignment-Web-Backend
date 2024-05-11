<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function up()
   {
       Schema::create('products', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->string('image')->nullable();
           $table->text('description');
           $table->decimal('price', 8, 2);
           $table->timestamps();
          
           
       });
   }

   public function down()
   {
       Schema::dropIfExists('products');
   }
}