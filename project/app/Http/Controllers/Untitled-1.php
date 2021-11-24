<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;  
use setasign\Fpdi;
use TCPDF_FONTS;
 
class FillPDFController extends Controller
{
    public function process(Request $request)
    { 

        $reportype = $request->reportype;


        $pdf = new Fpdi\TcpdfFpdi();
		// $pdf = new \TCPDF("L", "mm", "A4", true, "UTF-8" );	// pdf テンプレートを使わない場合はこちら

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
 
        if($reportype == 'temp01') {

            //input_page_1 : 1~102

            $w_year = $request->w_year;
            $w_month = $request->w_month;
            $w_day = $request->w_day;
            $facility_name = $request->facility_name;
            $manifacturer = $request->manifacturer;
            $power01 = $request->power01;
            $power02 = $request->power02;
            $power03 = $request->power03; 
            $motor = $request->motor;
            $generator = $request->generator;
            $reduce_product = $request->reduce_product; 

            $motor_body_img01 = $request->file('motor_body_img01');
            $motor_body_img02 = $request->file('motor_body_img02');
            $motor_body_img03 = $request->file('motor_body_img03');
            $motor_body_img04 = $request->file('motor_body_img04');

            $fileName01 = '';
            $fileName02 = '';
            $fileName03 = '';
            $fileName04 = '';

            $destinationPath = 'uploads';

            if($motor_body_img01 != null) {
                $fileName01 = "moto01".date('Ymdhis').".".$motor_body_img01->getClientOriginalExtension();
                $motor_body_img01->move($destinationPath,$fileName01);
            }

            if($motor_body_img02 != null) {
                $fileName02 = "moto02".date('Ymdhis').".".$motor_body_img02->getClientOriginalExtension();
                $motor_body_img02->move($destinationPath,$fileName02);
            }

            if($motor_body_img03 != null) {
                $fileName03 = "moto03".date('Ymdhis').".".$motor_body_img03->getClientOriginalExtension();
                $motor_body_img03->move($destinationPath,$fileName03);
            }

            if($motor_body_img04 != null) {
                $fileName04 = "moto03".date('Ymdhis').".".$motor_body_img04->getClientOriginalExtension();
                $motor_body_img04->move($destinationPath,$fileName04);
            }
            

            $place01 = $request->place01;
            $place02 = $request->place02;
            $place03 = $request->place03; 

            $reason01 = $request->reason01;
            $reason02 = $request->reason02;
            $reason03 = $request->reason03; 
            
            //input_page_2 : 111~

            $im_year = $request->im_year;  //111
            $im_month = $request->im_month;//112
            $im_day = $request->im_day; //113
            $im_facility_name = $request->im_facility_name;
            $im_fac_address = $request->im_fac_address;     

            $p2_power = $request->p2_power;
            $p2_seri = $request->p2_seri;
            $p2_pow_year = $request->p2_pow_year;
            $p2_pow_amount = $request->p2_pow_amount;          
            
            $jonji = $request->jonji;              
            $serial = $request->serial;              
            $power_num = $request->power_num;              
            $body_year = $request->body_year;              
            $exc_year = $request->exc_year;   
            
            $潤滑油_ae = $request->潤滑油_ae;   
            $潤滑油_result = $request->潤滑油_result;   
            $潤滑油_date = $request->潤滑油_date;            
            
            $冷却水_ae = $request->冷却水_ae;            
            $冷却水_result = $request->冷却水_result;            
            $冷却水_date = $request->冷却水_date;           
            
            $ゴムホース_ae = $request->ゴムホース_ae;           
            $ゴムホース_result = $request->ゴムホース_result;           
            $ゴムホース_date = $request->ゴムホース_date;                      
            
            $Vベルト_ae = $request->Vベルト_ae;                      
            $Vベルト_result = $request->Vベルト_result;                      
            $Vベルト_date = $request->Vベルト_date;                      
            
            $蓄電池_ae = $request->蓄電池_ae;                      
            $蓄電池_result = $request->蓄電池_result;                      
            $蓄電池_date = $request->蓄電池_date;                      
            
            $触媒栓_ae = $request->触媒栓_ae;                      
            $触媒栓_result = $request->触媒栓_result;                      
            $触媒栓_date = $request->触媒栓_date; 
            
            $フィルター_ae = $request->フィルター_ae; 
            $フィルター_result = $request->フィルター_result; 
            $フィルター_date = $request->フィルター_date; 
            
            $燃料燃料_ae = $request->燃料燃料_ae; 
            $燃料燃料_result = $request->燃料燃料_result; 
            $燃料燃料_date = $request->燃料燃料_date; 
            
            $燃料_ae = $request->燃料_ae; 
            $燃料_result = $request->燃料_result; 
            $燃料_date = $request->燃料_date; 
            
            $予備_ae = $request->予備_ae; 
            $予備_result = $request->予備_result; 
            $予備_date = $request->予備_date; 
            
            $prod_name_ttl = $request->prod_name_ttl; 
            $prod_name = $request->prod_name; 
            $prod_failur_ttl = $request->prod_failur_ttl; 
            $prod_failur = $request->prod_failur; 
            $prod_reason_ttl = $request->prod_reason_ttl; 
            $prod_reason = $request->prod_reason; 
            
            $motor_body_img01 = $request->motor_body_img01; 
            $motor_body_img02 = $request->motor_body_img02; 
            $motor_body_img03 = $request->motor_body_img03; 
            $motor_body_img04 = $request->motor_body_img04; 


            $pdf->setSourceFile(resource_path('pdf/temp01.pdf'));  

            // page 1
    
            $page = $pdf->importPage(1);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 12,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(60,27, $w_year);
            $pdf->Text(83.5,27.2, $w_month);
            $pdf->Text(103.5,27.2, $w_day);

            $pdf->Text(83.5,77, $facility_name);

            $pdf->Text(129,95.6, $manifacturer);
            $pdf->Text(85,112, $power01);
            $pdf->Text(120,112, $power02);
            $pdf->Text(155,112, $power03);

            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 12,'',true);
            $pdf->SetTextColor(255,0,0);

            $pdf->Text(110,136, $motor);
            $pdf->Text(110,148, $generator);
            $pdf->Text(110,162, $reduce_product);

            $pdf->Text(38,201, $place01);
            $pdf->Text(38,214, $place02);
            $pdf->Text(38,227, $place03);
    
            $pdf->Text(75,201, $reason01);
            $pdf->Text(75,214, $reason02);
            $pdf->Text(75,227, $reason03);
            
            // page 2
    
            $page = $pdf->importPage(2);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 12,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(0,0,'.(0,0)');
                //table block 1        
            $pdf->Text(35,26,'.111');
            $pdf->Text(50,26,'.112');
            $pdf->Text(65,26,'.113');
            $pdf->Text(115,26,'.121');
            $pdf->Text(115,33,'.131');
            $pdf->Text(51,37,'.141');
            $pdf->Text(124,44,'.142');
            $pdf->Text(51,44,'.151');
            $pdf->Text(122,51,'.152');
            $pdf->Text(48,51,'.161');
            $pdf->Text(125,58,'.162');
            $pdf->Text(47,58,'.171');
            $pdf->Text(179,44,'.172');
            $pdf->Text(179,51,'.173');
                //table block 2   ???180  
            $pdf->Text(27,26,'.180');
            $pdf->Text(73,75,'.181');
            $pdf->Text(180,75,'.182');
            $pdf->Text(27,82,'.190');
            $pdf->Text(73,82,'.191');
            $pdf->Text(180,82,'.192');
            $pdf->Text(27,89,'.200');
            $pdf->Text(73,89,'.201');
            $pdf->Text(180,89,'.202');
            $pdf->Text(27,96,'.210');
            $pdf->Text(73,96,'.211');
            $pdf->Text(180,96,'.212');
            $pdf->Text(27,103,'.220');
            $pdf->Text(73,103,'.221');
            $pdf->Text(180,103,'.222');
            $pdf->Text(27,110,'.230');
            $pdf->Text(73,110,'.231');
            $pdf->Text(180,110,'.232');
            $pdf->Text(27,117,'.240');
            $pdf->Text(73,117,'.241');
            $pdf->Text(180,117,'.242');
            $pdf->Text(27,124,'.250');
            $pdf->Text(73,124,'.251');
            $pdf->Text(180,124,'.252');
            $pdf->Text(27,131,'.260');
            $pdf->Text(73,131,'.261');
            $pdf->Text(180,131,'.262');
            $pdf->Text(27,138,'.270');
            $pdf->Text(73,138,'.271');            
            $pdf->Text(180,138,'.272');
                //table block 3
            $pdf->Text(17,145,'.281');
            $pdf->Text(44,145,'.282');
            $pdf->Text(65,145,'.283');
            $pdf->Text(17,152,'.291');
            $pdf->Text(44,152,'.292');
            $pdf->Text(65,152,'.293');
            
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');
            $pdf->Text(65,26,'.271');

    
            // page 3
            $page = $pdf->importPage(3);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(105,33.6,'2021');        
            $pdf->Image(public_path('uploads/').$fileName01, '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName02, '64', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName03, '102', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName04, '140', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
    
            // page 4
            $page = $pdf->importPage(4);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(105,33.6,'2021');        
            $pdf->Image(resource_path('uploads/').$fileName01, '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('uploads/').$fileName02, '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('uploads/').$fileName03, '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
    
            // page 5
            $page = $pdf->importPage(5);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(105,33.6,'2021');        
            $pdf->Image(resource_path('img/sample.png'), '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
    
            // page 6
            $page = $pdf->importPage(6);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(105,33.6,'2021');        
            $pdf->Image(resource_path('img/sample.png'), '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
    
    
            // page 7
            $page = $pdf->importPage(7);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothil.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            $pdf->Text(105,33.6,'2021');        
            $pdf->Image(resource_path('img/sample.png'), '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
        }

         
 

	 	$pdf->Output("output.pdf", "I");
         
    }
 
    
}