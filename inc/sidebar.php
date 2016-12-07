<div class="panel-group" id="accordionNo">
       <!--Category--> 
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> 
            <a data-toggle="collapse"  href="#collapseCategory" class="collapseWill"> 
            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Categorias 
            </a> 
            </h4>
          </div>
          
          <div id="collapseCategory" class="panel-collapse collapse in">
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked tree">   
                    <?php require_once 'category.php'; ?>                    
              </ul>
            </div>
          </div>
        </div> <!--/Category menu end--> 
         <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> 
            <a data-toggle="collapse"  href="#collapseBrand" class="collapseWill"> 
            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Fabricante 
            </a> 
            </h4>
          </div>
          
          <div id="collapseBrand" class="panel-collapse collapse in">
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked tree">   
                    <?php require_once 'brand.php'; ?>                    
              </ul>
            </div>
          </div>
        </div><!--/brand panel end-->

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> 
            <a data-toggle="collapse"  href="#collapseColor" class="collapseWill"> 
            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Cores 
            </a> 
            </h4>
          </div>
          
          <div id="collapseColor" class="panel-collapse collapse in">
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked tree">   
                    <?php //require_once 'inc/brand.php'; ?>                    
              </ul>
            </div>
          </div>
        </div><!--/color panel end-->
      </div>