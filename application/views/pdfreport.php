<?php
	tcpdf();

	// Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {
		//Page header
		public function Header() {
			// Set font
			$this->SetFont('courier', '', 10);

			$this->writeHTMLCell(60, '', 10, $this->getY(), $this->donor, 0, 0, 0, true, 'R', true);

			$this->writeHTMLCell(80, '', $this->getX()+10, $this->getY(), $this->address, 0, 0, 0, true, 'L', true);

			$this->writeHTMLCell(40, '', $this->getX(), $this->getY(), "Date: ".date("d/m/Y", $this->downloaded_date), 0, 0, 0, true, 'R', true);

			$this->Line(10, $this->y+10, $this->w - 10, $this->y+10);
		}

		// Page footer
		public function Footer() {
			$this->Line(10, $this->y-5, $this->w - 10, $this->y-5);
			// Position at 15 mm from bottom
			$this->SetY(-15);
			// Set font
			$this->SetFont('courier', 'I', 8);
			// Page number
			$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->donor = 'Donor Code: '.$donor_code.'/'.$invoice_name;
	$pdf->address = "Email: ".$admin_profile->email."\nWhatsapp: ".$admin_profile->contact_no;
	$pdf->downloaded_date = $downloaded_date;

	// set document information
	//$pdf->SetCreator(PDF_CREATOR);
	//$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle($invoice_name);
	//$pdf->SetSubject('TCPDF Tutorial');
	//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set font
	$pdf->SetFont('courier', 'BI', 12);

	// add a page
	$pdf->AddPage();

	$style = array(
		'position' => '',
		'align' => 'C',
		'stretch' => false,
		'fitwidth' => true,
		'cellfitalign' => '',
		'border' => true,
		'hpadding' => 'auto',
		'vpadding' => 'auto',
		'fgcolor' => array(0,0,0),
		'bgcolor' => false, //array(255,255,255),
		'text' => true,
		'font' => 'helvetica',
		'fontsize' => 8,
		'stretchtext' => 4
	);
	
	$pdf->SetFont('courier', '', 11);

	$cart_data_html = '<table cellspacing="0" cellpadding="1" border="1">';
	$cart_data_html .= '<thead>';
	$cart_data_html .= '<tr><th align="center" width="40px"><b>Sl No</b></th><th align="center" width="430px"><b>Name</b></th><th align="center" width="50px"><b>Price</b></th><th align="center" width="120px"><b>PNR No</b></th></tr>';
	$cart_data_html .= '</thead>';
	$cart_data_html .= '<tbody>';
	if(!empty($parents)){
		$counter = 10;
		foreach ($parents as $parent) {
			$state = $this->defaultdata->grabStateData(array("state_id" => $parent->state_id));
			$adress = $parent->address.','.$parent->city.','.$parent->district.','.$parent->post_code.','.$state[0]->name;

			$payments = $this->config->item('payment');
			$index = explode('-', $invoice_name)[1];
			$payment = (isset($payments[$index][$counter])) ? $payments[$index][$counter] : 0;

			$cart_data_html .= '<tr><td align="center" width="40px">'.$counter.'</td><td align="center" width="430px">'.$parent->first_name.' '.$parent->last_name.'<b>('.$parent->sponsor_id.')</b> '.$adress.'</td><td align="center" width="50px">'.$payment.'</td><td align="center" width="120px"></td></tr>';

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
	$pdf->Output($invoice_name.'.pdf', 'I');
?>