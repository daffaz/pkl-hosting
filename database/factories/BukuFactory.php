<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = $this->faker->sentence();
        return [
            'judul' => $judul,
            'slug' => \Str::slug($judul, '-'),
            'penerbit' => $this->faker->sentence(),
            'kategori' => $this->faker->randomElement(['Pertanian', 'Seni & desain', 'Bisnis & ekonomi', 'Anak-anak', 'Novel', 'Komik', 'Komputer & teknologi', 'Masakan', 'Pendidikan', 'Fiksi & sastra', 'Finansial', 'Sejarah', 'Agama', 'Romance', 'Sains', 'Self improvement', 'Tugas akhir']),
            'quantity' => $this->faker->randomNumber(2),
            'tahun' => '2014',
            'deskripsi' => $this->faker->text(),
            'gambar' => 'dummy.jpg',
            'penulis' => $this->faker->name(),
            'status' => 'Tersedia'
        ];
    }
}
