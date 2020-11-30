
	<?php //cadastro.php

#----------------------------------------------------------------------------------------------------
require('../../../fpdf182/fpdf.php');

class PDF extends FPDF
{
   // Page header
function Header()
{
	// Logo
	$this->Image('../img/BSGI-logo3c.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(50,10,'Lista de Eventos',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
} 
// Load data
function LoadData()
{
  // lista cursos cadastrados

 include_once "../inc/conectabd.inc.php";

// lista cursos já cadastrados
$query = "SELECT id_evento, id_organizacao, id_tipo_evento, titulo, date_format(data_evento,'%d-%m-%y  %H:%i') as data_evento, CEP_evento, id_cidade_evento,  
logradouro_evento, num_evento, complemento_evento, bairro_evento FROM tb_evento;";
if ($result = mysqli_query($link, $query)) {

	// busca os dados lidos do banco de dados
	while ($row = mysqli_fetch_assoc($result)) {
		$id_evento = $row["id_evento"];
		$id_organizacao = $row["id_organizacao"];
		$id_tipo_evento = $row["id_tipo_evento"];
		$titulo = $row["titulo"];		
		$data_evento = $row["data_evento"];
		
		$id_cidade_evento = $row["id_cidade_evento"];
		$logradouro_evento = $row["logradouro_evento"];
		$num_evento = $row["num_evento"];
		$complemento_evento = $row["complemento_evento"];
		$bairro_evento = $row["bairro_evento"];
		
		$data[] = array($id_evento, $id_organizacao, $id_tipo_evento, $titulo, $data_evento, $id_cidade_evento,
		$logradouro_evento, $num_evento,  $bairro_evento);
	}

	// libera a área de memória onde está o resultado
	mysqli_free_result($result);
}
// fecha a conexão
mysqli_close($link);
  return $data;
}

// Colored table
function FancyTable($header, $data)
{
  // Colors, line width and bold font
  $this->SetFillColor(255,0,0);
  $this->SetTextColor(255);
  $this->SetDrawColor(128,0,0);
  $this->SetLineWidth(.3);
  $this->SetFont('','B');
  // Header
  $w = array(6,7,7,20,26,8,63,6,55);
  for($i=0;$i<count($header);$i++)
	  $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
  $this->Ln();
  // Color and font restoration
  $this->SetFillColor(224,235,255);
  $this->SetTextColor(0);
  $this->SetFont('');
  // Data
  $fill = false;
  foreach($data as $row)
  {
	  $this->Cell($w[0],6,number_format($row[0]),'LR',0,'R',$fill);
	  $this->Cell($w[1],6,number_format($row[1]),'LR',0,'R',$fill);
	  $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
	  $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
	  $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
	  $this->Cell($w[5],6,number_format($row[5]),'LR',0,'R',$fill);
	  
	  $this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
	  $this->Cell($w[7],6,$row[7],'LR',0,'L',$fill);
	  
	  $this->Cell($w[8],6,$row[8],'LR',0,'L',$fill);
	  $this->Ln();
	  $fill = !$fill;
  }
  // Closing line
  $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
// Column headings
$header = array('Id', 'Org.', 'Tipo', 'Titulo', 'Dt.Hora',  'Cid.', 'Logradouro', 'N.',  'Bairro');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();

#----------------------------------------------------------------------------------------------------
?>  

