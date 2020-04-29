<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class TcpdfController extends Controller
{
    public function firstPage()
    {
        PDF::SetTitle('First Page');
        // remove default header/footer
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);

        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        PDF::AddPage();

        PDF::ImageSVG($file='img/tux.svg', $x=130, $y=176, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
 
        PDF::Output('firstPage.pdf');
    }

    public function secondPage()
    {
        PDF::SetTitle('Second Page');
        // remove default header/footer
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);

        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        
        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        PDF::AddPage();

        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dapibus ultrices in iaculis nunc sed augue lacus. Quam nulla porttitor massa id neque aliquam. Ultrices mi tempus imperdiet nulla malesuada. Eros in cursus turpis massa tincidunt dui ut ornare lectus. Egestas sed sed risus pretium. Lorem dolor sed viverra ipsum. Gravida rutrum quisque non tellus. Rutrum tellus pellentesque eu tincidunt tortor. Sed blandit libero volutpat sed cras ornare. Et netus et malesuada fames ac. Ultrices eros in cursus turpis massa tincidunt dui ut ornare. Lacus sed viverra tellus in. Sollicitudin ac orci phasellus egestas. Purus in mollis nunc sed. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Interdum consectetur libero id faucibus nisl tincidunt eget.';
        $background_text = str_repeat($text, 5);
        PDF::MultiCell(0, 5, $background_text, 0, 'J', 0, 2, '', '', true, 0, false);
        
        PDF::Image('img/confidential.png', 10, 70, 185, '', '', '', '', false, 300);
 
        PDF::Output('secondPage.pdf', 'I');
    }
 
    public function downloadPDF()
    {    
        $view = \View::make('example');
        $html_content = $view->render();
        
        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
 
        PDF::Output(uniqid().'_SamplePDF.pdf', 'D');
    }
 
}
