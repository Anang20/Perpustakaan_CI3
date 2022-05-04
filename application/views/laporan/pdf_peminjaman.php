<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Laporan Peminjaman');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times');

// add a page
$pdf->AddPage();

$tabel_header = '<table border="0" width="650px">';
    $tabel_header.='<tr>
                <td style="text-align:center; font-family:sans-serif; font-size:16px; font-weight:bold;">LAPORAN PEMINJAMAN BUKU</td>
            </tr>';
$tabel_header.= '</table> <br/><br/>';

$tabel_body = '<table border="1" width="650px">';
    $tabel_body.='<tr style="background-color: orange">
                <td height="30" style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">No</td>
                <td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Kode Peminjaman</td>
                <td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Peminjam</td>
                <td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Buku</td>
                <td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal Pinjam</td>
                <td style="text-align:center; font-weight:bold; font-family:sans-serif; font-size:14px;">Tanggal Kembali</td>
            </tr>';
            $no = 1;
            foreach ($data AS $row) {
                $tabel_body.='<tr>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$no++.'</td>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$row->kode_peminjaman.'</td>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$row->nama_anggota.'</td>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$row->judul_buku.'</td>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.tgl_indo_medium($row->tgl_pinjam).'</td>
                                <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.tgl_indo_medium($row->tgl_kembali).'</td>
                            </tr>';
            }
$tabel_body.= '</table>';

// set some text to print
// $txt = <<<EOD
// TCPDF Example 002

// Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
// EOD;

// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->writeHTMLCell(0,0,'', '', $tabel_header, 0,1,0, true,'L',true);
$pdf->writeHTMLCell(0,0,'', '', $tabel_body, 0,1,0, true,'L',true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+