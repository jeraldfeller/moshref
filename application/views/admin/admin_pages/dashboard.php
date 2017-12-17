


 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
             <a href="<?php echo site_url();?>admin/moshref">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Moshref</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $moshref_count; ?></div>
                        </div>
                    </div>
                </div>
                </a>
                 <a href="<?php echo site_url();?>admin/leaders">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                       
                        <div class="content">
                            <div class="text">Leaders</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $leader_count; ?></div>
                        </div>
                       
                    </div>
                </div>
                 </a>
                 <a href="<?php echo site_url();?>admin/teachers">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Teachers</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo $teacher_count; ?></div>
                        </div>
                    </div>
                </div>
                </a>
                 <a href="<?php echo site_url();?>admin/contactus">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">perm_contact_calendar</i>
                        </div>
                        <div class="content">
                            <div class="text">Contact Us</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $contactus_count; ?></div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">

            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->
                
                <!-- Latest Social Trends -->
           <!--<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Moshref INFOS</h2>
                          
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Booking No</th>
                                            <th>Status</th>
                                            <th>Shop</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Task A</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Task B</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Task C</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Task D</td>
                                            <td><span class="label bg-orange">Wait Approvel</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Task E</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row clearfix">
     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="font-bold m-b--35">Leaders</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>12</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>15</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>90</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b>342</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    LAST YEAR
                                    <span class="pull-right"><b>4 225</b> <small>Orders</small></span>
                                </li>
                                 <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>90</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b>342</b> <small>Orders</small></span>
                                </li>
                                <li>
                                    ALL
                                    <span class="pull-right"><b>8 752</b> <small>Orders</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
                <!-- #END# Visitors -->
                <!-- Task Info -->
    
                <!-- #END# Task Info -->
    
            </div>
        </div>
           
    </section>