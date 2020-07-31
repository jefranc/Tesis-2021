<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-stethoscope"></i> Citas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('cita/primera/index') }}">Primera Cita</a></li>
                    <!-- <li><a href="index2.html">Dashboard2</a></li>
                            <li><a href="index3.html">Dashboard3</a></li> -->
                </ul>
            </li>


            <li><a href='{{ route('index') }}'><i class="fas fa-notes-medical"></i> Historia clínica
                </a></li>

            <li><a href=''><i class="fas fa-calendar-alt"></i> Agendar cita </a></li>
            <li><a href=''><i class="fas fa-calendar-alt"></i> Agendar cita 2 </a></li>

            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->