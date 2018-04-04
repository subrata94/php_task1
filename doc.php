<?php
// header('Content-type: application/pdf');
// header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
// header('Content-Transfer-Encoding: binary');
// readfile($filename);
$timestamp = time();
if(!empty($_FILES['uploadedfile']['name'])){ 
    $filepath = "images/" . $timestamp . $_FILES["uploadedfile"]["name"];
    
    if(!move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $filepath)) {
        //echo "<img src=\"".$filepath."\" height=200 width=300 /><br>{$_FILES["file"]["name"]}";
        //echo $_FILES['uploadedfile']['name'];
    } 
    showPdf();
    // else {
    //     require '../db/Database.php';
    //     $db = new Database();
    //     $res = $db->insert("insert into details(name,email,marks,pic,mobile) values('{$_POST['name']}','{$_POST['email']}','{$_POST['marks']}','{$filepath}','{$_POST['mob']}')");
    //     echo $res;
    // }
} 


function showPdf(){
    require 'fpdf/fpdf.php';
    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();
    
    $pdf->Rect(5,5,200,288,D);
    $pdf->Rect(153,14.3,42,48,D);
    $pdf->Image("images/{$_FILES["uploadedfile"]["name"]}",155,16,38,44,'PNG');
    $pdf->SetFont("Arial","",16);
    $pdf->Ln(5);
    $pdf->Cell(0,10,"Details",0,1,C);
    $pdf->Ln(10);
    $pdf->Cell(0,10,"Full Name:     {$_POST['name']}",0,1,'');
    
    
    $pdf->Ln(8);
    $pdf->Cell(0,10,"Mobile No:     {$_POST['mob']}",0,1);
    $pdf->Ln(8);
    $pdf->Cell(0,10,"Email Id:        {$_POST['email']}",0,1);
    $pdf->Ln(8);
    //$pdf->Ln(20);
    $pdf->Cell(0,10,"Marks:",0,1,'');
    $pdf->Ln(1);
    $pdf->Cell(0,10,"Marks",1,1,C);
    $data = explode("\n",$_POST['marks']);
    foreach($data as $d){
        $dd = explode("|",$d);
            $pdf->Cell(150,10,$dd[0],1,0);
            $pdf->Cell(40,10,$dd[1],1,1,C);        
    }
    // $pdf->Cell(150,10,"English",1,0);
    // $pdf->Cell(40,10,"90",1,1,C);
    
    // $pdf->Cell(150,10,"Math",1,0);
    // $pdf->Cell(40,10,"80",1,1,C);
    // $pdf->output();
    $pdf->output(F,"images/{$_POST['fname']}.pdf");
    // $pdf->output(D);
    $pdf->output(D,"resume_{$_POST['fname']}.pdf");
    $pdf->output();
    //$pdf->output("tokens.pdf","D");
}



