<?php
require "koneksi.php";
require('fpdf/fpdf.php');

class PDF extends FPDF
{
  // Better table
  function ImprovedTable($header, $data)
  {
    // Column widths
    $w = array(40, 75, 75);
    // Header
    for ($i = 0; $i < count($header); $i++)
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
    $this->Ln();
    // Data
    $baris = 1;
    foreach ($data as $row) {
      $this->Cell($w[0], 8, $row['id'], 1, 0, 'C');
      $this->Cell($w[1], 8, $row['name'], 1, 0, 'LR');
      $this->Cell($w[2], 8, $row['score'], 1, 0, 'R');
      $this->Ln();
      $baris++;
      if ($baris == 30) {
        $this->Cell(190, 10, "DATA KIS", 1, 1, 'C');
        $this->Ln();
        for ($i = 0; $i < count($header); $i++)
          $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
      }
    }
    // Closing line
    $this->Cell(array_sum($w), 0, '', 'T');
  }
}

$pdf = new PDF();
// Column headings
$header = array('id', 'name', 'score');
// Data loading
$pdf->SetTitle("Daftar Pengguna");
$data = query("SELECT * FROM warga 
INNER JOIN kis ON warga.nik = kis.nik 
INNER JOIN faskes ON faskes.id_faskes = kis.id_faskes 
WHERE no_kartu = $_GET[id]")[0];
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(190, 10, "Kartu Indonesia Sehat", 1, 1, 'C');
$pdf->Cell(190, 10, $data['no_kartu'], 1, 1, 'C');
$pdf->Cell(190, 10, "NIK : " . $data['nik'], 0, 1, 'L');
$pdf->Cell(190, 10, "Nama : " . $data['nama'], 0, 1, 'L');
$pdf->Cell(190, 10, "Alamat : " . $data['alamat'], 0, 1, 'L');
$pdf->Cell(190, 10, "Faskes : " . $data['nama_faskes'], 0, 1, 'L');
$pdf->Output();
