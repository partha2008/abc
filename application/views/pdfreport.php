<?php
	tcpdf();

	// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {

		protected $header = '';

		//Page header
		public function Header() {

			$this->Rect(0,0,$this->getPageWidth(),$this->getPageHeight(),'F','',$fill_color = array(242, 238, 227));	

			// Define the path to the image that you want to use as watermark.
        	$img_file = base_url('resources/images/blue.png');

        	$this->Image($img_file, 80, 100, 50, 50, '', '', '', false, 0);

			// Set font
			$this->SetFont('courier', 'B', 10);

			$this->SetTextColor(48, 159, 255);

			$this->writeHTMLCell(60, '', 15, $this->getY()+3, $this->donor, 0, 0, 0, true, 'R', true);

			$this->writeHTMLCell(80, '', $this->getX()+5, $this->getY(), $this->address, 0, 0, 0, true, 'L', true);

			$this->writeHTMLCell(40, '', $this->getX()-5, $this->getY(), "Date: ".date("d/m/Y", $this->downloaded_date), 0, 0, 0, true, 'R', true);

			$this->SetLineStyle( array( 'width' => 0.50, 'color' => array(174, 51, 53)));

			$this->Line(6,6, $this->getPageWidth()-6,6); 

			$this->Line($this->getPageWidth()-6,6, $this->getPageWidth()-6, $this->getPageHeight()-6);
			$this->Line(6, $this->getPageHeight()-6, $this->getPageWidth()-6, $this->getPageHeight()-6);
			$this->Line(6,6,6, $this->getPageHeight()-6);	
		}

		// Page footer
		public function Footer() {
			//$this->SetLineStyle( array( 'width' => 0.40, 'color' => array(153, 204, 0)));
			//$this->Line(10, $this->y-5, $this->w - 10, $this->y-5);
			// Position at 15 mm from bottom
			$this->SetY(-15);
			// Set font
			$this->SetFont('courier', 'I', 8);
			// Page number
			//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->donor = 'Donor Code: '.$donor_code.'/'.$invoice_name;
	$pdf->address = "Email: ".$admin_profile->email."\nWhatsapp: ".$admin_profile->contact_no;
	$pdf->downloaded_date = $downloaded_date;

	$pdf->SetTitle($invoice_name);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// add a page
	$pdf->AddPage();

	//$pdf->SetFillColor('#FFFF00');
	//$pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'DF', "");
	
	$pdf->SetFont('courier', '', 11);

	$cart_data_html = '<style>
				th{
                	background-color: #2F4F4F;
  					color: #ffffff;
  					border: 1px solid #D3D3D3;
                }
                td {
                    border: 1px solid #D3D3D3;
                }
                table{
                	border-collapse: collapse;
                }                
                </style>';

	$cart_data_html .= '<table cellspacing="0" cellpadding="1">';
	$cart_data_html .= '<thead>';
	$cart_data_html .= '<tr><th align="center" width="40px"><b>Sl No</b></th><th align="center" width="430px"><b>Name</b></th><th align="center" width="50px"><b>Price</b></th><th align="center" width="120px"><b>PNR No</b></th></tr>';
	$cart_data_html .= '</thead>';
	$cart_data_html .= '<tbody>';

	$pdf->SetTextColor(0,0,128);

	if(!empty($parents)){
		$counter = 10;
		foreach ($parents as $parent) {
			$state = $this->defaultdata->grabStateData(array("state_id" => $parent->state_id));
			$payments = $this->config->item('payment');
			$index = explode('-', $invoice_name)[1];
			$payment = (isset($payments[$index][$counter])) ? $payments[$index][$counter] : 0;
			if($payment == 0)
				$adress = '';
			else
				$adress = $parent->address.','.$parent->city.','.$parent->district.','.$parent->post_code.','.$state[0]->name;

			$cart_data_html .= '<tr><td align="center" width="40px">'.$counter.'</td><td align="center" width="430px"><b>'.$parent->first_name.' '.$parent->last_name.'('.$parent->sponsor_id.')</b><br>'.$adress.'</td><td align="center" width="50px">'.$payment.'</td><td align="center" width="120px"></td></tr>';

			$counter--;
		}
	}
	$cart_data_html .= '</tbody>';
	$cart_data_html .= '</table>';

	$pdf->writeHTML($cart_data_html, true, false, false, false, 'C');

	$cart_data_html = '<table cellspacing="0" cellpadding="1" border="0">';
	$cart_data_html .= '<thead>';
	$cart_data_html .= '<tr><td>Full Name:______________________________ Mobile:_____________________________</td></tr>';
	$cart_data_html .= '<tr><td></td></tr>';
	$cart_data_html .= '<tr><td>Email:________________________________ Donor Id:_____________________________</td></tr>';
	$cart_data_html .= '<tr><td></td></tr>';
	$cart_data_html .= '<tr><td>Address:___________________________________ Pin:_____________________________</td></tr>';
	$cart_data_html .= '</thead>';
	$cart_data_html .= '</table>';

	$pdf->writeHTML($cart_data_html, true, false, false, false, 'C');

	//Close and output PDF document
	$pdf->Output($invoice_name.'.pdf', 'D');
?>