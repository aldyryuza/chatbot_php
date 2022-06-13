<?php
// koneksi ke database
$conn = new mysqli("localhost", "root", "", "chatbot_akb") or die("Database Error");

// get pesan dari user
$getMesg = $conn->real_escape_string($_POST['text']);

//cek user query dengan yang ada di database
$check_data = "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$getMesg%'";
$run_query = $conn->query($check_data) or die("Error");

// jika query user sama dengan yang ada dalam database maka akan dibalas sesuai query-nya
if ($run_query->num_rows > 0) {
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay = $fetch_data['jawaban'];
    echo $replay;
} else {
    echo "Maaf, kami tidak paham maksud anda!";
}
