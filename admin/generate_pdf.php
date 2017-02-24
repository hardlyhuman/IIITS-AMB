<?php
include '../config.php';
require '../tcpdf/tcpdf.php';


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sanjeev Kumar');
$pdf->SetTitle('Attendance Management System PDF ');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data	
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' dlfd ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

/*
  class YourPDF extends TCPDF {
        public function Header()
		 {
            if (count($this->pages) === 1) 
			{
			 // Do this only on the first page
                $html .= '<p>Your header here</p>';
            }

            $this->writeHTML($html, true, false, false, false, '');
        }
    }
*/

$pdf->SetFont('Times', '', 11, '', false);
$pdf->setCellHeightRatio(2);


//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'S S MEDICORP', 'dfjld ');


// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.

//$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();






$html.="<hr>";
$html='<table class="table table-responsive table-hover">';

$html.="<tr><td></td><td>
<h2> All Students Attendance Details</h2></td></tr>";

$html.="<tr><td colspan='6'>&nbsp;</td></tr>";


$html.='                        <thead>
                            <tr>
                                <td>
                                    Sr. No.
                                </td>
                                <td>
                                  Student Name
								</td>
								
								<td>
                                  Teacher Name
								</td>
								
                                <td>
                                 Attended Lecture
					            </td>
								
								<td>
                                 Absent Lecture
					            </td>
                                <td>
                                Total
					       	    </td>
								 
								</tr>'; 
 $query=mysqli_query($con,"select * from student");
					  $i=1;
					  
while($rows=mysqli_fetch_array($query))
{
 // echo $rows['student_name'];
 $que=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."'");
$que_att=mysqli_query($con,"select * from attendance where stu_id='".$rows['id']."' and attendance='P' ");

$html.="<tr>";
						   
$html.= "<td>".$i++."</td>";
	
$html.= "<td>".$rows['name']."</td>";

//display teacher name
$teacher=mysqli_fetch_array($que);
$que1=mysqli_query($con,"select * from instructor where id='".$teacher['super_id']."'");
$teacher1=mysqli_fetch_array($que1);

$html.= "<td>".$teacher1['name']."</td>";



$html.= "<td>".mysqli_num_rows($que_att)."</td>";
$absent=mysqli_num_rows($que)-mysqli_num_rows($que_att);

$html.= "<td>".$absent."</td>";
$html.= "<td>".mysqli_num_rows($que)."</td>";

$html.="</tr>";

						                                                     
					   }
				
		$html.="			  </tbody>
					  </table>";
  





//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->writeHTML($html, true, false, false, false);

//for download PDF
//$pdf->Output('quotation_details.pdf', 'D');


//for opening PDF
$pdf->Output('quotation_details.pdf', 'I');


//Save download PDF
//$pdf->Output('quotation.pdf', 'D');

?>

