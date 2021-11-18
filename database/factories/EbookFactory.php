<?php

namespace Database\Factories;

use App\Models\Ebook;
use Illuminate\Database\Eloquent\Factories\Factory;

class EbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ebook::class;

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
            'kategori' => $this->faker->randomElement(['Pertanian', 'Seni & desain', 'Bisnis & ekonomi', 'Anak-anak', 'Novel', 'Komik', 'Komputer & teknologi', 'Masakan', 'Pendidikan', 'Fiksi & sastra', 'Finansial', 'Sejarah', 'Agama', 'Romance', 'Sains', 'Self improvement', 'Tugas akhir', 'Jurnal']),
            'tahun' => '2014',
            'deskripsi' => $this->faker->text(),
            'gambar' => 'dummy.jpg',
            'penulis' => $this->faker->name(),
            // 'status' => $this->faker->randomElement(['Dipinjam', 'Tersedia'])
        ];
    }
}
