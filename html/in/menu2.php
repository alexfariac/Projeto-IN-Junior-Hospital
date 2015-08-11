<nav class='navbar navbar-default' role='navigation'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
    </div>
    <div class='collapse navbar-collapse navbar-ex1-collapse'>
        <ul class="nav navbar-nav">
            <li><a href='in.php?op=ver&entidade=ponto' target='iframe'><font>Ponto</font></a><!--Ponto--></li>
            <li><a href='in.php?op=ver&entidade=paciente' target='iframe'><font>Paciente</font></a><!--Paciente--></li>
        </ul>
        <ul class='nav navbar-nav navbar-left'>
            <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><font>Prontuario</font><b class='caret'></b></a>
                <ul class='dropdown-menu'>
                    <li><a href='in.php?op=criar&entidade=prontuario' target='iframe'>Criar</a></li>
                    <li><a href='in.php?op=ver&entidade=prontuario' target='iframe'>Visualizar</a></li>
                </ul>
            </li>
        </ul><!--Prontuario-->
    </div><!-- /.navbar-collapse -->
</nav>