<?php
// Kelas Buku
class Buku {
    public $judul;
    public $pengarang;
    public $tahunTerbit;
    public $genre;

    // Constructor untuk menginisialisasi properti
    public function __construct($judul, $pengarang, $tahunTerbit, $genre) {
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->tahunTerbit = $tahunTerbit;
        $this->genre = $genre;
    }

    // Metode untuk mengembalikan detail buku dalam format string
    public function getDetailBuku() {
        return "<strong>Judul:</strong> {$this->judul}<br>" .
               "<strong>Pengarang:</strong> {$this->pengarang}<br>" .
               "<strong>Tahun Terbit:</strong> {$this->tahunTerbit}<br>" .
               "<strong>Genre:</strong> {$this->genre}<br>";
    }
}

// Kelas Perpustakaan
class Perpustakaan {
    public $lokasi;
    public $daftarBuku = array(); // Array untuk menyimpan objek Buku

    // Constructor untuk menginisialisasi lokasi
    public function __construct($lokasi) {
        $this->lokasi = $lokasi;
    }

    // Metode untuk menambahkan buku ke daftar buku
    public function tambahBuku($buku) {
        $this->daftarBuku[] = $buku;
    }

    // Metode untuk mencetak daftar buku dengan format HTML
    public function getDaftarBuku() {
        if (empty($this->daftarBuku)) {
            echo "<p>Tidak ada buku yang tersedia di perpustakaan.</p>";
        } else {
            echo "<h3>Daftar Buku di {$this->lokasi}:</h3>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th>No</th><th>Detail Buku</th></tr>";
            foreach ($this->daftarBuku as $index => $buku) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>" . $buku->getDetailBuku() . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}

// Membuat objek Buku
$buku1 = new Buku("Pemrograman PHP", "Budi Santoso", 2020, "Teknologi");
$buku2 = new Buku("Belajar Laravel", "Agus Setiawan", 2021, "Teknologi");
$buku3 = new Buku("Membaca Dunia", "Dewi Lestari", 2018, "Fiksi");

// Membuat objek Perpustakaan
$perpustakaan = new Perpustakaan("Perpustakaan Universitas Sebelas April");

// Menambahkan buku ke perpustakaan
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);
$perpustakaan->tambahBuku($buku3);

// Mencetak daftar buku di perpustakaan
$perpustakaan->getDaftarBuku();
?>
