<?php
mysqli_report(MYSQLI_REPORT_STRICT);
try {
    $mysqli = new mysqli("localhost", "root", "");

    // Buat Database "chatbot_akb" (Jika Belum Ada)
    $query = "CREATE DATABASE IF NOT EXISTS chatbot_akb ";
    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception($mysqli->erorr, $mysqli->errno);
    } else {
        echo "Database 'chatbot_akb' Berhasil dibuat / Sudah tersedia <br>";
    };

    // Pilih Databse "chatbot_akb"
    $mysqli->select_db("chatbot_akb");
    if ($mysqli->error) {
        throw new Exception($mysqli->error, $mysqli->errno);
    } else {
        echo "Database 'chatbot_akb' Berhasil di pilih <br>";
    };

    // Hapus Tabel chatbot jika ada
    $query = "DROP TABLE IF EXISTS chatbot";
    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception($mysqli->error, $mysqli->errno);
    }

    // Buat Tabel "chatbot"
    $query = "CREATE TABLE `chatbot`(
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `pertanyaan` varchar(300) NOT NULL,
        `jawaban` varchar(300) NOT NULL,
        PRIMARY KEY (`id`)
       ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";
    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception($mysqli->error, $mysqli->errno);
    } else {
        echo "Tabel 'chatbot' Berahsil dibuat <br>";
    };


    
    // Menambahkan data ke tabel chatbot
    $query = "INSERT INTO chatbot
        (pertanyaan, jawaban) VALUES
        ('Assalamualaikum|Halo|hallo|hai|hay|hi|woy|p|test|hai bot' , 'Hai kawan. dengan AKB ada yang bisa kami bantu?' ),
        ('Siapa kamu|kamu siapa ?|siapa kamu ?|siapa namamu ?|kamu sudah makan ?', 'Saya hanya bot, anda bisa memanggil saya bot !' ),
        ('Terimakasih|makasih|oke|yoi|okey', 'Sama-sama ' ),
        ('ga ada|ngga ada|tidak ada', 'Oke , Baiklah :) ' ),
        ('o gitu|yaudah|begitu ya ?|', 'Iya.. ' ),
        ('kamu tinggal dimana ?|dimana kamu tinggal ?|tinggal dimana ?|rumahnya mana ?|alamat rumahnya mana ?|letak akb ?|', 'Jl. DR. Sutomo No.29, Bendogerit, Kec. Sananwetan, Kota Blitar, Jawa Timur 66133' ),
        ('kamu bisa apa?|kamu ngapain ?|', 'Mungkin bisa membantu jawab pertanyaanmu' ),
        ('Sampai jumpa|sampai jumpa lagi|sampai ketemu lagi', 'Baiklah, sampai jumpa :)' ),
        ('Bagaimana cara daftar|cara daftarnya gimana|info pmb|link pendaftaran|link pendaftaran pmb', 'Anda dapat langsung menuju halaman <a href=https://akb.ac.id/aknpsf/index.php/pilihan-studi/ target=blank>PMB AKB</a>' ),
        ('Apa syarat daftar AKB|Apa saja syarat untuk daftar' , 'Memiliki ijazah SMA/SMK/MA/Paket C/Sederajat' ),
        ('Apa lulusan lama masih bisa daftar ?' , 'Bisa, Mahasiswa AKB tidak dibatasi usia' ),
        ('Berapa biaya daftar di AKB|Biaya daftar di AKB' , 'Biaya pendafataran di AKB Rp. 200.000' ),
        ('Berapa biaya kuliah di AKB?|Berapa biaya administrasi di AKB' , 'Hanya biaya pendaftaran dan UKT, tanpa ada biaya lainnya' ),
        ('Berapa UKT di AKB ?|UKT di AKB ?|ukt nya berapa ?' , 'UKT Maksimum Rp. 1.150.000 per semester' ),
        ('Prodi apa saja di AKB ?|Jurusan apa saja di AKB?|Program studi apa saja di AKB?' , 'D2 Administrasi Server dan Jaringan Komputer; D2 Penyuntingan Audio dan Video; D2 Pengolahan Hasil Ternak Unggas' ),
        ('AKB akreditasinya apa ?|Akreditasi AKB apa ?|Apa akreditasi AKB ?' , 'Alhamdulillah Akreditasnya sudah Baik' ),
        ('Apa ada kelas untuk karyawan ?|Apakah ada kelas sore ?' , 'Ada, S&K berlaku' ),
        ('Apakah ada beasiswa di AKB ?|beasiswa akb ?' , 'KIP Kuliah dan Beasiswa Pemerintah Kota Blitar ' ),
        ('Berapa lama kuliah di AKB ?' , 'Program Studi di AKB selama 2 Tahun' )
        ;";

    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception($mysqli->error, $mysqli->errno);
    } else {
        echo "Tabel 'chatbot' berhasil di isi" . $mysqli->affected_rows . "baris data <br>";
    };
} catch (Exception $e) {
    echo "koneksi / Query bermasalah : " . $e->getMessage() . " (" . $e->getCode() . ")";
} finally {
    if (isset($mysqli)) {
        $mysqli->close();
    }
}
