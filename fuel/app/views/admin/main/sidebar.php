<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">HEADER</li>-->
            <!-- Optionally, you can add icons to the links -->
            <li class="<?= (Controller_Admin::$currentController == 'Mainpage') ? 'active' : ''; ?>"><a href="/admin/mainpage/edit"><i class="fa fa-home"></i> <span>Главная</span></a></li>
            <li class="treeview <?= (Controller_Admin::$currentController == 'Link') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-link"></i> <span>Ссылки</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/link"><i class="fa fa-server"></i> <span>Список</span></a></li>
                    <li><a href="/admin/link/create"><i class="fa fa-pencil-square"></i> <span>Добавить</span></a></li>
                </ul>
            </li>
            <li class="treeview <?= (Controller_Admin::$currentController == 'Category') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-tags"></i> <span>Категории</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/category"><i class="fa fa-server"></i> <span>Список</span></a></a></li>
                    <li><a href="/admin/category/create"><i class="fa fa-pencil-square"></i> <span>Добавить</span></a></li>
                </ul>
            </li>
            <li class="treeview <?= (Controller_Admin::$currentController == 'Content') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-archive"></i> <span>Контент</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/content"><i class="fa fa-server"></i> <span>Список</span></a></a></li>
                    <li><a href="/admin/content/create"><i class="fa fa-pencil-square"></i> <span>Добавить</span></a></li>
                </ul>
            </li>
            <li class="treeview <?= (Controller_Admin::$currentController == 'Language') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-globe"></i> <span>Языки</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/language"><i class="fa fa-server"></i> <span>Список</span></a></a></li>
                    <li><a href="/admin/language/create"><i class="fa fa-pencil-square"></i> <span>Добавить</span></a></li>
                </ul>
            </li>
            <? if($tcadmin_config['has_feedbacks']):?>
                <li class="treeview <?= (Controller_Admin::$currentController == 'Feedback') ? 'active' : ''; ?>">
                    <a href="#"><i class="fa fa-commenting"></i> <span>Отзывы</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/feedback"><i class="fa fa-server"></i> <span>Список</span></a></a></li>
                    </ul>
                </li>
          <? endif; ?>
          <li class="treeview <?= (Controller_Admin::$currentController == 'User') ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-users"></i> <span>Пользователи</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/user"><i class="fa fa-server"></i> <span>Список</span></a></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
  <!-- /.sidebar -->
</aside>