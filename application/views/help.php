<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"><?php echo lang("Help"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body">
                    <div class="panel-group accordion" id="accordion3">

                        <?php

                        foreach ($helps as $help){
                            echo "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h4 class=\"panel-title\">
                                    <a class=\"accordion-toggle accordion-toggle-styled\" data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapse_3_".$help["prt_help_id"]."\">".$help["help_question"]."
                                    
                                    </a>
                                </h4>
                            </div>
                            <div id=\"collapse_3_".$help["prt_help_id"]."\" class=\"panel-collapse ".$help["help_status"]."\">
                                <div class=\"panel-body\">".$help["help_answer"]."
                                </div>
                            </div>
                        </div>  
                                ";
                        }

                        ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
