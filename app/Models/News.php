<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class News extends Model
// {
// use HasFactory;
// //    public function up()
// //     {
// //         Schema::table('news', function (Blueprint $table) {
// //             $table->text('source')->nullable(); // Menyimpan sumber berita (link)
// //             $table->integer('stunting_count')->nullable(); // Menyimpan jumlah data stunting
// //             $table->string('food_recommendation')->nullable(); // Menyimpan rekomendasi makanan
// //             $table->string('food_image')->nullable(); // Menyimpan path foto rekomendasi makanan
// //             $table->string('food_source')->nullable(); // Menyimpan sumber rekomendasi makanan
// //         });
// //     }

// //     public function down()
// //     {
// //         Schema::table('news', function (Blueprint $table) {
// //             $table->dropColumn(['source', 'stunting_count', 'food_recommendation', 'food_image', 'food_source']);
// //         });
// //     }

//     // public function up()
//     // {
//         // Schema::table('news', function (Blueprint $table) {
//         //     $table->text('sumber')->nullable(); // Menyimpan sumber berita (link)
//         //     $table->integer('data_stunting')->nullable(); // Menyimpan jumlah data stunting
//         //     $table->string('rekomendasi_makanan')->nullable(); // Menyimpan rekomendasi makanan
//         //     $table->string('foto_makanan')->nullable(); // Menyimpan path foto rekomendasi makanan
//     //     //     $table->string('sumber_makanan')->nullable(); // Menyimpan sumber rekomendasi makanan
//     //     });
//     // }

//     // public function down()
//     // {
//     //     Schema::table('news', function (Blueprint $table) {
//     //         $table->dropColumn(['sumber', 'data_stunting', 'rekomendasi_makanan', 'foto_makanan', 'sumber_makanan']);
//     //     });
//     // }{

//     // Daftar atribut yang dapat diisi secara massal
//     protected $fillable = [
//         'title',
//         'content',
//         'image',
//         'item',
//         'source',              // Menyimpan sumber berita (link)
//         'stunting_count',      // Menyimpan jumlah data stunting
//         'food_recommendation', // Menyimpan rekomendasi makanan
//         'food_image',          // Menyimpan path foto rekomendasi makanan
//         'food_source',         // Menyimpan sumber rekomendasi makanan
//     ];

//     public function News()
//     {
//         return $this->belongsTo(News::class);
//     }
// }
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'source',
        'image',
    ];
}