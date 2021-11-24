@extends('layouts.app')

@section('content')

<div class="container px-0">
    <div class="row justify-content-center">
        <!-- title bar -->
        <div class="col-md-12 px-0">
            <div class="card">
                <div class="card-header">{{ __('管理画面') }}</div>                
            </div>
        </div>
        <!-- working part -->
        <div class="col-lg-12 px-0">
            <div class="card">
                <div class="card-body px-0">
                    <!-- select list -->
                    <select name="report_type" id="report_type" class="form-control" onchange="chooseType()">
                        <option value="1">24非常電源(自家発電設備)</option>
                        <option value="2">25非常電源(蓄電池設備)</option>
                        <option value="3">作業確認書</option>
                        <option value="4">負荷運転報告書</option>
                    </select>
                <!-- form group -->
                    <div class="form_group">
                    <!-- temp04 : 24非常電源(自家発電設備)-->
                        <form action="edit" method="post" id="rep01" class="rep_form">   
                        <input type="hidden" name="reportype" value="temp04">
                        @csrf
                            <div class="rep_head">
                            24非常電源(自家発電設備)
                                </div> 
                            <!-- page_1 -->
                            <div id = "page_1" class="page_a"> 
                                <!-- page_title -->
                                <div class="page_title">
                                    非 常 電 源 （ 蓄 電 池 設 備 ） 点 検 票
                                </div>
                                <!-- row_0 :-->
                                <div id="row_0" class="row_a" >
                                    <!-- <label for="" id="label_0" class = "label_a mark_a" >
                                        その１
                                    </label> -->
                                    <label for="" id="label_0" class = "label_a" >
                                        設備名
                                    </label>
                                    <input type="text" name = "input_0" class = "input_a form-control" >

                                </div>
                                <!-- end row_0 -->

                                <!-- row_1 -->
                                <div id="row_1" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_1" class = "label_a" >
                                            名 称
                                        </label>
                                        <input type="text" name = "input_1_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_1" class = "label_a" >
                                            防 火管 理 者
                                        </label>
                                        <input type="text" name = "input_1_2" class = "input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_1 -->

                                <!-- row_2 -->
                                <div id="row_2" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_2" class = "label_a" >
                                            所 在
                                        </label>
                                        <input type="text" name = "input_2_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_2" class = "label_a" >
                                            立 会 者
                                        </label>
                                        <input type="text" name = "input_2_2" class = "input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_2 -->
                                <!-- row_3 -->
                                <div id="row_3" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_3" class = "label_a" >
                                            点検種別
                                        </label>
                                        <div class="checkbox_group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="input_3_1" checked>
                                                <label for=""> 機 器</label><br>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="input_3_2" checked>
                                                <label for=""> 総 合</label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_3" class = "label_a" >
                                            点検年月日
                                        </label>
                                        <div id = "date">
                                            <input type="date" name = "input_3_3" class = "input_a form-control" >
                                            ~
                                            <input type="date" name = "input_3_4" class = "input_a form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end row_3 -->
                                <!-- row_4 -->
                                <div id="row_4" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_4" class = "label_a" >
                                            点 検 者
                                        </label>
                                        <input type="text" name = "input_4_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_4" class = "label_a" >
                                            点検者所属会社
                                        </label>
                                        <div id = "row_4_div">
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                        社名
                                                </label>
                                                <input type="text" name = "input_4_2" class = "input_a form-control" >
                                            </div>
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                    TEL
                                                </label>
                                                <input type="tel" name = "input_4_3" class = "input_a form-control">
                                            </div>
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                    住所
                                                </label>
                                                <input type="text" name = "input_4_4" class = "input_a form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row_4 -->
                                <!-- row_5 -->
                                <div id="row_5" class="row_a" >
                                    <label for="" id="label_5" class = "label_a" >
                                        点 検 設 備 名
                                        </label>
                                    <!-- row_5 col_a1 -->
                                    <div id = "col_a1" class = "col_a">
                                        <div id = "col_a11">
                                            <div class = "col_a111">
                                                <label for="" id="label_5" class = "label_a" >
                                                原 動 機
                                                </label>
                                                <div class="col_a1111">
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        製造者名
                                                        </label>
                                                        <input type="text" name = "input_5_1" class = "input_a form-control" >
                                                    </div>
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        型 式 等
                                                        </label>
                                                        <input type="text" name = "input_5_2" class = "input_a form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row_5 col_a1 -->

                                    <!-- row_5 col_a2 -->
                                    <div id = "col_a2" class = "col_a">
                                        <div class="col_a22">
                                            <label for="" id="label_5" class = "label_a" >
                                            発 電 機
                                            </label>
                                            <div class="col_a222">
                                                <div class="col_a2222">
                                                    <label for="" id="label_5" class = "label_a" >
                                                    製造者名
                                                    </label>
                                                    <input type="text" name = "input_5_3" class = "input_a form-control" >
                                                </div>
                                                <div>
                                                    <label for="" id="label_5" class = "label_a" >
                                                    型 式 等
                                                    </label>
                                                    <input type="text" name = "input_5_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row_5 col_a2 -->
                                </div>
                                <!-- end row_5 -->   
                                <!-- row_6 -->
                                <div id="row_6" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_6" class = "label_b" >
                                            点 検 項 目
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <label for="" id="label_6" class = "label_b" >
                                            種別・容量等の内容
                                        </label>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <label for="" id="label_6" class = "label_b" >
                                            判 定
                                        </label>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <label for="" id="label_6" class = "label_b" >
                                            不 良 内 容
                                        </label>
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <label for="" id="label_6" class = "label_b" >
                                            措 置 内 容
                                        </label>
                                    </div>
                                </div>
                                <!-- end row_6 -->  

                                <!-- row_6_1 group_title -->
                                <div id = "row_6_1" class="row_a">
                                    <label id = "label_6_1" class = "group_title">
                                        機 器 点 検
                                    </label>
                                </div>
                                <!-- end row_6_1 group_title -->

                                <!-- row_group_1 : row_7 ~ row_12 -->
                                <div id = "row_group_1" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">設 置 状 況</label>
                                    </div>
                                    <!-- row_group_1_content -->
                                    <div class="row_group_content">
                                        <!-- row_7 -->
                                        <div id="row_7" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_7" class = "label_b" >
                                                    周 囲 の 状 況
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_7" class = "input_a form-control" placeholder="種別・容量等の内容">
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_7" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_7" class = "defect input_a form-control" placeholder="不 良 内 容">
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_7" class = "measure input_a form-control" placeholder="措 置 内 容">
                                            </div>
                                        </div>
                                        <!-- end row_7 -->  
                                            <!-- row_8 -->
                                            <div id="row_8" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_8" class = "label_b" >
                                                区 画 等
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <!-- <div class="checkbox">
                                                    <input type="radio" name="input_8" value = "1" checked>
                                                    <label for=""> キ ュ ー ビ ク ル 式</label><br>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="radio" name="input_8" value = "2">
                                                    <label for=""> キュービクル式以外</label><br>
                                                </div> -->
                                                <select name = "input_8" class = "form-control input_a form-select select_box">
                                                    <option value="1">キ ュ ー ビ ク ル 式</option>
                                                    <option value="2">キュービクル式以外</option>
                                                </select>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_8" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_8" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_8" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_8 -->  
                                        <!-- row_9 -->
                                        <div id="row_9" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_9" class = "label_b" >
                                                水 の 浸 透
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_9" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_9" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_9" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_9" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_10 --> 
                                        <div id="row_10" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_10" class = "label_b" >
                                                換 気
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <!-- <div class="checkbox_group">
                                                    <div class="checkbox">
                                                        <input type="radio" name="input_10" value="1">
                                                        <label for=""> 自 然</label><br>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="radio" name="input_10" value = "2" checked>
                                                        <label for=""> 機 械</label><br>
                                                    </div>
                                                </div> -->
                                                <select name = "input_10" class = "form-control input_a form-select select_box">
                                                        <option value="1"> 自 然</option>
                                                        <option value="2">機 械</option>
                                                    </select>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_10" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_10" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_10" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_10 --> 
                                        <!-- end row_11 --> 
                                            <div id="row_11" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_11" class = "label_b" >
                                                照 明
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_11" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_11" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_11" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_11" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_11 --> 
                                        <!-- end row_12 --> 
                                        <div id="row_12" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_12" class = "label_b" >
                                                標 識
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_12" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_12" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_12" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_12" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_12 --> 
                                        
                                    </div>
                                    <!-- end row_group_1_content -->
                                </div>
                                <!-- end row_group_1 : row_7 ~ row_12 -->

                                <!-- row_13 -->
                                <div id="row_13" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_13" class = "label_b" >
                                        結 線 接 続
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_13" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_13" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                        </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_13" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_13" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_13 -->  

                                <!-- row_group_2: row_14 ~ row_19 -->
                                <div id = "row_group_2" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">自家発電装置</label>
                                    </div>
                                    <!-- row_group_2_content -->
                                    <div class="row_group_content">
                                        <!-- row_14 -->
                                        <div id="row_14" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_14" class = "label_b" >
                                                原 動 機 ・ 発 電 機 
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <span class="unit">種類</span>
                                                <input type="text" name = "input_14_1" class = "input_a form-control" >
                                                <input type="text" name = "input_14_2" class = "input_a form-control" >
                                                <span class="unit" >kW</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_14" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_14" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_14" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_14 -->  
                                        <!-- row_15 -->
                                        <div id="row_15" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_15" class = "label_b" >
                                                冷却装置ラジエータ、配管等
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_15" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_15" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_15" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_15" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_15 --> 
                                        <!-- row_16 -->
                                        <div id="row_16" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_16" class = "label_b" >
                                                冷却装置冷 却 フ ァ ン
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_16" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_16" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_16" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_16" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_16 --> 
                                        <!-- row_17 -->
                                        <div id="row_17" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_17" class = "label_b" >
                                                潤 滑 油 類
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_17" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_17" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_17" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_17" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_17 --> 
                                        <!-- row_19 -->
                                        <div id="row_19" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_19" class = "label_b" >
                                                そ の 他 の 付 属 機 器 類
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_19" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_19" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_19" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_19" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_19 --> 
                                    </div>
                                    <!-- end row_group_2_content -->
                                </div>
                                <!-- end row_group_2: row_14 ~ row_19 -->

                                <!-- row_group_3: row_20 ~ row_24 -->
                                <div id = "row_group_3" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">始 動 装 置</label>
                                    </div>
                                    <!-- row_group_3_content -->
                                    <div class="row_group_content">
                                        <!-- row_20 -->
                                        <div id="row_20" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_20" class = "label_b" >
                                                ※始 動 用 蓄 電 池 設 備
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_20" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_20" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_20" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_20" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_20 -->  
                                        <!-- row_21 -->
                                        <div id="row_21" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_21" class = "label_b" >
                                                始動用空気圧縮設備:外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_21" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_21" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_21" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_21" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_21 -->  
                                        <!-- row_22 -->
                                        <div id="row_22" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_22" class = "label_b" >
                                                始動用空気圧縮設備:空 気 だ め
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_22_1" class = "input_a form-control" >
                                                <span class="unit">MPa</span>
                                                <input type="text" name = "input_22_2" class = "input_a form-control" >
                                                <span class="unit">L</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_22" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_22" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_22" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_22 -->  
                                        <!-- row_23 -->
                                        <div id="row_23" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_23" class = "label_b" >
                                                始動用空気圧縮設備:潤 滑 油 類
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_23" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_23" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_23" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_23" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_23 --> 
                                        <!-- row_24 -->
                                        <div id="row_24" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_24" class = "label_b" >
                                                始 動 用 燃 料
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_24" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_24" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_24" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_24" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_24 --> 
                                    </div>
                                    <!-- end row_group_3_content -->
                                </div>
                                <!-- end row_group_3: row_20 ~ row_24 -->
                            </div>
                            <!-- end page_1 -->

                            <!-- page_2 -->
                            <div id = "page_2" class="page_a"> 
                                <!-- row_group_4: row_25 ~ row_33 -->
                                <div id = "row_group_4" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">制 御 装 置</label>
                                    </div>
                                    <!-- row_group_4_content -->
                                    <div class="row_group_content">
                                        <!-- row_25 -->
                                        <div id="row_25" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_25" class = "label_b" >
                                                周 囲 の 状 況
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_25" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_25" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_25" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_25" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_25 -->  
                                        <!-- row_26 -->
                                        <div id="row_26" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_26" class = "label_b" >
                                                発 電 機 盤
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_26" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_26" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_26" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_26" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_26 -->  
                                        <!-- row_27 -->
                                        <div id="row_27" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_27" class = "label_b" >
                                                自 動 始 動 盤
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_27" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_27" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_27" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_27" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_27 -->  
                                        <!-- row_28 -->
                                        <div id="row_28" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_28" class = "label_b" >
                                                補 機 盤
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_28" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_28" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_28" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_28" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_28 -->  
                                        <!-- row_29 -->
                                        <div id="row_29" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_29" class = "label_b" >
                                                電 源 表 示 灯
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_29" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_29" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_29" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_29" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_29 -->  
                                        <!-- row_30 -->
                                        <div id="row_30" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_30" class = "label_b" >
                                                表 示 灯
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_30" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_30" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_30" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_30" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_30 -->  
                                        <!-- row_31 -->
                                        <div id="row_31" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_31" class = "label_b" >
                                                開 閉 器 ・ 遮 断 器
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_31" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_31" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_31" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_31" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_31 -->  
                                        <!-- row_32 -->
                                        <div id="row_32" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_32" class = "label_b" >
                                                ヒ ュ ー ズ 類
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_32" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_32" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_32" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_32" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_32 -->  
                                        <!-- row_33 -->
                                        <div id="row_33" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_33" class = "label_b" >
                                                継 電 器
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_33" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_33" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_33" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_33" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_33 -->  
                                    </div>
                                    <!-- end row_group_4_content -->
                                </div>
                                <!-- end row_group_4: row_22 ~ row_33 -->

                                <!-- row_34 -->
                                <div id="row_34" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_34" class = "label_b" >
                                        保 護 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_34" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_34" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_34" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_34" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_34 -->  
                                <!-- row_35 -->
                                <div id="row_35" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_35" class = "label_b" >
                                        計 器 類
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_35" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_35" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_35" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_35" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_35 -->  

                                <!-- row_group_5: row_36 ~ row_37 -->
                                <div id = "row_group_5" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">燃 料 容 器 等</label>
                                    </div>
                                    <!-- row_group_5_content -->
                                    <div class="row_group_content">
                                        <!-- row_36 -->
                                        <div id="row_36" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_36" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_36" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_36" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_36" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_36" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_36 -->  
                                        <!-- row_37 -->
                                        <div id="row_37" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_37" class = "label_b" >
                                                燃 料 貯 蔵 量
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <span class="unit">種類</span>
                                                <input type="text" name = "input_37_1" class = "input_a form-control" >
                                                <input type="text" name = "input_37_2" class = "input_a form-control" >
                                                <span class="unit">L</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_37" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_37" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_37" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_37 -->  
                                    </div>
                                    <!-- end row_group_5_content -->
                                </div>
                                <!-- end row_group_5: row_36 ~ row_37 -->

                                <!-- row_group_6: row_38 ~ row_39 -->
                                <div id = "row_group_6" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                            冷 却 水 タ ン ク
                                        </label>
                                    </div>
                                    <!-- row_group_6_content -->
                                    <div class="row_group_content">
                                        <!-- row_38 -->
                                        <div id="row_38" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_38" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_38" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_38" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_38" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_38" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_38 -->  
                                        <!-- row_39 -->
                                        <div id="row_39" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_39" class = "label_b" >
                                                水 量
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_39" class = "input_a form-control" >
                                                <span class="unit">L</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_39" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_39" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_39" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_39 -->  
                                    </div>
                                    <!-- end row_group_6_content -->
                                </div>
                                <!-- end row_group_6: row_38 ~ row_39 -->

                                <!-- row_group_6_1: row_40 ~ row_42 -->
                                <div id = "row_group_6_1" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        排 気 筒
                                        </label>
                                    </div>
                                    <!-- row_group_6_1_content -->
                                    <div class="row_group_content">
                                        <!-- row_40 -->
                                        <div id="row_40" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_40" class = "label_b" >
                                                周 囲 の 状 況
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_40" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_40" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_40" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_40" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_40 -->  
                                        <!-- row_41 -->
                                        <div id="row_41" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_41" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_41" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_41" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_41" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_41" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_41 -->  
                                        <!-- row_42 -->
                                        <div id="row_42" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_42" class = "label_b" >
                                                貫 通 部
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_42" class = "input_a form-control" >
                                                <span class="unit">L</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_42" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_42" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_42" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_42 -->  
                                    </div>
                                    <!-- end row_group_6_1_content -->
                                </div>
                                <!-- end row_group_6_1: row_40 ~ row_42 -->
                                
                                <!-- row_43 -->
                                <div id="row_43" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_43" class = "label_b" >
                                        配 管
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_43" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_43" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_43" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_43" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_43 -->  
                                <!-- row_44 -->
                                <div id="row_44" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_44" class = "label_b" >
                                        結 線 接 続
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_44" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_44" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_44" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_44" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_44 -->  
                                <!-- row_45 -->
                                <div id="row_45" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_45" class = "label_b" >
                                        接 地
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_45" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_45" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_45" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_45" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_45 -->  
                                <!-- row_46 -->
                                <div id="row_46" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_46" class = "label_b" >
                                        始 動 性 能
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_46" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_46" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_46" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_46" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_46 -->  

                                <!-- row_group_7: row_48 ~ row_49 -->
                                <div id = "row_group_7" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        運 転 性 能
                                        </label>
                                    </div>
                                    <!-- row_group_7_content -->
                                    <div class="row_group_content">
                                        <!-- row_48 -->
                                        <div id="row_48" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_48" class = "label_b" >
                                                運 転 状 況
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_48" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_48" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_48" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_48" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_48 -->  
                                        <!-- row_49 -->
                                        <div id="row_49" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_49" class = "label_b" >
                                                換 気
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_49" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_49" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_49" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_49" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_49 -->  
                                    </div>
                                    <!-- end row_group_7_content -->
                                </div>
                                <!-- end row_group_7: row_48 ~ row_49 -->

                                <!-- row_group_8: row_50 ~ row_51 -->
                                <div id = "row_group_8" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        停 止 性 能
                                        </label>
                                    </div>
                                    <!-- row_group_8_content -->
                                    <div class="row_group_content">
                                        <!-- row_50 -->
                                        <div id="row_50" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_50" class = "label_b" >
                                                手 動 停 止
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_50" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_50" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_50" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_50" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_50 -->  
                                        <!-- row_51 -->
                                        <div id="row_51" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_51" class = "label_b" >
                                                自 動 停 止
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_51" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_51" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_51" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_51" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_51 -->  
                                    </div>
                                    <!-- end row_group_8_content -->
                                </div>
                                <!-- end row_group_8: row_50 ~ row_51 -->

                                <!-- row_52 -->
                                <div id="row_52" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_52" class = "label_b" >
                                        耐 震 措 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_52" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_52" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_52" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_52" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_52 -->
                                <!-- row_53 -->
                                <div id="row_53" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_53" class = "label_b" >
                                        予 備 品 等
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_53" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_53" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_53" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_53" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_53 -->
                            </div>
                            <!-- end page_2 -->

                            <!-- page_3 -->
                            <div id = "page_3" class="page_a"> 
                                <!-- row_54 page_title -->
                                <div class="page_title">
                                    総 合 点 検
                                </div>
                                <!-- end row_54 : page_title :-->
                                <!-- row_55 -->
                                <div id="row_55" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_55" class = "label_b" >
                                        接 地 抵 抗
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_55_1" class = "input_a form-control" >
                                        <span class="unit">種</span>
                                        <input type="text" name = "input_55_2" class = "input_a form-control" >
                                        <span class="unit">Ω</span>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_55" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_55" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_55" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_55 -->  
                                <!-- row_56 -->
                                <div id="row_56" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_56" class = "label_b" >
                                        絶 縁 抵 抗
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_56" class = "input_a form-control" >
                                        <span class="unit">MΩ</span>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_56" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_56" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_56" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_56 -->  
                                <!-- row_57 -->
                                <div id="row_57" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_57" class = "label_b" >
                                        自 家 発 電 装 置 の 接 続 部
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_57" class = "input_a form-control" >
                                        <!-- <span class="unit">MΩ</span> -->
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_57" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_57" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_57" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_57 -->  

                                <!-- row_group_9: row_58 ~ row_60 -->
                                <div id = "row_group_9" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        始動装置
                                        </label>
                                    </div>
                                    <!-- row_group_9_content -->
                                    <div class="row_group_content">
                                        <!-- row_58 -->
                                        <div id="row_58" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_58" class = "label_b" >
                                                ※ 始 動 用 蓄 電 池 設 備
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_58" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_58" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_58" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_58" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_58 -->  
                                        <!-- row_59 -->
                                        <div id="row_59" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_59" class = "label_b" >
                                                始 動 用 空 気 圧 縮 設 備
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_59" class = "input_a form-control" >
                                                <span class="unit">L</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_59" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_59" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_59" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_59 -->  
                                        <!-- row_60 -->
                                        <div id="row_60" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_60" class = "label_b" >
                                                始 動 補 助 装 置
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_60" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_60" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_60" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_60" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_60 -->  
                                    </div>
                                    <!-- end row_group_9_content -->
                                </div>
                                <!-- end row_group_9: row_58 ~ row_60 -->

                                <!-- row_61 -->
                                <div id="row_61" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_61" class = "label_b" >
                                        保 護 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_61" class = "input_a form-control" >
                                        <!-- <span class="unit">MΩ</span> -->
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_61" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_61" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_61" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_61 -->  

                                <!-- row_group_10: row_62 ~ row_63 -->
                                <div id = "row_group_10" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        ※※運転性能
                                        </label>
                                    </div>
                                    <!-- row_group_10_content -->
                                    <div class="row_group_content">
                                        <!-- row_62 -->
                                        <div id="row_62" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_62" class = "label_b" >
                                                負 荷 運 転
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_62" class = "input_a form-control" >
                                                <span class="unit">kW</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_62" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_62" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_62" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_62 -->  
                                        <!-- row_63 -->
                                        <div id="row_63" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_63" class = "label_b" >
                                                内 部 観 察 等
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_63" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_63" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_63" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_63" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_63 -->  
                                    </div>
                                    <!-- end row_group_10_content -->
                                </div>
                                <!-- end row_group_10: row_62 ~ row_63 -->

                                <!-- row_group_11: row_64 ~ row_66 -->
                                <div id = "row_group_9" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">
                                        切替性能
                                        </label>
                                    </div>
                                    <!-- row_group_11_content -->
                                    <div class="row_group_content">
                                        <!-- row_64 -->
                                        <div id="row_64" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_64" class = "label_b" >
                                                運 転 切 替 性 能
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_64" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_64" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_64" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_64" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_64 -->  
                                        <!-- row_65 -->
                                        <div id="row_65" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_65" class = "label_b" >
                                                ※蓄電池切替性能
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_65" class = "input_a form-control" >
                                                <!-- <span class="unit">L</span> -->
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_65" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_65" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_65" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_65 -->  
                                        <!-- row_66 -->
                                        <div id="row_66" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_66" class = "label_b" >
                                                始動用燃料切替性能
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_66" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_66" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_66" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_66" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_66 -->  
                                    </div>
                                    <!-- end row_group_11_content -->
                                </div>
                                <!-- end row_group_11: row_64 ~ row_66 -->
                                
                                <!-- row_67 : textarea -->
                                <div class="textarea">
                                    <!-- row_67 :textarea-->
                                    <div id="row_67" class="row_a" >
                                        <div id = "col_b1" class = "col_b1">
                                            <label for="" id="label_67" class = "label_b" >
                                            備 考 <br>
                                            電気主任技術者 氏名及び番号
                                            負荷運転又は内部観察等の最終実施年月
                                            </label>
                                            <input type="month" name = "input_67_1" class="input_a form-control input_month">
                                        </div>
                                        <div id = "col_b2" class = "col_b2">
                                            <textarea name="input_67_2" id="" cols="60" rows="5" class = "input_a form-control">
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- end row_67 : textarea--> 
                                </div>
                                <!-- end row_67 : textarea -->


                                
                                
                                <!-- row_69 ~ 74 -->
                                <div class="row_69_74">
                                    <!-- row_69_group -->
                                    <div id = "row_group_69" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (1)</label>
                                        </div>
                                        <!-- row_69_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_69_1 -->
                                            <div id="row_69_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_1 -->
                                            <!-- row_69_2 -->
                                            <div id="row_69_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_2 -->   
                                            <!-- row_69_3 -->
                                            <div id="row_69_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_3 -->   
                                            <!-- row_69_4 -->
                                            <div id="row_69_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_4 -->   
                                        </div>
                                        <!-- end row_69_group_content -->
                                    </div>
                                    <!-- end row_69_group -->

                                    <!-- row_70_group -->
                                    <div id = "row_group_70" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (2)</label>
                                        </div>
                                        <!-- row_70_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_70_1 -->
                                            <div id="row_70_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_1 -->
                                            <!-- row_70_2 -->
                                            <div id="row_70_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_2 -->   
                                            <!-- row_70_3 -->
                                            <div id="row_70_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_3 -->   
                                            <!-- row_70_4 -->
                                            <div id="row_70_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_4 -->   
                                        </div>
                                        <!-- end row_70_group_content -->
                                    </div>
                                    <!-- end row_70_group -->

                                    <!-- row_71_group -->
                                    <div id = "row_group_71" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (3)</label>
                                        </div>
                                        <!-- row_71_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_71_1 -->
                                            <div id="row_71_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_1 -->
                                            <!-- row_71_2 -->
                                            <div id="row_71_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_2 -->   
                                            <!-- row_71_3 -->
                                            <div id="row_71_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_3 -->   
                                            <!-- row_71_4 -->
                                            <div id="row_71_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_4 -->   
                                        </div>
                                        <!-- end row_71_group_content -->
                                    </div>
                                    <!-- end row_71_group -->

                                    <!-- row_72_group -->
                                    <div id = "row_group_72" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (4)</label>
                                        </div>
                                        <!-- row_72_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_72_1 -->
                                            <div id="row_72_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_1 -->
                                            <!-- row_72_2 -->
                                            <div id="row_72_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_2 -->   
                                            <!-- row_72_3 -->
                                            <div id="row_72_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_3 -->   
                                            <!-- row_72_4 -->
                                            <div id="row_72_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_4 -->   
                                        </div>
                                        <!-- end row_72_group_content -->
                                    </div>
                                    <!-- end row_72_group -->

                                    <!-- row_73_group -->
                                    <div id = "row_group_73" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (5)</label>
                                        </div>
                                        <!-- row_73_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_73_1 -->
                                            <div id="row_73_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_1 -->
                                            <!-- row_73_2 -->
                                            <div id="row_73_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_2 -->   
                                            <!-- row_73_3 -->
                                            <div id="row_73_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_3 -->   
                                            <!-- row_73_4 -->
                                            <div id="row_73_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_4 -->   
                                        </div>
                                        <!-- end row_73_group_content -->
                                    </div>
                                    <!-- end row_73_group -->

                                    <!-- row_74_group -->
                                    <div id = "row_group_74" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (6)</label>
                                        </div>
                                        <!-- row_74_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_74_1 -->
                                            <div id="row_74_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_1 -->
                                            <!-- row_74_2 -->
                                            <div id="row_74_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_2 -->   
                                            <!-- row_74_3 -->
                                            <div id="row_74_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_3 -->   
                                            <!-- row_74_4 -->
                                            <div id="row_74_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_4 -->   
                                        </div>
                                        <!-- end row_74_group_content -->
                                    </div>
                                    <!-- end row_74_group -->
                                </div>
                                <!-- end row_69 ~ 74 -->

                                    
                            </div>
                            <!-- end page_3 -->

                            <button type="submit" class="form-control submitBtn">公開</button>
                        </form>
                    <!-- temp03 (03): 25非常電源(蓄電池設備) : Emergency power supply (storage battery equipment)-->
                        <form action="edit" method="post" id="rep02" class="rep_form" autocomplete="on">   
                        <input type="hidden" name="reportype" value="temp03">
                        @csrf
                            <div class="rep_head">
                            25非常電源(蓄電池設備)
                            </div>
                            <!-- page_1 -->
                            <div id = "page_1" class="page_a"> 
                                <!-- page_title -->
                                <div class="page_title"
                                >非 常 電 源 （ 蓄 電 池 設 備 ） 点 検 票
                                </div>
                                <!-- row_0 :-->
                                <div id="row_0" class="row_a" >
                                    <!-- <label for="" id="label_0" class = "label_a mark_a" >
                                        その１
                                    </label> -->
                                    <label for="" id="label_0" class = "label_a" >
                                        設備名
                                    </label>
                                    <input type="text" name = "input_0" class = "input_a form-control" autocomplete="on">

                                </div>
                                <!-- end row_0 -->

                                <!-- row_1 -->
                                <div id="row_1" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_1" class = "label_a" >
                                            名 称
                                        </label>
                                        <input type="text" name = "input_1_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_1" class = "label_a" >
                                            防 火管 理 者
                                        </label>
                                        <input type="text" name = "input_1_2" class = "input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_1 -->

                                <!-- row_2 -->
                                <div id="row_2" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_2" class = "label_a" >
                                            所 在
                                        </label>
                                        <input type="text" name = "input_2_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_2" class = "label_a" >
                                            立 会 者
                                        </label>
                                        <input type="text" name = "input_2_2" class = "input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_2 -->
                                <!-- row_3 -->
                                <div id="row_3" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_3" class = "label_a" >
                                            点検種別
                                        </label>
                                        <div class="checkbox_group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="input_3_1" checked>
                                                <label for=""> 機 器</label><br>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="input_3_2" checked>
                                                <label for=""> 総 合</label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_3" class = "label_a" >
                                            点検年月日
                                        </label>
                                        <div id = "date">
                                            <input type="date" name = "input_3_3" class = "input_a form-control" >
                                            ~
                                            <input type="date" name = "input_3_4" class = "input_a form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end row_3 -->
                                <!-- row_4 -->
                                <div id="row_4" class="row_a" >
                                    <div id = "col_a1" class = "col_a">
                                        <label for="" id="label_4" class = "label_a" >
                                            点 検 者
                                        </label>
                                        <input type="text" name = "input_4_1" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_a2" class = "col_a">
                                        <label for="" id="label_4" class = "label_a" >
                                            点検者所属会社
                                        </label>
                                        <div id = "row_4_div">
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                        社名
                                                </label>
                                                <input type="text" name = "input_4_2" class = "input_a form-control" >
                                            </div>
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                    TEL
                                                </label>
                                                <input type="tel" name = "input_4_3" class = "input_a form-control">
                                            </div>
                                            <div>
                                                <label for="" id="label_4" class = "label_a" >
                                                    住所
                                                </label>
                                                <input type="text" name = "input_4_4" class = "input_a form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row_4 -->
                                <!-- row_5 -->
                                <div id="row_5" class="row_a" >
                                    <label for="" id="label_5" class = "label_a" >
                                        点 検 設 備 名
                                        </label>
                                    <!-- row_5 col_a1 -->
                                    <div id = "col_a1" class = "col_a">
                                        <div id = "col_a11">
                                            <div class = "col_a111">
                                                <label for="" id="label_5" class = "label_a" >
                                                蓄 電 池
                                                </label>
                                                <div class="col_a1111">
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        製造者名
                                                        </label>
                                                        <input type="text" name = "input_5_1" class = "input_a form-control" >
                                                    </div>
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        型 式 等
                                                        </label>
                                                        <input type="text" name = "input_5_2" class = "input_a form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "col_a111">
                                                <label for="" id="label_5" class = "label_a" >
                                                逆 変 換 装 置
                                                </label>
                                                <div class="col_a1111">
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        製造者名
                                                        </label>
                                                        <input type="text" name = "input_5_3" class = "input_a form-control" >
                                                    </div>
                                                    <div>
                                                        <label for="" id="label_5" class = "label_a" >
                                                        型 式 等
                                                        </label>
                                                        <input type="text" name = "input_5_4" class = "input_a form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row_5 col_a1 -->

                                    <!-- row_5 col_a2 -->
                                    <div id = "col_a2" class = "col_a">
                                        <div class="col_a22">
                                            <label for="" id="label_5" class = "label_a" >
                                            充 電 装 置
                                            </label>
                                            <div class="col_a222">
                                                <div class="col_a2222">
                                                    <label for="" id="label_5" class = "label_a" >
                                                    製造者名
                                                    </label>
                                                    <input type="text" name = "input_5_5" class = "input_a form-control" >
                                                </div>
                                                <div>
                                                    <label for="" id="label_5" class = "label_a" >
                                                    型 式 等
                                                    </label>
                                                    <input type="text" name = "input_5_6" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col_a22">
                                            <label for="" id="label_5" class = "label_a" >
                                            直 交 変 換 装 置
                                            </label>
                                            <div class="col_a222">
                                                <div class="col_a2222">
                                                    <label for="" id="label_5" class = "label_a" >
                                                        製造者名
                                                    </label>
                                                    <input type="text" name = "input_5_7" class = "input_a form-control" >
                                                </div>
                                                <div class="col_a2222">
                                                    <label for="" id="label_5" class = "label_a" >
                                                    型 式 等
                                                    </label>
                                                    <input type="text" name = "input_5_8" class = "input_a form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row_5 col_a2 -->
                                </div>
                                <!-- end row_5 -->   
                                <!-- row_6 -->
                                <div id="row_6" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_6" class = "label_b" >
                                            点 検 項 目
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <label for="" id="label_6" class = "label_b" >
                                            種別・容量等の内容
                                        </label>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <label for="" id="label_6" class = "label_b" >
                                            判 定
                                        </label>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <label for="" id="label_6" class = "label_b" >
                                            不 良 内 容
                                        </label>
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <label for="" id="label_6" class = "label_b" >
                                            措 置 内 容
                                        </label>
                                    </div>
                                </div>
                                <!-- end row_6 -->  

                                <!-- row_6_1 group_title -->
                                <div id = "row_6_1" class="row_a">
                                    <label id = "label_6_1" class = "group_title">
                                        機 器 点 検
                                    </label>
                                </div>
                                <!-- end row_6_1 group_title -->

                                <!-- row_group_1 : row_7 ~ row_12 -->
                                <div id = "row_group_1" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">設 置 状 況</label>
                                    </div>
                                    <!-- row_group_1_content -->
                                    <div class="row_group_content">
                                        <!-- row_7 -->
                                        <div id="row_7" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_7" class = "label_b" >
                                                    周 囲 の 状 況
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_7" class = "input_a form-control" placeholder="種別・容量等の内容">
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_7" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_7" class = "defect input_a form-control" placeholder="不 良 内 容">
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_7" class = "measure input_a form-control" placeholder="措 置 内 容">
                                            </div>
                                        </div>
                                        <!-- end row_7 -->  
                                         <!-- row_8 -->
                                         <div id="row_8" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_8" class = "label_b" >
                                                区 画 等
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <!-- <div class="checkbox">
                                                    <input type="radio" name="input_8" value = "1" checked>
                                                    <label for=""> キ ュ ー ビ ク ル 式</label><br>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="radio" name="input_8" value = "2" >
                                                    <label for=""> キュービクル式以外</label><br>
                                                </div> -->
                                                <select name = "input_8" class = "form-control input_a form-select select_box">
                                                    <option value="1">キ ュ ー ビ ク ル 式</option>
                                                    <option value="2">キュービクル式以外</option>
                                                </select>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_8" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_8" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_8" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_8 -->  
                                        <!-- row_9 -->
                                        <div id="row_9" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_9" class = "label_b" >
                                                水 の 浸 透
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_9" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_9" class = "form-control select" >
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_9" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_9" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_10 --> 
                                        <div id="row_10" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_10" class = "label_b" >
                                                換 気
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <!-- <div class="checkbox_group">
                                                    <div class="checkbox">
                                                        <input type="radio" name="input_10" value = "1">
                                                        <label for=""> 自 然</label><br>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="radio" name="input_10" value = "2" checked>
                                                        <label for=""> 機 械</label><br>
                                                    </div>
                                                </div> -->
                                                <select name = "input_10" class = "form-control input_a form-select select_box">
                                                        <option value="1"> 自 然</option>
                                                        <option value="2">機 械</option>
                                                    </select>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_10" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_10" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_10" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_10 --> 
                                        <!-- end row_11 --> 
                                            <div id="row_11" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_11" class = "label_b" >
                                                照 明
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_11" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_11" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_11" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_11" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_11 --> 
                                        <!-- end row_12 --> 
                                        <div id="row_12" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_12" class = "label_b" >
                                                標 識
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_12" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_12" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_12" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_12" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_12 --> 
                                        
                                    </div>
                                    <!-- end row_group_1_content -->
                                </div>
                                <!-- end row_group_1 : row_7 ~ row_12 -->

                                <!-- row_group_2 : row_13 ~ row_21 -->
                                <div id = "row_group_2" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">蓄 電 池</label>
                                    </div>
                                    <!-- row_group_2_content -->
                                    <div class="row_group_content">
                                        <!-- row_13 -->
                                        <div id="row_13" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_13" class = "label_b" >
                                                    外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_13" class = "input_a form-control">
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_13" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_13" class = "defect input_a form-control">
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_13" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_13 -->  
                                         <!-- row_14 -->
                                         <div id="row_14" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_14" class = "label_b" >
                                                    表 示
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_14" class = "input_a form-control">
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_14" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_14" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_14" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_14 -->  
                                        <!-- row_15 -->
                                        <div id="row_15" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_15" class = "label_b" >
                                                電 解 液
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_15" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_15" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_15" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_15" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_15 -->
                                        <!-- end row_16 --> 
                                        <div id="row_16" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_16" class = "label_b" >
                                                減 液 警 報 用 電 極
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_16" class = "input_a form-control" 
                                                value="">
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_16" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_16" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_16" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_16 --> 
                                        <!-- end row_17 --> 
                                            <div id="row_17" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_17" class = "label_b" >
                                                液 漏 れ 警 報 用 電 極
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_17" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_17" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_17" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_17" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_17 --> 
                                        <!-- end row_18 --> 
                                        <div id="row_18" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_18" class = "label_b" >
                                                総 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_18" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_18" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_18" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_18" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_18 --> 
                                        <!-- end row_19 --> 
                                        <div id="row_19" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_19" class = "label_b" >
                                                セ ル 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_19" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_19" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_19" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_19" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_19 --> 
                                        <!-- end row_20 --> 
                                        <div id="row_20" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_20" class = "label_b" >
                                                負 荷 容 量
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_20" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_20" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_20" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_20" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_21 --> 
                                        <div id="row_21" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_21" class = "label_b" >
                                                均 等 充 電
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_21" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_21" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_21" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_21" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_21 --> 
                                    </div>
                                    <!-- end row_group_2_content -->
                                </div>
                                <!-- end row_group_2 : row_7 ~ row_12 -->
                                <!-- end .col_b1, .col_b2, .col_b3, .label_b -->
                            </div>
                            <!-- end page_1 -->

                            <!-- page_2 -->
                            <div id = "page_2" class="page_a"> 
                                <!-- row_group_3: row_22 ~ row_32 -->
                                <div id = "row_group_3" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">充 電 装 置</label>
                                    </div>
                                    <!-- row_group_3_content -->
                                    <div class="row_group_content">
                                        <!-- row_22 -->
                                        <div id="row_22" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_22" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_22" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_22" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_22" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_22" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_22 -->  
                                        <!-- row_23 -->
                                        <div id="row_23" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_23" class = "label_b" >
                                                表 示
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_23" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_23" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_23" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_23" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_23 --> 
                                        <!-- row_24 -->
                                        <div id="row_24" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_24" class = "label_b" >
                                                開 閉 器 ・ 遮 断 器
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_24" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_24" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_24" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_24" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_24 --> 
                                        <!-- row_25 -->
                                        <div id="row_25" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_25" class = "label_b" >
                                                交 流 入 力 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_25" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_25" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_25" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_25" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_25 --> 
                                        <!-- row_26 -->
                                        <div id="row_26" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_26" class = "label_b" >
                                                トリクル・浮動・定電流定電圧充電電圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_26" class = "input_a form-control" 
                                                value="">
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_26" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_26" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_26" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_26 --> 
                                        <!-- row_27 -->
                                        <div id="row_27" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_27" class = "label_b" >
                                                均 等 充 電 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_27" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_27" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_27" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_27" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_27 --> 
                                        <!-- row_28 -->
                                        <div id="row_28" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_28" class = "label_b" >
                                                均 等 充 電 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_28" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_28" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_28" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_28" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_28 --> 
                                         <!-- row_29 -->
                                         <div id="row_29" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_29" class = "label_b" >
                                                負 荷 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_29" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_29" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_29" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_29" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_29 --> 
                                        <!-- row_30 -->
                                        <div id="row_30" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_30" class = "label_b" >
                                                負 荷 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_30" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_30" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_30" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_30" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_30 --> 
                                        <!-- row_31 -->
                                        <div id="row_31" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_31" class = "label_b" >
                                                負 荷 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_31" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_31" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_31" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_31" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_31 --> 
                                        <!-- row_32 -->
                                        <div id="row_32" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_32" class = "label_b" >
                                                接 地
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_32" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_32" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_32" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_32" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_32 --> 
                                    </div>
                                    <!-- end row_group_3_content -->
                                </div>
                                <!-- end row_group_3: row_22 ~ row_32 -->

                                <!-- row_group_4: row_33 ~ row_39 -->
                                <div id = "row_group_4" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">逆 変 換 装 置</label>
                                    </div>
                                    <!-- row_group_4_content -->
                                    <div class="row_group_content">
                                        <!-- row_33 -->
                                        <div id="row_33" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_33" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_33" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_33" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_33" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_33" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_33 -->  
                                        <!-- row_34 -->
                                        <div id="row_34" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_34" class = "label_b" >
                                                表 示
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_34" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_34" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_34" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_34" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_34 -->  
                                        <!-- row_35 -->
                                        <div id="row_35" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_35" class = "label_b" >
                                                開 閉 器 ・ 遮 断 器
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_35" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_35" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_35" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_35" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_35 -->  
                                        <!-- row_36 -->
                                        <div id="row_36" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_36" class = "label_b" >
                                                交 流 出 力 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_36" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_36" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_36" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_36" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_36 -->  
                                        <!-- row_37 -->
                                        <div id="row_37" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_37" class = "label_b" >
                                                交 流 出 力 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_37" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_37" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_37" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_37" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_37 -->  
                                        <!-- row_38 -->
                                        <div id="row_38" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_38" class = "label_b" >
                                                交 流 出 力 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_38" class = "input_a form-control" >
                                                <span class="unit">Hz</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_38" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_38" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_38" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_38 -->  
                                        <!-- row_39 -->
                                        <div id="row_39" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_39" class = "label_b" >
                                                交 流 出 力 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_39" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_39" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_39" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_39" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_39 -->  
                                    </div>
                                    <!-- end row_group_4_content -->
                                </div>
                                <!-- end row_group_4: row_33 ~ row_39 -->
                                
                                <!-- row_group_5: row_40 ~ row_48 -->
                                <div id = "row_group_5" class="row_group">
                                    <div class="row_group_title">
                                        <label for="">直 交 変 換 装 置</label>
                                    </div>
                                    <!-- row_group_5_content -->
                                    <div class="row_group_content">
                                        <!-- row_40 -->
                                        <div id="row_40" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_40" class = "label_b" >
                                                外 形
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_40" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_40" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_40" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_40" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_40 -->  
                                        <!-- row_41 -->
                                        <div id="row_41" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_41" class = "label_b" >
                                                表 示
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_41" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_41" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_41" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_41" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_41 -->  
                                        <!-- row_42 -->
                                        <div id="row_42" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_42" class = "label_b" >
                                                開 閉 器 ・ 遮 断 器
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_42" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_42" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_42" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_42" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_42 -->  
                                        <!-- row_43 -->
                                        <div id="row_43" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_43" class = "label_b" >
                                                交 流 入 力 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_43" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_43" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_43" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_43" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_43 -->  
                                        <!-- row_44 -->
                                        <div id="row_44" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_44" class = "label_b" >
                                                充 電 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_44" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_44" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_44" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_44" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_44 -->  
                                        <!-- row_45 -->
                                        <div id="row_45" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_45" class = "label_b" >
                                                充 電 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_45" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_45" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_45" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_45" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_45 -->  
                                        <!-- row_46 -->
                                        <div id="row_46" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_46" class = "label_b" >
                                                交 流 出 力 電 圧
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_46" class = "input_a form-control" >
                                                <span class="unit">V</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_46" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_46" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_46" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_46 -->  
                                        <!-- row_47 -->
                                        <div id="row_47" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_47" class = "label_b" >
                                                交 流 出 力 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_47" class = "input_a form-control" >
                                                <span class="unit">A</span>
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_47" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_47" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_47" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_47 -->  
                                        <!-- row_48 -->
                                        <div id="row_48" class="row_a" >
                                            <div id = "col_b1" class = "col_b1">
                                                <label for="" id="label_48" class = "label_b" >
                                                交 流 出 力 電 流
                                                </label>
                                            </div>
                                            <div id = "col_b2" class = "col_b2">
                                                <input type="text" name = "input_48" class = "input_a form-control" >
                                            </div>
                                            <div id = "col_b3" class = "col_b3">
                                                <select name="check_48" class = "form-control select"> 
                                                    <option value="1" class="option">O</option>
                                                    <option value="0" class="option">/</option>
                                                    <option value="2" class="option">×</option>
                                                </select>
                                            </div>
                                            <div id = "col_b4" class = "col_b4">
                                                <input type="text" name = "defect_48" class = "defect input_a form-control" >
                                            </div>
                                            <div id = "col_b5" class = "col_b5">
                                                <input type="text" name = "measure_48" class = "measure input_a form-control" >
                                            </div>
                                        </div>
                                        <!-- end row_48 -->  
                                    </div>
                                    <!-- end row_group_5_content -->
                                </div>
                                <!-- end row_group_5: row_40 ~ row_48 -->

                                <!-- row_49 -->
                                <div id="row_49" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_49" class = "label_b" >
                                        結 線 接 続
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_49" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_49" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_49" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_49" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_49 -->  

                            </div>
                            <!-- end page_2 -->

                            <!-- page_3 -->
                            <div id = "page_3" class="page_a"> 
                                <!-- row_50 -->
                                <div id="row_50" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_50" class = "label_b" >
                                        ポ ン プ 外 形
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_50" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_50" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_50" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_50" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_50 -->  
                                <!-- row_51 -->
                                <div id="row_51" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_51" class = "label_b" >
                                        ポ ン プ 性 能
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_51" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_51" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_51" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_51" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_51 -->  
                                <!-- row_52 -->
                                <div id="row_52" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_52" class = "label_b" >
                                        タ ン ク ・ 配 管 等
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_52" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_52" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_52" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_52" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_52 -->  
                                <!-- row_53 -->
                                <div id="row_53" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_53" class = "label_b" >
                                        制 御 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_53" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_53" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_53" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_53" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_53 -->  
                                <!-- row_54 -->
                                <div id="row_54" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_54" class = "label_b" >
                                        耐 震 措 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_54" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_54" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_54" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_54" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_54 -->  
                                <!-- row_55 -->
                                <div id="row_55" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_55" class = "label_b" >
                                        予 備 品 等
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_55" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_55" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_55" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_55" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_55 --> 
                                
                                <!-- row_56 group_title -->
                                <div id = "row_55" class="row_a">
                                    <label id = "label_55" class = "group_title">
                                    総 合 点 検
                                    </label>
                                </div>
                                <!-- end row_56 group_title -->

                                <!-- row_57 -->
                                <div id="row_57" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_57" class = "label_b" >
                                        接 地 抵 抗
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_57_1" class = "input_a form-control">
                                        <span class="unit">種</span>
                                        <input type="text" name = "input_57_2" class = "input_a form-control">
                                        <span class="unit">Ω</span>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_57" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_57" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_57" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_57 --> 
                                <!-- row_58 -->
                                <div id="row_58" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_58" class = "label_b" >
                                        絶 縁 抵 抗
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_58" class = "input_a form-control" >
                                        <span class="unit">MΩ</span>
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_58" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_58" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_58" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_58 --> 
                                <!-- row_59 -->
                                <div id="row_59" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_59" class = "label_b" >
                                        容 量
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_59" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_59" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_59" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_59" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_59 --> 
                                <!-- row_60 -->
                                <div id="row_60" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_60" class = "label_b" >
                                        切 替 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_60" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_60" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_60" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_60" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_60 --> 
                                <!-- row_61 -->
                                <div id="row_61" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_61" class = "label_b" >
                                        電 圧 計 ・ 周 波 数 計
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_61" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_61" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_61" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_61" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_61 --> 
                                <!-- row_62 -->
                                <div id="row_62" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_62" class = "label_b" >
                                        警 報 動 作
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_62" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_62" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_62" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_62" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_62 --> 
                                <!-- row_63 -->
                                <div id="row_63" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_63" class = "label_b" >
                                        減 液 警 報 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_63" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_63" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_63" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_63" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_63 --> 
                                <!-- row_64 -->
                                <div id="row_64" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_64" class = "label_b" >
                                        液 漏 れ 警 報 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_64" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_64" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_64" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_64" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_64 --> 
                                <!-- row_65 -->
                                <div id="row_65" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_65" class = "label_b" >
                                        電 圧 調 整 範 囲
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_65" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_65" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_65" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_65" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_65 --> 
                                <!-- row_66 -->
                                <div id="row_66" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_66" class = "label_b" >
                                        負 荷 電 圧 補 償 装 置
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_66" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_66" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_66" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_66" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_66 --> 
                                <!-- row_67 -->
                                <div id="row_67" class="row_a" >
                                    <div id = "col_b1" class = "col_b1">
                                        <label for="" id="label_67" class = "label_b" >
                                        タ イ マ ー
                                        </label>
                                    </div>
                                    <div id = "col_b2" class = "col_b2">
                                        <input type="text" name = "input_67" class = "input_a form-control" >
                                    </div>
                                    <div id = "col_b3" class = "col_b3">
                                        <select name="check_67" class = "form-control select"> 
                                            <option value="1" class="option">O</option>
                                            <option value="0" class="option">/</option>
                                            <option value="2" class="option">×</option>
                                    </select>
                                    </div>
                                    <div id = "col_b4" class = "col_b4">
                                        <input type="text" name = "defect_67" class = "defect input_a form-control" >
                                    </div>
                                    <div id = "col_b5" class = "col_b5">
                                        <input type="text" name = "measure_67" class = "measure input_a form-control" >
                                    </div>
                                </div>
                                <!-- end row_67 --> 
                                <!-- row_68 div -->
                                <div class="textarea">
                                    <!-- row_68 :textarea-->
                                    <div id="row_68" class="row_a" >
                                        <div id = "col_b1" class = "col_b1">
                                            <label for="" id="label_68" class = "label_b" >
                                            備 考 <br>
                                            (電気主任技術者 氏名及び資格)
                                            </label>
                                        </div>
                                        <div id = "col_b2" class = "col_b2">
                                            <textarea name="input_68" id="" cols="60" rows="10" class = "input_a form-control">
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- end row_68 : textarea--> 
                                </div>
                                <!-- end row_68 div -->

                                
                                <!-- row_69 ~ 74 -->
                                <div class="row_69_74">
                                    <!-- row_69_group -->
                                    <div id = "row_group_69" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (1)</label>
                                        </div>
                                        <!-- row_69_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_69_1 -->
                                            <div id="row_69_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_1 -->
                                            <!-- row_69_2 -->
                                            <div id="row_69_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_2 -->   
                                            <!-- row_69_3 -->
                                            <div id="row_69_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_3 -->   
                                            <!-- row_69_4 -->
                                            <div id="row_69_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_69_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_69_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_69_4 -->   
                                        </div>
                                        <!-- end row_69_group_content -->
                                    </div>
                                    <!-- end row_69_group -->

                                    <!-- row_70_group -->
                                    <div id = "row_group_70" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (2)</label>
                                        </div>
                                        <!-- row_70_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_70_1 -->
                                            <div id="row_70_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_1 -->
                                            <!-- row_70_2 -->
                                            <div id="row_70_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_2 -->   
                                            <!-- row_70_3 -->
                                            <div id="row_70_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_3 -->   
                                            <!-- row_70_4 -->
                                            <div id="row_70_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_70_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_70_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_70_4 -->   
                                        </div>
                                        <!-- end row_70_group_content -->
                                    </div>
                                    <!-- end row_70_group -->

                                    <!-- row_71_group -->
                                    <div id = "row_group_71" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (3)</label>
                                        </div>
                                        <!-- row_71_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_71_1 -->
                                            <div id="row_71_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_1 -->
                                            <!-- row_71_2 -->
                                            <div id="row_71_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_2 -->   
                                            <!-- row_71_3 -->
                                            <div id="row_71_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_3 -->   
                                            <!-- row_71_4 -->
                                            <div id="row_71_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_71_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_71_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_71_4 -->   
                                        </div>
                                        <!-- end row_71_group_content -->
                                    </div>
                                    <!-- end row_71_group -->

                                    <!-- row_72_group -->
                                    <div id = "row_group_72" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (4)</label>
                                        </div>
                                        <!-- row_72_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_72_1 -->
                                            <div id="row_72_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_1 -->
                                            <!-- row_72_2 -->
                                            <div id="row_72_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_2 -->   
                                            <!-- row_72_3 -->
                                            <div id="row_72_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_3 -->   
                                            <!-- row_72_4 -->
                                            <div id="row_72_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_72_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_72_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_72_4 -->   
                                        </div>
                                        <!-- end row_72_group_content -->
                                    </div>
                                    <!-- end row_72_group -->

                                    <!-- row_73_group -->
                                    <div id = "row_group_73" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (5)</label>
                                        </div>
                                        <!-- row_73_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_73_1 -->
                                            <div id="row_73_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_1 -->
                                            <!-- row_73_2 -->
                                            <div id="row_73_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_2 -->   
                                            <!-- row_73_3 -->
                                            <div id="row_73_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_3 -->   
                                            <!-- row_73_4 -->
                                            <div id="row_73_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_73_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_73_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_73_4 -->   
                                        </div>
                                        <!-- end row_73_group_content -->
                                    </div>
                                    <!-- end row_73_group -->

                                    <!-- row_74_group -->
                                    <div id = "row_group_74" class="row_group">
                                        <div class="row_group_title">
                                            <label for="">測 定 機 器 (6)</label>
                                        </div>
                                        <!-- row_74_group_content -->
                                        <div class="row_group_content">
                                            <!-- row_74_1 -->
                                            <div id="row_74_1" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_1" class = "label_b" >
                                                    機 器 名
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_1" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_1 -->
                                            <!-- row_74_2 -->
                                            <div id="row_74_2" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_2" class = "label_b" >
                                                    型 式
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_2" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_2 -->   
                                            <!-- row_74_3 -->
                                            <div id="row_74_3" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_3" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_3" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_3 -->   
                                            <!-- row_74_4 -->
                                            <div id="row_74_4" class="row_a" >
                                                <div id = "col_b1" class = "col_b1">
                                                    <label for="" id="label_74_4" class = "label_b" >
                                                    校正年月日
                                                    </label>
                                                </div>
                                                <div id = "col_b2" class = "col_b2">
                                                    <input type="text" name = "input_74_4" class = "input_a form-control" >
                                                </div>
                                            </div>
                                            <!-- end row_74_4 -->   
                                        </div>
                                        <!-- end row_74_group_content -->
                                    </div>
                                    <!-- end row_74_group -->
                                </div>
                                <!-- end row_69 ~ 74 -->

                               
                            </div>
                            <!-- end page_3 -->

                            <!-- page_4 -->
                            <div id="page_4" class="page_a">
                                <div class="page_title">
                                    蓄 電 池 充 電 記 録
                                </div>
                                <!-- row_g_0  -->
                                <div id = "row_g_0" class="row_a row_g_0">
                                    <div class="col_g_1">
                                        <label for="" class="label_g">
                                            形名
                                        </label>
                                        <input type="text" name = "input_g_0_1" class="input_a form-control input_g">
                                    </div>
                                    <div class="col_g_2">
                                        <label for="" class="label_g">
                                            充電電流 (A)
                                        </label>
                                        <input type="text" name = "input_g_0_2" class="input_a form-control input_g">
                                        <!-- <span class="uint">A</span> -->
                                    </div>
                                    <div class="col_g_3">
                                        <label for="" class="label_g">
                                            測定
                                        </label>
                                        <input type="datetime-local" name = "input_g_0_3" class="input_a form-control input_g" placeholder="令和 00-0-24 0:1" pattern="">
                                    </div>
                                </div>
                                <!-- end row_g_0  -->
                                
                                <!-- group_all : group_$i : $i = 1 ~ 90 -->
                                <div class = "group_all">
                                    <?php
                                        $j = 1;
                                        for ($i=1; $i <= 90; $i++) { 
                                            if ($i == 1 | $i == 31 | $i == 61) {
                                                //$J = 1 ~ 3
                                                ?>
                                                <!-- group_$j : $j = 1 ~ 3 -->
                                                <div id = "group_{{$j}}" class="group">
                                                    <!-- head_group_$j : $J = 1 ~ 3 -->
                                                    <div id = "head_group_{{$j}}" class="row_a row_group head_group">
                                                        <div class = "col_g_0">
                                                            電池番号
                                                        </div>
                                                        <div class="col_g_1">
                                                            単電池電圧（Ｖ）
                                                        </div>
                                                        <div class="col_g_2">
                                                            電解液比重
                                                        </div>
                                                        <div class="col_g_3">
                                                            電解液温 度（℃）
                                                        </div>
                                                    </div>
                                                    <!-- end head_group_1 -->
                                                

                                                <?php
                                            }
                                            ?>
                                            <!-- row_g_$i = 1 ~ 90 -->
                                            <div id = "row_g_{{$i}}" class="row_a row_group">
                                                <div class = "col_g_0">
                                                    {{$i}}
                                                </div>
                                                <div class="col_g_1">
                                                    <input type="text" name = "input_g_{{$i}}_1" class="input_a form-control input_g" >
                                                </div>
                                                <div class="col_g_2">
                                                    <input type="text" name = "input_g_{{$i}}_2" class="input_a form-control input_g" >
                                                </div>
                                                <div class="col_g_3">
                                                    <input type="text" name = "input_g_{{$i}}_3" class="input_a form-control input_g" >
                                                </div>
                                            </div>
                                            <!-- end row_g_$i  -->
                                            <?php 
                                            if ($i == 30 | $i == 60 | $i == 90) {
                                                $j++;
                                                ?>

                                                </div>
                                                <!-- head_group_$j -->

                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <!-- end group_all : group_$i : $i = 1 ~ 90 -->
                            </div>
                            <!-- end page_4 -->
                            
                            <button type="submit" class="form-control submitBtn">公開</button>
                        </form>
                        <!-- end temp03 -->
                    <!-- temp02 (wc) : 作業確認書 : Work confirmation = wc-->
                        <form action="edit" method="post" id="rep03" class="rep_form">   
                        <input type="hidden" name="reportype" value="temp02">
                        @csrf

                            <!-- table temp02 -->
                            <div class = "wc">
                                
                            <?php $content_text_title = "作業内容/確認内容";?>
                               

                                <!-- row_title : (index : _title)-->
                                <div class = "wc_row wc_row_title">
                                    <!-- photo-->
                                    <div class = "wc_photo">
                                        写真
                                    </div>
                                    <!-- end photo-->

                                    <!-- working time-->
                                    <div class = "wc_time">
                                        作業時間
                                    </div>
                                    <!-- end working time -->

                                    <!-- content and check -->
                                    <div class = "wc_content_check">
                                        <div class="form-check">
                                            <label class="form-check-label wc_content" name = "content_title">{{$content_text_title}}</label>
                                            <input onclick = "toggleAllCheck()" class="form-check-input wc_check" type="checkbox" id="check_title" name="check_title" >
                                        </div>
                                    </div>
                                    <!-- end content and check -->
                                </div>
                                <!-- end row_title -->

                                <!-- content_text : excel and notepad "data/content_text"-->
                                <?php
                                    $content_text_prefix = "content_text_";
                                    $content_text_1 = "施設外観＋発電機外観+銘板+エンジンプレート撮影";
                                    $content_text_2 = "試験モード切替";
                                    $content_text_3 = "本体周囲1メートル以内に異物等無し";
                                    $content_text_4 = "試験機側ケーブル接続";
                                    $content_text_5 = "発電機側ケーブル接続";
                                    $content_text_6 = "端子【841】又は842を外す";
                                    $content_text_7 = "冷却ファン変形、腐食、Vベルトに緩みがないか";
                                    $content_text_8 = "その他付属機器の変形、脱落、損傷、腐食がないか";
                                    $content_text_9 = "冷却水の量、色、錆の浮遊等確認";
                                    $content_text_10 = "煙道配管の変形、損傷、脱落、腐食の確認";
                                    $content_text_11 = "消音器のドレン抜き ※消音器がある場合のみ";
                                    $content_text_12 = "発電機の変形、損傷、脱落、漏れ、腐食がないこと";
                                    $content_text_13 = "エンジン始動｜電圧確立時間の測定";
                                    $content_text_14 = "ブレーカーをOFFにして電圧計測｜二次側確認";
                                    $content_text_15 = "エンジン停止制御電源OFFバッテリスイッチOFF";
                                    $content_text_16 = "発電機装置周辺に異臭（油臭・オイル臭）無し";
                                    $content_text_17 = "発電機装置扉の開け閉め確認";
                                    $content_text_18 = "「発電設備」の標識を確認";
                                    $content_text_19 = "計器類の変形、損傷、指針の狂いがないこと";
                                    $content_text_20 = "警告灯表示に点灯無しを確認";
                                    $content_text_21 = "バッテリー電圧｜内部抵抗値測定";
                                    $content_text_22 = "制御電源ON、ブレーカーON";
                                    $content_text_23 = "蓄電池本体及び触媒栓の交換推奨年月を確認";
                                    $content_text_24 = "耐震装置の確認｜ボルトの緩み、ストッパ有無等";
                                    $content_text_25 = "開閉器遮断器の変形、損傷、端子の緩み、位置の確認";
                                    $content_text_26 = "発電機表示灯の点灯状態の確認";
                                    $content_text_27 = "制御電源表示灯（　　　）商用表示灯（　　　）";
                                    $content_text_28 = "充電表示灯（　　　）負荷商用表示灯（　　　）";
                                    $content_text_29 = "時刻表示灯（　　　）試験表示灯（　　　）";
                                    $content_text_30 = "燃料タンクの破損、腐食、燃料が規定量あるか確認";
                                    $content_text_31 = "照明が正常に点灯すること｜種類個数容量を記録";
                                    $content_text_32 = "エンジンの変形、損傷、脱落、漏れ、腐食がないか";
                                    $content_text_33 = "取説等が備えてあることを確認";
                                    $content_text_34 = "検油棒にて潤滑油の量と色、粘度、臭いの確認";
                                    $content_text_35 = "各種配管、結線接続端子の緩み、損傷、脱線など";
                                    $content_text_36 = "外箱、扉、換気口等に著しい変形損傷がないか";
                                    $content_text_37 = "認定商標が貼付されていることを確認";
                                    $content_text_38 = "始動渋滞試験｜保護装置※消防点検のみ";
                                    $content_text_39 = "黒煙の状態を確認";
                                    $content_text_40 = "10％負荷｜5分";
                                    $content_text_41 = "エンジン停止、ブレーカーOFF、制御電源OFF";
                                    $content_text_42 = "発電機ケーブルを外す";
                                    $content_text_43 = "計測終了｜5分間のクールダウン";
                                    $content_text_44 = "数値測定｜別紙";
                                    $content_text_45 = "油圧低下試験｜保護装置※消防点検のみ";
                                    $content_text_46 = "冷却水温度上昇試験｜保護装置※消防点検のみ";
                                    $content_text_47 = "施設担当者様へ終了のご報告";
                                    $content_text_48 = "数値測定｜別紙";
                                    $content_text_49 = "数値測定｜別紙｜10分後";
                                    $content_text_50 = "数値測定｜別紙｜終了前";
                                    $content_text_51 = "キュービクル内外に工具ボルト等がないか確認";
                                    $content_text_52 = "キュービクルの施錠";
                                    $content_text_53 = "過電流試験｜保護装置※消防点検のみ";
                                    $content_text_54 = "エンジン始動｜起動確認及び接続箇所電圧確認";
                                    $content_text_55 = "エンジン停止｜";
                                    $content_text_56 = "制御電源表示灯（　　　）商用表示灯（　　）";
                                    $content_text_57 = "充電表示灯（　　　）負荷商用表示灯（　　）";
                                    $content_text_58 = "時刻表示灯（　　　）試験表示灯（　　　）";
                                    $content_text_59 = "端子【841】又は【842】を再接続";
                                    $content_text_60 = "制御電源ON、ブレーカーON、自動モード切替";
                                    $content_text_61 = "数値測定｜別紙";
                                    $content_text_62 = "制御電源表示灯（　　　）商用表示灯（　　）";
                                    $content_text_63 = "充電表示灯（　　　）負荷商用表示灯（　　）";
                                    $content_text_64 = "時刻表示灯（　　　）試験表示灯（　　　）";
                                    $content_text_65 = "２０％負荷｜5分";
                                    $content_text_66 = "制御電源表示灯（　　　）商用表示灯（　　）";
                                    $content_text_67 = "充電表示灯（　　　）負荷商用表示灯（　　）";
                                    $content_text_68 = "時刻表示灯（　　　）試験表示灯（　　　）";
                                    $content_text_69 = "無負荷運転開始｜5分";
                                    $content_text_70 = "試験機ケーブルを外す";
                                    $content_text_71 = "30％負荷｜20分";
                                    $content_text_72 = "数値測定｜別紙｜開始";
                                    $content_text_73 = "制御電源表示灯（　　　）商用表示灯（　　）";
                                    $content_text_74 = "充電表示灯（　　　）負荷商用表示灯（　　）";
                                    $content_text_75 = "時刻表示灯（　　　）試験表示灯（　　　）";
                                    
                                ?>
                                <!-- end content_text -->

                                <!-- row_i -->
                                <?php
                                    $i = 1;
                                    
                                    $content_text_i = $content_text_prefix . $i;
                                    
                                    while (isset($$content_text_i) && $$content_text_i == true) {
                                    ?>
                                    <!-- row_i : (index : _i = 1~n  )-->
                                    <div class = "wc_row">
                                        <!-- photo-->
                                        <div class = "wc_photo">
                                            <input class="form-check-input" type="checkbox" id="photo_{{$i}}" name="photo_{{$i}}">
                                        </div>
                                        <!-- end photo-->

                                        <!-- working time-->
                                        <div class = "wc_time">
                                        <!-- <label for="appt">Select a time:</label> -->
                                        <input type="time" id="appt_{{$i}}" name="time_{{$i}}" value="">
                                        </div>
                                        <!-- end working time -->

                                        <!-- content and check -->
                                        <div class = "wc_content_check">
                                            <div class="form-check">
                                                <label class="form-check-label wc_content" name = "content_{{$i}}">{{$$content_text_i}}</label>
                                                <input class="form-check-input wc_check" type="checkbox" id="check_{{$i}}" name="check_{{$i}}"  >
                                            </div>
                                        </div>
                                        <!-- end content and check -->

                                    </div>
                                    <!-- end row_i -->

                                    <?php
                                    $i++;
                                    $content_text_i = $content_text_prefix . $i;
                                    }
                                ?>
                                
                                <!-- row_1 : (index : _1)
                                <div class = "wc_row">
                                    photo
                                    <div class = "wc_photo">
                                        <input class="form-check-input" type="checkbox" id="photo_1" name="photo_1" value="" >
                                    </div>
                                    end photo

                                    working time
                                    <div class = "wc_time">
                                        作業時間
                                    </div>
                                    end working time

                                    content and check
                                    <div class = "wc_content wc_check">
                                        <div class="form-check">
                                            <label class="form-check-label" name = "content_1">作業内容/確認内容</label>
                                            <input class="form-check-input" type="checkbox" id="check_1" name="check_1" value="" >
                                        </div>
                                    </div>
                                    end content and check -->

                                     <!-- report_item -->
                                    <div class="form-group wc_report_item">
                                        <label for="textarea">報告事項</label>
                                        <textarea class="form-control" id="textarea" placeholder="報告事項" name="report_item" rows="4" cols="2" wrap="hard">
                                        
                                            
                                        </textarea>   <!-- ???question japanese unrecognize 過電流試験丨保護装置 -->
                                            
                                    </div>
                                    <!-- end report_item -->
                                </div>
                                <!-- end row_1 -->
                            <!-- end table temp02 -->
                            <button type="submit" class="form-control submitBtn">公開</button>
                        </form>
                        <!-- end temp02 -->
                        

                    <!-- temp01 : 自家発電設備点検報告書 : Private power generation facility inspection report -->
                        <form action="edit" method="post" id="rep04" class="rep_form" enctype="multipart/form-data">   
                        @csrf
                            <input type="hidden" name="reportype" value="temp01">
                            <!-- 1 page -->
                            <!-- 1page_1 -->
                            <div class="inp_row">

                                <div class="input_group row">
                                    <div class="col-lg-4">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <p class="inp_group_title">測定日</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flex-box">
                                                            <input type="number" name="w_year" class="form-control input_date input_inspector">
                                                            <label for="" class="date_character">年</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex-box">
                                                            <input type="number" name="w_month" class="form-control input_date input_inspector">
                                                            <label for="" class="date_character">月</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex-box">
                                                            <input type="number" name="w_day" class="form-control input_date input_inspector">
                                                            <label for="" class="date_character">日</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inp_row">
                                            <p class="inp_group_title">施設名</p>
                                            <div class="input_group row">
                                                <div class="col-lg-12 px-0"><input type="text" name="facility_name"
                                                        class="form-control" onkeyup = "sameInput_facility(this)"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inp_row">
                                            <p class="inp_group_title">メーカ名</p>
                                            <div class="input_group row">
                                                <div class="col-lg-12 px-0"><input type="text" name="manifacturer"
                                                        class="form-control"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1page_2 -->
                            <div class="inp_row">
                                <p class="inp_group_title col-12">発電機出力</p>
                                <div class="input_group row">
                                    <div class="flex-box col-lg-4 col-md-4 col-sm-4">
                                        <input type="text" name="power01" class="form-control "><label for=""
                                            class="inp_label unit_length">KVA</label>
                                    </div>
                                    <div class="flex-box col-lg-4 col-md-4 col-sm-4">
                                        <input type="text" name="power02" class="form-control"><label for=""
                                            class="inp_label unit_length">KW</label>
                                    </div>
                                    <div class="flex-box col-lg-4 col-md-4 col-sm-4">
                                        <input type="text" name="power03" class="form-control"><label for=""
                                            class="inp_label unit_length">V</label>
                                    </div>
                                </div>
                            </div>
                            <!-- 1page_3 -->
                            <div class="inp_row">
                                <p class="inp_group_title"></p>
                                <div class="input_group row">
                                    <div class="col-lg-4">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">原動機</label>
                                            <input type="text" name="motor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">発電機</label>
                                            <input type="text" name="generator" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">消耗品</label>
                                            <input type="text" name="reduce_product" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1page_4 -->
                            <div class="inp_row">
                                <p class="inp_group_title col-12">交換推奨箇所と推奨理由</p>
                                <div class="input_group row">
                                    <div class="col-lg-12">
                                        <div class="width100">
                                            <table style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>交換推奨箇所</td>
                                                        <td>推奨理由</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="place01" class="form-control">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="reason01" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input type="text" name="place02" class="form-control">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="reason02" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <input type="text" name="place03" class="form-control">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="reason03" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- 2 page -->
                            <!-- 2page_1 -->
                            <div class="input_group row inp_row">
                                <div class="col-lg-4">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <p class="inp_group_title">実施日</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex-box">
                                                        <input type="number" name="im_year" class="form-control input_date input_inspector">
                                                        <label for="" class="date_character">年</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex-box">
                                                        <input type="number" name="im_month" class="form-control input_date input_inspector">
                                                        <label for="" class="date_character">月</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex-box">
                                                        <input type="number" name="im_day" class="form-control input_date input_inspector">
                                                        <label for="" class="date_character">日</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-4">
                                    <div class="inp_row">
                                        <p class="inp_group_title">施設名</p>
                                        <div class="input_group row">
                                            <div class="width100"><input type="text" name="im_facility_name"
                                                    class="form-control" onkeyup="sameInput_facility(this)"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="inp_row">
                                        <p class="inp_group_title">住所</p>
                                        <div class="input_group row">
                                            <div class="width100"><input type="text" name="im_fac_address"
                                                    class="form-control" onkeyup="sameinput_address(this)"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2page_2-->
                            <div class="row inp_row">
                                <p class="inp_group_title"></p>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <table class="width100">
                                        <tbody>
                                            <tr>
                                                <td style="width: 160px;">発電機メーカー</td>
                                                <td><input type="text" name="p2_power" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>発電機型式</td>
                                                <td><input type="text" name="p2_seri" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>発電機年式</td>
                                                <td><input type="text" name="p2_pow_year" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>発電機容量 (KVA)</td>
                                                <td><input type="text" name="p2_pow_amount" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <table class="width100">
                                        <tbody>
                                            <tr>
                                                <td>蓄電池メーカー</td>
                                                <td><input type="text" name="jonji" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>蓄電池型式</td>
                                                <td><input type="text" name="serial" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>蓄電池個数 (個)</td>
                                                <td><input type="text" name="power_num" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>交換推奨年月｜本体</td>
                                                <td><input type="month" name="body_date" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 160px;">交換推奨年月｜触媒栓</td>
                                                <td><input type="month" name="exc_date" class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- 2page_3 -->
                            <div class="inp_row">
                                <p class="inp_group_title col-12">機器状態調査結果</p>

                                <div class="row input_group">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <table class="table abcde_table col-lg-12">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>ABCDE</td>
                                                    <td></td>
                                                    <td>前回交換年月</td>
                                                </tr>

                                                <tr>
                                                    <td>潤滑油</td>
                                                    <td>
                                                        <select name="潤滑油_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="潤滑油_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="潤滑油_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>冷却水</td>
                                                    <td>
                                                        <select name="冷却水_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="冷却水_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="冷却水_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>ゴムホース</td>
                                                    <td>
                                                        <select name="ゴムホース_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="ゴムホース_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="ゴムホース_date" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vベルト</td>
                                                    <td>
                                                        <select name="Vベルト_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="Vベルト_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="Vベルト_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>蓄電池</td>
                                                    <td>
                                                        <select name="蓄電池_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="蓄電池_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="蓄電池_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>触媒栓</td>
                                                    <td>
                                                        <select name="触媒栓_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="触媒栓_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="触媒栓_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>潤滑油<br>フィルター</td>
                                                    <td>
                                                        <select name="フィルター_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="フィルター_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="フィルター_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>燃料<br>フィルター</td>
                                                    <td>
                                                        <select name="燃料燃料_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="燃料燃料_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="燃料燃料_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>燃料</td>
                                                    <td>
                                                        <select name="燃料_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="燃料_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="燃料_date" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>予備</td>
                                                    <td>
                                                        <select name="予備_ae" class="form-control">
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="予備_result" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="month" name="予備_date" class="form-control">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="input_group row inp_row">
                                    <table class="table abcde_table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="prod_name_ttl" class="form-control">
                                                    <br>
                                                    <input type="text" name="prod_name" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="prod_failur_ttl" class="form-control">
                                                    <br>
                                                    <input type="text" name="prod_failur" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="prod_reason_ttl" class="form-control">
                                                    <br>
                                                    <input type="text" name="prod_reason" class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--2page_4 負荷運転測定結果 / Load operation measurement result => lm-->
                            <div class="form_load_mearsure inp_row">
                                <p class="inp_group_title col-12">負荷運転測定結果</p>
                                <!-- 電圧確立 -->
                                <div class="measure_table">
                                    <div class="input_row col-12 col-sm-12 col-md-5">
                                        <label for="voltage_0" class="input_label input_width">電圧確立</label>
                                        <input type="text" name="voltage_establishment_0" class="input_control">
                                        <span>秒</span>
                                    </div>
                                    <div class="input_row col-5 col-sm-5 col-md-3 pr-0">
                                        <span>異音 : </span>
                                        <span class="border_circle">無 </span>
                                        <span> ・ 有</span>
                                    </div>
                                    <div class="input_row col-6 col-sm-5 col-md-3">
                                        <span>異音 : </span>
                                        <span class="border_circle">無 </span>
                                        <span> ・ 有</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 無負荷 (index=0)-->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 無負荷</p>
                                    <div class="input_row">
                                        <label for="voltage_0" class="input_label">電圧</label>
                                        <input type="text" name="voltage_0" class="input_control">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_0" class="input_label">周波数</label>
                                        <input type="text" name="frequency_0" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_0" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_0" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_0" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_0" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_0" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_0" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_0" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_0" class="input_control">
                                        <span>℃</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 10% (index=1)-->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 10%</p>
                                    <!-- 1st line -->
                                    <div class="input_row">
                                        <label for="voltage_1" class="input_label">電圧</label>
                                        <input type="text" name="voltage_1" class="input_control" onkeyup="sameInput(this)">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_1" class="input_label">周波数</label>
                                        <input type="text" name="frequency_1" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_1" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_1" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_1" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_1" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_1" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_1" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_1" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_1" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <!-- 2nd line -->
                                    <div class="input_row">
                                        <label for="load_1" class="input_label">負荷</label>
                                        <input type="text" name="load_1" class="input_control" onkeyup="sameInput(this)"> 
                                        <span>kW</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="reference_value_1" class="input_label">電流基準値</label>
                                        <input type="text" name="reference_value_1" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="R_phase_1" class="input_label">R相</label>
                                        <input type="text" name="R_phase_1" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="S_phase_1" class="input_label">S相</label>
                                        <input type="text" name="S_phase_1" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="T_phase_1" class="input_label">T相</label>
                                        <input type="text" name="T_phase_1" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 20% (index=2)-->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 20%</p>
                                    <!-- 1st line -->
                                    <div class="input_row">
                                        <label for="voltage_2" class="input_label">電圧</label>
                                        <input type="text" name="voltage_2" class="input_control" onkeyup="sameInput(this)">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_2" class="input_label">周波数</label>
                                        <input type="text" name="frequency_2" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_2" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_2" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_2" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_2" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_2" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_2" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_2" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_2" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <!-- 2nd line -->
                                    <div class="input_row">
                                        <label for="load_2" class="input_label">負荷</label>
                                        <input type="text" name="load_2" class="input_control" onkeyup="sameInput(this)" >
                                        <span>kW</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="reference_value_2" class="input_label">電流基準値</label>
                                        <input type="text" name="reference_value_2" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="R_phase_2" class="input_label">R相</label>
                                        <input type="text" name="R_phase_2" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="S_phase_2" class="input_label">S相</label>
                                        <input type="text" name="S_phase_2" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="T_phase_2" class="input_label">T相</label>
                                        <input type="text" name="T_phase_2" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 30%｜ 開始 (index=3)-->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 30%｜ 開始</p>
                                    <!-- 1st line -->
                                    <div class="input_row">
                                        <label for="voltage_3" class="input_label">電圧</label>
                                        <input type="text" name="voltage_3" class="input_control" onkeyup="sameInput(this)">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_3" class="input_label">周波数</label>
                                        <input type="text" name="frequency_3" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_3" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_3" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_3" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_3" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_3" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_3" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_3" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_3" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <!-- 2nd line -->
                                    <div class="input_row">
                                        <label for="load_3" class="input_label">負荷</label>
                                        <input type="text" name="load_3" class="input_control" onkeyup="sameInput(this)">
                                        <span>kW</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="reference_value_3" class="input_label">電流基準値</label>
                                        <input type="text" name="reference_value_3" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="R_phase_3" class="input_label">R相</label>
                                        <input type="text" name="R_phase_3" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="S_phase_3" class="input_label">S相</label>
                                        <input type="text" name="S_phase_3" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="T_phase_3" class="input_label">T相</label> 
                                        <input type="text" name="T_phase_3" class="input_control" onkeyup="sameInput(this)"> 
                                        <span>A</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 30%｜ 中間 (index=4)-->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 30%｜ 中間</p>
                                    <!-- 1st line -->
                                    <div class="input_row">
                                        <label for="voltage_4" class="input_label">電圧</label>
                                        <input type="text" name="voltage_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_4" class="input_label">周波数</label>
                                        <input type="text" name="frequency_4" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_4" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_4" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_4" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_4" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_4" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_4" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_4" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_4" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <!-- 2nd line -->
                                    <div class="input_row">
                                        <label for="load_4" class="input_label">負荷</label>
                                        <input type="text" name="load_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>kW</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="reference_value_4" class="input_label">電流基準値</label>
                                        <input type="text" name="reference_value_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="R_phase_4" class="input_label">R相</label>
                                        <input type="text" name="R_phase_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="S_phase_4" class="input_label">S相</label>
                                        <input type="text" name="S_phase_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="T_phase_4" class="input_label">T相</label>
                                        <input type="text" name="T_phase_4" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                </div>
                                <!-- 負荷 : 30%｜ 終了 (index=5) -->
                                <div class="measure_table">
                                    <p class="measure_table_title">負荷 : 30%｜ 終了</p>
                                    <!-- 1st line -->
                                    <div class="input_row">
                                        <label for="voltage_5" class="input_label">電圧</label>
                                        <input type="text" name="voltage_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>V</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="frequency_5" class="input_label">周波数</label>
                                        <input type="text" name="frequency_5" class="input_control">
                                        <span>Hz</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="rotation_speed_5" class="input_label">回転数</label>
                                        <input type="text" name="rotation_speed_5" class="input_control">
                                        <span>min-¹</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="hydraulic_5" class="input_label">油圧</label>
                                        <input type="text" name="hydraulic_5" class="input_control">
                                        <span>Mpa</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="oil_temperature_5" class="input_label">油温</label>
                                        <input type="text" name="oil_temperature_5" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="water_temperature_5" class="input_label">水温</label>
                                        <input type="text" name="water_temperature_5" class="input_control">
                                        <span>℃</span>
                                    </div>
                                    <!-- 2nd line -->
                                    <div class="input_row">
                                        <label for="load_5" class="input_label">負荷</label>
                                        <input type="text" name="load_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>kW</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="reference_value_5" class="input_label">電流基準値</label>
                                        <input type="text" name="reference_value_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="R_phase_5" class="input_label">R相</label>
                                        <input type="text" name="R_phase_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="S_phase_5" class="input_label">S相</label>
                                        <input type="text" name="S_phase_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                    <div class="input_row">
                                        <label for="T_phase_5" class="input_label">T相</label>
                                        <input type="text" name="T_phase_5" class="input_control" onkeyup="sameInput(this)">
                                        <span>A</span>
                                    </div>
                                </div>
                                <!-- 点検者 (inspector) -->
                                <div class="table_inspector">
                                    <div class="tr_inspector">
                                        <label for="inspector_1">点検者</label>
                                        <input type="text" name="inspector_1" class="input_inspector">
                                    </div>
                                    <div class="tr_inspector">
                                        <label for="inspector_2">点検者</label>
                                        <input type="text" name="inspector_2" class="input_inspector">
                                    </div>
                                    <div class="tr_inspector">
                                        <label for="test_model">試験機型式</label>
                                        <input type="text" name="test_model" class="input_inspector">
                                    </div>
                                </div>
                            </div>
                            <!-- end 2page -->

                            <!-- 3 page -->
                            <!-- 3 page,data:負荷運転点検データ表: Load operation inspection data_table -->
                            <div class="table_data inp_row">

                                <p class="inp_group_title table_title_data col-12">負荷運転点検データ表</p>
                                <p class="col-12">負荷試験実施年月日</p>

                                <div class="tr_test_date col-sm-12">

                                    <div class="input_test_date col-sm-4"> <input type="number" name="test_year"
                                            class="input_date input_inspector ">
                                        <label for="test_year" class="date_character">年</label>
                                    </div>
                                    <div class="input_test_date col-sm-4"> <input type="number" name="test_month"
                                            class="input_inspector input_date">
                                        <label for="test_month" class="date_character">月</label>
                                    </div>
                                    <div class="input_test_date col-sm-4"> <input type="number" name="test_day"
                                            class="input_inspector input_date">
                                        <label for="test_day" class="date_character">日</label>
                                    </div>
                                </div>
                                <div class="tr_data">
                                    <label for="Name_facility">施設名</label>
                                    <input type="text" name="Name_facility" class="input_inspector input_data" onkeyup="sameInput_facility(this)">
                                </div>
                                <div class="tr_data">
                                    <label for="address">住所</label>
                                    <input type="text" name="address" class="input_inspector input_data" onkeyup="sameinput_address(this)">
                                </div>
                                <div class="tr_data">
                                    <label for="output_capacity">発電機出力容量</label>
                                    <input type="text" name="output_capacity" class="input_inspector input_data">
                                </div>
                                <div class="tr_data">
                                    <label for="start_time">始動時間</label>
                                    <input type="text" name="start_time" class="input_inspector input_data">
                                </div>
                                <!-- table_data_b -->
                                <div class="table_data_b">
                                    <!-- 5分, 10％以上 (index=1)-->
                                    <div class="tbody_data_b inp_row">
                                        <div class="measure_table_title">
                                            <span class="span_data_b">記録時間 : 5分, &nbsp;</span>
                                            <span class="span_data_b">負荷率 : 10％以上</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="load_data_1" class="label_data_b">負荷</label>
                                            <input type="text" name="load_data_1" class="input_inspector input_data_b">
                                            <span>kW</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="voltage_data_1" class="label_data_b">電圧</label>
                                            <input type="text" name="voltage_data_1"
                                                class="input_inspector input_data_b">
                                            <span>V</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="reference_value_data_1" class="label_data_b">基準値</label>
                                            <input type="text" name="reference_value_data_1"
                                                class="input_inspector input_data_b">
                                            <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="R_phase_data_1" class="label_data_b">R相</label>
                                            <input type="text" name="R_phase_data_1"
                                                class="input_inspector input_data_b">
                                            <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="S_phase_data_1" class="label_data_b">S相</label>
                                            <input type="text" name="S_phase_data_1"
                                                class="input_inspector input_data_b">
                                            <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="T_phase_data_1" class="label_data_b">T相</label>
                                            <input type="text" name="T_phase_data_1"
                                                class="input_inspector input_data_b">
                                            <span>A</span>
                                        </div>
                                    </div>
                                    <!-- 5分, 20％以上 (index=2)-->
                                    <div class="tbody_data_b inp_row">
                                        <div class="measure_table_title">
                                            <span class="span_data_b">記録時間 : 5分, &nbsp;</span>
                                            <span class="span_data_b">負荷率 : 20％以上</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="load_data_2" class="label_data_b">負荷</label>
                                            <input type="text" name="load_data_2" class="input_inspector input_data_b">
                                            <span>kW</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="voltage_data_2" class="label_data_b">電圧</label>
                                            <input type="text" name="voltage_data_2"
                                                class="input_inspector input_data_b">
                                                <span>V</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="reference_value_data_2" class="label_data_b">基準値</label>
                                            <input type="text" name="reference_value_data_2"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="R_phase_data_2" class="label_data_b">R相(A)</label>
                                            <input type="text" name="R_phase_data_2"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="S_phase_data_2" class="label_data_b">S相(A)</label>
                                            <input type="text" name="S_phase_data_2"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="T_phase_data_2" class="label_data_b">T相(A)</label>
                                            <input type="text" name="T_phase_data_2"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                    </div>
                                    <!-- 20分｜開始, 30％以上 (index=3)-->
                                    <div class="tbody_data_b">
                                        <div class="measure_table_title">
                                            <span class="span_data_b">記録時間 : 20分｜開始, &nbsp;</span>
                                            <span class="span_data_b">負荷率 : 30％以上</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="load_data_3" class="label_data_b">負荷</label>
                                            <input type="text" name="load_data_3" class="input_inspector input_data_b">
                                            <span>kW</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="voltage_data_3" class="label_data_b">電圧</label>
                                            <input type="text" name="voltage_data_3"
                                                class="input_inspector input_data_b">
                                                <span>V</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="reference_value_data_3" class="label_data_b">基準値</label>
                                            <input type="text" name="reference_value_data_3"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="R_phase_data_3" class="label_data_b">R相(A)</label>
                                            <input type="text" name="R_phase_data_3"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="S_phase_data_3" class="label_data_b">S相(A)</label>
                                            <input type="text" name="S_phase_data_3"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="T_phase_data_3" class="label_data_b">T相(A)</label>
                                            <input type="text" name="T_phase_data_3"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                    </div>
                                    <!-- 20分｜中間, 30％以上 (index=4)-->
                                    <div class="tbody_data_b">
                                        <div class="measure_table_title">
                                            <span class="span_data_b">記録時間 : 20分｜中間, &nbsp;</span>
                                            <span class="span_data_b">負荷率 : 30％以上</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="load_data_4" class="label_data_b">負荷</label>
                                            <input type="text" name="load_data_4" class="input_inspector input_data_b">
                                            <span>kW</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="voltage_data_4" class="label_data_b">電圧</label>
                                            <input type="text" name="voltage_data_4"
                                                class="input_inspector input_data_b">
                                                <span>V</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="reference_value_data_4" class="label_data_b">基準値</label>
                                            <input type="text" name="reference_value_data_4"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="R_phase_data_4" class="label_data_b">R相(A)</label>
                                            <input type="text" name="R_phase_data_4"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="S_phase_data_4" class="label_data_b">S相(A)</label>
                                            <input type="text" name="S_phase_data_4"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="T_phase_data_4" class="label_data_b">T相(A)</label>
                                            <input type="text" name="T_phase_data_4"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                    </div>
                                    <!-- 20分｜終了, 30％以上 (index=5)-->
                                    <div class="tbody_data_b">
                                        <div class="measure_table_title">
                                            <span class="span_data_b">記録時間 : 20分｜終了, &nbsp;</span>
                                            <span class="span_data_b">負荷率 : 30％以上</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="load_data_5" class="label_data_b">負荷</label>
                                            <input type="text" name="load_data_5" class="input_inspector input_data_b">
                                            <span>kW</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="voltage_data_5" class="label_data_b">電圧</label>
                                            <input type="text" name="voltage_data_5"
                                                class="input_inspector input_data_b">
                                                <span>V</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="reference_value_data_5" class="label_data_b">基準値</label>
                                            <input type="text" name="reference_value_data_5"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="R_phase_data_5" class="label_data_b">R相(A)</label>
                                            <input type="text" name="R_phase_data_5"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="S_phase_data_5" class="label_data_b">S相(A)</label>
                                            <input type="text" name="S_phase_data_5"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                        <div class="tr_data_b">
                                            <label for="T_phase_data_5" class="label_data_b">T相(A)</label>
                                            <input type="text" name="T_phase_data_5"
                                                class="input_inspector input_data_b">
                                                <span>A</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3 Page_file : ＜発電機負荷運転点検実施写真＞
                                    : Generator load operation inspection implementation photo -->

                            <div class="inp_row">
                                <p class="inp_group_title col-12">発電機負荷運転点検実施写真</p>
                                <div class="input_group row">
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">発電機全体</label>
                                            <input type="file" name="motor_body_img01" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">発電機銘板</label>
                                            <input type="file" name="motor_body_img02" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">負荷試験機</label>
                                            <input type="file" name="motor_body_img03" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0">データ測定</label>
                                            <input type="file" name="motor_body_img04" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3 Page_load_tester, 負荷試験を行った負荷試験機:Load tester that performed load test-->
                            <div class="tbody_data_b inp_row">
                                <div class="inp_group_title">
                                    <span class="span_data_b col-12">負荷試験を行った負荷試験機</span>
                                </div>
                                <div class="tr_data_b">
                                    <label for="tester_inspector_1" class="label_data_b label_tester">点検者(1)</label>
                                    <input type="text" name="tester_inspector_1" class="input_inspector input_data_b">
                                </div>
                                <div class="tr_data_b">
                                    <label for="tester_inspector_2" class="label_data_b">点検者(2)</label>
                                    <input type="text" name="tester_inspector_2" class="input_inspector input_data_b">
                                </div>
                                <div class="tr_data_b">
                                    <label for="diploma_1" class="label_data_b">免状(1)</label>
                                    <input type="text" name="diploma_1" class="input_inspector input_data_b">
                                </div>
                                <div class="tr_data_b">
                                    <label for="diploma_2" class="label_data_b">免状(2)</label>
                                    <input type="text" name="diploma_2" class="input_inspector input_data_b">
                                </div>
                                <div class="tr_data_b">
                                    <label for="diploma_number_1" class="label_data_b">免状番号(1)</label>
                                    <input type="text" name="diploma_number_1" class="input_inspector input_data_b">
                                </div>
                                <div class="tr_data_b">
                                    <label for="diploma_number_2" class="label_data_b">免状番号(2)</label>
                                    <input type="text" name="diploma_number_2" class="input_inspector input_data_b">
                                </div>
                            </div>

                            <!-- 4 Page_book : 写　　真　　帳 -->
                            <div class="table_book inp_row">
                                <div class="inp_group_title">
                                    <span class="span_data_b col-12"> 写 真 帳 : 自家発電機設備点検業務</span>
                                </div>
                                <div class="tr_book col-md-6">
                                    <label for="implementation" class="label_book">実施施設</label>
                                    <input type="text" name="implementation" class="input_inspector input_book">
                                </div>
                                <div class="tr_book col-md-6">
                                    <label for="place" class="label_book">実施場所</label>
                                    <input type="text" name="place" class="input_inspector input_book">
                                </div>
                            </div>

                            <!-- 5 page_file and remarks -->
                            <div class="inp_row">
                                <p class="inp_group_title col-12">備考</p>
                                <div class="input_group row">
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.1 :
                                                <span class="span_remarks">電圧確立時間</span>
                                            </label>
                                            <input type="text" name="text_no_01" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_01" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.2 :
                                                <span class="span_remarks">発電機ケーブル接続</span>
                                            </label>
                                            <input type="text" name="text_no_02" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_02" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.3 :
                                                <span class="span_remarks">試験機ケーブル接続</span>
                                            </label>
                                            <input type="text" name="text_no_03" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_03" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.4 :
                                                <span class="span_remarks">冷却水</span>
                                            </label>
                                            <input type="text" name="text_no_04" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_04" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.5 :
                                                <span class="span_remarks">潤滑油</span>
                                            </label>
                                            <input type="text" name="text_no_05" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_05" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.6 :
                                                <span class="span_remarks">Vベルト</span>
                                            </label>
                                            <input type="text" name="text_no_06" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_06" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.7 :
                                                <span class="span_remarks">蓄電池</span>
                                            </label>
                                            <input type="text" name="text_no_07" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_07" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.8 :
                                                <span class="span_remarks">蓄電池内部抵抗値</span>
                                            </label>
                                            <input type="text" name="text_no_08" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_08" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.9 :
                                                <span class="span_remarks">30％測定値</span>
                                            </label>
                                            <input type="text" name="text_no_09" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_09" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.10 :
                                                <span class="span_remarks">原状復帰（ブレーカー）</span>
                                            </label>
                                            <input type="text" name="text_no_10" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_10" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.11 :
                                                <span class="span_remarks">原状復帰（自動モード）</span>
                                            </label>
                                            <input type="text" name="text_no_11" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_11" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.12 :
                                                <span class="span_remarks">燃料</span>
                                            </label>
                                            <input type="text" name="text_no_12" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_12" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.13 :
                                                <span class="span_remarks">その他</span>
                                            </label>
                                            <input type="text" name="text_no_13" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_13" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.14 :
                                                <span class="span_remarks">その他</span>
                                            </label>
                                            <input type="text" name="text_no_14" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_14" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.15 :
                                                <span class="span_remarks">その他</span>
                                            </label>
                                            <input type="text" name="text_no_15" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_15" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="width100">
                                            <label for="" class="inp_label ml-0 label_remarks">NO.16 :
                                                <span class="span_remarks">その他</span>
                                            </label>
                                            <input type="text" name="text_no_16" class="input_inspector input_remarks">
                                            <input type="file" name="file_no_16" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="form-control submitBtn">公開</button>
                        </form>
                        <!-- end temp01 -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $(".rep_form").hide();
    // // temporary
    // $(".navbar").hide();
    // $(".card-header").hide();
    // $("#report_type").show();
    // $(".form_group #rep01").css('display', 'block');
});

function hideFormGroup(){
    $(".form_group").hide();
}

function chooseType() {
    
    var choseForm , i;
    // $(".form_group").show();
    
    $(".rep_form").hide();
    var rep_type = $('#report_type').val();
    choseForm = $("rep_form");

    for (i = 0; i < choseForm.length; i++) {
        const element = choseForm[i];
        element.style.display = "none";
    }
    $(".form_group #rep0" + rep_type).css('display', 'block');
}

//all_check_set or unset ???question
var checkedAll = false;
function toggleAllCheck(){
    checkedAll = !checkedAll
   var checkedChilds = document.getElementsByClassName("wc_check");
   console.log(check_title);
   for(var i = 0 ; i < checkedChilds.length ; i++) {
        checkedChilds[i].checked = checkedAll;
   }

}
//end all_check_set or unset

//sameInput
    function sameInput(thisMe) {
        var text1 = "";
        var name1 = thisMe.name;
        var name2 = "";
        var text1 = thisMe.value;
        var name1_array = name1.split("_");
        for (var i = 0; i < name1_array.length - 1; i++) {
            var name2 = name2 + name1_array[i] + "_";
        }
        name2 = name2 + "data_" + name1_array[name1_array.length - 1];
        var name2s = document.getElementsByName(name2);
        name2s[0].setAttribute('value', text1);
        
    }
    //end sameInput
// sameInput_facility
    function sameInput_facility(thisMe) {
        
        var name = thisMe.name;
        var text = thisMe.value;
        
        var name1 = "facility_name"
        var name2 = "im_facility_name";
        var name3 = "Name_facility";
        var name1s = document.getElementsByName(name1);
        var name2s = document.getElementsByName(name2);
        var name3s = document.getElementsByName(name3);
        
        name1s[0].value = text;
        name2s[0].value = text;
        name3s[0].value = text;
    }
    // end sameInput_facility

    // sameinput_a form-controlddress
    function sameinput_address(thisMe) {
        var name = thisMe.name;
        var text = thisMe.value;
        var name1 = "im_fac_address"
        var name2 = "address";
        var name1s = document.getElementsByName(name1);
        var name2s = document.getElementsByName(name2);
        name1s[0].value = text;
        name2s[0].value = text;
    }
    // end sameInput_facility
</script>

@endsection