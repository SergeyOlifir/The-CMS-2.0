<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <? if(isset($header)): ?>
                <?= $header; ?>
            <? endif; ?>
            <small><? if(isset($description)): ?>
                <?= $description; ?>
            <? endif; ?></small>
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">

            <? if(isset($content)): ?>
                <?= $content; ?>
            <? endif; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->