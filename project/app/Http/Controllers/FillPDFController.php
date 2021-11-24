<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;  
use setasign\Fpdi;
use TCPDF_FONTS;
use PDF;
 
class FillPDFController extends Controller
{
    public function process(Request $request)
    { 
        
        $reportype = $request->reportype;

        $pdf = new Fpdi\TcpdfFpdi();
		// $pdf = new \TCPDF("L", "mm", "A4", true, "UTF-8" );	// pdf テンプレートを使わない場合はこちら

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
 
// temp01 : 自家発電設備点検報告書 : Private power generation facility inspection report
        if($reportype == 'temp01') {

            //temp01.pdf insert
            $pdf->setSourceFile(resource_path('pdf/temp01.pdf'));  

    //page 1 : start
        //page 1_pdf_code
            $page = $pdf->importPage(1);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 12,'',true);
            $pdf->SetTextColor(0,0,0);

    //page 1_variable and position
    //page_1_title
        //row1 : date
            $w_year = $request->w_year;
            $pdf->Text(57,27, $w_year);

            $w_month = $request->w_month;
            $pdf->Text(83.5,27.2, $w_month);

            $w_day = $request->w_day;
            $pdf->Text(102.5,27.2, $w_day);
        //row 2
            $pdf->SetFont($font_1 , '', 16,'',true);

            $facility_name = $request->facility_name;
            $pdf->Text(83.5,77.3, $facility_name);
        //row 3
            $pdf->SetFont($font_1 , '', 12,'',true);

            $manifacturer = $request->manifacturer;
            $manifacturer_array = mb_str_split($manifacturer, 8);
            for ($i=0; $i < sizeof($manifacturer_array); $i++) { 
                if (sizeof($manifacturer_array) == 1) {
                    $pdf->Text(129,95.6, $manifacturer);
                }else{
                    $pdf->Text(129  ,93 + 5 * $i, $manifacturer_array[$i]);  
                }
            }
            // $pdf->Text(129,95.6, $manifacturer);
        //row 4
            $power01 = $request->power01;
            $pdf->Text(80,112, $power01);

            $power02 = $request->power02;
            $pdf->Text(120,112, $power02);

            $power03 = $request->power03; 
            $pdf->Text(155,112, $power03);

        //page 1_font, color select
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 12,'',true);
            $pdf->SetTextColor(0,0,0);

    //page 1_table_1
        //row 1
            $motor = $request->motor;
            $pdf->Text(110,136, $motor);
        //row 2
            $generator = $request->generator;
            $pdf->Text(110,148, $generator);
        //row 3
            $reduce_product = $request->reduce_product; 
            $pdf->Text(110,162, $reduce_product);

    //page 1_table_2\
        //row 1
            $place01 = $request->place01;
            $pdf->Text(38,201, $place01);
            $reason01 = $request->reason01;
            $pdf->Text(75,201, $reason01);
        //row 2
            $place02 = $request->place02;
            $pdf->Text(38,214, $place02);
            $reason02 = $request->reason02;
            $pdf->Text(75,214, $reason02);
          
        //row 3
            $place03 = $request->place03; 
            $pdf->Text(38,227, $place03);
        //  letter overflow exception!
            $reason03 = $request->reason03; 
            $reason03_array = mb_str_split($reason03, 20);
            for ($i=0; $i < sizeof($reason03_array); $i++) { 
                if (sizeof($reason03_array) == 1) {
                    $pdf->Text(75,227, $reason03);
                }else{
                    $pdf->Text(75  ,224 + 5 * $i, $reason03_array[$i]);  
                }
            }
        //  endletter overflow exception!
        //end page 1 : table_2
    //end page 1

    //page_2 start!
        //page_2 : pdf_code
            $page = $pdf->importPage(2);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 12,'',true);
            $pdf->SetTextColor(0,0,0);
        //page_2 : date
            $im_year = $request->im_year;
            $pdf->Text(35,26,$im_year);

            $im_month = $request->im_month;
            $pdf->Text(50,26,$im_month);

            $im_day = $request->im_day;
            $pdf->Text(65,26,$im_day);
    //page_2 : table_1
        //row 1
            $p2_power = $request->p2_power;
            $pdf->Text(51,37,$p2_power);
        //row 2
            $p2_seri = $request->p2_seri;
            $pdf->Text(51,44,$p2_seri);
        //row 3
            $p2_pow_year = $request->p2_pow_year;
            $pdf->Text(48,51,$p2_pow_year);
        //row 4
            $p2_pow_amount = $request->p2_pow_amount;          
            $pdf->Text(47,58,$p2_pow_amount);
        //end page 2 : table_1

    //page_2 : table_2
        //row 1
            $im_facility_name = $request->im_facility_name;
            $pdf->Text(115,26,$im_facility_name);
        //row 2
            $im_fac_address = $request->im_fac_address;     
            $pdf->Text(115,33,$im_fac_address);
        //end page 2 : table_2

    //page_2 : table_3
            $jonji = $request->jonji;    
            $pdf->Text(124,44,$jonji);
        //row 1
            $serial = $request->serial;  
            $pdf->Text(122,51,$serial);
        //row 2
            $power_num = $request->power_num;  
            $pdf->Text(125,58,$power_num);

            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);

        //row 3
            $body_date = $request->body_date;  
            if ($body_date != null) {
                $body_date_array = explode("-", $body_date); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $body_year = $body_date_array[0]; //2021
                $body_month = $body_date_array[1] ; //11
                // $body_day = $body_date_array[2]; //15
                $pdf->Text(181,44.5,$body_year);
                $pdf->Text(193,44.5,$body_month);
            }
            
        //row 4
            $exc_date = $request->exc_date;  
            if ($exc_date) {
                $exc_date_array = explode("-", $exc_date); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $exc_year = $exc_date_array[0]; //2021
                $exc_month = $exc_date_array[1] ; //11
                // $exc_day = $exc_date_array[2]; //15
                $pdf->Text(181,51.5,$exc_year);
                $pdf->Text(193,51.5,$exc_month);
            }
            
        //end page 2 : table_3
            
    //page_2 : table_4  
        //row 1
            $潤滑油_ae = $request->潤滑油_ae;  
            $潤滑油_result = $request->潤滑油_result;   
            $潤滑油_date = $request->潤滑油_date; 
            
        //row 2
            $冷却水_ae = $request->冷却水_ae;   
            $冷却水_result = $request->冷却水_result;   
            $冷却水_date = $request->冷却水_date;  
        //row 3
            $ゴムホース_ae = $request->ゴムホース_ae;   
            $ゴムホース_result = $request->ゴムホース_result;   
            $ゴムホース_date = $request->ゴムホース_date;    
        //row 4
            $Vベルト_ae = $request->Vベルト_ae;    
            $Vベルト_result = $request->Vベルト_result;     
            $Vベルト_date = $request->Vベルト_date;    
        //row 5
            $蓄電池_ae = $request->蓄電池_ae; 
            $蓄電池_result = $request->蓄電池_result; 
            $蓄電池_date = $request->蓄電池_date;   
        //row 6            
            $触媒栓_ae = $request->触媒栓_ae;       
            $触媒栓_result = $request->触媒栓_result; 
            $触媒栓_date = $request->触媒栓_date; 
        //row 7
            $フィルター_ae = $request->フィルター_ae; 
            $フィルター_result = $request->フィルター_result; 
            $フィルター_date = $request->フィルター_date; 
        //row 8
            $燃料燃料_ae = $request->燃料燃料_ae; 
            $燃料燃料_result = $request->燃料燃料_result; 
            $燃料燃料_date = $request->燃料燃料_date; 
            $pdf->Image(resource_path('img/month.png'), 179.7, 124.5, 20, 5, '', '', 'T', false, 100, '', false, false, 0, false, false, false);

        //row 9
            $燃料_ae = $request->燃料_ae; 
            $燃料_result = $request->燃料_result; 
            $燃料_date = $request->燃料_date; 
        //row 10            
            $予備_ae = $request->予備_ae; 
            $予備_result = $request->予備_result; 
            $予備_date = $request->予備_date; 
            
        //row 1 ~ row 10
            $array_ae = [$潤滑油_ae, $冷却水_ae, $ゴムホース_ae, $Vベルト_ae, $蓄電池_ae,  $触媒栓_ae, $フィルター_ae, $燃料燃料_ae, $燃料_ae, $予備_ae];
            $array_date_10n = [$潤滑油_date, $冷却水_date, $ゴムホース_date, $Vベルト_date, $蓄電池_date,  $触媒栓_date, $フィルター_date, $燃料燃料_date, $燃料_date, $予備_date];
            $array_result_10n = [$潤滑油_result, $冷却水_result, $ゴムホース_result, $Vベルト_result, $蓄電池_result, $触媒栓_result, $フィルター_result, $燃料燃料_result, $燃料_result, $予備_result];
            
            for ($i=0; $i < 10; $i++) { 
                $ae = $array_ae[$i];
                $date_10n_i = $array_date_10n[$i];
                $result_10n_i = $array_result_10n[$i];
            //ae row 1 ~ ROW 10
                $fileName_round_ae = $ae . ".png";
                
                if ($ae == "a") {
                    $x_i = 0;
                }elseif ($ae == "b") {
                    $x_i = 1;
                }
                elseif ($ae == "c") {
                    $x_i = 2;
                }elseif ($ae == "d") {
                    $x_i = 3;
                }
                elseif ($ae == "e") {
                    $x_i = 4;
                }

                $round_x0 = 26.7;
                $round_y0 = 74;
                $delta_round_x = 7.8;
                $delta_round_y = 7;
                $pdf->Image(resource_path('img/round_').$fileName_round_ae, $round_x0 + $delta_round_x * $x_i, $round_y0 + $delta_round_y * $i, 7.6, 7, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
                //ae row 1 ~ ROW 10

            //result row 1 ~ row 10
                $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
                $pdf->SetFont($font_2 , '', 6,'',true); 
                $pdf->SetTextColor(0,0,0);
                if ($result_10n_i) {
                    $result_10n_x0 = 73;
                    $result_10n_y0 = 76;
                    $delta_result_10n_x = 0;
                    $delta_result_10n_y = 7;
                    $result_xi = $result_10n_x0 + $delta_result_10n_x * $i;
                    $result_yi = $result_10n_y0 + $delta_result_10n_y * $i;
                //  letter overflow exception!
                    $result_10n_i_array = mb_str_split($result_10n_i, 37);
                    for ($j=0; $j < sizeof($result_10n_i_array); $j++) { 
                        if (sizeof($result_10n_i_array) == 1) {
                            $pdf->Text($result_xi, $result_yi, $result_10n_i_array[$j]);
                            // $pdf->Text($result_xi, $result_yi, $j);
                        }else{
                            $pdf->Text($result_xi  ,$result_yi - 1 + 3 * $j, $result_10n_i_array[$j]);  
                        }
                    }
                //  end letter overflow exception!
            //end result row 1 ~ row 10

            //date row 1 ~ row 10
                $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
                $pdf->SetFont($font_2 , '', 9,'',true);
                $pdf->SetTextColor(0,0,0);
                if ($date_10n_i) {
                    $date_array = explode("-", $date_10n_i); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                    $year = $date_array[0]; //2021
                    $month = $date_array[1] ; //11

                    $date_10n_x0 = 182.7;
                    $date_10n_y0 = 76;
                    $delta_date_10n_x = 0;
                    $delta_date_10n_y = 7;
                    $year_xi = $date_10n_x0 + $delta_date_10n_x * $i;
                    $year_yi = $date_10n_y0 + $delta_date_10n_y * $i;
                    $month_xi = $year_xi + 10;
                    $month_yi = $year_yi;

                    $pdf->Text($year_xi,$year_yi,$year);
                    $pdf->Text($month_xi,$month_yi,$month);
                } 
                //end date row 1 ~ row 10
            
                } 
                
            }
            // end row 1 ~ row10
            
        //row 11
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 6,'',true); 
            $pdf->SetTextColor(0,0,0);

            $prod_name_ttl = $request->prod_name_ttl; 
            $pdf->Text(17,147,$prod_name_ttl);
            $prod_failur_ttl = $request->prod_failur_ttl; 
            $pdf->Text(44,147,$prod_failur_ttl);
            $prod_reason_ttl = $request->prod_reason_ttl; 
            $prod_reason_ttl_array = mb_str_split($prod_reason_ttl, 63);
            for ($i=0; $i < sizeof($prod_reason_ttl_array); $i++) { 
                if (sizeof($prod_reason_ttl_array) == 1) {
                    $pdf->Text(65,147, $prod_reason_ttl);
                }else{
                    $pdf->Text(65  ,147 - 2 + 3 * $i, $prod_reason_ttl_array[$i]);  
                }
            }
        //row 12
            $prod_name = $request->prod_name; 
            $pdf->Text(11,154,$prod_name);
            $prod_failur = $request->prod_failur; 
            $pdf->Text(44,154,$prod_failur);
            $prod_reason = $request->prod_reason; 
            //  letter overflow exception!
            $prod_reason_array = mb_str_split($prod_reason, 63);
            for ($i=0; $i < sizeof($prod_reason_array); $i++) { 
                if (sizeof($prod_reason_array) == 1) {
                    $pdf->Text(65,154, $prod_reason);
                }else{
                    $pdf->Text(65  ,154 - 2 + 3 * $i, $prod_reason_array[$i]);  
                }
            }
            //  endletter overflow exception!
        //end page 2 : table_4

            //page_2 : table_5
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true); 
            $pdf->SetTextColor(0,0,0);
            //page_2 : table_5_1 (index = 0)
            //row 1
            $voltage_establishment_0 = $request->voltage_establishment_0; 
            $pdf->Text(31,170, $voltage_establishment_0);
            //row 2 
            $votage_0 = $request->votage_0; 
            $frequency_0 = $request->frequency_0; 
            $rotation_speed_0 = $request->rotation_speed_0; 
            $hydraulic_0 = $request->hydraulic_0; 
            $oil_temperature_0 = $request->oil_temperature_0; 
            $water_temperature_0 = $request->water_temperature_0; 
            
            $pdf->Text(34,177, $votage_0);
            $pdf->Text(66,177, $frequency_0);
            $pdf->Text(96,177, $rotation_speed_0);
            $pdf->Text(124,177, $hydraulic_0);
            $pdf->Text(147,177, $oil_temperature_0);
            $pdf->Text(171,177, $water_temperature_0);
            
            //end page_2 : table_5_1

            //page_2 : table_5_2  (index = 1)
            //row1 (++x, +7)
            $votage_1 = $request->votage_1; 
            $frequency_1 = $request->frequency_1; 
            $rotation_speed_1 = $request->rotation_speed_1; 
            $hydraulic_1 = $request->hydraulic_1; 
            $oil_temperature_1 = $request->oil_temperature_1; 
            $water_temperature_1 = $request->water_temperature_1; 
            
            $pdf->Text(34,184, $votage_1);
            $pdf->Text(66,184, $frequency_1);
            $pdf->Text(96,184, $rotation_speed_1);
            $pdf->Text(124,184, $hydraulic_1);
            $pdf->Text(147,184, $oil_temperature_1);
            $pdf->Text(171,184, $water_temperature_1);

            //row 2 (++x, +7)
            $load_1 = $request->load_1; 
            $reference_value_1 = $request->reference_value_1; 
            $R_phase_1 = $request->R_phase_1; 
            $S_phase_1 = $request->S_phase_1; 
            $T_phase_1 = $request->T_phase_1; 

            $pdf->Text(34,191, $load_1);
            $pdf->Text(66,191, $reference_value_1);
            $pdf->Text(96,191, $R_phase_1);
            $pdf->Text(132,191, $S_phase_1);
            $pdf->Text(163,191, $T_phase_1);
            //end page_2 : table_5_2
            //end page_2 : table_5

            //page_2 : table_6 (index = 2)
            //row1 (++x, +7+4+7 = +18)
            $votage_2 = $request->votage_2; 
            $frequency_2 = $request->frequency_2; 
            $rotation_speed_2 = $request->rotation_speed_2; 
            $hydraulic_2 = $request->hydraulic_2; 
            $oil_temperature_2 = $request->oil_temperature_2; 
            $water_temperature_2 = $request->water_temperature_2; 

            $pdf->Text(34,202, $votage_2);
            $pdf->Text(66,202, $frequency_2);
            $pdf->Text(96,202, $rotation_speed_2);
            $pdf->Text(124,202, $hydraulic_2);
            $pdf->Text(147,202, $oil_temperature_2);
            $pdf->Text(171,202, $water_temperature_2);
            //row 2 (++x, +18)
            $load_2 = $request->load_2; 
            $reference_value_2 = $request->reference_value_2; 
            $R_phase_2 = $request->R_phase_2; 
            $S_phase_2 = $request->S_phase_2; 
            $T_phase_2 = $request->T_phase_2; 

            $pdf->Text(34,209, $load_2);
            $pdf->Text(66,209, $reference_value_2);
            $pdf->Text(96,209, $R_phase_2);
            $pdf->Text(132,209, $S_phase_2);
            $pdf->Text(163,209, $T_phase_2);
            //end page_2 : table_6

            //page_2 : table_7  (index = 3)
            //row1 (++x, +18)
            $votage_3 = $request->votage_3; 
            $frequency_3 = $request->frequency_3; 
            $rotation_speed_3 = $request->rotation_speed_3; 
            $hydraulic_3 = $request->hydraulic_3; 
            $oil_temperature_3 = $request->oil_temperature_3; 
            $water_temperature_3 = $request->water_temperature_3; 

            $pdf->Text(34,220, $votage_3);
            $pdf->Text(66,220, $frequency_3);
            $pdf->Text(96,220, $rotation_speed_3);
            $pdf->Text(124,220, $hydraulic_3);
            $pdf->Text(147,220, $oil_temperature_3);
            $pdf->Text(171,220, $water_temperature_3);
            //row 2  (++x, +18)
            $load_3 = $request->load_3; 
            $reference_value_3 = $request->reference_value_3; 
            $R_phase_3 = $request->R_phase_3; 
            $S_phase_3 = $request->S_phase_3; 
            $T_phase_3 = $request->T_phase_3; 

            $pdf->Text(34,227, $load_3);
            $pdf->Text(66,227, $reference_value_3);
            $pdf->Text(96,227, $R_phase_3);
            $pdf->Text(132,227, $S_phase_3);
            $pdf->Text(163,227, $T_phase_3);
            //end page_2 : table_7

            //page_2 : table_8  (index = 4)
            //row1 (++x, +14)
            $votage_4 = $request->votage_4; 
            $frequency_4 = $request->frequency_4; 
            $rotation_speed_4 = $request->rotation_speed_4; 
            $hydraulic_4 = $request->hydraulic_4; 
            $oil_temperature_4 = $request->oil_temperature_4; 
            $water_temperature_4 = $request->water_temperature_4;
            
            $pdf->Text(34,234, $votage_4);
            $pdf->Text(66,234, $frequency_4);
            $pdf->Text(96,234, $rotation_speed_4);
            $pdf->Text(124,234, $hydraulic_4);
            $pdf->Text(147,234, $oil_temperature_4);
            $pdf->Text(171,234, $water_temperature_4);
            //row 2 (++x, +14)
            $load_4 = $request->load_4; 
            $reference_value_4 = $request->reference_value_4; 
            $R_phase_4 = $request->R_phase_4; 
            $S_phase_4 = $request->S_phase_4; 
            $T_phase_4 = $request->T_phase_4; 

            $pdf->Text(34,241, $load_4);
            $pdf->Text(66,241, $reference_value_4);
            $pdf->Text(96,241, $R_phase_4);
            $pdf->Text(132,241, $S_phase_4);
            $pdf->Text(163,241, $T_phase_4);
            //end page_2 : table_8

            //page_2 : table_9  (index = 5)
            //row1 (++x, +14)
            $votage_5 = $request->votage_5; 
            $frequency_5 = $request->frequency_5; 
            $rotation_speed_5 = $request->rotation_speed_5; 
            $hydraulic_5 = $request->hydraulic_5; 
            $oil_temperature_5 = $request->oil_temperature_5; 
            $water_temperature_5 = $request->water_temperature_5; 

            $pdf->Text(34,248, $votage_5);
            $pdf->Text(66,248, $frequency_5);
            $pdf->Text(96,248, $rotation_speed_5);
            $pdf->Text(124,248, $hydraulic_5);
            $pdf->Text(147,248, $oil_temperature_5);
            $pdf->Text(171,248, $water_temperature_5);
            //row 2 (++x, +14)
            $load_5 = $request->load_5; 
            $reference_value_5 = $request->reference_value_5; 
            $R_phase_5 = $request->R_phase_5; 
            $S_phase_5 = $request->S_phase_5; 
            $T_phase_5 = $request->T_phase_5; 

            $pdf->Text(34,255, $load_5);
            $pdf->Text(66,255, $reference_value_5);
            $pdf->Text(96,255, $R_phase_5);
            $pdf->Text(132,255, $S_phase_5);
            $pdf->Text(163,255, $T_phase_5);
            //end page_2 : table_9

            //page_2 : table_10 
            $inspector_1 = $request->inspector_1; 
            $inspector_2 = $request->inspector_2; 
            $test_model = $request->test_model; 
            //(++x, +10)
            $pdf->Text(35,265, $inspector_1);
            $pdf->Text(89,265, $inspector_2);
            $pdf->Text(147,265, $test_model);
            //end page_2 : table_10
            //end page 2
            
            //page 3 start! 
            // page 3 : code
            $page = $pdf->importPage(3);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            // $pdf->Text(105,33.6,'2021');  
            //end page 3  : code

            //page 3 : table_1  (++x, +7)
            //page 3 : table_1_data table
            //row 1 : test date
            $test_year = $request->test_year; 
            $test_month = $request->test_month; 
            $test_day = $request->test_day; 

            $pdf->Text(107,33.5,$test_year); 
            $pdf->Text(128,33.5,$test_month); 
            $pdf->Text(146,33.5,$test_day); 
            //row 2~5 (x, ++7)
            $Name_facility = $request->Name_facility; 
            $address = $request->address; 
            $output_capacity = $request->output_capacity; 
            $start_time = $request->start_time; 

            $pdf->Text(95,41,$Name_facility); 
            $pdf->Text(95,47,$address); 

            
            $pdf->SetTextColor(0,0,0);

            $pdf->Text(90,53,$output_capacity); 
            $pdf->Text(70,60,$start_time); 
            //end page 3 : table_1_data table

            //page 3 : table_1_data table_b
            //row 1 (68 ++ 20, + 6.5 * 4 = +24)
            $load_data_1 = $request->load_data_1; 
            $voltage_data_1 = $request->voltage_data_1; 
            $reference_value_data_1 = $request->reference_value_data_1; 
            $R_phase_data_1 = $request->R_phase_data_1; 
            $S_phase_data_1 = $request->S_phase_data_1; 
            $T_phase_data_1 = $request->T_phase_data_1; 

            $pdf->Text(68,86,$load_data_1); 
            $pdf->Text(88,86,$voltage_data_1); 
            $pdf->Text(108,86,$reference_value_data_1); 
            $pdf->Text(128,86,$R_phase_data_1); 
            $pdf->Text(148,86,$S_phase_data_1); 
            $pdf->Text(168,86,$T_phase_data_1); 

            //row 2 (++20, +6.5)
            $load_data_2 = $request->load_data_2; 
            $voltage_data_2 = $request->voltage_data_2; 
            $reference_value_data_2 = $request->reference_value_data_2; 
            $R_phase_data_2 = $request->R_phase_data_2; 
            $S_phase_data_2 = $request->S_phase_data_2; 
            $T_phase_data_2 = $request->T_phase_data_2;

            $pdf->Text(68,92.5,$load_data_2); 
            $pdf->Text(88,92.5,$voltage_data_2); 
            $pdf->Text(108,92.5,$reference_value_data_2); 
            $pdf->Text(128,92.5,$R_phase_data_2); 
            $pdf->Text(148,92.5,$S_phase_data_2); 
            $pdf->Text(168,92.5,$T_phase_data_2);
            //row 3 (++20, +6.5)
            $load_data_3 = $request->load_data_3; 
            $voltage_data_3 = $request->voltage_data_3; 
            $reference_value_data_3 = $request->reference_value_data_3; 
            $R_phase_data_3 = $request->R_phase_data_3; 
            $S_phase_data_3 = $request->S_phase_data_3; 
            $T_phase_data_3 = $request->T_phase_data_3;

            $pdf->Text(68,99,$load_data_3); 
            $pdf->Text(88,99,$voltage_data_3); 
            $pdf->Text(108,99,$reference_value_data_3); 
            $pdf->Text(128,99,$R_phase_data_3); 
            $pdf->Text(148,99,$S_phase_data_3); 
            $pdf->Text(168,99,$T_phase_data_3);
            //row 4  (++20, +6.5)
            $load_data_4 = $request->load_data_4; 
            $voltage_data_4 = $request->voltage_data_4; 
            $reference_value_data_4 = $request->reference_value_data_4; 
            $R_phase_data_4 = $request->R_phase_data_4; 
            $S_phase_data_4 = $request->S_phase_data_4; 
            $T_phase_data_4 = $request->T_phase_data_4;

            $pdf->Text(68,105.5,$load_data_4); 
            $pdf->Text(88,105.5,$voltage_data_4); 
            $pdf->Text(108,105.5,$reference_value_data_4); 
            $pdf->Text(128,105.5,$R_phase_data_4); 
            $pdf->Text(148,105.5,$S_phase_data_4); 
            $pdf->Text(168,105.5,$T_phase_data_4);
            //row 5  (++20, +6.5)
            $load_data_5 = $request->load_data_5; 
            $voltage_data_5 = $request->voltage_data_5; 
            $reference_value_data_5 = $request->reference_value_data_5; 
            $R_phase_data_5 = $request->R_phase_data_5; 
            $S_phase_data_5 = $request->S_phase_data_5; 
            $T_phase_data_5 = $request->T_phase_data_5;

            $pdf->Text(68,112,$load_data_5); 
            $pdf->Text(88,112,$voltage_data_5); 
            $pdf->Text(108,112,$reference_value_data_5); 
            $pdf->Text(128,112,$R_phase_data_5); 
            $pdf->Text(148,112,$S_phase_data_5); 
            $pdf->Text(168,112,$T_phase_data_5);
            //end page 3 : table_1_data table_b
            //end page 3 : table_1

            
            //page 3 : table_2
            //page 3 : table_2  : input_value
            $motor_body_img01 = $request->file('motor_body_img01');
            $motor_body_img02 = $request->file('motor_body_img02');
            $motor_body_img03 = $request->file('motor_body_img03');
            $motor_body_img04 = $request->file('motor_body_img04');

            $motor_body_img01 = $request->motor_body_img01; 
            $motor_body_img02 = $request->motor_body_img02; 
            $motor_body_img03 = $request->motor_body_img03; 
            $motor_body_img04 = $request->motor_body_img04;
            //end page 3 : table_2  : input_value

            //page 3 : table_2 :file upload code
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

            // page 3 : code : file position
            $pdf->Image(public_path('uploads/').$fileName01, '26', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName02, '64', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName03, '102', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(public_path('uploads/').$fileName04, '140', '137.5', 37, 28, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            //end page 3  : file position
            //page 3 : table_2 :file upload
            //end page 3 : table_2

            //page 3 : table_3
            //row 1
            $tester_inspector_1 = $request->tester_inspector_1; 
            $diploma_1 = $request->diploma_1; 
            $diploma_number_1 = $request->diploma_number_1; 

            $pdf->Text(103, 227, $tester_inspector_1);
            $pdf->Text(123,227,$diploma_1); 
            $pdf->Text(160,227,$diploma_number_1); 

            //row 2
            $tester_inspector_2 = $request->tester_inspector_2; 
            $diploma_2 = $request->diploma_2; 
            $diploma_number_2 = $request->diploma_number_2; 

            $pdf->Text(103, 233.5, $tester_inspector_2);
            $pdf->Text(123,233.5,$diploma_2); 
            $pdf->Text(160,233.5,$diploma_number_2); 
            //end page 3 : table_3
            //end page 3
    
            //page 4 start!
            //page 4 : code
            $page = $pdf->importPage(4);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 14.4,'',true);
            $pdf->SetTextColor(0,0,0);
            //end page 4 : code end

            //page 4 : row 1~2
            $implementation = $request->implementation; 
            $place = $request->place; 

            $pdf->Text(38,141.5,$implementation);
            $pdf->Text(38,169.5,$place);
            //end page 4 : row 1~2
            //end page 4

            // page 5 start!
            // page 5 : code
            $page = $pdf->importPage(5);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            //end page 5 : code
            //page 5 : Image upload code :file_no_01 ~ file_no_04
            $file_no_01 = $request->file('file_no_01');
            $file_no_02 = $request->file('file_no_02');
            $file_no_03 = $request->file('file_no_03');
            $file_no_04 = $request->file('file_no_04');

            $file_no_01 = $request->file_no_01; 
            $file_no_02 = $request->file_no_02; 
            $file_no_03 = $request->file_no_03; 
            $file_no_04 = $request->file_no_04; 

            $fileName_no_01 = '';
            $fileName_no_02 = '';
            $fileName_no_03 = '';
            $fileName_no_04 = '';

            $destinationPath = '../resources/img';

            if($file_no_01 != null) {
                $fileName_no_01 = "photo01".date('Ymdhis').".".$file_no_01->getClientOriginalExtension();
                $file_no_01->move($destinationPath,$fileName_no_01);
            }

            if($file_no_02 != null) {
                $fileName_no_02 = "photo02".date('Ymdhis').".".$file_no_02->getClientOriginalExtension();
                $file_no_02->move($destinationPath,$fileName_no_02);
            }

            if($file_no_03 != null) {
                $fileName_no_03 = "photo03".date('Ymdhis').".".$file_no_03->getClientOriginalExtension();
                $file_no_03->move($destinationPath,$fileName_no_03);
            }

            if($file_no_04 != null) {
                $fileName_no_04 = "photo04".date('Ymdhis').".".$file_no_04->getClientOriginalExtension();
                $file_no_04->move($destinationPath,$fileName_no_04);
            }

            $pdf->Image(resource_path('img/').$fileName_no_01, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_02, '28', '78.7', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_03, '28', '137.7', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_04, '28', '196.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            // end page 5 : Image upload

            // //page 5 : table : text_no_1 ~ no_4
            // $text_no_01 = $request->text_no_01; 
            // $text_no_02 = $request->text_no_02; 
            // $text_no_03 = $request->text_no_03; 
            // $text_no_04 = $request->text_no_04; 
            
            // $pdf->Text(133,48,$text_no_01);
            // $pdf->Text(133,107,$text_no_02);
            // $pdf->Text(133,166,$text_no_03);
            // $pdf->Text(133,224,$text_no_04);
            // //string exception_text_no_01;
            // $report_item = $request->report_item;
            // $report_item_array = mb_str_split($report_item, 10);
            // for ($i=0; $i < sizeof($report_item_array); $i++) { 
            //     $pdf->Text(238 + 2  ,42 + 5 * $i, $report_item_array[$i]);  
            // }
            // // end page 5 : table : text_no_1 ~ no_4

            //page 5 : table : text_no_1 ~ no_4 : execption
            for ($i=0; $i < 4; $i++) { 
                if ($i < 9) {
                    $no_i = "0" . ($i + 1);
                }else {
                    $no_i = $i + 1;
                }
               
                $text_no_var = "text_no_" . $no_i;
                $text_no_i = $request->$text_no_var;
                $text_no_i_array = mb_str_split($text_no_i, 18);
                $position_text_x0 = 133;
                $position_text_y0 = 48;
                $delta_text_line_y = 5;
                $delta_text_box_y = 59;
                for ($j=0; $j < sizeof($text_no_i_array); $j++) { 
                    $pdf->Text($position_text_x0  ,$position_text_y0  + $delta_text_line_y * $j + $delta_text_box_y * ($i % 4), $text_no_i_array[$j]);  
                }
            }
            //end page 5 : table : text_no_1 ~ no_4
            
            // end page 5

            // page 6 
            // page 6 : code
            $page = $pdf->importPage(6);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            //end page 6 : code
            //page 6 : Image upload code :file_no_01 ~ file_no_04
            $file_no_05 = $request->file('file_no_05');
            $file_no_06 = $request->file('file_no_06');
            $file_no_07 = $request->file('file_no_07');
            $file_no_08 = $request->file('file_no_08');

            $file_no_05 = $request->file_no_05; 
            $file_no_06 = $request->file_no_06; 
            $file_no_07 = $request->file_no_07; 
            $file_no_08 = $request->file_no_08; 

            $fileName_no_05 = '';
            $fileName_no_06 = '';
            $fileName_no_07 = '';
            $fileName_no_08 = '';

            $destinationPath = '../resources/img';

            if($file_no_05 != null) {
                $fileName_no_05 = "photo05".date('Ymdhis').".".$file_no_05->getClientOriginalExtension();
                $file_no_05->move($destinationPath,$fileName_no_05);
            }

            if($file_no_06 != null) {
                $fileName_no_06 = "photo06".date('Ymdhis').".".$file_no_06->getClientOriginalExtension();
                $file_no_06->move($destinationPath,$fileName_no_06);
            }

            if($file_no_07 != null) {
                $fileName_no_07 = "photo07".date('Ymdhis').".".$file_no_07->getClientOriginalExtension();
                $file_no_07->move($destinationPath,$fileName_no_07);
            }

            if($file_no_08 != null) {
                $fileName_no_08 = "photo08".date('Ymdhis').".".$file_no_08->getClientOriginalExtension();
                $file_no_08->move($destinationPath,$fileName_no_08);
            }

            $pdf->Image(resource_path('img/').$fileName_no_05, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_06, '28', '80', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_07, '28', '141', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_08, '28', '201', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            // end page 6 : Image upload

            // //page 6 : table : text_no_05 ~ text_no_08
            // $text_no_05 = $request->text_no_05; 
            // $text_no_06 = $request->text_no_06; 
            // $text_no_07 = $request->text_no_07; 
            // $text_no_08 = $request->text_no_08; 
            
            // $pdf->Text(133,48,$text_no_05);
            // $pdf->Text(133,107,$text_no_06);
            // $pdf->Text(133,166,$text_no_07);
            // $pdf->Text(133,224,$text_no_08);
            // //page 6 : table : text_no_05 ~ text_no_08 

            //page 6 : table : text_no_5 ~ no_8 : execption
            for ($i=4; $i < 8; $i++) { 
                if ($i < 9) {
                    $no_i = "0" . ($i + 1);
                }else {
                    $no_i = $i + 1;
                }
               
                $text_no_var = "text_no_" . $no_i;
                $text_no_i = $request->$text_no_var;
                $text_no_i_array = mb_str_split($text_no_i, 18);
                $position_text_x0 = 133;
                $position_text_y0 = 48;
                $delta_text_line_y = 5;
                $delta_text_box_y = 61;
                for ($j=0; $j < sizeof($text_no_i_array); $j++) { 
                    $pdf->Text($position_text_x0  ,$position_text_y0  + $delta_text_line_y * $j + $delta_text_box_y * ($i % 4), $text_no_i_array[$j]);  
                }
            }
            //end page 6 : table : text_no_5 ~ no_8
            // end page 6

            // page 7
            // page 7 : code
            $page = $pdf->importPage(7);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            //end page 7 : code
            //page 7 : Image upload code :file_no_09 ~ file_no_12
            $file_no_09 = $request->file('file_no_09');
            $file_no_10 = $request->file('file_no_10');
            $file_no_11 = $request->file('file_no_11');
            $file_no_12 = $request->file('file_no_12');

            $file_no_09 = $request->file_no_09; 
            $file_no_10 = $request->file_no_10; 
            $file_no_11 = $request->file_no_11; 
            $file_no_12 = $request->file_no_12; 

            $fileName_no_09 = '';
            $fileName_no_10 = '';
            $fileName_no_11 = '';
            $fileName_no_12 = '';
            $destinationPath = '../resources/img';

            // if($file_no_13 != null) {
            //     $fileName_no_13 = "photo13".date('Ymdhis').".".$file_no_13->getClientOriginalExtension();
            //     $file_no_13->move($destinationPath,$fileName_no_13);
            // }

            $destinationPath = '../resources/img';

            if($file_no_09 != null) {
                $fileName_no_09 = "photo09".date('Ymdhis').".".$file_no_09->getClientOriginalExtension();
                $file_no_09->move($destinationPath,$fileName_no_09);
            }

            if($file_no_10 != null) {
                $fileName_no_10 = "photo10".date('Ymdhis').".".$file_no_10->getClientOriginalExtension();
                $file_no_10->move($destinationPath,$fileName_no_10);
            }

            if($file_no_11 != null) {
                $fileName_no_11 = "photo11".date('Ymdhis').".".$file_no_11->getClientOriginalExtension();
                $file_no_11->move($destinationPath,$fileName_no_11);
            }

            if($file_no_12 != null) {
                $fileName_no_12 = "photo12".date('Ymdhis').".".$file_no_12->getClientOriginalExtension();
                $file_no_12->move($destinationPath,$fileName_no_12);
            }

            $pdf->Image(resource_path('img/').$fileName_no_09, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_10, '28', '78.7', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_11, '28', '137.7', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_12, '28', '196.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            // end page 7 : Image upload

            // //page 7 : table : text_no_09 ~ text_no_12
            // $text_no_09 = $request->text_no_09; 
            // $text_no_10 = $request->text_no_10; 
            // $text_no_11 = $request->text_no_11; 
            // $text_no_12 = $request->text_no_12; 
            
            // $pdf->Text(133,48,$text_no_09);
            // $pdf->Text(133,107,$text_no_10);
            // $pdf->Text(133,166,$text_no_11);
            // $pdf->Text(133,224,$text_no_12);  
            // //end page 7 : table : text_no_09 ~ text_no_12

            //page 7 : table : text_no_9 ~ no_12 : execption
            for ($i=8; $i < 12; $i++) { 
                if ($i < 9) {
                    $no_i = "0" . ($i + 1);
                }else {
                    $no_i = $i + 1;
                }
               
                $text_no_var = "text_no_" . $no_i;
                $text_no_i = $request->$text_no_var;
                $text_no_i_array = mb_str_split($text_no_i, 18);
                $position_text_x0 = 133;
                $position_text_y0 = 48;
                $delta_text_line_y = 5;
                $delta_text_box_y = 59;
                for ($j=0; $j < sizeof($text_no_i_array); $j++) { 
                    $pdf->Text($position_text_x0  ,$position_text_y0  + $delta_text_line_y * $j + $delta_text_box_y * ($i % 4), $text_no_i_array[$j]);  
                }
            }
            //end page 7 : table : text_no_9 ~ no_12
            // end page 7

            // page 8
            // page 8 : code
            $page = $pdf->importPage(8);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_2 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_2 , '', 9,'',true);
            $pdf->SetTextColor(0,0,0);
            //end page 8 : code
            //page 8 : Image upload code :file_no_13 ~ file_no_16
            $file_no_13 = $request->file('file_no_13');
            $file_no_14 = $request->file('file_no_14');
            $file_no_15 = $request->file('file_no_15');
            $file_no_16 = $request->file('file_no_16');

            $file_no_13 = $request->file_no_13; 
            $file_no_14 = $request->file_no_14; 
            $file_no_15 = $request->file_no_15; 
            $file_no_16 = $request->file_no_16; 

            $fileName_no_13 = '';
            $fileName_no_14 = '';
            $fileName_no_15 = '';
            $fileName_no_16 = '';

            $destinationPath = '../resources/img';

            if($file_no_13 != null) {
                $fileName_no_13 = "photo13".date('Ymdhis').".".$file_no_13->getClientOriginalExtension();
                $file_no_13->move($destinationPath,$fileName_no_13);
            }

            if($file_no_14 != null) {
                $fileName_no_14 = "photo14".date('Ymdhis').".".$file_no_14->getClientOriginalExtension();
                $file_no_14->move($destinationPath,$fileName_no_14);
            }

            if($file_no_15 != null) {
                $fileName_no_15 = "photo15".date('Ymdhis').".".$file_no_15->getClientOriginalExtension();
                $file_no_15->move($destinationPath,$fileName_no_15);
            }

            if($file_no_16 != null) {
                $fileName_no_16 = "photo16".date('Ymdhis').".".$file_no_16->getClientOriginalExtension();
                $file_no_16->move($destinationPath,$fileName_no_16);
            }

            $pdf->Image(resource_path('img/').$fileName_no_13, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_14, '28', '80', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_15, '28', '141', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            $pdf->Image(resource_path('img/').$fileName_no_16, '28', '201', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
            // end page 8 : Image upload

            // //page 8 : table : text_no_13 ~ text_no_16
            // $text_no_13 = $request->text_no_13; 
            // $text_no_14 = $request->text_no_14; 
            // $text_no_15 = $request->text_no_15; 
            // $text_no_16 = $request->text_no_16; 
            
            // $pdf->Text(133,48,$text_no_13);
            // $pdf->Text(133,107,$text_no_14);
            // $pdf->Text(133,166,$text_no_15);
            // $pdf->Text(133,224,$text_no_16); 
            // //end page 8 : table : text_no_13 ~ text_no_16 

            //page 8 : table : text_no_13 ~ no_16 : execption
            for ($i=12; $i < 16; $i++) { 
                if ($i < 9) {
                    $no_i = "0" . ($i + 1);
                }else {
                    $no_i = $i + 1;
                }
               
                $text_no_var = "text_no_" . $no_i;
                $text_no_i = $request->$text_no_var;
                $text_no_i_array = mb_str_split($text_no_i, 18);
                $position_text_x0 = 133;
                $position_text_y0 = 48;
                $delta_text_line_y = 5;
                $delta_text_box_y = 61;
                for ($j=0; $j < sizeof($text_no_i_array); $j++) { 
                    $pdf->Text($position_text_x0  ,$position_text_y0  + $delta_text_line_y * $j + $delta_text_box_y * ($i % 4), $text_no_i_array[$j]);  
                }
            }
            //end page 8 : table : text_no_13 ~ no_16
            // end page 8
        }
// end temp01 :自家発電設備点検報告書 : Private power generation facility inspection report

//temp02 : 作業確認書 : Work confirmation
        if ($reportype == 'temp02') {
            $pdf->setSourceFile(resource_path('pdf/temp02.pdf'));  

            //page 1 : 1~102
            //pag1 1_pdf_code
            $page = $pdf->importPage(1);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], 8.7 * 25.4)); //$size['height'] = 8.26inch -> 8.7 * 25.4 : ???question
            $pdf->useTemplate($page);
    
            $font = new TCPDF_FONTS(); 
    
            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 8,'',true);
            $pdf->SetTextColor(0,0,0);
            // end pag1 1_pdf_code

            //page 1_variable and position  //exception : i = (34, 35, 36), , (44,45,46) , (49, 50, 51), (59, 60, 61)
            $check_title = $request->check_title;

            $i = 1;
            do {

                $photo_i = "photo_" . $i;
                $$photo_i = $request->$photo_i;
                $time_i = "time_" . $i;
                $$time_i = $request->$time_i;
                $check_i = "check_" . $i;
                $$check_i = $request->$check_i;

                //no_display_check : condition
                // $array_exception_i = array(34,36, 44, 46,  49, 51,  59, 61);
                $array_exception_i = array();
                $exception_i = 0;
                for ($j=0; $j < sizeof($array_exception_i) ; $j++) { 
                    
                    if ($i == $array_exception_i[$j]) {
                        $exception_i = $array_exception_i[$j];
                    break;
                        }
                }
                //end no_display_check
                
                //time
                if ($$time_i) {
                    
                    $position_x0 = 35.8;
                    $position_y0 = 31.3;

                    $delta_x = 0;
                    $delta_y = 4.45;

                    $position_x = $position_x0 + $delta_x;
                    $position_y = $position_y0 + $delta_y * $i;
                    
                    // $pdf->Image(resource_path('img/').$fileName_no_01, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
                    if ($i <= 37) {
                        $position_x = $position_x0 + $delta_x;
                        $position_y = $position_y0 + $delta_y * $i;
                    } else {
                        $position_x = $position_x0 + $delta_x + 106.5;
                        $position_y = $position_y0 + $delta_y * ($i - 38) - 0.2;
                    }
                    // $pdf->Image(resource_path('img/time.png'), $position_x, $position_y, 2,2,'', '', 'T', false, 100, '', false, false, 1, false, false, false);
                    $pdf->Text($position_x,$position_y, $$time_i);
                }
                //end time

                //photo
                if ($$photo_i) {
                    
                    $position_x0 = 28.3;
                    $position_y0 = 31.2;

                    $delta_x = 0;
                    $delta_y = 4.45;

                    $position_x = $position_x0 + $delta_x;
                    $position_y = $position_y0 + $delta_y * $i;
                    
                    // $pdf->Image(resource_path('img/').$fileName_no_01, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
                    if ($i <= 37) {
                        $position_x = $position_x0 + $delta_x;
                        $position_y = $position_y0 + $delta_y * $i;
                    } else {
                        $position_x = $position_x0 + $delta_x + 106.5;
                        $position_y = $position_y0 + $delta_y * ($i - 38) - 0.2;
                    }
                    $pdf->Image(resource_path('img/photo.png'), $position_x, $position_y, 3,3,'', '', 'T', false, 100, '', false, false, false, false, false, false);
                    // $pdf->Text($position_x, $position_y, "o");
                }
                //end photo

                //check
                if ($$check_i && $i !== $exception_i) {
                    
                    $position_x0 = 120.35;
                    $position_y0 = 31.9;

                    $delta_x = 0;
                    $delta_y = 4.45;

                    $position_x = $position_x0 + $delta_x;
                    $position_y = $position_y0 + $delta_y * $i;
                    
                    // $pdf->Image(resource_path('img/').$fileName_no_01, '28', '20.2', 76, 57, '', '', 'T', false, 100, '', false, false, 1, false, false, false);
                    if ($i <= 37) {
                        $position_x = $position_x0 + $delta_x;
                        $position_y = $position_y0 + $delta_y * $i;
                    } else {
                        $position_x = $position_x0 + $delta_x + 103.3;
                        $position_y = $position_y0 + $delta_y * ($i - 38) - 0.2;
                    }
                    $pdf->Image(resource_path('img/check.png'), $position_x, $position_y, 2,2,'', '', 'T', false, 100, '', false, false, 1, false, false, false);
                    // $pdf->Text($position_x,$position_y, "o");
                }
                //end check
                $i++;
            }while ($i <= 75);

            //report_item
            $report_item = $request->report_item;
            $report_item_array = mb_str_split($report_item, 10);
            for ($i=0; $i < sizeof($report_item_array); $i++) { 
                $pdf->Text(238 + 2  ,42 + 5 * $i, $report_item_array[$i]);  
            }
            // end report_item
            //end page 1_variable and position
        }
// end temp02 : 作業確認書 : Work confirmation

// temp03 :
        if($reportype == 'temp03') {

            //temp03.pdf insert
            $pdf->setSourceFile(resource_path('pdf/temp03.pdf'));  
    //page 1 : start
        //page 1_pdf_code
            $page = $pdf->importPage(1);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
            //page 1_pdf_code

        //page 1_variable and position
            // check
            for ($i=7; $i <=21 ; $i++) { 
                $check_i = "check_$i";
                $$check_i = $request->$check_i;
                // var_dump($$check_i);
                if ($$check_i == "1") {
                    $position_y0 = 135;
                    $delta_y = 7.55;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    $pdf->Image(resource_path('img/temp03_check.png'), '118', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $position_y0 = 134.6;
                    $delta_y = 7.6;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '114.4', $position_y , 11.2, 5, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "2"){
                    $position_y0 = 135;
                    $delta_y = 7.55;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '118', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }

            }
            // //reference points
            // $pdf->text(0,0,".  (0,0)");
            // $pdf->text(50,130,".  (50,130)");
            // $pdf->text(50,200,".  (50,200)");

            $input_0 = $request->input_0;
            $pdf->text(129, 31, $input_0);
            
            $input_1_1 = $request->input_1_1;
            $input_1_2 = $request->input_1_2;
            $pdf->text(43, 39.5, $input_1_1);
            $pdf->text(147, 39.5, $input_1_2);

            $input_2_1 = $request->input_2_1;
            $input_2_2 = $request->input_2_2;
            $pdf->text(43, 48.5, $input_2_1);
            $pdf->text(147, 48.5, $input_2_2);

            $input_3_1 = $request->input_3_1;
            $input_3_2 = $request->input_3_2;
            $input_3_3 = $request->input_3_3;
            $input_3_4 = $request->input_3_4;
            if ($input_3_1 == true) {
                $pdf->Image(resource_path('img/temp03_input_3_1.png'), '45', '56.5', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            if ($input_3_2 == true) {
                $pdf->Image(resource_path('img/temp03_input_3_2.png'), '68', '56.5', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            if ($input_3_3 != null) {
                $input_3_3_array = explode("-", $input_3_3); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_3_3_array[0]; //2021
                $japan_year = "令和" . ($year - 2018);
                $month = $input_3_3_array[1] ; //11
                $day = $input_3_3_array[2]; //15
                $pdf->Text(113,57,$japan_year);
                $pdf->Text(127,57,$month);
                $pdf->Text(137,57,$day);
            }
            if ($input_3_4 != null) {
                $input_3_4_array = explode("-", $input_3_4); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_3_4_array[0]; //2021
                $japan_year = "令和" . ($year - 2018);
                $month = $input_3_4_array[1] ; //11
                $day = $input_3_4_array[2]; //15
                $pdf->Text(148.2,57,$japan_year);
                $pdf->Text(162,57,$month);
                $pdf->Text(172,57,$day);
            }

            $input_4_1 = $request->input_4_1;
            $input_4_2 = $request->input_4_2;
            $input_4_3 = $request->input_4_3;
            $input_4_4 = $request->input_4_4;
            $pdf->Text(48, 74, $input_4_1);
            $input_4_2_array = mb_str_split($input_4_2, 6);
            for ($i=0; $i < sizeof($input_4_2_array); $i++) { 
                if (sizeof($input_4_2_array) == 1) {
                    $pdf->Text(123, 63, $input_4_2);
                }else{
                    if($i <= 1){
                        $pdf->Text(121.5  ,63 + 4.5 * $i, $input_4_2_array[$i]);  
                    }elseif($i > 1){
                        $pdf->Text(121.5 + 21 * ($i - 1)  ,63 + 4.5 * 1, $input_4_2_array[$i]);  
                    }
                }
            }
            $pdf->Text(149, 63, $input_4_3);
            $pdf->Text(123, 72, $input_4_4);

            $input_5_1 = $request->input_5_1;
            $input_5_2 = $request->input_5_2;
            $input_5_3 = $request->input_5_3;
            $input_5_4 = $request->input_5_4;
            $input_5_5 = $request->input_5_5;
            $input_5_6 = $request->input_5_6;
            $input_5_7 = $request->input_5_7;
            $input_5_8 = $request->input_5_8;
            $pdf->Text(83, 82.6, $input_5_1);
            $pdf->Text(80, 90.6, $input_5_2);
            $pdf->Text(83, 97.6, $input_5_3);
            $pdf->Text(83, 105, $input_5_4);
            $pdf->Text(155, 82.6, $input_5_5);
            $pdf->Text(155, 90.6, $input_5_6);
            $pdf->Text(155, 97.6, $input_5_7);
            $pdf->Text(155, 105.6, $input_5_8);

            //x_position : defect and measure
            $defect_1p = 127;
            $measure_1p = 155;

            $input_7 = $request->input_7;
            $pdf->Text(74, 136, $input_7);
            $defect_7 = $request->defect_7;
            $pdf->Text($defect_1p, 136, $defect_7);
            $measure_7 = $request->measure_7;
            $pdf->Text($measure_1p, 136, $measure_7);


            $input_8 = $request->input_8;
            if ($input_8 == 1) {
                $pdf->Image(resource_path('img/temp03_input_8_1.png'), '76.2', '140.5', 35, 4, '', '', 'T', true, 100, '', false, false, 1, false, false, false);
            } else {
                $pdf->Image(resource_path('img/temp03_input_8_2.png'), '76.3', '145', 35, 4, '', '', 'T', true, 100, '', false, false, 1, false, false, false);
            }
            $defect_8 = $request->defect_8;
            $pdf->Text($defect_1p, 143, $defect_8);
            $measure_8 = $request->measure_8;
            $pdf->Text($measure_1p, 143, $measure_8);
            

            $input_9 = $request->input_9;
            $pdf->Text(76, 151.5, $input_9);
            $defect_9 = $request->defect_9;
            $pdf->Text($defect_1p, 151.5, $defect_9);
            $measure_9 = $request->measure_9;
            $pdf->Text($measure_1p, 151.5, $measure_9);


            $input_10 = $request->input_10;
            if ($input_10 == 1) {
            $pdf->Image(resource_path('img/temp03_input_10_1.png'), '79', '158', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }elseif($input_10 == 2){
                $pdf->Image(resource_path('img/temp03_input_10_2.png'), '95', '157.5', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            $defect_10 = $request->defect_10;
            $pdf->Text($defect_1p, 159, $defect_10);
            $measure_10 = $request->measure_10;
            $pdf->Text($measure_1p, 159, $measure_10);


            $input_11 = $request->input_11;
            $pdf->Text(80, 166, $input_11);
            $defect_11 = $request->defect_11;
            $pdf->Text($defect_1p, 166, $defect_11);
            $measure_11 = $request->measure_11;
            $pdf->Text($measure_1p, 166, $measure_11);

            $input_12 = $request->input_12;
            $pdf->Text(80, 174, $input_12);
            $defect_12 = $request->defect_12;
            $pdf->Text($defect_1p, 174, $defect_12);
            $measure_12 = $request->measure_12;
            $pdf->Text($measure_1p, 174, $measure_12);

            $input_13 = $request->input_13;
            $pdf->Text(80, 182, $input_13);
            $defect_13 = $request->defect_13;
            $pdf->Text($defect_1p, 182, $defect_13);
            $measure_13 = $request->measure_13;
            $pdf->Text($measure_1p, 182, $measure_13);

            $input_14 = $request->input_14;
            $pdf->Text(80, 189, $input_14);
            $defect_14 = $request->defect_14;
            $pdf->Text($defect_1p, 189, $defect_14);
            $measure_14 = $request->measure_14;
            $pdf->Text($measure_1p, 189, $measure_14);
            
            $input_15 = $request->input_15;
            $pdf->Text(80, 197, $input_15);
            $defect_15 = $request->defect_15;
            $pdf->Text($defect_1p, 197, $defect_15);
            $measure_15 = $request->measure_15;
            $pdf->Text($measure_1p, 197, $measure_15);

            $input_16 = $request->input_16;
            $pdf->Text(90, 204, $input_16);
            $defect_16 = $request->defect_16;
            $pdf->Text($defect_1p, 204, $defect_16);
            $measure_16 = $request->measure_16;
            $pdf->Text($measure_1p, 204, $measure_16);

            $input_17 = $request->input_17;
            $pdf->Text(90, 212, $input_17);
            $defect_17 = $request->defect_17;
            $pdf->Text($defect_1p, 212, $defect_17);
            $measure_17 = $request->measure_17;
            $pdf->Text($measure_1p, 212, $measure_17);

            $input_18 = $request->input_18;
            $pdf->Text(100, 218, $input_18);
            $defect_18 = $request->defect_18;
            $pdf->Text($defect_1p, 218, $defect_18);
            $measure_18 = $request->measure_18;
            $pdf->Text($measure_1p, 218, $measure_18);

            $input_19 = $request->input_19;
            $pdf->Text(90, 225, $input_19);
            $defect_19 = $request->defect_19;
            $pdf->Text($defect_1p, 225, $defect_19);
            $measure_19 = $request->measure_19;
            $pdf->Text($measure_1p, 225, $measure_19);

            $input_20 = $request->input_20;
            $pdf->Text(90, 233, $input_20);
            $defect_20 = $request->defect_20;
            $pdf->Text($defect_1p, 233, $defect_20);
            $measure_20 = $request->measure_20;
            $pdf->Text($measure_1p, 233, $measure_20);

            $input_21 = $request->input_21;
            $pdf->Text(90, 241, $input_21);
            $defect_21 = $request->defect_21;
            $pdf->Text($defect_1p, 241, $defect_21);
            $measure_21 = $request->measure_21;
            $pdf->Text($measure_1p, 241, $measure_21);

    // end page_1

    //page_2 : start
        //page_2_pdf_code
            $page = $pdf->importPage(2);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
            
        //page_2_variable and position
            // //reference points
            // $pdf->text(0,0,".  (0,0)");
            // $pdf->text(0,100,".  (0,100)");
            // $pdf->text(0,200,".  (0,200)");

            // check and input
            for ($i=22; $i <=49 ; $i++) { 
                $check_i = "check_$i";
                $$check_i = $request->$check_i;
                if ($$check_i == "1") {
                    $delta_y = 7.65;
                    if ($i <= 25) {
                        $position_y0 = 31.5;
                        $position_y = $position_y0 + $delta_y * ($i - 22);
                    }else{
                        $position_y0 = 65;
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check.png'), '118', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $delta_y = 7.65;
                    if ($i <= 25) {
                        $position_y0 = 30;
                        $position_y = $position_y0 + $delta_y * ($i - 22);
                    }else{
                        $position_y0 = 63.4;
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '114.2', $position_y , 11.5, 6.1, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "2"){
                    $delta_y = 7.65;
                    if ($i <= 25) {
                        $position_y0 = 30;
                        $position_y = $position_y0 + $delta_y * ($i - 22);
                    }else{
                        $position_y0 = 64.4;
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '118', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }
                $input_i = "input_$i";
                $$input_i = $request->$input_i;
            }

            //x_position : defect and measure;\
            $defect_2p = 128;
            $measure_2p = 157;

            $pdf->Text(83, 32, $input_22);
            $defect_22 = $request->defect_22;
            $pdf->Text($defect_2p, 32, $defect_22);
            $measure_22 = $request->measure_22;
            $pdf->Text($measure_2p, 32, $measure_22);

            $pdf->Text(83, 39.6, $input_23);
            $defect_23 = $request->defect_23;
            $pdf->Text($defect_2p, 39.6, $defect_23);
            $measure_23 = $request->measure_23;
            $pdf->Text($measure_2p, 39.6, $measure_23);

            $pdf->Text(83, 47.2, $input_24);
            $defect_24 = $request->defect_24;
            $pdf->Text($defect_2p, 47.2, $defect_24);
            $measure_24 = $request->measure_24;
            $pdf->Text($measure_2p, 47.2, $measure_24);

            $pdf->Text(83, 54, $input_25);
            $defect_25 = $request->defect_25;
            $pdf->Text($defect_2p, 54, $defect_25);
            $measure_25 = $request->measure_25;
            $pdf->Text($measure_2p, 54, $measure_25);
            

            
            $pdf->Text(97, 66, $input_26);
            $defect_26 = $request->defect_26;
            $pdf->Text($defect_2p, 66, $defect_26);
            $measure_26 = $request->measure_26;
            $pdf->Text($measure_2p, 66, $measure_26);
            
            $pdf->Text(97, 73, $input_27);
            $defect_27 = $request->defect_27;
            $pdf->Text($defect_2p, 73, $defect_27);
            $measure_27 = $request->measure_27;
            $pdf->Text($measure_2p, 73, $measure_27);
            
            $pdf->Text(97, 80.5, $input_28);
            $defect_28 = $request->defect_28;
            $pdf->Text($defect_2p, 80.5, $defect_28);
            $measure_28 = $request->measure_28;
            $pdf->Text($measure_2p, 80.5, $measure_28);
            
            $pdf->Text(97, 88, $input_29);
            $defect_29 = $request->defect_29;
            $pdf->Text($defect_2p, 88, $defect_29);
            $measure_29 = $request->measure_29;
            $pdf->Text($measure_2p, 88, $measure_29);
            
            $pdf->Text(97, 95.5, $input_30);
            $defect_30 = $request->defect_30;
            $pdf->Text($defect_2p, 95.5, $defect_30);
            $measure_30 = $request->measure_30;
            $pdf->Text($measure_2p, 95.5, $measure_30);
            
            
            $pdf->Text(83, 103, $input_31);
            $defect_31 = $request->defect_31;
            $pdf->Text($defect_2p, 103, $defect_31);
            $measure_31 = $request->measure_31;
            $pdf->Text($measure_2p, 103, $measure_31);
            
            $pdf->Text(83, 110.5, $input_32);
            $defect_32 = $request->defect_32;
            $pdf->Text($defect_2p, 110.5, $defect_32);
            $measure_32 = $request->measure_32;
            $pdf->Text($measure_2p, 110.5, $measure_32);
            

            $pdf->Text(83, 118, $input_33);
            $defect_33 = $request->defect_33;
            $pdf->Text($defect_2p, 118, $defect_33);
            $measure_33 = $request->measure_33;
            $pdf->Text($measure_2p, 118, $measure_33);
            
            $pdf->Text(83, 125.5, $input_34);
            $defect_34 = $request->defect_34;
            $pdf->Text($defect_2p, 125.5, $defect_34);
            $measure_34 = $request->measure_34;
            $pdf->Text($measure_2p, 125.5, $measure_34);
            
            $pdf->Text(83, 133, $input_35);
            $defect_35 = $request->defect_35;
            $pdf->Text($defect_2p, 133, $defect_35);
            $measure_35 = $request->measure_35;
            $pdf->Text($measure_2p, 133, $measure_35);
            

            $pdf->Text(97, 141, $input_36);
            $defect_36 = $request->defect_36;
            $pdf->Text($defect_2p, 141, $defect_36);
            $measure_36 = $request->measure_36;
            $pdf->Text($measure_2p, 141, $measure_36);
            
            $pdf->Text(97, 148.5, $input_37);
            $defect_37 = $request->defect_37;
            $pdf->Text($defect_2p, 148.5, $defect_37);
            $measure_37 = $request->measure_37;
            $pdf->Text($measure_2p, 148.5, $measure_37);
            
            $pdf->Text(97, 156, $input_38);
            $defect_38 = $request->defect_38;
            $pdf->Text($defect_2p, 156, $defect_38);
            $measure_38 = $request->measure_38;
            $pdf->Text($measure_2p, 156, $measure_38);
            

            $pdf->Text(83, 164.5, $input_39);
            $defect_39 = $request->defect_39;
            $pdf->Text($defect_2p, 164.5, $defect_39);
            $measure_39 = $request->measure_39;
            $pdf->Text($measure_2p, 164.5, $measure_39);
            
            $pdf->Text(83, 172, $input_40);
            $defect_40 = $request->defect_40;
            $pdf->Text($defect_2p, 172, $defect_40);
            $measure_40 = $request->measure_40;
            $pdf->Text($measure_2p, 172, $measure_40);
            
            $pdf->Text(83, 179.5, $input_41);
            $defect_41 = $request->defect_41;
            $pdf->Text($defect_2p, 179.5, $defect_41);
            $measure_41 = $request->measure_41;
            $pdf->Text($measure_2p, 179.5, $measure_41);
            
            $pdf->Text(83, 187, $input_42);
            $defect_42 = $request->defect_42;
            $pdf->Text($defect_2p, 187, $defect_42);
            $measure_42 = $request->measure_42;
            $pdf->Text($measure_2p, 187, $measure_42);
            

            $pdf->Text(97, 194, $input_43);
            $defect_43 = $request->defect_43;
            $pdf->Text($defect_2p, 194, $defect_43);
            $measure_43 = $request->measure_43;
            $pdf->Text($measure_2p, 194, $measure_43);
            
            $pdf->Text(97, 201.5, $input_44);
            $defect_44 = $request->defect_44;
            $pdf->Text($defect_2p, 201.5, $defect_44);
            $measure_44 = $request->measure_44;
            $pdf->Text($measure_2p, 201.5, $measure_44);
            
            $pdf->Text(97, 209, $input_45);
            $defect_45 = $request->defect_45;
            $pdf->Text($defect_2p, 209, $defect_45);
            $measure_45 = $request->measure_45;
            $pdf->Text($measure_2p, 209, $measure_45);
            
            $pdf->Text(97, 216.5, $input_46);
            $defect_46 = $request->defect_46;
            $pdf->Text($defect_2p, 216.5, $defect_46);
            $measure_46 = $request->measure_46;
            $pdf->Text($measure_2p, 216.5, $measure_46);
            
            $pdf->Text(97, 224.3, $input_47);
            $defect_47 = $request->defect_47;
            $pdf->Text($defect_2p, 224.3, $defect_47);
            $measure_47 = $request->measure_47;
            $pdf->Text($measure_2p, 224.3, $measure_47);
            

            $pdf->Text(83, 232, $input_48);
            $defect_48 = $request->defect_48;
            $pdf->Text($defect_2p, 232, $defect_48);
            $measure_48 = $request->measure_48;
            $pdf->Text($measure_2p, 232, $measure_48);
            
            $pdf->Text(83, 240, $input_49);
            $defect_49 = $request->defect_49;
            $pdf->Text($defect_2p, 240, $defect_49);
            $measure_49 = $request->measure_49;
            $pdf->Text($measure_2p, 240, $measure_49);
            
    //end page_2

    //page_3 : start
        //page_3_pdf_code
            $page = $pdf->importPage(3);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
        // page_3_variable and position
            // //reference points
            // $pdf->text(0,0,".  (0,0)");
            // $pdf->text(0,100,".  (0,100)");
            // $pdf->text(0,200,".  (0,200)");
            // check and input_receive
            for ($i=50; $i <=68 ; $i++) { 
                if($i == 56) continue;
                // check_receive
                $check_i = "check_$i";
                $$check_i = $request->$check_i;
                // end check receive

                //check position
                if ($$check_i == "1") {
                    $delta_y = 8.8;
                    if ($i < 56) {
                        $position_y0 = 31;
                        $position_y = $position_y0 + $delta_y * ($i - 50);
                    }else{
                        $position_y0 = 94;
                        $position_y = $position_y0 + $delta_y * ($i - 57);
                    }
                    $pdf->Image(resource_path('img/temp03_check.png'), '110.5', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $delta_y = 8.8;
                    if ($i < 56) {
                        $position_y0 = 30.5;
                        $position_y = $position_y0 + $delta_y * ($i - 50);
                    }elseif($i <= 67){
                        $position_y0 = 93;
                        $position_y = $position_y0 + $delta_y * ($i - 57);
                    }
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '106.5', $position_y ,11.6, 6.9, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                } elseif ($$check_i == "2") {
                    $delta_y = 8.8;
                    if ($i < 56) {
                        $position_y0 = 31;
                        $position_y = $position_y0 + $delta_y * ($i - 50);
                    }else{
                        $position_y0 = 94;
                        $position_y = $position_y0 + $delta_y * ($i - 57);
                    }
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '110.5', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }
                // end check position

                //input_recieve
                if ($i == 57) {
                    $input_i_1 = "input_{$i}_1";
                    $input_i_2 = "input_{$i}_2";
                    $$input_i_1 = $request->$input_i_1;
                    $$input_i_2 = $request->$input_i_2;
                } else {
                    $input_i = "input_$i";
                    $$input_i = $request->$input_i;
                }
                // end input_receive
            }

            //input_position : input_50 ~ input_68

                //x_position : defect and measure;\
                $defect_3p = 121;
                $measure_3p = 155;

                $pdf->Text(77, 33, $input_50);
                $defect_50 = $request->defect_50;
                $pdf->Text($defect_3p, 33, $defect_50);
                $measure_50 = $request->measure_50;
                $pdf->Text($measure_3p, 33, $measure_50);

                $pdf->Text(77, 42, $input_51);
                $defect_51 = $request->defect_51;
                $pdf->Text($defect_3p, 42, $defect_51);
                $measure_51 = $request->measure_51;
                $pdf->Text($measure_3p, 42, $measure_51);

                $pdf->Text(77, 51, $input_52);
                $defect_52 = $request->defect_52;
                $pdf->Text($defect_3p, 51, $defect_52);
                $measure_52 = $request->measure_52;
                $pdf->Text($measure_3p, 51, $measure_52);

                $pdf->Text(77, 60, $input_53);
                $defect_53 = $request->defect_53;
                $pdf->Text($defect_3p, 60, $defect_53);
                $measure_53 = $request->measure_53;
                $pdf->Text($measure_3p, 60, $measure_53);

                $pdf->Text(77, 69, $input_54);
                $defect_54 = $request->defect_54;
                $pdf->Text($defect_3p, 69, $defect_54);
                $measure_54 = $request->measure_54;
                $pdf->Text($measure_3p, 69, $measure_54);

                $pdf->Text(77, 76, $input_55);
                $defect_55 = $request->defect_55;
                $pdf->Text($defect_3p, 76, $defect_55);
                $measure_55 = $request->measure_55;
                $pdf->Text($measure_3p, 76, $measure_55);

                $pdf->Text(75, 94, $input_57_1);
                $pdf->Text(92, 94, $input_57_2);
                $defect_57 = $request->defect_57;
                $pdf->Text($defect_3p, 94, $defect_57);
                $measure_57 = $request->measure_57;
                $pdf->Text($measure_3p, 94, $measure_57);

                $pdf->Text(91, 102.6, $input_58);
                $defect_58 = $request->defect_58;
                $pdf->Text($defect_3p, 103, $defect_58);
                $measure_58 = $request->measure_58;
                $pdf->Text($measure_3p, 103, $measure_58);


                $pdf->Text(77, 112, $input_59);
                $defect_59 = $request->defect_59;
                $pdf->Text($defect_3p, 112, $defect_59);
                $measure_59 = $request->measure_59;
                $pdf->Text($measure_3p, 112, $measure_59);

                $pdf->Text(77, 121, $input_60);
                $defect_60 = $request->defect_60;
                $pdf->Text($defect_3p, 121, $defect_60);
                $measure_60 = $request->measure_60;
                $pdf->Text($measure_3p, 121, $measure_60);

                $pdf->Text(77, 130, $input_61);
                $defect_61 = $request->defect_61;
                $pdf->Text($defect_3p, 130, $defect_61);
                $measure_61 = $request->measure_61;
                $pdf->Text($measure_3p, 130, $measure_61);

                $pdf->Text(77, 139, $input_62);
                $defect_62 = $request->defect_62;
                $pdf->Text($defect_3p, 139, $defect_62);
                $measure_62 = $request->measure_62;
                $pdf->Text($measure_3p, 139, $measure_62);

                $pdf->Text(77, 148, $input_63);
                $defect_63 = $request->defect_63;
                $pdf->Text($defect_3p, 148, $defect_63);
                $measure_63 = $request->measure_63;
                $pdf->Text($measure_3p, 148, $measure_63);

                $pdf->Text(77, 156, $input_64);
                $defect_64 = $request->defect_64;
                $pdf->Text($defect_3p, 156, $defect_64);
                $measure_64 = $request->measure_64;
                $pdf->Text($measure_3p, 156, $measure_64);

                $pdf->Text(77, 164, $input_65);
                $defect_65 = $request->defect_65;
                $pdf->Text($defect_3p, 164, $defect_65);
                $measure_65 = $request->measure_65;
                $pdf->Text($measure_3p, 164, $measure_65);

                $pdf->Text(77, 173, $input_66);
                $defect_66 = $request->defect_66;
                $pdf->Text($defect_3p, 173, $defect_66);
                $measure_66 = $request->measure_66;
                $pdf->Text($measure_3p, 173, $measure_66);

                $pdf->Text(77, 182, $input_67);
                $defect_67 = $request->defect_67;
                $pdf->Text($defect_3p, 182, $defect_67);
                $measure_67 = $request->measure_67;
                $pdf->Text($measure_3p, 182, $measure_67);


                $input_68_array = mb_str_split($input_68, 45);
                for ($i=0; $i < sizeof($input_68_array); $i++) { 
                    if (sizeof($input_68_array) == 1) {
                        $pdf->Text(31,195, $input_68);
                    }else{
                        $pdf->Text(31  ,195 + 5 * $i, $input_68_array[$i]);  
                    }
                }
            // end input_position

            // input_receive
            for ($i=69; $i <= 74 ; $i++) { 
                $input_i_1 = "input_$i" . "_1";
                $input_i_2 = "input_$i" . "_2";
                $input_i_3 = "input_$i" . "_3";
                $input_i_4 = "input_$i" . "_4";
                $$input_i_1 = $request->$input_i_1;
                $$input_i_2 = $request->$input_i_2;
                $$input_i_3 = $request->$input_i_3;
                $$input_i_4 = $request->$input_i_4;
            }
            // end input_receive
            // position input_69 ~ input_74
                //input_69 : position
                    $pdf->Text(31, 225, $input_69_1);
                    $pdf->Text(47, 225, $input_69_2);
                    $input_69_3_array = mb_str_split($input_69_3, 4);
                    for ($i=0; $i < sizeof($input_69_3_array); $i++) { 
                        if (sizeof($input_69_3_array) == 1) {
                            $pdf->Text(65,223, $input_69_3);
                        }else{
                            $pdf->Text(65  ,223, $input_69_3_array[0]);  
                            for ($j=1; $j < sizeof($input_69_3_array); $j++) { 
                                $pdf->Text(63 + 10 * ($j - 1),223 + 4, $input_69_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5, 225, $input_69_4);
                // end input_69 : position
                
                //input_70 : position
                    $pdf->Text(29, 234, $input_70_1);
                    $pdf->Text(47, 234, $input_70_2);
                    $input_70_3_array = mb_str_split($input_70_3, 4);
                    for ($i=0; $i < sizeof($input_70_3_array); $i++) { 
                        if (sizeof($input_70_3_array) == 1) {
                            $pdf->Text(65,231.2, $input_70_3);
                        }else{
                            $pdf->Text(65  ,231.2, $input_70_3_array[0]);  
                            for ($j=1; $j < sizeof($input_70_3_array); $j++) { 
                                $pdf->Text(63 + 10 * ($j - 1), 231.2 + 4, $input_70_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5, 234, $input_70_4);
                // end input_70 : position

                //input_71 : position
                    $pdf->Text(29, 242, $input_71_1);
                    $pdf->Text(47, 242, $input_71_2);
                    $input_71_3_array = mb_str_split($input_71_3, 4);
                    for ($i=0; $i < sizeof($input_71_3_array); $i++) { 
                        if (sizeof($input_71_3_array) == 1) {
                            $pdf->Text(65,240.2, $input_71_3);
                        }else{
                            $pdf->Text(65  ,240.2, $input_71_3_array[0]);  
                            for ($j=1; $j < sizeof($input_71_3_array); $j++) { 
                                $pdf->Text(63 + 10 * ($j - 1), 240.2 + 4, $input_71_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5, 242, $input_71_4);
                // end input_71 : position

                //input_72 : position
                    $pdf->Text(32 + 73, 225, $input_72_1);
                    $pdf->Text(47 + 78, 225, $input_72_2);
                    $input_72_3_array = mb_str_split($input_72_3, 4);
                    for ($i=0; $i < sizeof($input_72_3_array); $i++) { 
                        if (sizeof($input_72_3_array) == 1) {
                            $pdf->Text(65 + 79,223, $input_72_3);
                        }else{
                            $pdf->Text(65 + 79  ,223, $input_72_3_array[0]);  
                            for ($j=1; $j < sizeof($input_72_3_array); $j++) { 
                                $pdf->Text(63 + 79 + 10 * ($j - 1),223 + 4, $input_72_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5 + 79, 225, $input_72_4);
                // end input_72 : position
                
                //input_73 : position
                    $pdf->Text(29 + 77, 234, $input_73_1);
                    $pdf->Text(47 + 77, 234, $input_73_2);
                    $input_73_3_array = mb_str_split($input_73_3, 4);
                    for ($i=0; $i < sizeof($input_73_3_array); $i++) { 
                        if (sizeof($input_73_3_array) == 1) {
                            $pdf->Text(65 + 79,231.2, $input_73_3);
                        }else{
                            $pdf->Text(65 + 79  ,231.2, $input_73_3_array[0]);  
                            for ($j=1; $j < sizeof($input_73_3_array); $j++) { 
                                $pdf->Text(63 + 79 + 10 * ($j - 1), 231.2 + 4, $input_73_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5 + 79, 234, $input_73_4);
                // end input_73 : position

                //input_74 : position
                    $pdf->Text(29 + 77, 242, $input_74_1);
                    $pdf->Text(47 + 77, 242, $input_74_2);
                    $input_74_3_array = mb_str_split($input_74_3, 4);
                    for ($i=0; $i < sizeof($input_74_3_array); $i++) { 
                        if (sizeof($input_74_3_array) == 1) {
                            $pdf->Text(65 + 79,240.2, $input_74_3);
                        }else{
                            for ($j=1; $j < sizeof($input_74_3_array); $j++) { 
                                $pdf->Text(65 + 79 ,240.2, $input_74_3_array[0]);  
                                $pdf->Text(63 + 79 + 10 * ($j - 1), 240.2 + 4, $input_74_3_array[$j]);
                            }
                            
                        }
                    }
                    $pdf->Text(84.5 + 79, 242, $input_74_4);
                // end input_74 : position
            // end position input_69 ~ input_74
    
    //end page_3

    //page_4 : start
        //page_4_pdf_code
            $page = $pdf->importPage(4);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);

        // page_4_variable and position
            // //reference points
            //     $pdf->text(0,0,".  (0,0)");
            //     $pdf->text(0,100,".  (0,100)");
            //     $pdf->text(0,200,".  (0,200)");

            $input_g_0_1 = $request->input_g_0_1;
            $pdf->text(36, 30, $input_g_0_1);

            $input_g_0_2 = $request->input_g_0_2;
            $pdf->text(95, 30, $input_g_0_2);

            $input_g_0_3 = $request->input_g_0_3;
            $input_g_0_3 = str_replace("T", "-", $input_g_0_3);
            $input_g_0_3 = str_replace(":", "-", $input_g_0_3);

            if ($input_g_0_3 != null) {
                $input_g_0_3_array = explode("-", $input_g_0_3); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_g_0_3_array[0]; //2021
                $japan_year = "令和 " . ($year - 2018);
                $month = $input_g_0_3_array[1] ; //11
                $day = $input_g_0_3_array[2]; //15
                $hour = $input_g_0_3_array[3];
                $minute = $input_g_0_3_array[4];
                $pdf->Text(113,30,$japan_year);
                $pdf->Text(132,30,$month);
                $pdf->Text(145,30,$day);
                $pdf->Text(156,30,$hour);
                $pdf->Text(168,30,$minute);
            }

            //input_g_$i = 1 ~ 90
                for ($i=1; $i <= 90 ; $i++) { 
                    $input_g_i_1 = "input_g_{$i}_1";
                    $input_g_i_2 = "input_g_{$i}_2";
                    $input_g_i_3 = "input_g_{$i}_3";
                    $$input_g_i_1 = $request->$input_g_i_1;
                    $$input_g_i_2 = $request->$input_g_i_2;
                    $$input_g_i_3 = $request->$input_g_i_3;
                    // var_dump($$input_g_i_1);
                    $position_x0 = 35;
                    $position_y0 = 56;
                    $delta_y = 7.25;
                    $position_y = $position_y0 + $delta_y;
                    if ($i <= 30) {
                        $position_x_1 = $position_x0;
                        $position_x_2 = $position_x_1 + 15;
                        $position_x_3 = $position_x_1 + 32;

                        $position_y = $position_y0 + $delta_y * ($i - 1);
                    }elseif ($i <= 60) {
                        $position_x_1 = $position_x0 + 54;
                        $position_x_2 = $position_x_1 + 15;
                        $position_x_3 = $position_x_1 + 32;

                        $position_y = $position_y0 + $delta_y * ($i - 31);
                    }elseif ($i <= 90) {
                        $position_x_1 = $position_x0 + 54.5 * 2;
                        $position_x_2 = $position_x_1 + 15;
                        $position_x_3 = $position_x_1 + 32;

                        $position_y = $position_y0 + $delta_y * ($i - 61);
                    }

                    $pdf->Text($position_x_1, $position_y, $$input_g_i_1);
                    $pdf->Text($position_x_2, $position_y, $$input_g_i_1);
                    $pdf->Text($position_x_3, $position_y, $$input_g_i_1);
                }
            //end input_g_$i = 1 ~ 90
    //end page_4
    }
// end temp03

// temp04 :
        if($reportype == 'temp04') {

            //temp04.pdf insert
            $pdf->setSourceFile(resource_path('pdf/temp04.pdf'));  
    //page_1 : start
        //page 1_pdf_code
            $page = $pdf->importPage(1);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
        // page_1_variable and position
            // //reference position
            // $pdf->Text(0,0,". (0,0)");
            // $pdf->Text(0,100,". (0,100)");
            // $pdf->Text(0,200,". (0,200)");

            $input_0 = $request->input_0;
            $pdf->Text(124, 32, $input_0);
            
            
            $input_1_1 = $request->input_1_1;
            $input_1_2 = $request->input_1_2;
            $pdf->text(43, 39.5, $input_1_1);
            $pdf->text(147, 39.5, $input_1_2);

            $input_2_1 = $request->input_2_1;
            $input_2_2 = $request->input_2_2;
            $pdf->text(43, 48.5, $input_2_1);
            $pdf->text(147, 48.5, $input_2_2);

            $input_3_1 = $request->input_3_1;
            $input_3_2 = $request->input_3_2;
            $input_3_3 = $request->input_3_3;
            $input_3_4 = $request->input_3_4;
            if ($input_3_1 == true) {
                $pdf->Image(resource_path('img/temp03_input_3_1.png'), '48', '54.4', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            if ($input_3_2 == true) {
                $pdf->Image(resource_path('img/temp03_input_3_2.png'), '68', '54.4', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            if ($input_3_3 != null) {
                $input_3_3_array = explode("-", $input_3_3); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_3_3_array[0]; //2021
                $japan_year = "令和 " . ($year - 2018);
                $month = $input_3_3_array[1] ; //11
                $day = $input_3_3_array[2]; //15
                $pdf->Text(114,55.6,$japan_year);
                $pdf->Text(129.6,55.6,$month);
                $pdf->Text(139,55.6,$day);
            }
            if ($input_3_4 != null) {
                $input_3_4_array = explode("-", $input_3_4); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_3_4_array[0]; //2021
                $japan_year = "令和 " . ($year - 2018);
                $month = $input_3_4_array[1] ; //11
                $day = $input_3_4_array[2]; //15
                $pdf->Text(150.2,55.6,$japan_year);
                $pdf->Text(165,55.6,$month);
                $pdf->Text(174,55.6,$day);
            }

            $input_4_1 = $request->input_4_1;
            $input_4_2 = $request->input_4_2;
            $input_4_3 = $request->input_4_3;
            $input_4_4 = $request->input_4_4;
            $pdf->Text(48, 74, $input_4_1);
            $input_4_2_array = mb_str_split($input_4_2, 6);
            for ($i=0; $i < sizeof($input_4_2_array); $i++) { 
                if (sizeof($input_4_2_array) == 1) {
                    $pdf->Text(123, 61.6, $input_4_2);
                }else{
                    if($i <= 1){
                        $pdf->Text(121.5  ,61.6 + 4.5 * $i, $input_4_2_array[$i]);  
                    }elseif($i > 1){
                        $pdf->Text(121.5 + 21 * ($i - 1)  ,61.6 + 4.5 * 1, $input_4_2_array[$i]);  
                    }
                }
            }
            $pdf->Text(149, 61.6, $input_4_3);
            $pdf->Text(123, 70.8, $input_4_4);

            $input_5_1 = $request->input_5_1;
            $input_5_2 = $request->input_5_2;
            $input_5_3 = $request->input_5_3;
            $input_5_4 = $request->input_5_4;
            $pdf->Text(76, 81.4, $input_5_1);
            $pdf->Text(76, 89, $input_5_2);
            $pdf->Text(148, 81.4, $input_5_3);
            $pdf->Text(147, 89, $input_5_4);
            
            //x_position : defect and measure
            $defect_1p = 131; 
            $measure_1p = 159;

            $input_7 = $request->input_7;
            $pdf->Text(83, 119, $input_7);
            $defect_7 = $request->defect_7;
            $pdf->Text($defect_1p, 119, $defect_7);
            $measure_7 = $request->measure_7;
            $pdf->Text($measure_1p, 119, $measure_7);


            $input_8 = $request->input_8;
            if ($input_8 == 1) {
                $pdf->Image(resource_path('img/temp03_input_8_1.png'), '82', '125', 35, 4, '', '', 'T', true, 100, '', false, false, 1, false, false, false);
            } else {
                $pdf->Image(resource_path('img/temp03_input_8_2.png'), '82', '129', 35, 4, '', '', 'T', true, 100, '', false, false, 1, false, false, false);
            }
            $defect_8 = $request->defect_8;
            $pdf->Text($defect_1p, 127, $defect_8);
            $measure_8 = $request->measure_8;
            $pdf->Text($measure_1p, 127, $measure_8);
            

            $input_9 = $request->input_9;
            $pdf->Text(76+9, 151.5 - 16, $input_7);
            $defect_9 = $request->defect_7;
            $pdf->Text($defect_1p, 151.5 - 16, $defect_7);
            $measure_7 = $request->measure_7;
            $pdf->Text($measure_1p, 151.5 - 16, $measure_7);


            $input_10 = $request->input_10;
            if ($input_10 == 1) {
            $pdf->Image(resource_path('img/temp03_input_10_1.png'), '84', '141.5', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }elseif($input_10 == 2){
                $pdf->Image(resource_path('img/temp03_input_10_2.png'), '97', '141.5', 16, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
            }
            $defect_10 = $request->defect_10;
            $pdf->Text($defect_1p, 143, $defect_10);
            $measure_10 = $request->measure_10;
            $pdf->Text($measure_1p, 143, $measure_10);
            


            $input_11 = $request->input_11;
            $pdf->Text(84, 150, $input_11);
            $defect_11 = $request->defect_11;
            $pdf->Text($defect_1p, 150, $defect_11);
            $measure_11 = $request->measure_11;
            $pdf->Text($measure_1p, 150, $measure_11);

            $input_12 = $request->input_12;
            $pdf->Text(90, 157.5, $input_12);
            $defect_12 = $request->defect_12;
            $pdf->Text($defect_1p, 157.5, $defect_12);
            $measure_12 = $request->measure_12;
            $pdf->Text($measure_1p, 157.5, $measure_12);
            
            $input_13 =$request->input_13;
            $pdf->Text(90, 165, $input_13);
            $defect_13 = $request->defect_13;
            $pdf->Text($defect_1p, 165, $defect_13);
            $measure_13 = $request->measure_13;
            $pdf->Text($measure_1p, 165, $measure_13);
            
            $input_14_1 =$request->input_14_1;
            $input_14_2 =$request->input_14_2;
            // $pdf->Text(88.5, 172.5, $input_14_1);
            $input_14_1_array = mb_str_split($input_14_1, 4);
            for ($i=0; $i < sizeof($input_14_1_array); $i++) { 
                if (sizeof($input_14_1_array) == 1) {
                    $pdf->Text(88.5,172.5, $input_14_1);
                }else{
                    $pdf->Text(89  ,171 + 3.5 * $i, $input_14_1_array[$i]);  
                }
            }
            $pdf->Text(106, 172.5, $input_14_2);
            $defect_14 = $request->defect_14;
            $pdf->Text($defect_1p, 172, $defect_14);
            $measure_14 = $request->measure_14;
            $pdf->Text($measure_1p, 172, $measure_14);

            $input_15 =$request->input_15;
            $pdf->Text(90, 180, $input_15);
            $defect_15 = $request->defect_15;
            $pdf->Text($defect_1p, 180, $defect_15);
            $measure_15 = $request->measure_15;
            $pdf->Text($measure_1p, 180, $measure_15);

            $input_16 =$request->input_16;
            $pdf->Text(90, 187.5, $input_16);
            $defect_16 = $request->defect_16;
            $pdf->Text($defect_1p, 187.5, $defect_16);
            $measure_16 = $request->measure_16;
            $pdf->Text($measure_1p, 187.5, $measure_16);

            $input_17 =$request->input_17;
            $pdf->Text(90, 195, $input_17);
            $defect_17 = $request->defect_17;
            $pdf->Text($defect_1p, 195, $defect_17);
            $measure_17 = $request->measure_17;
            $pdf->Text($measure_1p, 195, $measure_17);

            $input_19 =$request->input_19;
            $pdf->Text(90, 202.5, $input_19);
            $defect_19 = $request->defect_19;
            $pdf->Text($defect_1p, 202.5, $defect_19);
            $measure_19 = $request->measure_19;
            $pdf->Text($measure_1p, 202.5, $measure_19);
            
            $input_20 =$request->input_20;
            $pdf->Text(90, 210, $input_20);
            $defect_20 = $request->defect_20;
            $pdf->Text($defect_1p, 210, $defect_20);
            $measure_20 = $request->measure_20;
            $pdf->Text($measure_1p, 210, $measure_20);

            $input_21 =$request->input_21;
            $pdf->Text(90, 217.5, $input_21);
            $defect_21 = $request->defect_21;
            $pdf->Text($defect_1p, 217.5, $defect_21);
            $measure_21 = $request->measure_21;
            $pdf->Text($measure_1p, 217.5, $measure_21);

            $input_22_1 =$request->input_22_1;
            $input_22_2 =$request->input_22_2;
            $pdf->Text(90.5, 224.3, $input_22_1);
            $pdf->Text(105.5, 224.3, $input_22_2);
            $defect_22 = $request->defect_22;
            $pdf->Text($defect_1p, 224.3, $defect_22);
            $measure_22 = $request->measure_22;
            $pdf->Text($measure_1p, 224.3, $measure_22);

            $input_23 =$request->input_23;
            $pdf->Text(90, 232.5, $input_23);
            $defect_23 = $request->defect_23;
            $pdf->Text($defect_1p, 232.5, $defect_23);
            $measure_23 = $request->measure_23;
            $pdf->Text($measure_1p, 232.5, $measure_23);

            $input_24 =$request->input_24;
            $pdf->Text(90, 240, $input_24);
            $defect_24 = $request->defect_24;
            $pdf->Text($defect_1p, 240, $defect_24);
            $measure_24 = $request->measure_24;
            $pdf->Text($measure_1p, 240, $measure_24);

            // check
            for ($i=7; $i <=24 ; $i++) { 
                if ($i == 18) continue;
                $check_i = "check_$i";
                $$check_i = $request->$check_i;
                if ($$check_i == "1") {
                    $position_y0 = 118.5;
                    $delta_y = 7.6;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    if ($i > 18) {
                        $position_y = $position_y0 + $delta_y * ($i - 8);
                    }
                    $pdf->Image(resource_path('img/temp03_check.png'), '122.5', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $position_y0 = 118.9;
                    $delta_y = 7.55;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    if ($i > 18) {
                        $position_y = $position_y0 + $delta_y * ($i - 8);
                    }
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '119.5', $position_y , 10.5, 5, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif ($$check_i == "2") {
                    $position_y0 = 118.5;
                    $delta_y = 7.6;
                    $position_y = $position_y0 + $delta_y * ($i - 7);
                    if ($i > 18) {
                        $position_y = $position_y0 + $delta_y * ($i - 8);
                    }
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '122.5', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }
            }

              
    //end page_1

    //page_2 : start
        //page_2_pdf_code
            $page = $pdf->importPage(2);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
        // page_2_variable and position
            // //reference position
            //     $pdf->Text(0,0,". (0,0)");
            //     $pdf->Text(0,100,". (0,100)");
            //     $pdf->Text(0,200,". (0,200)");
            
            //x_position : defect and measure
            $defect_3p = 126; 
            $measure_3p = 157;

            $input_25 = $request->input_25;
            $pdf->Text(83, 31.4, $input_25);
            $defect_25 = $request->defect_25;
            $pdf->Text($defect_3p, 31.4, $defect_25);
            $measure_25 = $request->measure_25;
            $pdf->Text($measure_3p, 31.4, $measure_25);

            $input_26 = $request->input_26;
            $pdf->Text(83, 38.8, $input_26);
            $defect_26 = $request->defect_26;
            $pdf->Text($defect_3p, 38.8, $defect_26);
            $measure_26 = $request->measure_26;
            $pdf->Text($measure_3p, 38.8, $measure_26);

            $input_27 = $request->input_27;
            $pdf->Text(83, 46.2, $input_27);
            $defect_27 = $request->defect_27;
            $pdf->Text($defect_3p, 46.2, $defect_27);
            $measure_27 = $request->measure_27;
            $pdf->Text($measure_3p, 46.2, $measure_27);

            $input_28 = $request->input_28;
            $pdf->Text(83, 54.6, $input_28);
            $defect_28 = $request->defect_28;
            $pdf->Text($defect_3p, 54.6, $defect_28);
            $measure_28 = $request->measure_28;
            $pdf->Text($measure_3p, 54.6, $measure_28);

            $input_29 = $request->input_29;
            $pdf->Text(83, 62, $input_29);
            $defect_29 = $request->defect_29;
            $pdf->Text($defect_3p, 62, $defect_29);
            $measure_29 = $request->measure_29;
            $pdf->Text($measure_3p, 62, $measure_29);

            $input_30 = $request->input_30;
            $pdf->Text(83, 69.4, $input_30);
            $defect_30 = $request->defect_30;
            $pdf->Text($defect_3p, 69.4, $defect_30);
            $measure_30 = $request->measure_30;
            $pdf->Text($measure_3p, 69.4, $measure_30);

            $input_31 = $request->input_31;
            $pdf->Text(83, 76.8, $input_31);
            $defect_31 = $request->defect_31;
            $pdf->Text($defect_3p, 76.8, $defect_31);
            $measure_31 = $request->measure_31;
            $pdf->Text($measure_3p, 76.8, $measure_31);

            $input_32 = $request->input_32;
            $pdf->Text(83, 83.2, $input_32);
            $defect_32 = $request->defect_32;
            $pdf->Text($defect_3p, 83.2, $defect_32);
            $measure_32 = $request->measure_32;
            $pdf->Text($measure_3p, 83.2, $measure_32);

            $input_33 = $request->input_33;
            $pdf->Text(83, 91.6, $input_33);
            $defect_33 = $request->defect_33;
            $pdf->Text($defect_3p, 91.6, $defect_33);
            $measure_33 = $request->measure_33;
            $pdf->Text($measure_3p, 91.6, $measure_33);

            
            $input_34 = $request->input_34;
            $pdf->Text(83, 99, $input_34);
            $defect_34 = $request->defect_34;
            $pdf->Text($defect_3p, 99, $defect_34);
            $measure_34 = $request->measure_34;
            $pdf->Text($measure_3p, 99, $measure_34);

            $input_35 = $request->input_35;
            $pdf->Text(83, 106.4, $input_35);
            $defect_35 = $request->defect_35;
            $pdf->Text($defect_3p, 106.4, $defect_35);
            $measure_35 = $request->measure_35;
            $pdf->Text($measure_3p, 106.4, $measure_35);

            
            $input_36 = $request->input_36;
            $pdf->Text(83, 113.8, $input_36);
            $defect_36 = $request->defect_36;
            $pdf->Text($defect_3p, 113.8, $defect_36);
            $measure_36 = $request->measure_36;
            $pdf->Text($measure_3p, 113.8, $measure_36);

            $input_37_1 = $request->input_37_1;
            $input_37_2 = $request->input_37_2;
            $pdf->Text(88.3, 120.3, $input_37_1 . "/");
            $pdf->Text(102, 120.3, $input_37_2);
            $defect_37 = $request->defect_37;
            $pdf->Text($defect_3p, 120.3, $defect_37);
            $measure_37 = $request->measure_37;
            $pdf->Text($measure_3p, 120.3, $measure_37);

            
            $input_38 = $request->input_38;
            $pdf->Text(83, 128, $input_38);
            $defect_38 = $request->defect_38;
            $pdf->Text($defect_3p, 128, $defect_38);
            $measure_38 = $request->measure_38;
            $pdf->Text($measure_3p, 128, $measure_38);

            $input_39 = $request->input_39;
            $pdf->Text(99, 135, $input_39);
            $defect_39 = $request->defect_39;
            $pdf->Text($defect_3p, 135, $defect_39);
            $measure_39 = $request->measure_39;
            $pdf->Text($measure_3p, 135, $measure_39);

            
            $input_40 = $request->input_40;
            $pdf->Text(83, 142.8, $input_40);
            $defect_40 = $request->defect_40;
            $pdf->Text($defect_3p, 142.8, $defect_40);
            $measure_40 = $request->measure_40;
            $pdf->Text($measure_3p, 142.8, $measure_40);

            $input_41 = $request->input_41;
            $pdf->Text(83, 150.2, $input_41);
            $defect_41 = $request->defect_41;
            $pdf->Text($defect_3p, 150.2, $defect_41);
            $measure_41 = $request->measure_41;
            $pdf->Text($measure_3p, 150.2, $measure_41);

            $input_42 = $request->input_42;
            $pdf->Text(83, 157.6, $input_42);
            $defect_42 = $request->defect_42;
            $pdf->Text($defect_3p, 157.6, $defect_42);
            $measure_42 = $request->measure_42;
            $pdf->Text($measure_3p, 157.6, $measure_42);

            
            $input_43 = $request->input_43;
            $pdf->Text(83, 165, $input_43);
            $defect_43 = $request->defect_43;
            $pdf->Text($defect_3p, 165, $defect_43);
            $measure_43 = $request->measure_43;
            $pdf->Text($measure_3p, 165, $measure_43);

            $input_44 = $request->input_44;
            $pdf->Text(83, 172.4, $input_44);
            $defect_44 = $request->defect_44;
            $pdf->Text($defect_3p, 172.4, $defect_44);
            $measure_44 = $request->measure_44;
            $pdf->Text($measure_3p, 172.4, $measure_44);

            $input_45 = $request->input_45;
            $pdf->Text(83, 179.8, $input_45);
            $defect_45 = $request->defect_45;
            $pdf->Text($defect_3p, 179.8, $defect_45);
            $measure_45 = $request->measure_45;
            $pdf->Text($measure_3p, 179.8, $measure_45);

            $input_46 = $request->input_46;
            $pdf->Text(83, 187.2, $input_46);
            $defect_46 = $request->defect_46;
            $pdf->Text($defect_3p, 187.2, $defect_46);
            $measure_46 = $request->measure_46;
            $pdf->Text($measure_3p, 187.2, $measure_46);

            
            $input_48 = $request->input_48;
            $pdf->Text(83, 194.6, $input_48);
            $defect_48 = $request->defect_48;
            $pdf->Text($defect_3p, 194.6, $defect_48);
            $measure_48 = $request->measure_48;
            $pdf->Text($measure_3p, 194.6, $measure_48);

            $input_49 = $request->input_49;
            $pdf->Text(83, 202, $input_49);
            $defect_49 = $request->defect_49;
            $pdf->Text($defect_3p, 202, $defect_49);
            $measure_49 = $request->measure_49;
            $pdf->Text($measure_3p, 202, $measure_49);

            
            $input_50 = $request->input_50;
            $pdf->Text(83, 209.4, $input_50);
            $defect_50 = $request->defect_50;
            $pdf->Text($defect_3p, 209.4, $defect_50);
            $measure_50 = $request->measure_50;
            $pdf->Text($measure_3p, 209.4, $measure_50);

            $input_51 = $request->input_51;
            $pdf->Text(83, 216.8, $input_51);
            $defect_51 = $request->defect_51;
            $pdf->Text($defect_3p, 216.8, $defect_51);
            $measure_51 = $request->measure_51;
            $pdf->Text($measure_3p, 216.8, $measure_51);

            
            $input_52 = $request->input_52;
            $pdf->Text(83, 224.2, $input_52);
            $defect_52 = $request->defect_52;
            $pdf->Text($defect_3p, 224.2, $defect_52);
            $measure_52 = $request->measure_52;
            $pdf->Text($measure_3p, 224.2, $measure_52);

            $input_53 = $request->input_53;
            $pdf->Text(83, 231.6, $input_53);
            $defect_53 = $request->defect_53;
            $pdf->Text($defect_3p, 231.6, $defect_53);
            $measure_53 = $request->measure_53;
            $pdf->Text($measure_3p, 231.6, $measure_53);

            // check
            for ($i=25; $i <=53 ; $i++) { 
                if ($i == 47) continue;
                $check_i = "check_$i";
                $$check_i = $request->$check_i;

                if ($$check_i == "1") {
                    $delta_y = 7.4;
                    $position_y0 = 31.5;
                    $position_y = $position_y0 + $delta_y * ($i - 25);
                    if ($i > 47) {
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check.png'), '116', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $delta_y = 7.4;
                    $position_y0 = 30.5;
                    $position_y = $position_y0 + $delta_y * ($i - 25);
                    if ($i > 47) {
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '112', $position_y , 12.2, 6.1, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif ($$check_i == "2") {
                    $delta_y = 7.4;
                    $position_y0 = 31.5;
                    $position_y = $position_y0 + $delta_y * ($i - 25);
                    if ($i > 47) {
                        $position_y = $position_y0 + $delta_y * ($i - 26);
                    }
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '116', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }
            }

    //end page_2

    //page_3 : start
        //page_3_pdf_code
            $page = $pdf->importPage(3);
            $size = $pdf->getTemplateSize($page);
            $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
            $pdf->useTemplate($page);

            $font = new TCPDF_FONTS(); 

            $font_1 = $font->addTTFfont( resource_path('font/yugothib.ttf') );
            $pdf->SetFont($font_1 , '', 10,'',true);
            $pdf->SetTextColor(0,0,0);
        // page_3_variable and position
            // //reference position
            //     $pdf->Text(0,0,". (0,0)");
            //     $pdf->Text(0,100,". (0,100)");
            //     $pdf->Text(0,200,". (0,200)");

            $defect_3p = 122; 
            $measure_3p = 155;

            $input_55_1 = $request->input_55_1;
            $pdf->Text(78, 38, $input_55_1);
            $input_55_2 = $request->input_55_2;
            $pdf->Text(94, 38, $input_55_2);
            $defect_55 = $request->defect_55;
            $pdf->Text($defect_3p, 38, $defect_55);
            $measure_55 = $request->measure_55;
            $pdf->Text($measure_3p, 38, $measure_55);

            $input_56 = $request->input_56;
            $pdf->Text(90, 44.6, $input_56);
            $defect_26 = $request->defect_26;
            $pdf->Text($defect_3p, 44.6, $defect_26);
            $measure_26 = $request->measure_26;
            $pdf->Text($measure_3p, 44.6, $measure_26);

            $input_57 = $request->input_57;
            $pdf->Text(77, 53, $input_57);
            $defect_57 = $request->defect_57;
            $pdf->Text($defect_3p, 53, $defect_57);
            $measure_57 = $request->measure_57;
            $pdf->Text($measure_3p, 53, $measure_57);

            
            $input_58 = $request->input_58;
            $pdf->Text(77, 60.5, $input_58);
            $defect_58 = $request->defect_58;
            $pdf->Text($defect_3p, 60.5, $defect_58);
            $measure_58 = $request->measure_58;
            $pdf->Text($measure_3p, 60.5, $measure_58);

            $input_59 = $request->input_59;
            $pdf->Text(93, 67.5, $input_59);
            $defect_59 = $request->defect_59;
            $pdf->Text($defect_3p, 67.5, $defect_59);
            $measure_59 = $request->measure_59;
            $pdf->Text($measure_3p, 67.5, $measure_59);

            $input_60 = $request->input_60;
            $pdf->Text(77, 75.5, $input_60);
            $defect_60 = $request->defect_60;
            $pdf->Text($defect_3p, 75.5, $defect_60);
            $measure_60 = $request->measure_60;
            $pdf->Text($measure_3p, 75.5, $measure_60);

            
            $input_61 = $request->input_61;
            $pdf->Text(77, 83, $input_61);
            $defect_61 = $request->defect_61;
            $pdf->Text($defect_3p, 83, $defect_61);
            $measure_61 = $request->measure_61;
            $pdf->Text($measure_3p, 83, $measure_61);

            
            $input_62 = $request->input_62;
            $pdf->Text(93, 90, $input_62);
            $defect_62 = $request->defect_62;
            $pdf->Text($defect_3p, 90, $defect_62);
            $measure_62 = $request->measure_62;
            $pdf->Text($measure_3p, 90, $measure_62);

            $input_63 = $request->input_63;
            $pdf->Text(77, 98, $input_63);
            $defect_63 = $request->defect_63;
            $pdf->Text($defect_3p, 98, $defect_63);
            $measure_63 = $request->measure_63;
            $pdf->Text($measure_3p, 98, $measure_63);

            
            $input_64 = $request->input_64;
            $pdf->Text(77, 105.5, $input_64);
            $defect_64 = $request->defect_64;
            $pdf->Text($defect_3p, 105.5, $defect_64);
            $measure_64 = $request->measure_64;
            $pdf->Text($measure_3p, 105.5, $measure_64);

            $input_65 = $request->input_65;
            $pdf->Text(77, 113, $input_65);
            $defect_65 = $request->defect_65;
            $pdf->Text($defect_3p, 113, $defect_65);
            $measure_65 = $request->measure_65;
            $pdf->Text($measure_3p, 113, $measure_65);

            $input_66 = $request->input_66;
            $pdf->Text(77, 120.5, $input_66);
            $defect_66 = $request->defect_66;
            $pdf->Text($defect_3p, 120.5, $defect_66);
            $measure_66 = $request->measure_66;
            $pdf->Text($measure_3p, 120.5, $measure_66);

            
            $input_67_1 = $request->input_67_1;
            $input_67_2 = $request->input_67_2;
            if ($input_67_1 != null) {
                $input_67_1_array = explode("-", $input_67_1); //Array ( [0] => 2021 [1] => 11 [2] => 15 )
                $year = $input_67_1_array[0]; //2021
                $japan_year = "令和 " . ($year - 2018);
                $month = $input_67_1_array[1] ; //11
                // $day = $input_67_1_array[2]; //15
                $pdf->Text(103,132,$japan_year);
                $pdf->Text(125,132.2,$month);
                // $pdf->Text(137,57,$day);
            }

            $input_67_2_array = mb_str_split($input_67_2, 43);
            for ($i=0; $i < sizeof($input_67_2_array); $i++) { 
                if (sizeof($input_67_2_array) == 1) {
                    $pdf->Text(32,138, $input_67_2);
                }else{
                    $pdf->Text(32  ,138 + 6 * $i, $input_67_2_array[$i]);  
                }
            }
            
            $input_69_1 = $request->input_69_1;
            $input_69_2 = $request->input_69_2;
            $input_69_3 = $request->input_69_3;
            $input_69_4 = $request->input_69_4;
            $pdf->Text(77, 53, $input_57);

            $input_70_1 = $request->input_70_1;
            $input_70_2 = $request->input_70_2;
            $input_70_3 = $request->input_70_3;
            $input_70_4 = $request->input_70_4;

            $input_71_1 = $request->input_71_1;
            $input_71_2 = $request->input_71_2;
            $input_71_3 = $request->input_71_3;
            $input_71_4 = $request->input_71_4;

            $input_72_1 = $request->input_72_1;
            $input_72_2 = $request->input_72_2;
            $input_72_3 = $request->input_72_3;
            $input_72_4 = $request->input_72_4;

            $input_73_1 = $request->input_73_1;
            $input_73_2 = $request->input_73_2;
            $input_73_3 = $request->input_73_3;
            $input_73_4 = $request->input_73_4;

            $input_74_1 = $request->input_74_1;
            $input_74_2 = $request->input_74_2;
            $input_74_3 = $request->input_74_3;
            $input_74_4 = $request->input_74_4;

            // position input_69 ~ input_74
                //input_69 : position
                $pdf->Text(29.5, 216, $input_69_1);
                $pdf->Text(50, 216, $input_69_2);
                $input_69_3_array = mb_str_split($input_69_3, 4);
                for ($i=0; $i < sizeof($input_69_3_array); $i++) { 
                    if (sizeof($input_69_3_array) == 1) {
                        $pdf->Text(65,213, $input_69_3);
                    }else{
                        $pdf->Text(65  ,213, $input_69_3_array[0]);  
                        for ($j=1; $j < sizeof($input_69_3_array); $j++) { 
                            $pdf->Text(64 + 10 * ($j - 1),213 + 4, $input_69_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5, 216, $input_69_4);
            // end input_69 : position
            
            //input_70 : position
                $pdf->Text(29, 223, $input_70_1);
                $pdf->Text(45.5, 223, $input_70_2);
                $input_70_3_array = mb_str_split($input_70_3, 4);
                for ($i=0; $i < sizeof($input_70_3_array); $i++) { 
                    if (sizeof($input_70_3_array) == 1) {
                        $pdf->Text(65,221, $input_70_3);
                    }else{
                        $pdf->Text(65  ,221, $input_70_3_array[0]);  
                        for ($j=1; $j < sizeof($input_70_3_array); $j++) { 
                            $pdf->Text(64 + 10 * ($j - 1), 221 + 4, $input_70_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5, 223, $input_70_4);
            // end input_70 : position

            //input_71 : position
                $pdf->Text(29,231, $input_71_1);
                $pdf->Text(45.8,231, $input_71_2);
                $input_71_3_array = mb_str_split($input_71_3, 4);
                for ($i=0; $i < sizeof($input_71_3_array); $i++) { 
                    if (sizeof($input_71_3_array) == 1) {
                        $pdf->Text(65,228.5, $input_71_3);
                    }else{
                        $pdf->Text(65  ,228.5, $input_71_3_array[0]);  
                        for ($j=1; $j < sizeof($input_71_3_array); $j++) { 
                            $pdf->Text(64 + 10 * ($j - 1), 228.5 + 4, $input_71_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5,231, $input_71_4);
            // end input_71 : position

            //input_72 : position
                $pdf->Text(32 + 74, 216, $input_72_1);
                $pdf->Text(47 + 78, 216, $input_72_2);
                $input_72_3_array = mb_str_split($input_72_3, 4);
                for ($i=0; $i < sizeof($input_72_3_array); $i++) { 
                    if (sizeof($input_72_3_array) == 1) {
                        $pdf->Text(65 + 79,213, $input_72_3);
                    }else{
                        $pdf->Text(65 + 79  ,213, $input_72_3_array[0]);  
                        for ($j=1; $j < sizeof($input_72_3_array); $j++) { 
                            $pdf->Text(63 + 79 + 10 * ($j - 1),213 + 4, $input_72_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5 + 79, 216, $input_72_4);
            // end input_72 : position
            
            //input_73 : position
                $pdf->Text(29 + 77, 223, $input_73_1);
                $pdf->Text(47 + 77, 223, $input_73_2);
                $input_73_3_array = mb_str_split($input_73_3, 4);
                for ($i=0; $i < sizeof($input_73_3_array); $i++) { 
                    if (sizeof($input_73_3_array) == 1) {
                        $pdf->Text(65 + 79,221, $input_73_3);
                    }else{
                        $pdf->Text(65 + 79  ,221, $input_73_3_array[0]);  
                        for ($j=1; $j < sizeof($input_73_3_array); $j++) { 
                            $pdf->Text(64 + 79 + 10 * ($j - 1), 221 + 4, $input_73_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5 + 79, 223, $input_73_4);
            // end input_73 : position

            //input_74 : position
                $pdf->Text(29 + 77, 231, $input_74_1);
                $pdf->Text(47 + 77, 231, $input_74_2);
                $input_74_3_array = mb_str_split($input_74_3, 4);
                for ($i=0; $i < sizeof($input_74_3_array); $i++) { 
                    if (sizeof($input_74_3_array) == 1) {
                        $pdf->Text(65 + 79,228.5, $input_74_3);
                    }else{
                        for ($j=1; $j < sizeof($input_74_3_array); $j++) { 
                            $pdf->Text(65 + 79 ,228.5, $input_74_3_array[0]);  
                            $pdf->Text(64 + 79 + 10 * ($j - 1), 228.5 + 4, $input_74_3_array[$j]);
                        }
                        
                    }
                }
                $pdf->Text(84.5 + 79, 231, $input_74_4);
            // end input_74 : position
        // end position input_69 ~ input_74

            // check
            for ($i=55; $i <=66 ; $i++) { 
                $check_i = "check_$i";
                $$check_i = $request->$check_i;
                if ($$check_i == "1") {
                    $delta_y = 7.45;
                    $position_y0 = 38;
                    $position_y = $position_y0 + $delta_y * ($i - 55);
                  
                    $pdf->Image(resource_path('img/temp03_check.png'), '111', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif($$check_i == "0"){
                    $delta_y = 7.49;
                    $position_y0 = 36.5;
                    $position_y = $position_y0 + $delta_y * ($i - 55);
                   
                    $pdf->Image(resource_path('img/temp03_check_null.png'), '107.1', $position_y , 11.8, 6, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }elseif ($$check_i == "2") {
                    $delta_y = 7.45;
                    $position_y0 = 38;
                    $position_y = $position_y0 + $delta_y * ($i - 55);
                  
                    $pdf->Image(resource_path('img/temp03_check_cancel.png'), '111', $position_y , 4, 4, '', '', 'T', true, 100, '', false, false, 0, false, false, false);
                }
            }
            

        //end page_3
        }



// end temp04
//download or internet  : "D" or "I"
        $pdf->Output($reportype . ".pdf", "D");
        return redirect()->route('home');
         
    }
} 
?>