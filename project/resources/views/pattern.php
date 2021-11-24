<!-- row_1 -->
<div id="row_1" class="row_a" >
    <div id = "col_a1" class = "col_a">
        <label for="" id="label_1" class = "label_a" >
            名 称
        </label>
        <input type="text" name = "input_1_1" class = "input_a" >
    </div>
    <div id = "col_a2" class = "col_a">
        <label for="" id="label_1" class = "label_a" >
            防 火管 理 者
        </label>
        <input type="text" name = "input_1_2" class = "input_a" >
    </div>
</div>
<!-- end row_1 -->

<span class="unit">V</span>

<!-- page_2 -->
<div id = "page_2" class="page_a"> 
</div>
<!-- end page_2 -->

<!-- row_group_3: row_22 ~ row_32 -->
<div id = "row_group_3" class="row_group">
    <div class="row_group_title">
        <label for="">
            充 電 装 置
        </label>
    </div>
    <!-- row_group_3_content -->
    <div class="row_group_content">
        <!-- row_22 -->
        <div id="row_22" class="row_a" >
            <div id = "col_b1" class = "col_b1">
                <label for="" id="label_22" class = "label_b" >
                    周 囲 の 状 況
                </label>
            </div>
            <div id = "col_b2" class = "col_b2">
                <input type="text" name = "input_22" class = "input_a" >
            </div>
            <div id = "col_b3" class = "col_b3">
                <input type="checkbox" name = "check_22" class = "check_a" >
            </div>
        </div>
        <!-- end row_22 -->  
    </div>
    <!-- end row_group_3_content -->
</div>
<!-- end row_group_3: row_22 ~ row_32 -->

<!-- row_49 -->
<div id="row_49" class="row_a" >
    <div id = "col_b1" class = "col_b1">
        <label for="" id="label_49" class = "label_b" >
        結 線 接 続
        </label>
    </div>
    <div id = "col_b2" class = "col_b2">
        <input type="text" name = "input_49" class = "input_a" >
    </div>
    <div id = "col_b3" class = "col_b3">
        <input type="checkbox" name = "check_49" class = "check_a" >
    </div>
</div>
<!-- end row_49 -->  


<!-- page_4 -->

<!-- group_1 -->
<div id = "group_1" class="group">
    <!-- head_group_1 -->
    <div id = "head_group_1" class="row_a row_group head_group">
        <div class = "col_g_0">
            電池番号
        </div>
        <div class="col_g1">
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

    <!-- row_g_1  -->
    <div id = "row_d_1" class="row_a row_group head_group">
        <div class = "col_g_0">
            1
        </div>
        <div class="col_g_1">
            <input type="text" name = "input_g_1_1" class="input_a input_g">
        </div>
        <div class="col_g_2">
            <input type="text" name = "input_g_1_2" class="input_a input_g">
        </div>
        <div class="col_g_3">
            <input type="text" name = "input_g_1_3" class="input_a input_g">
        </div>
    </div>
    <!-- end row_g_1 : head_group -->
    <?php
        for ($i=1; $i <= 90; $i++) { 
            if ($i == 1 | $i == 31 | $i == 61) {
                $j = 1;
                ?>
                <!-- group -->
                <div id = "group_{{$j}}" class="group">
                    <!-- head_group_1 -->
                    <div id = "head_group{{$j}}" class="row_a row_group head_group">
                        <div class = "col_g_0">
                            電池番号
                        </div>
                        <div class="col_g1">
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
                </div>
                <!-- head_group_1 -->

                <?php
            }
            //code 1~30

            if ($i == 30 | $i == 60 | $i == 90) {
                $j++;
                ?>

                </div>
                <!-- end group -->

                <?php
            }
        }
    ?>

    <!-- row_g_$i  -->
    <div id = "row_g_1" class="row_a row_group">
        <div class = "col_g_0">
            1
        </div>
        <div class="col_g_1">
            <input type="text" name = "input_g_1_1" class="input_a input_g">
        </div>
        <div class="col_g_2">
            <input type="text" name = "input_g_1_2" class="input_a input_g">
        </div>
        <div class="col_g_3">
            <input type="text" name = "input_g_1_3" class="input_a input_g">
        </div>
    </div>
    <!-- end row_g_$i-->
</div>
<!-- end group_1 -->